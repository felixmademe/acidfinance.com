@extends( 'layouts.app' )
@section( 'title', 'Previous months' )
@section( 'content' )
@auth


    {{-- TODO: add previous months --}}
    <div class="text-center">
        @if( $transactionsByYearMonth->isEmpty() )
            <p>No previous transactions recorded.</p>
            <p>Click on the button below to start.</p>
        @else
            <p>Click the button below if you want to see a more detailed overview of the previous months.</p>
            <a class="btn btn-blue" href="{{ route( 'detailed-prev' ) }}">Detailed previous months</a>
            <hr>
        @endif
    </div>

    @foreach( $transactionsByYearMonth as $year => $months )
        <h2>{{ $year }}</h2>
        <canvas id="{{ $year }}Chart" width="80vw" height="50vh"></canvas>
        <script>
            var ctx = document.getElementById('{{ $year }}Chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach( $months->reverse() as $month => $transactions )
                            '{{ $month }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Amount per month',
                        data: [
                            @foreach( $months->reverse() as $month => $transactions )
                                {{ Auth::user()->currentMonthTotalSum( $year, Carbon\Carbon::parse( $month )->month )}},
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach( $months->reverse() as $month => $transactions )
                                @if( Auth::user()->currentMonthTotalSum( $year, Carbon\Carbon::parse( $month )->month ) < 0 )
                                    'rgba(244, 67, 54, 0.2)',
                                @else
                                    'rgba(0, 200, 81, 0.2)',
                                @endif
                            @endforeach
                        ],
                        borderColor: [
                            @foreach( $months->reverse() as $month => $transactions )
                                @if( Auth::user()->currentMonthTotalSum( $year, Carbon\Carbon::parse( $month )->month ) < 0 )
                                    'rgba(244, 67, 54, 1)',
                                @else
                                    'rgba(0, 200, 81, 1)',
                                @endif
                            @endforeach
                        ],
                        borderWidth: 1
                    }],
                },
            });
        </script>
        <hr>
    @endforeach
    <hr>
    <div class="text-center">
        <a class="btn btn-blue" href="{{ route( 'dashboard' ) }}">Dashboard</a>
    </div>

@endauth
@endsection
