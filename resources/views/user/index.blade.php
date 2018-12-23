@extends( 'layouts.app' )
@section( 'title', 'Profile' )
@section( 'content' )
@auth

    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#username" id="username-tab" data-toggle="tab" role="tab" aria-controls="username" aria-selected="true">Username</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#email" id="email-tab" data-toggle="tab" role="tab" aria-controls="email" aria-selected="true">Email</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#password" id="password-tab" data-toggle="tab" role="tab" aria-controls="password" aria-selected="true">Password</a>
        </li>
    </ul>
    <br>
    <div class="tab-content">
        <div class="tab-pane show active" id="username" role="tabpanel" aria-labelledby="username-tab">
            <h4 class="text-center">Change username</h4>
            <form method="post" action="{{ route( 'user.edit' ) }}" id="changeUsername">
                @csrf
                {{ method_field( 'patch' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="username" class="">Username</label>
                        <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has( 'username' ) ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" autofocus>

                        @if( $errors->has( 'username' ) )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'username' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <h4 class="text-center">Change e-mail address</h4>
            <form method="post" action="{{ route( 'user.edit' ) }}" id="changeEmail">
                @csrf
                {{ method_field( 'patch' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="email" class="">E-Mail Address</label>
                        <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has( 'email' ) ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                        @if ($errors->has( 'email' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'email' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <h4 class="text-center">Change password</h4>
            <p class="text-center">
                Password is required to change the email to your profile
            </p>
            <form method="post" action="{{ route( 'user.edit' ) }}" id="changePassword">
                @csrf

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="password" class="">Password</label>
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-primary ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endauth
@endsection
