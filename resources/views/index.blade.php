@extends('layouts.app')

@section( 'content' )

    @auth
        <h1>
            {{ Auth::user()->name }}
        </h1>
    @else
        <div class="jumbotron">
            <h1>Simplifying finance</h1>
            <p>For me, for you, for everyone.</p>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-12">
                <div class="col-4">

                </div>
                <div class="col-8">
                    <h3></h3>
                    <br>
                    <p></p>
                </div>
            </div>
            <hr>
            <div class="col-12">
                <div class="col-4">
                    <img src="" alt="">
                </div>
                <div class="col-8">
                    <h3></h3>
                    <br>
                    <p></p>
                </div>
            </div>
        </div>
    @endauth
@endsection
