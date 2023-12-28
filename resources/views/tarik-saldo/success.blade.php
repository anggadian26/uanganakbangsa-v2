<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <style>
        .success-container {
            text-align: center;
            background-color: #ffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-out;
        }

        @media (min-width: 768px) {
            .lottie-animation {
                width: 20%;
                /* Sesuaikan dengan ukuran yang diinginkan untuk tampilan desktop */
            }
            .container-lottie {
                width: 50%;
            }
        }

        .lottie-animation {
            width: 100%;
            max-width: 300px;
            /* Sesuaikan dengan ukuran yang diinginkan */
            height: auto;
            margin: 0 auto;
            animation: scaleUp 0.5s ease-out;
        }

        .success-text {
            font-size: 18px;
            margin-top: 20px;
            /* Sesuaikan dengan kebutuhan Anda */
            color: #333;
        }
    </style>
    @include('link-asset.head')
</head>

<body>

    <div class="container-xxl container-p-y">
        <div class="row">
            <div class="d-flex justify-content-start">
                <div class="mt-1">
                    <a href="{{ route('home-siswa') }}" class="btn bg-transparant text-primary fw-bold"><span
                            class="tf-icons bx bx-arrow-back fw-bold fs-5"></span>&nbsp; Kembali</a>

                </div>
            </div>
            <div class="d-flex justify-content-center container-lottie">
                <dotlottie-player class="lottie-animation"
                    src="https://lottie.host/6c93670b-fece-41b1-96b1-cdba3aadbe5c/jZkvLLOlJk.json"
                    background="transparent" speed="1" autoplay></dotlottie-player>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-5">
                    <div class="">
                        <h3 class="fw-semibold">Saldo Berhasil Ditarik</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="">
                        <h1 class="fw-bold text-primary fs-1">Rp. {{ number_format($penarikan, 0, ',', '.') }}</h1>
                    </div>
                </div>
                <div class="mt-4">

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="">
                        <small class="fs-6"><span class="fw-bold text-danger">*</span>Harap perlihatkan bukti
                            penarikan kepada staff keuangan untuk melakukan pengambilan uang.</small>
                    </div>
                </div>
            </div>

        </div>
        @include('sweetalert::alert')
        @include('link-asset.script')
</body>

</html>
