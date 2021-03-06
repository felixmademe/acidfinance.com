<?php

namespace App\Http\Controllers;

use Session;
use View;

use Auth;
use App\User;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Auth::user()
            ->currentYearMonth( 'expenses' );

        return view( 'expense.index' )
            ->with( 'expenses', $expenses );
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
        $expense = new Expense;
        $expense->name = 'Expense';
        $expense->category_id = 0;
        $expense->monthly = true;
        $expense->amount = 0;
        $expense->user_id = Auth::user()->id;
        $expense->save();

        Session::flash( 'success', "Expense added" );
        $message = View::make( 'partials/flash-messages' );
        $view = View::make( 'partials/expense-row' )
            ->with( 'expense', $expense );

        return response()->json(
        [
            'message' => $message->render(),
            'view' => $view->render(),
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
        $expense = Expense::find( $id );

        return view( 'expense.edit' )
               ->with( 'expense', $expense  )
               ->with( 'categories', ExpenseCategory::get() );
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
            $expense = Expense::find( $id );
            $expense->name = $request->name;
            $expense->category_id = $request->category_id;
            $expense->monthly = $request->monthly;
            $expense->amount = $request->amount;
            $expense->user_id = Auth::user()->id;
            $expense->save();

            return redirect( 'expense' )
                ->with( 'success', [ $expense->name, ' have been updated!' ]  );
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
        $expense = expense::find( $id );
        if( Auth::user()->id == $expense->user_id )
        {
            $expense->delete();
            Session::flash( 'success', "$expense->name has been removed" );
            $message = View::make( 'partials/flash-messages' );
            return response()->json(
            [
                'message' => $message->render(),
            ], 200 );
        }
        else
        {
            Session::flash( 'error', "$expense->name is not owned by current user" );
            return View::make( 'partials/flash-messages' );
        }

    }
}
