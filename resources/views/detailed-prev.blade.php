@extends( 'layouts.app' )
@section( 'title', 'Detailed previous months' )
@section( 'content' )
@auth

    <div class="text-center">
        @if( $transactionsByYearMonth->isEmpty() )
            <p>No previous transactions recorded.</p>
            <p>Click on the button below to start.</p>
        @else
            <p>Click the button below if you want to see a simple overview of the previous months.</p>
            <a class="btn btn-blue" href="{{ route( 'detailed-prev' ) }}">Previous months</a>
            <hr>
        @endif
    </div>

    @foreach( $transactionsByYearMonth as $year => $months )
        <h2>{{ $year }}</h2>
        <ul class="list-group list-group-flush">
            @foreach( $months as $month => $transactions )
                <li class="list-group-item border-0">
                    <h4>
                        {{ $month }} -
                        @php
                            $total = Auth::user()->currentMonthTotalSum( $year, Carbon\Carbon::parse( $month )->month )
                        @endphp
                            @if( $total < 0 )
                                <span class="red-text">{{ $total }}kr</span>
                            @else
                                <span class="green-text">{{ $total }}kr</span>
                            @endif
                    </h4>
                    <table class="table table-hover col-12">
                        <thead>
                            <tr>
                                <th class="th-sm">Type</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Category</th>
                                <th class="th-sm">Monthly</th>
                                <th class="th-sm">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $transactions as $type => $transaction )
                                <tr>
                                    @if( get_class( $transaction ) === 'App\Income' )
                                        <td class="w-15 green-text">Income</td>
                                    @elseif( get_class( $transaction ) === 'App\Expense' )
                                        <td class="w-15 red-text">Expense</td>
                                    @endif
                                    <td class="w-40">{{ $transaction->name }}</td>
                                    <td class="w-15">{{ $transaction->category->name ?? 'None' }}</td>
                                    <td class="w-15">{{ $transaction->monthly == 1 ? 'Yes' : 'No' }}</td>
                                    @if( get_class( $transaction ) === 'App\Income' )
                                        <td class="w-15 green-text">{{ $transaction->amount }}kr</td>
                                    @elseif ( get_class( $transaction ) === 'App\Expense' )
                                        <td class="w-15 red-text">-{{ $transaction->amount }}kr</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </li>
            @endforeach
        </ul>
    @endforeach
    <hr>
    <div class="text-center">
        <a class="btn btn-blue" href="{{ route( 'dashboard' ) }}">Dashboard</a>
    </div>

@endauth
@endsection
