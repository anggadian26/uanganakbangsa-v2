<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </style>
</head>

<body>
    {{-- @if (session('success'))
        @include('partials.alert-success')
    @endif --}}

    {{-- @if (session('error'))
        @include('partials.alert-error')
    @endif --}}
    <!-- Section: Design Block -->
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
                            @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif
                            <form id="formAuthentication" class="mb-3" action="{{ route('login-action') }}"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div>
                                        <input type="email"
                                            class="form-control bg-transparent @error('email')
                                            is-invalid
                                        @enderror"
                                            id="email" name="email" placeholder="Enter your email" autofocus
                                            required value="{{ old('email') }}"/>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control bg-transparent"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer bg-transparent"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3 mt-5 text-center">
                                    <div class="mb-2">
                                        <button class="btn btn-primary d-grid w-100 fw-bold" type="submit">Log
                                            in</button>
                                    </div>
                                    <div class="mb-2">
                                        <span>Or</span>
                                    </div>
                                    <div class="mb-2">
                                        <a class="btn btn-primary d-flex align-items-center justify-content-center w-100 fw-bold"
                                            href="{{ route('scan-show') }}">
                                            <i class='pe-2 tf-icons bx bx-scan fs-4'></i> Scan
                                        </a>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Section: Design Block -->
    @include('link-asset.script')
</body>

</html>
