<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link href="{{ asset('website/assets/img/favicon.png')}}" rel="icon"> <!-- Theme Config Js -->
    <script src="{{asset('theme/dist/assets/js/config.js')}}"></script>

    <!-- App css -->
    <link href="{{asset('theme/dist/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('theme/dist/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ !empty($settings) && isset($settings[0]->logo_image) && file_exists(public_path('storage/' . $settings[0]->logo_image))
    ? asset('storage/' . $settings[0]->logo_image)
    : asset('website/assets/img/no-image.png') }}" alt="logo" height="300" width="300">

                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    {{-- <div class="auth-brand p-2">

                                        <a href="index.html" class="logo-dark">
                                            <img src="{{ asset('storage/' .  $settings[0]->logo_image) }}" alt="dark logo" height="150" width="150">
                                    </a>
                                </div> --}}
                                <div class="p-2 my-auto">
                                    <h4 class="fs-20">Sign In</h4>
                                    <p class="text-muted mb-3">Enter your email address and password to access
                                        account.
                                    </p>

                                    <!-- form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required="" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot
                                                    your
                                                    password?</small></a>
                                            @endif
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" required="" id="password" autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkbox-signin">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="mb-0 text-start">
                                            <button class="btn btn-soft-primary w-100" type="submit"><i class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log
                                                    In</span> </button>
                                        </div>

                                    </form>
                                    <!-- end form-->
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>

        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    @include('admin.layouts.footer')
    <!-- Vendor js -->
    <script src="{{ asset('theme/dist/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('theme/dist/assets/js/app.min.js')}}"></script>

</body>

</html>
