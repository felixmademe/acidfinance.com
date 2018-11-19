@extends('layouts.app')

@section( 'content' )

@auth

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>Previous months</h1>
            </div>
            <hr>

        </div>
    </div>

@endauth

@endsection
