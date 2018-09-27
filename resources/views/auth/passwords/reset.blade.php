@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">Reset Password</div>
    <div class="inner-container">
        <form method="POST" action="{{ route('password.request') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="">
                    <input id="email" type="email" class="input-field{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="input-field{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="input-field{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
