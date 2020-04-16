@extends('layouts.app')


@section('content')
        <style>
            /* Line Seperator with between Text */
            .separator {
                display: flex;
                align-items: center;
                text-align: center;
            }
            .separator::before, .separator::after {
                content: '';
                flex: 1;
                border-bottom: 1px solid gray;
            }
            .separator::before {
                margin-right: .25em;
            }
            .separator::after {
                margin-left: .25em;
            }
            /* End saperator*/
        </style>

    <div class="container auth-container">
        <div class="row">

            <div class="col-md-5 m-auto bg-white shadow-lg">
                <div class="p-5">
                    <form class="px-4" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group  mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="Your email" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required placeholder="Password"
                                       autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row pb-2">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-muted" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Register now') }}</a>
                            @endif
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="float-right">
                                    {{ __('Forgot your password? ') }}
                                </a>
                            @endif
                        </div>

                        <div class="separator pb-4">OR</div>
                        <div class="form-group">
{{--                            <a href="{{ route('login.redirect', 'facebook') }}" class="btn btn-primary btn-block">--}}
{{--                                Login with Facebook--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('login.redirect', 'twitter') }}" class="btn btn-info btn-block">--}}
{{--                                Login with Twitter--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('login.redirect', 'google') }}" class="btn btn-danger btn-block">--}}
{{--                                Login with Google--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('login.redirect', 'github') }}" class="btn btn-default btn-block">--}}
{{--                                Login with Github--}}
{{--                            </a>--}}
                        </div>
                    </form>

                </div>
            </div>

            {{--            <div class="col-md-5" style="background: url('{{ asset('images/login-side.jpg') }}');"></div>--}}

        </div>
    </div>
@endsection
