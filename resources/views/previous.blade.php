@extends( 'layouts.app' )
@section( 'title', 'Previous months' )
@section( 'content' )
@auth

    {{-- TODO: add previous months --}}
    @foreach( $transactionsByYearMonth as $year => $months )
        <h2>{{ $year }}</h2>
        <ul class="list-group list-group-flush">
            @foreach( $months as $month => $transactions )
                <li class="list-group-item border-0">
                    <h4>{{ $month }} </h4>
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
