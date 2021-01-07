
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                        <form id="reset-form" action="{{ route('password.email') }}" method="POST" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email1">Email</label>
                                <input type="email" class="form-control underlined @error('email') is-invalid @enderror" name="email" id="email1" placeholder="Your email address" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Reset</button>
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
