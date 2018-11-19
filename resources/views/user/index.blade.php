@extends( 'layouts.app' )

@section( 'content' )

@auth
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>{{ __( 'Profile' ) }}</h1>
            </div>
            <hr>


            <form method="post" action="{{ route( 'user.edit' ) }}">
                @csrf
                {{ method_field( 'patch' ) }}

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has( 'username' ) ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" autofocus>

                        @if ($errors->has( 'username' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'username' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has( 'email' ) ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }} }}" required>

                        @if ($errors->has( 'email' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            {{ __( 'Save' ) }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endauth

@endsection
