@extends( 'layouts.app' )
@section( 'title', 'Expense' )
@section( 'content' )
@auth

    <h4 class="text-center">{{ date( 'F' ) }}</h4>
    <div class="flash-message"></div>
        <table id="expensedt" class="table table-striped table-responsive" cellspacing="0" width="100%">
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
                @foreach ( $expenses as $expense )
                    <tr id="expenseRow{{ $expense->id }}">
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->category->name ?? 'None'}}</td>
                        <td>
                            @if( $expense->monthly == 1 )
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </td>
                        <td class="green-text">{{ $expense->amount }}kr</td>
                        <td class="">
                            <a href="{{ route( 'expense.edit.{id}', [ 'id' => $expense->id ] ) }}" class="blue-text">Edit </a>
                             /
                            <form class="expense-form">
                                @csrf
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
            <form class="addExpense">
                @csrf
                <button type="submit" name="addExpense" class="btn btn-primary">Add expense</button>
            </form>
        </div>
        {{-- <div class="text-center">
            <p>No expenses found, click the button below to start adding one.</p>
            <form id="addexpense" method="GET" action="{{ route( 'expense.create' ) }}">
                @csrf
                <button type="submit" name="addexpense" class="btn btn-primary">Add expense</button>
            </form>
        </div> --}}

@endauth
@endsection
