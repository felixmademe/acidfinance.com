@extends( 'layouts.app' )
@section( 'title', 'Login' )
@section( 'content' )

    <div class="flash-message"></div>
    <div class="text-center">
        <a class="dark-link" href="{{ route( 'register' ) }}">
            New user? Register here
        </a>
    </div>
    <br>
    <form method="POST" action="{{ route( 'login' ) }}">
        @csrf

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="email" class="">E-Mail Address</label>
                <input id="email" type="text" placeholder="E-Mail Addres" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old( 'email' ) }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first( 'email' ) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label class="text-muted" for="password" class="">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-lg-8 offset-lg-2">
                <button type="submit" class="btn btn-primary ml-0">
                    Login
                </button>
                <a class="dark-link" href="{{ route( 'password.request' ) }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>


@endsection
