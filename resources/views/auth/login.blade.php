@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>{{ __( 'Login' ) }}</h1>
            </div>
            <hr>
            <div class="text-center">
                <a class="btn btn-link" href="{{ route( 'register' ) }}">
                    {{ __( 'New user? Register here' ) }}
                </a>
            </div>
            <form method="POST" action="{{ route( 'login' ) }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="email" type="text" placeholder="E-Mail Addres" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old( 'email' ) }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            {{ __('Login') }}
                        </button>
                        <a class="btn btn-link" href="{{ route( 'password.request' ) }}">
                            {{ __( 'Forgot Your Password?' ) }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
