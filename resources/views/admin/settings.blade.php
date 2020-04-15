@extends('layouts.admin')


@section('content')

    <div class="container-fluid py-2">

        <h1>Settings</h1>

        <div class="card col-sm-12 col-md-6">
            <div class="card-header">
                Update Password <span class="float-right">{{ ucfirst($admin->name) }}</span>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('admin.updatePwd') }}" name="updatePwd" id="updatePwd">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input class="form-control" value="{{$admin->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="current_pwd">{{ __('Current Password') }}</label>
                        <input type="password" class="form-control @error('current_pwd') is-invalid @enderror" id="current_pwd" name="current_pwd" value="{{ old('current_pwd') }}" placeholder="{{ __('Current Password') }}">
                        @error('current_pwd')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="new_pwd">{{ __('New Password') }}</label>
                        <input id="new_pwd" type="password" class="form-control @error('new_pwd') is-invalid @enderror" placeholder="{{ __('New Password') }}" name="new_pwd" required autocomplete="new_pwd">

                        @error('new_pwd')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm_pwd">{{ __('Confirm Password') }}</label>
                        <input id="confirm_pwd" type="password" class="form-control" name="confirm_pwd" placeholder="{{ __('Confirm Password') }}" required autocomplete="new_pwd">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>

                </form>

            </div>
        </div>

    </div>



@endsection

