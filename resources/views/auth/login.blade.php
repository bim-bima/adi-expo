    {{-- @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection --}}


    <!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
            backend
        </title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

        <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link id="pagestyle" href="{{ asset('template/assets/css/soft-ui-dashboard.min.css?v=1.0.7') }}"
            rel="stylesheet" />
    </head>

    <body class="">

        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                                <div class="card card-plain mt-8">
                                    <div class="card-header pb-0 text-left bg-transparent">
                                        <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                        <p class="mb-0">Enter your email and password to sign in</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <label>Email</label>
                                            <div class="mb-3">
                                                <input type="email"
                                                    class="form-control
                                                @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    placeholder="Email" aria-label="Email"
                                                    aria-describedby="email-addon">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <label>Password</label>
                                            <div class="mb-3">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required placeholder="Password"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign
                                                    in</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                        style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

        <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/plugins/chartjs.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>

        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script src="{{ asset('template/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    </body>

    </html>
