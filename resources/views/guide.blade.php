@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>How to use</h1>
            </div>
            <hr>
            <p>
                {{ config( 'app.name', 'Simple Finance' ) }} is made to be simple and easy to use.
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
        </div>
    </div>

@endsection
