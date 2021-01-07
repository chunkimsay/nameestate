<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('backend/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/app-blue.css') }}">
        <link rel="stylesheet" href="fontawsome/css/fontawesome.css">
        <!-- Theme initialization -->

    </head>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">

                            </div>CodeWriterKH
                        </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">PASSWORD Reset</p>
                        <p class="text-muted text-center"><small>Enter New Password</small></p>
                        <form id="reset-form" action="{{ route('user.reset_save') }}" method="POST" novalidate="">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control underlined @error('password') is-invalid @enderror" name="password"  placeholder="Enter new password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Pasword</label>
                                <input type="password" class="form-control underlined " name="confirmpassword"  placeholder="confirm password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Save Password</button>
                                <div class="text-center">
                                    @if (Session::has('error'))
                                        <span class="text-danger">{{ session('error') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <a class="pull-left" href="login.html">return to Login</a>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">

            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="{{ asset('backend/js/vendor.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>
    </body>
</html>
