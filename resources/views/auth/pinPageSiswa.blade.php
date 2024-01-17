<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @include('link-asset.head')
    <style>
        body {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #d9deff;
        }

        .pin-login {
            padding: 10px;
            font-size: 28px;
            background: #d9deff;
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-user-select: none;
            font-family: sans-serif;
            max-width: 500px;
            width: 100%;
        }

        .pin-login__text {
            margin: 10px auto 10px auto;
            padding: 10px;
            display: block;
            width: 80%;
            font-size: 0.8em;
            text-align: center;
            letter-spacing: 0.2em;
            background: rgba(0, 0, 0, 0.15);
            border: none;
            border-radius: 10px;
            outline: none;
            cursor: default;
        }

        .pin-login__text--error {
            color: #901818;
            background: #ffb3b3;
            animation-name: loginError;
            animation-duration: 0.1s;
            animation-iteration-count: 2;
        }

        @keyframes loginError {
            25% {
                transform: translateX(-3px);
            }

            75% {
                transform: translateX(3px);
            }
        }

        @-moz-keyframes loginError {
            25% {
                transform: translateX(-3px);
            }

            75% {
                transform: translateX(3px);
            }
        }

        .pin-login__numpad {
            text-align: center;
            margin-top: 100px
        }

        .pin-login__key {
            width: 60px;
            height: 60px;
            margin: 10px;
            background: rgba(0, 0, 0, 0.15);
            color: #363b5e;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
        }

        .pin-login__key:active {
            background: rgba(0, 0, 0, 0.25);
        }

        .pin-login__done {
            width: 80%;
            margin: 10px auto;
            background: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 10px;
            font-size: 1em;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="mb-3 text-center">
            <p>Hallo user 👋</p>
        </div>
        <div class="pin-login" id="mainPinLogin">
            <div class="me-4 ms-4 text-center">
                <p class="fs-5 fw-bold text-black">Masukkan code PIN Anda</p>
            </div>
            <input type="password" readonly class="pin-login__text">
            <div class="pin-login__numpad">
            </div>
        </div>
    </div>

    <script>
        class PinLogin {
            constructor({
                el,
                loginEndpoint,
                redirectTo,
                maxNumbers = Infinity
            }) {
                this.el = {
                    main: el,
                    numPad: el.querySelector(".pin-login__numpad"),
                    textDisplay: el.querySelector(".pin-login__text")
                };

                this.loginEndpoint = loginEndpoint;
                this.redirectTo = redirectTo;
                this.maxNumbers = maxNumbers;
                this.value = "";

                this._generatePad();
            }

            _generatePad() {
                const padLayout = [
                    "1", "2", "3",
                    "4", "5", "6",
                    "7", "8", "9",
                    "backspace", "0", "done"
                ];

                padLayout.forEach(key => {
                    const insertBreak = key.search(/[369]/) !== -1;
                    const keyEl = document.createElement("div");

                    keyEl.classList.add("pin-login__key");
                    keyEl.classList.toggle("material-icons", isNaN(key));
                    keyEl.textContent = key;
                    keyEl.addEventListener("click", () => {
                        this._handleKeyPress(key)
                    });
                    this.el.numPad.appendChild(keyEl);

                    if (insertBreak) {
                        this.el.numPad.appendChild(document.createElement("br"));
                    }
                });
            }

            _handleKeyPress(key) {
                switch (key) {
                    case "backspace":
                        this.value = this.value.substring(0, this.value.length - 1);
                        break;
                    case "done":
                        this._attemptLogin();
                        break;
                    default:
                        if (this.value.length < this.maxNumbers && !isNaN(key)) {
                            this.value += key;
                        }
                        break;
                }

                this._updateValueText();
            }

            _updateValueText() {
                this.el.textDisplay.value = "_".repeat(this.value.length);
                this.el.textDisplay.classList.remove("pin-login__text--error");
            }

            _attemptLogin() {
                if (this.value.length > 0) {
                    // Kirim PIN ke fungsi Laravel
                    fetch(this.loginEndpoint, {
                        method: "post",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ pincode: this.value })
                    }).then(response => {
                        if (response.status === 200) {
                            window.location.href = this.redirectTo;
                        } else {
                            this.el.textDisplay.classList.add("pin-login__text--error");
                        }
                    });
                }
            }
        }

        new PinLogin({
            el: document.getElementById("mainPinLogin"),
            loginEndpoint: "{{ route('pinCodeAction') }}", 
            redirectTo: "{{ route('home-siswa') }}"
        });
    </script>
    @include('link-asset.script')
</body>

</html>
