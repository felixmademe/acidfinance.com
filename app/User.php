<?php

namespace App;

use Auth;
use App\User;
use App\Income;
use App\Expense;
use App\EmailVerification;
use App\Mail\PasswordChange;
use App\Mail\EmailVerificationWithCode;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'users';

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

    public function copyLastMonthsTransactions( User $user )
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->subMonth()->month;

        if( Carbon::now()->subMonth()->isLastYear() )
        {
            $year = Carbon::now()->subMonth()->year;
        }

        $incomes = Income::whereYear( 'created_at', $year )
            ->whereMonth( 'created_at', $month )
            ->where( 'monthly', '1' )
            ->where( 'user_id', $user->id )
            ->get();

        $expenses = Expense::whereYear( 'created_at', $year )
            ->whereMonth( 'created_at', $month )
            ->where( 'monthly', '1' )
            ->where( 'user_id', $user->id )
            ->get();

        if( $incomes->isNotEmpty() )
        {
            foreach( $incomes as $income )
            {
                $temp = new Income;
                $temp->name        = $income->name;
                $temp->amount      = $income->amount;
                $temp->monthly     = $income->monthly;
                $temp->user_id     = $income->user_id;
                $temp->category_id = $income->category_id;
                $temp->save();
            }
        }

        if( $expenses->isNotEmpty() )
        {
            foreach( $expenses as $expense )
            {
                $temp = new Expense;
                $temp->name        = $expense->name;
                $temp->amount      = $expense->amount;
                $temp->monthly     = $expense->monthly;
                $temp->user_id     = $expense->user_id;
                $temp->category_id = $expense->category_id;
                $temp->save();
            }
        }
    }

    public static function updateUsername( Request $request, User $user )
    {
        $request->validate( [
            'username' => 'string|min:1,max:255',
        ] );

        $user->username = $request->username;
        $user->save();

        return
        [
            'success' => 'Username have successfully been changed.',
            'result' => $user->username,
        ];
    }

    public static function updateEmail( Request $request, User $user )
    {
        $request->validate( [
            'email'         => 'required|string|email|unique:users,email|max:255',
            'emailPassword' => 'required',
        ] );

        if( !Hash::check( $request->emailPassword, $user->password ) )
        {
            return [ 'error' => 'Password is incorrect, please try again.' ];
        }

        $email = $request->email;
        $code  = EmailVerification::createCode();

        $emailVerification          = new EmailVerification;
        $emailVerification->code    = $code;
        $emailVerification->user_id = $user->id;
        $emailVerification->timestamps = false;
        $emailVerification->save();

        Mail::to( $email )
            ->send( new EmailVerificationWithCode( $user, $code, $email ) );

        return [
            'success' => 'Verification mail have been sent to the new email.',
            'result' => $email,
        ];
    }

    public static function updatePassword( Request $request, User $user )
    {
        $request->validate( [
            'currentPassword' => 'required|string',
            'password'        => 'required|string|min:6|different:currentPassword',
            'confirmPassword' => 'required|string|same:password',
        ] );
        if( Hash::check( $request->currentPassword, $user->password ) )
        {
            $user->password = Hash::make( $request->password );
            $user->save();
        }

        Mail::to( $user->email )
            ->send( new PasswordChange( $user ) );
        return [ 'success' => 'Your password has been changed!' ];
    }

    public static function clearHistory( Request $request, User $user )
    {
        $request->validate( [
            'clearPassword' => 'required|string'
        ] );
        $password = $request->clearPassword;

        if( Hash::check( $password, $user->password ) )
        {
            Income::where( 'user_id', $user->id )->delete();
            Expense::where( 'user_id', $user->id )->delete();
            return [ 'success' => 'History has been cleared.' ];
        }
        return [ 'error' => 'History could not be cleared.' ];
    }
}
