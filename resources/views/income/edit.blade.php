@extends( 'layouts.app' )
@section( 'title', 'Income' )
@section( 'content' )

    <h4 class="text-center">{{ $income->name }}</h4>
    <form method="POST" action="{{ route( 'income.update.{id}', [ 'id' => $income->id ] ) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="name" class="text-muted">Name</label>
                <input id="name" type="text" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $income->name }}" autofocus>
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
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old( 'category_id', $income->category_id ) == $category->id ? 'selected' : '' }}>
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
                    <option value="1" {{ old( 'monthly', $income->monthly ) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old( 'monthly', $income->monthly ) == 0 ? 'selected' : '' }}>No</option>
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
                <input id="amount" type="text" placeholder="Amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ $income->amount }}">
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-lg-8 offset-lg-2">
                <a class="btn btn-blue" href="{{ route( 'income.index' ) }}">Cancel</a>
                <button type="submit" class="btn btn-primary ml-0">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
@endsection
