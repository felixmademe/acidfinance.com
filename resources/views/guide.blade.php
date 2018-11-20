@extends( 'layouts.app' )
@section( 'title', 'How to use' )
@section( 'content' )

    <p>
        {{ config( 'app.name', 'Simpl Financ' ) }} is made to be simple and easy to use.
        You do not need to calculate anything, the web app does it for you, simple right?
        <br><br>
        So, here is how you do it:
    </p>
    <ol>
        <li>Create an account</li>
        <li>Login to your account</li>
        <li>Go to <a href="profile">my pages</a></li>
        <li>Enter your monthly income</li>
        <li>Enter your monthly expenses</li>
        <li>Add extra income or expenses</li>
        <li>Let the web app crunch the numbers</li>
        <li>Voila, the result should be displayed</li>
    </ol>

@endsection
