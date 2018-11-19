@extends( 'layouts.app' )

@section( 'content' )
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>{{ __( 'Verify Your Email Address' ) }}</h1>
            </div>
            <hr>
            <div class="text-center">
                @if (session( 'resent' ))
                    <div class="alert alert-success" role="alert">
                        {{ __( 'A fresh verification link has been sent to your email address.' ) }}
                    </div>
                @endif

                {{ __( 'Before proceeding, please check your email for a verification link.' ) }}
                {{ __( 'If you did not receive the email' ) }}, <a href="{{ route( 'verification.resend' ) }}">{{ __( 'click here to request another' ) }}</a>.
            </div>
        </div>
    </div>
@endsection
