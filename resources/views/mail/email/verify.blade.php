@extends( 'layouts.mail' )
@section( 'title', 'Email Verified' )
@section( 'content' )

    <h3>Hello {{ $user->username }}</h3>
    <p>
        Is this your new email you want to use?
        <br>
        If it is, then click on the link below so we can verify it.
    </p>
    <br>
    <a class="" href="{{ url( 'verify?code=' . $code . '&email=' . $email ) }}">
        Verify email
    </a>

@endsection
