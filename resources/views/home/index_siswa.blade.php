<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>UangAnakBangsa - Beranda</title>

    <meta name="description" content="" />

    @include('link-asset.head')

</head>

<body>
    <div class="loading-overlay">
        <div class="load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('partials.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row pb-0">
                                        <div class="col-sm-12 mb-0">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary pb-4">Hai
                                                    {{ Auth::user()->name }} 👋</h5>
                                                <p class="mb-0 text-end">Saldo</p>
                                                <h4 class="text-end pb-0 text-primary"><span class="fw-bold">Rp.
                                                    </span>{{ number_format($saldo[0]->saldo_amount, 0, ',', '.') }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <span class="fw-semibold d-block mb-1">Pemasukkan</span>
                                                @if ($pemasukkan == [] || empty($pemasukkan))
                                                    <h5 class="card-title text-success mb-2"><i
                                                            class="bx bx-up-arrow-alt"></i> Rp.
                                                        - </h5>
                                                    <small class="fw-semibold"> - </small>
                                                @else
                                                    @foreach ($pemasukkan as $x)
                                                        <h5 class="card-title text-success mb-2"><i
                                                                class="bx bx-up-arrow-alt"></i> Rp.
                                                            {{ number_format($x->pemasukkan, 0, ',', '.') }}</h5>
                                                        <small class="fw-semibold">{{ $x->tanggal }}</small>
                                                    @endforeach
                                                @endif



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <span class="fw-semibold d-block mb-1">Penarikkan</span>
                                                @if ($pengeluaran == [] || empty($pengeluaran))
                                                    <h5 class="card-title text-danger mb-2"><i
                                                            class="bx bx-down-arrow-alt"></i> Rp. - </h5>
                                                    <small class="fw-semibold"> - </small>
                                                @else
                                                    @foreach ($pengeluaran as $x)
                                                        <h5 class="card-title text-danger mb-2"><i
                                                                class="bx bx-down-arrow-alt"></i> Rp.
                                                            {{ number_format($x->penarikan, 0, ',', '.') }}</h5>
                                                        <small class="fw-semibold">{{ $x->tanggal }}</small>
                                                    @endforeach
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                @include('partials.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    @include('sweetalert::alert')
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <div class="buy-now">
        <a href="{{ route('tariksaldo-siswa') }}" class="btn btn-primary btn-buy-now text-white fs-5"><span
                class="tf-icons bx bxs-wallet"></span>&nbsp; Tarik Saldo</a>
    </div>
    <!--script-->
    @include('link-asset.script')

    <script>
        $(window).on("load", function() {
            $(".loading-overlay").fadeOut("slow");
        });
    </script>
    <!--/ script-->
</body>

</html>
