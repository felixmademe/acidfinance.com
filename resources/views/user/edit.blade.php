@extends( 'layouts.app' )
@section( 'title', 'Profile' )
@section( 'content' )

    <div class="flash-message"></div>

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
        <li class="nav-item">
            <a class="nav-link" href="#settings" id="settings-tab" data-toggle="tab" role="tab" aria-controls="settings" aria-selected="true">Settings</a>
        </li>
    </ul>
    <br>
    <div class="tab-content">
        <div class="tab-pane show active" id="username" role="tabpanel" aria-labelledby="username-tab">
            <div class="text-center">
                <h4>Change username</h4>
                <p>Here you can change your username.</p>
            </div>
            <form method="post" action="{{ '/user/' . Auth::user()->id }}" id="changeUsername">
                @csrf
                {{ method_field( 'patch' ) }}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="type" value="username">

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="username" class="">Username</label>
                        <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has( 'username' ) ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" autofocus required>

                        @if( $errors->has( 'username' ) )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'username' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-blue ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <div class="text-center">
                <h4>Change e-mail address</h4>
                <p>
                    Password is required to change the email to your profile.
                </p>
            </div>
            <form method="post" action="{{ '/user/' . Auth::user()->id }}" id="changeEmail">
                @csrf
                {{ method_field( 'patch' ) }}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="type" value="email">

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

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="emailPassword" class="">Password</label>
                        <input id="emailPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'emailPassword' ) ? ' is-invalid' : '' }}" name="emailPassword" required>

                        @if ($errors->has( 'emailPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'emailPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-blue ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="text-center">
                <h4>Change password</h4>
                <p>
                    To change your password you must first enter your current password,
                    <br>
                    then type in the new, and confirm the new password.
                </p>
            </div>
            <form method="post" action="{{ '/user/' . Auth::user()->id }}" id="changePassword">
                @csrf
                {{ method_field( 'patch' ) }}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="type" value="password">

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="currentPassword" class="">Current Password</label>
                        <input id="currentPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="currentPassword" required>

                        @if ($errors->has( 'currentPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'currentPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="password" class="">New Password</label>
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="confirmPassword" class="">Confirm Password</label>
                        <input id="confirmPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="confirmPassword" required>

                        @if ($errors->has( 'confirmPassword' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'confirmPassword' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-blue ml-0">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <div class="text-center">
                <h4>Clear History</h4>
                <p>Clear the history on your account</p>
            </div>
            <form  onsubmit="return confirm('Are you sure you want to clear your account history? This action is permanent and can not be undone.');" method="post" action="{{ '/user/' . Auth::user()->id }}" id="clearHistory">
                @csrf
                {{ method_field( 'patch' ) }}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="type" value="clearHistory">

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <label class="text-muted" for="password" class="">Password</label>
                        <input id="clearPassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="clearPassword" required>

                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-blue ml-0">
                            Clear
                        </button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="text-center">
                <h4>Delete account</h4>
                <p>Delete your account and all of the associated data.
                    <br>
                    To delete the profile you must provide your password.
                    <br>
                    <small>This action can not be reversed. Do it at your own risk!</small>
                </p>
            </div>
            <form onsubmit="return confirm('Are you sure you want to remove your account? This action is permanent and can not be undone.');" method="post" action="{{ '/user/' . Auth::user()->id }}" id="deleteUser">
                @csrf
                {{ method_field( 'delete' ) }}

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <p></p>
                        <label class="text-muted" for="password" class="">Password</label>
                        <input id="deletePassword" type="password" placeholder="Password" class="form-control{{ $errors->has( 'password' ) ? ' is-invalid' : '' }}" name="deletePassword" required>

                        @if ($errors->has( 'password' ))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first( 'password' ) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn btn-danger ml-0">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
