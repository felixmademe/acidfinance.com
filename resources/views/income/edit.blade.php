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
                <label for="name" class="col-form-label text-md-right">Name</label>
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
                <label for="category" class="col-form-label text-md-right">Category</label>
                <input id="category_id" type="text" placeholder="Category" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ $income->category_id }}">
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="monthly" class="col-form-label text-md-right">Monthly</label>
                <input id="monthly" type="text" placeholder="Monthly" class="form-control{{ $errors->has('monthly') ? ' is-invalid' : '' }}" name="monthly" value="{{ $income->monthly }}">
                @if ($errors->has('monthly'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('monthly') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-8 offset-lg-2">
                <label for="amount" class="col-form-label text-md-right">Amount</label>
                <input id="amount" type="text" placeholder="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ $income->amount }}">
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
