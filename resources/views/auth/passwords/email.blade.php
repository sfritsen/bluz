@extends('layouts.login')

@section('content')

    <p>
        Here you can reset your password should you forget it.  Enter your registered email address, click "Send Password Reset" and the system will
        reset your password and email it to you.
    </p>


    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
        @csrf

        <div class="form-group row">
            <div class="col">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your email address" required>
        
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-block form_btn">
                    {{ __('Send Password Reset Link') }}
                </button>
                <button type="button" class="btn btn-block form_btn" onclick="location.href='{{ route('login') }}'">
                    Cancel
                </button>
            </div>
        </div>

    </form>

@endsection
