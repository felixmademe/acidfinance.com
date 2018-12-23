@extends( 'layouts.app' )
@section( 'title', 'Expense' )
@section( 'content' )

    <h4 class="text-center">{{ $expense->name }}</h4>
    <form method="POST" action="{{ route( 'expense.update.{id}', [ 'id' => $expense->id ] ) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="name" class="text-muted">Name</label>
                <input id="name" type="text" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $expense->name }}" autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="category" class="text-muted">Category</label>
                {{-- <input id="category_id" type="text" placeholder="Category" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ $expense->category_id }}"> --}}
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old( 'category_id', $expense->category_id ) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="monthly" class="text-muted">Monthly</label>
                <select class="form-control" id="monthly" name="monthly">
                    <option value="1" {{ old( 'monthly', $expense->monthly ) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old( 'monthly', $expense->monthly ) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @if ($errors->has('monthly'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('monthly') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="amount" class="text-muted">Amount (kr)</label>
                <input id="amount" type="text" placeholder="Amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ $expense->amount }}">
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-lg-8 offset-lg-2">
                <a class="btn btn-blue" href="{{ route( 'expense.index' ) }}">Cancel</a>
                <button type="submit" class="btn btn-primary ml-0">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>

@endsection
