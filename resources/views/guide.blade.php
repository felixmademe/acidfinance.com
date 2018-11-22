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
        <li>Click "Edit" on
            <a href="{{ route( 'income.index' ) }}">Income</a>
            or
            <a href="{{ route( 'expense.index' ) }}"> Expense</a></li>
        <li>Add an Income or Expense</li>
        <li>Click Edit on the new Income/Expense</li>
        <li>Enter the necessary info</li>
        <li>Let the web app crunch the numbers</li>
        <li>Voila, the result should be displayed on the <a href="{{ url( '/' ) }}">startpage</a></li>
    </ol>

@endsection
