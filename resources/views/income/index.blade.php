@extends( 'layouts.app' )
@section( 'title', 'Income' )
@section( 'content' )
@auth

    <h4 class="text-center">{{ date( 'F' ) }}</h4>

    @if( !empty( $incomes ) )
        <table id="incomedt" class="table table-striped" cellspacing="0" width="100%" data-page-length="10">
            <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Category</th>
                    <th class="th-sm">Monthly</th>
                    <th class="th-sm">Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>{{ $income->name }}</td>
                        <td>{{ $income->category_id }}</td>
                        <td>
                            @if( $income->monthly == 1 )
                                {{ 'Yes' }}
                            @else
                                {{ 'No' }}
                            @endif
                        </td>
                        <td class="green-text">{{ $income->amount }}kr</td>
                        <td class="text-center">
                            <a href="{{ route( 'income.{id}.edit', [ 'id' => $income->id ] ) }}" class="blue-text">Edit </a>
                             /
                            <form method="POST" class="transaction-form" action="{{ route( 'income.destroy', [ 'destroy' => $income->id ] ) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" name="submit" class="no-btn p-0">
                                    <a class="red-text">Remove</a>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if( session()->has( 'add' ) )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get( 'add' ) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif( session()->has( 'remove' ) )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get( 'remove' ) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <hr>
        <div class="text-center">
            <p>Missing an income? Click the button below to add more</p>
            <form method="GET" action="{{ route( 'income.create' ) }}">
                @csrf
                <button type="submit" name="addIncome" class="btn btn-primary">Add income</button>
            </form>
        </div>
    @else
        <div class="text-center">
            <p>No incomes found, click the button below to start adding one.</p>
            <form  method="POST" action="{{ route( 'income.create' ) }}">
                @csrf
                <button type="submit" name="addIncome" class="btn btn-primary">Add income</button>
            </form>
        </div>
    @endif

@endauth
@endsection
