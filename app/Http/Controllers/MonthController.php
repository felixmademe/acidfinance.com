<?php

namespace App\Http\Controllers;

use Session;
use View;

use Auth;
use App\User;
use App\Income;
use App\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentMonth = date( 'm' );
        $user = Auth::user();
        $incomes = Income::where( 'user_id', $user->id )
            ->whereMonth( 'created_at', $currentMonth )
            ->orderBy( 'amount', 'desc' )
            ->limit( 3 )
            ->get();

        $expenses = Expense::where( 'user_id', $user->id )
            ->whereMonth( 'created_at', $currentMonth )
            ->orderBy( 'amount', 'desc' )
            ->limit( 3 )
            ->get();

        return view( 'index' )
            ->with( 'incomes', $incomes )
            ->with( 'expenses', $expenses )
            ->with( 'currentMonth', $currentMonth );
    }

    public function previous()
    {
        $user = Auth::user();
        $incomes = $user->incomes;
        $expenses = $user->expenses;

        $transactions = $incomes->merge( $expenses );

        $transactionsByYearMonth = $transactions->groupBy([
            function( $date )
                {
                    return Carbon::parse( $date->created_at )->format( 'Y' );
                },
                function( $date )
                {
                    return Carbon::parse( $date->created_at )->format( 'F' );
                }
        ]);


        return view( 'previous' )
            ->with( 'transactionsByYearMonth', $transactionsByYearMonth )
            ->with( 'incomes', $incomes )
            ->with( 'expenses', $expenses );
    }
}
