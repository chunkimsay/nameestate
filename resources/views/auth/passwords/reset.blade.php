


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Reset Password</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('backend/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/app-blue.css') }}">
        <!-- Theme initialization -->

    </head>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo " style="vertical-align:top;">
                                <img src="{{ asset('images/logo.jpg') }}" alt="" width="100%">
                            </div>
                        </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">PASSWORD RECOVER</p>
                        <p class="text-muted text-center"><small>Enter your email address to recover your password.</small></p>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                     @endif
                        <form  action="{{ route('password.update') }}" novalidate="" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email1"></label>
                                <input type="email" hidden='hidden' class="form-control underlined @error('email') is-invalid @enderror" name="email"  placeholder="Your email address" name="email" value="{{ $email ?? old('email') }}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="pasword">New Password</label>
                                <input type="password"  class="form-control underlined @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter New Password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_pasword">Confirm Password</label>
                                <input type="password" id="password-confirm" class="form-control underlined" name="password_confirmation"  placeholder="Confirm Password"  required>


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Save</button>

                            </div>
                            <div class="form-group clearfix">
                                <a class="pull-left" href="{{ url('login') }}">return to Login</a>

                            </div>
                        </form>
                    </div>
                </div>

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
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>
    </body>
</html>


