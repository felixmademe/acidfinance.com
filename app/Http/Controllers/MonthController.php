<?php

namespace App\Http\Controllers;

use Session;
use View;

use Auth;
use App\User;
use App\Income;
use App\Expense;
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
        return view( 'previous' );
    }
}
