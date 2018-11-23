@extends( 'layouts.app' )
@section( 'content' )

    @if( session()->has( 'success' ) )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get( 'success' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif( session()->has( 'error' ) )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get( 'error' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @auth
        @section( 'title', "Current month" )
        <div class="text-center">
            <h4>{{ date( 'F' ) }}</h4>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset( '/img/total.svg' ) }}" alt="Minus icon in cirlce on a one colour background">
                    <div class="card-body">
                        <h4 class="text-center">Total</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item border-0">
                                <span class="blue-text">
                                    {{ Auth::user()->calculateTotalSum() }}kr
                                </span>
                                left this month
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
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
                                Total - <span class="green-text">{{ Auth::user()->incomes->sum( 'amount' ) }}kr</span>
                            </li>
                            @foreach ( Auth::user()->incomes as $income )
                                <li class="list-group-item border-0">
                                    {{ $income->name }} - <span class="green-text">{{ $income->amount }}kr</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route( 'income.index' ) }}" class="btn btn-orange">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <div class="card">
                    <img class="card-img-top" src="{{ asset( '/img/expense.svg' ) }}" alt="Minus icon in cirlce on a one colour background">
                    <div class="card-body">
                        <h4 class="text-center">Expense</h4>
                        <hr>
                        <ul class="list-group">
                            {{-- TODO: Loop of expenses --}}
                            {{-- TODO: Split for different categories --}}
                            <li class="list-group-item border-0">
                                Total - <span class="red-text">{{ Auth::user()->expenses->sum( 'amount' ) }}kr</span>
                            </li>
                            @foreach ( Auth::user()->expenses as $expense)
                                <li class="list-group-item border-0">
                                    {{ $expense->name }} - <span class="red-text">{{ $expense->amount }}kr</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route( 'expense.index' ) }}" class="btn btn-orange">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <br><hr><br>
        <div class="text-center">
            <p>Want to see past months? Click the button below to find out</p>
            <a href="{{ route( 'previous' ) }}" class="btn btn-blue">Previous months</a>
        </div>
    @else
        @section( 'title', 'Acid Finance' )
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
