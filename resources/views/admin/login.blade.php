<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<style>
    .intro-section {
        background-image: url(https://source.unsplash.com/random/);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7 col-md-8 intro-section">
        </div>
        <div class="col-sm-5 col-md-4 bg-white">
            <h1 class="text-center" style="padding-top: 10vh!important;"><b>Admin Login</b></h1>
            <br>
            <form method="POST" action="{{ url('admin/login') }}">
                @csrf
                <div class="col-md-8 m-auto" style="padding-top: 10vh!important;">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="example@mail.com"
                                   autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <div class="form-check">--}}
                    {{--                            <input class="form-check-input" type="checkbox" name="remember"--}}
                    {{--                                   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                            <label class="form-check-label" for="remember">--}}
                    {{--                                {{ __('Remember Me') }}--}}
                    {{--                            </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="{{ asset('js/font-awesome-5.js') }}" defer></script>

</body>
</html>




