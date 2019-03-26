@extends( 'layouts.app' )
@section( 'title', 'Expense' )
@section( 'content' )
@auth

    <h4 class="text-center">{{ date( 'F' ) }}</h4>
    <div class="flash-message"></div>
    <table id="expensedt" class="table table-hover" cellspacing="0" width="100%">
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
            @foreach ( $expenses as $expense)
                <tr id="expenseRow{{ $expense->id }}">
                    <td>{{ $expense->name }}</td>
                    <td>{{ $expense->category->name ?? 'None' }}</td>
                    <td>{{ $expense->monthly == 1 ? 'Yes' : 'No' }}</td>
                    <td class="red-text">{{ $expense->amount }}kr</td>
                    <td class="">
                        <a href="{{ url( 'expense/' . $expense->id . '/edit') }}" class="blue-text">Edit </a>
                         /
                        <form method="post" action="/expense/{{ $expense->id }}" class="expense-form">
                            @csrf
                            {{ method_field( 'delete' ) }}
                            <input type="hidden" name="id" value="{{ $expense->id }}">
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
        <p>Missing an expense? Click the button below to add more</p>
        <form method="post" action="/expense" class="addExpense">
            @csrf
            <button type="submit" name="addExpense" class="btn btn-danger">Add expense</button>
        </form>
        <hr>
        <a class="btn btn-blue" href="{{ route( 'dashboard' ) }}">Dashboard</a>
    </div>

@endauth
@endsection
