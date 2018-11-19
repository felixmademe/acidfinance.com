@extends('layouts.app')

@section( 'content' )

@auth

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>Income</h1>
            </div>
            <hr>
            {{-- TODO: if-statment to check if there are any expense objects --}}
        </div>
    </div>

@endauth

@endsection
