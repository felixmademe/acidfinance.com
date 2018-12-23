<?php

namespace App;

use Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function incomes()
    {
        return $this->hasMany( 'App\Income' );
    }

    public function expenses()
    {
        return $this->hasMany( 'App\Expense' );
    }

    public function currentMonthTotalSum( $currentYear, $currentMonth )
    {
        $user = Auth::user();
        $income = DB::table( 'incomes' )
            ->where( 'user_id', $user->id )
            ->whereYear( 'created_at', $currentYear )
            ->whereMonth( 'created_at', $currentMonth )
            ->sum( 'amount' );

        $expense = DB::table( 'expenses' )
            ->where( 'user_id', $user->id )
            ->whereYear( 'created_at', $currentYear )
            ->whereMonth( 'created_at', $currentMonth )
            ->sum( 'amount' );

        return $income - $expense;
    }

    public function currentYearMonth( $table )
    {
        $currentYear = date( 'Y' );
        $currentMonth = date( 'm' );
        $user = Auth::user();

        if( $table == "incomes" )
        {
            $transactions = Income::with( 'category' )
                ->where( 'user_id', $user->id )
                ->whereYear( 'created_at', $currentYear )
                ->whereMonth( 'created_at', $currentMonth )
                ->get();
        }
        else
        {
            $transactions = Expense::with( 'category' )
                ->where( 'user_id', $user->id )
                ->whereYear( 'created_at', $currentYear )
                ->whereMonth( 'created_at', $currentMonth )
                ->get();
        }
        return $transactions;
    }

    protected $table = 'users';
}
