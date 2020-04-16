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

        background-image:linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0),
            rgba(0, 0, 0, 0.8)
        ), url('https://source.unsplash.com/random/');
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
    .intro-section > header {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px 10px;
    }
    .intro-section > header > h1 {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 2rem;
        white-space: nowrap;
        color: white;
        padding-left: 1rem;
        text-shadow: 0 1px 0 black;
    }

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7 col-md-8 intro-section">

            <header>
                <h1>
                    {{config('app.name')}}
                </h1>
            </header>
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
                        <button type="submit" class="btn btn-primary btn-block float-right">
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




