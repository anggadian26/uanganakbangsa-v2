<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    @include('link-asset.head')

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .background-radial-gradient {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card.bg-glass {
            height: 100%;
        }

        .scanner {
            width: 400px;
        }

        @media (max-width: 767px) {
            .scanner {
                width: 290px;
            }
        }
    </style>
</head>

<body>
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 330px;
                width: 330px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#184774, #2B95CB);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#184774, #2B95CB);
                overflow: hidden;
            }

            #radius-shape-3 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -90px;
                right: -20;
                width: 340px;
                height: 300px;
                background: radial-gradient(#184774, #2B95CB);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.5) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }

            .form-control {
                color: black;
                transition: color 0.3s;
            }

            .form-control:focus {
                color: black;
            }

            .form-control::placeholder {
                color: white;
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight fs-1" style="color: hsl(218, 81%, 95%)">
                        Uang Anak Bangsa <br />
                        <span style="color: hsl(218, 81%, 75%)">Wisma Remaja Putra</span>
                    </h1>
                    <h3>SMK Bagimu Negeriku </h3>

                </div>

                <div class="col-lg-6 mb-2 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div class="d-flex justify-content-center">
                                <div id="reader" class="scanner"></div>

                            </div>
                            <input class="form-control bg-transparent" type="text" name="result" id="result"
                                disabled>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Section: Design Block -->
    @include('link-asset.script')
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code matched = ${decodedText}`, decodedResult);
        // alert(decodedText);
        $('#result').val(decodedText);
        let id = decodedText;
        html5QrcodeScanner.clear().then(_ => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('validasiqrcode') }}",
                type: 'POST',
                data: {
                    _method: "POST", 
                    _token: CSRF_TOKEN,
                    qr_code: id
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        // Perbaikan: Redirect ke halaman setelah login berhasil
                        window.location.href = "{{ url('/') }}";
                    } else {
                        alert('gagal');
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('Terjadi kesalahan saat menghubungi server.');
                }
            });
        }).catch(error => {
            alert('Terjadi kesalahan saat membersihkan scanner.');
        });
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

</html>
