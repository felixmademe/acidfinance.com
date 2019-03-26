@extends( 'layouts.app' )
@section( 'title', 'Income' )
@section( 'content' )
@auth

    <h4 class="text-center">{{ date( 'F' ) }}</h4>
    <div class="flash-message"></div>
    <table id="incomedt" class="table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Category</th>
                <th class="th-sm">Monthly</th>
                <th class="th-sm">Amount</th>
                <th class="th-sm">Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $incomes as $income)
                <tr id="incomeRow{{ $income->id }}">
                    <td>{{ $income->name }}</td>
                    <td>{{ $income->category->name ?? 'None' }}</td>
                    <td>{{ $income->monthly == 1 ? 'Yes' : 'No' }}</td>
                    <td class="green-text">{{ $income->amount }}kr</td>
                    <td class="">
                        <a href="{{ url( 'income/' . $income->id . '/edit') }}" class="blue-text">Edit </a>
                         /
                        <form method="post" action="/income/{{ $income->id }}" class="income-form">
                            @csrf
                            {{ method_field( 'delete' ) }}
                            <input type="hidden" name="id" value="{{ $income->id }}">
                            <button type="submit" name="submit" class="no-btn p-0">
                                <a class="red-text">Remove</a>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="text-center">
        <p>Missing an income? Click the button below to add more</p>
        <form method="post" action="/income" class="addIncome">
            @csrf
            <button type="submit" name="addIncome" class="btn btn-primary">Add income</button>
        </form>
        <hr>
        <a class="btn btn-blue" href="{{ route( 'dashboard' ) }}">Dashboard</a>
    </div>

@endauth
@endsection
