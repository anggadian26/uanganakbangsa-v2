<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>UangAnakBangsa - @yield('head')</title>
    <link rel="icon" href="{{ asset('assets/img/bnlogo.png') }}" rel="shorcut icon">
    <meta name="description" content="" />

    @include('link-asset.head')
    @yield('style')

</head>

<body>
    <div class="loading-overlay">
        <div class="load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

    @php
        $user = Auth::user();
    @endphp
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@yield('title1')</span> @yield('title2')</h4>
                        @yield('content')
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

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @include('sweetalert::alert')
    <!-- / Layout wrapper -->

    <!--script-->
        @include('link-asset.script')

        <script>
            $(window).on("load", function() {
                $(".loading-overlay").fadeOut("slow");
            });
        </script>
        @yield('add-script')
    <!--/ script-->
</body>

</html>
