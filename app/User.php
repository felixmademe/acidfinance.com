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

    public function currentMonthTotalSum( $currentMonth )
    {
        $user = Auth::user();

        $income = DB::table( 'incomes' )
                    ->where( 'user_id', $user->id )
                    ->whereMonth( 'created_at', $currentMonth )
                    ->sum( 'amount' );

        $expense = DB::table( 'expenses' )
                    ->where( 'user_id', $user->id )
                    ->whereMonth( 'created_at', $currentMonth )
                    ->sum( 'amount' );

        return $income - $expense;
    }

    public function fetchCurrentMonth( $table )
    {
        $currentMonth = date( 'm' );
        $user = Auth::user();
        $expenses = DB::table( $table )
                    ->where( 'user_id', $user->id )
                    ->whereMonth( 'created_at', $currentMonth )
                    ->get();

        return $expenses;
    }

    protected $table = 'users';
}
