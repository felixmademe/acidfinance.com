@extends('layouts.app')

@section( 'content' )

@auth

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>
                    {{ date( 'F' ) }}
                </h1>
            </div>
            <hr><br>
            <div class="card">
                <img class="card-img-top" src="{{ asset( '/img/total.svg' ) }}" alt="Equal icon in cirlce on a one colour background">
                <div class="card-body text-center">
                    <h4>Total</h4>
                    {{-- TODO: calculate money (easy) --}}
                    {{-- TODO: if-statment, green if money left, red if money in minus --}}
                    <p class="sum">20213kr left this month</p>
                </div>
            </div>
            <br><hr><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset( '/img/income.svg' ) }}" alt="Plus icon in cirlce on a one colour background">
                        <div class="card-body">
                            <h4 class="text-center">Income</h4>
                            <hr>
                            <ul class="list-group">
                                {{-- TODO: Loop of incomes --}}
                                {{-- TODO: Split for different categories --}}
                                <li class="list-group-item border-0">
                                    Total - <span class="green-text">2310123 kr</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Source - <span class="green-text">2000 kr</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Source - <span class="green-text">2000 kr</span>
                                </li>
                            </ul>
                            <a href="{{ route( 'income.index' ) }}" class="btn btn-orange">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset( '/img/expense.svg' ) }}" alt="Minus icon in cirlce on a one colour background">
                        <div class="card-body">
                            <h4 class="text-center">Expense</h4>
                            <hr>
                            <ul class="list-group">
                                {{-- TODO: Loop of expenses --}}
                                {{-- TODO: Split for different categories --}}
                                <li class="list-group-item border-0">
                                    Total - <span class="red-text">2310123 kr</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Source - <span class="red-text">2000 kr</span>
                                </li>
                            </ul>
                            <a href="{{ route( 'expense.index' ) }}" class="btn btn-orange">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
