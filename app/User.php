<?php

namespace App;

use Auth;
use App\User;
use App\Income;
use App\Expense;
use App\EmailVerification;
use App\Mail\PasswordChange;
use App\Mail\EmailVerificationWithCode;

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

    public static function updateUsername( Request $request, $user )
    {
        $request->validate( [
            'username' => 'string|max:255',
        ] );
        $user->username = $request->username;
        $user->save();

        return [ 'success' => 'Username have successfully been changed.' ];
    }

    public static function updateEmail( Request $request, User $user )
    {
        $request->validate( [
            'email'    => 'required|string|email|unique:users,email|max:255',
            'password' => 'required',
        ] );

        // skapa en email verification row och skicka mailet för verification.

        $email = $request->email;
        $code  = EmailVerification::createCode();

        $emailVerification          = new EmailVerification;
        $emailVerification->code    = $code;
        $emailVerification->user_id = $user->id;
        $emailVerification->timestamps = false;
        $emailVerification->save();

        Mail::to( $request->email )
            ->send( new EmailVerificationWithCode( $user, $code, $email ) );

        return [ 'success' => 'New email have been registered and verification mail have been sent.' ];
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
            'password' => 'required|string'
        ] );
        if( Hash::check( $request->password, $user->password ) )
        {
            Income::where( 'user_id', $user->id )->delete();
            Expense::where( 'user_id', $user->id )->delete();
            return [ 'success' => 'History has been cleared.' ];
        }
    }
}
