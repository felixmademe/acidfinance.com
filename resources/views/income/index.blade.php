@extends('layouts.app')

@section( 'content' )

@auth

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1>Income</h1>
            </div>
            <hr>
            @if( !empty( $incomes ) )
                <table id="incomedt" class="table table-striped" cellspacing="0" width="100%">
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
                                    <a href="{{ route( 'income.index' ) }}" class="blue-text">Edit</a>
                                    /
                                    <a href="{{ route( 'income.index' ) }}" class="red-text">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <p>Missing an income? Click the button below to add more</p>
                    <form  method="POST" action="{{ route( 'income.create' ) }}">
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

            {{-- TODO: if-statment to check if there are any expense objects --}}
        </div>
    </div>

@endauth

@endsection
