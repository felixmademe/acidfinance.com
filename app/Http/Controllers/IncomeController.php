<?php

namespace App\Http\Controllers;

use Session;
use View;

use Auth;
use App\User;
use App\Income;
use App\IncomeCategory;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Auth::user()
            ->currentYearMonth( 'incomes' );

        return view( 'income.index' )
            ->with( 'incomes', $incomes );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort( 404 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $income = new Income;
        $income->name = 'Income';
        $income->category_id = 0;
        $income->monthly = true;
        $income->amount = 0;
        $income->user_id = Auth::user()->id;
        $income->save();

        Session::flash( 'success', "Income added" );
        $message = View::make( 'partials/flash-messages' );
        $incomeView = View::make( 'partials/income-row' )
            ->with( 'income', $income );

        return response()->json(
        [
            'message' => $message->render(),
            'incomeView' => $incomeView->render(),
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $income = Income::find( $id );

        return view( 'income.edit' )
            ->with( 'income', $income  )
            ->with( 'categories', IncomeCategory::get() );;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $request->validate( [
            'user_id'     => 'required|integer',
            'name'        => 'required|string',
            'category_id' => 'integer',
            'monthly'     => 'boolean',
            'amount'      => 'integer',
        ] );

        if( Auth::user()->id == $request->user_id )
        {
            $income = Income::find( $id );
            $income->name = $request->name;
            $income->category_id = $request->category_id;
            $income->monthly = $request->monthly;
            $income->amount = $request->amount;
            $income->save();

            return redirect( 'income' )
                ->with( 'success', [ $income->name, 'have been updated!' ]  );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id  )
    {
        $income = Income::find( $id );
        if( Auth::user()->id == $income->user_id )
        {
            $income->delete();
            Session::flash( 'success', "$income->name has been removed" );
            return View::make( 'partials/flash-messages' );
        }
        else
        {
            Session::flash( 'error', "$income->name is not owned current user" );
            return View::make( 'partials/flash-messages' );
        }

    }
}
