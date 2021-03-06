@extends( 'layouts.app' )
@section( 'content' )
@section( 'title', "Dashboard" )

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
        <div class="text-center">
            <h4>{{ date( 'F' ) }}</h4>
        </div>
        <div class="d-block row d-md-flex flex-md-row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="{{ asset( '/img/total.svg' ) }}" alt="Minus icon in cirlce on a one colour background">
                    <div class="card-body">
                        <h4 class="text-center">Total</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item border-0">
                                <span class="blue-text">
                                    {{ Auth::user()->currentMonthTotalSum( $currentYear, $currentMonth ) }}kr
                                </span>
                                left this month
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block row d-md-flex flex-md-row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card mb-5">
                    <img class="card-img-top" src="{{ asset( '/img/income.svg' ) }}" alt="Plus icon in cirlce on a one colour background">
                    <div class="card-body">
                        <h4 class="text-center">Income</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item border-0">
                                Total - <span class="green-text">{{ Auth::user()->currentYearMonth( 'incomes' )->sum( 'amount' ) }}kr</span>
                            </li>
                        </ul>
                        <hr>
                        <ul class="list-group">
                            @if ( $incomes->count() != 0 )
                                <li class="list-group-item border-0 font-weight-bold">Top Three:</li>
                                @foreach ( $incomes as $income )
                                    <li class="list-group-item border-0">
                                        {{ $income->name }} - <span class="green-text">{{ $income->amount }}kr</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <a href="{{ route( 'income.index' ) }}" class="btn btn-orange">Show more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-5">
                    <img class="card-img-top" src="{{ asset( '/img/expense.svg' ) }}" alt="Minus icon in cirlce on a one colour background">
                    <div class="card-body">
                        <h4 class="text-center">Expense</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item border-0">
                                Total - <span class="red-text">{{ Auth::user()->currentYearMonth( 'expenses' )->sum( 'amount' ) }}kr</span>
                            </li>
                        </ul>
                        <hr>
                        <ul class="list-group">
                            @if ( $expenses->count() != 0 )
                                <li class="list-group-item border-0 font-weight-bold">Top Three:</li>
                                @foreach ( $expenses as $expense)
                                    <li class="list-group-item border-0">
                                        {{ $expense->name }} - <span class="red-text">{{ $expense->amount }}kr</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <a href="{{ route( 'expense.index' ) }}" class="btn btn-orange">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mt-5">
            <h3 class="text-center">Total amount</h3>
            <canvas id="dashboardChart" width="80vw" height="50vh"></canvas>
            <script defer>
                let ctx = document.getElementById('dashboardChart').getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total', 'Income', 'Expense'],
                        datasets: [{
                            label: 'Amount (kr)',
                            data: [
                                {{ Auth::user()->currentMonthTotalSum( $currentYear, $currentMonth )  }},
                                {{ Auth::user()->currentYearMonth( 'incomes' )->sum( 'amount' )  }},
                                {{ Auth::user()->currentYearMonth( 'expenses' )->sum( 'amount' )  }},
                            ],
                            backgroundColor: [
                                'rgba(62, 62, 62, 0.2)',
                                'rgba(0, 200, 81, 0.2)',
                                'rgba(244, 67, 54, 0.2)',
                            ],
                            borderColor: [
                                'rgba(62, 62, 62, 1)',
                                'rgba(0, 200, 81, 1)',
                                'rgba(244, 67, 54, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
        <br><hr><br>
        <div class="text-center">
            <p>Want to see past months? Click the button below to find out</p>
            <a href="{{ route( 'previous' ) }}" class="btn btn-blue">Previous months</a>
        </div>
    @endauth

@endsection
