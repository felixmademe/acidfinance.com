<?php

namespace App\Http\Controllers;

use Auth;
use App\EmailVerification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort( 404 );
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
    public function store(Request $request)
    {
        abort( 403 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request )
    {
        $user = Auth::user();
        $code = $request->code;

        $codeExists = EmailVerification::where( 'user_id', $user->id )
            ->where( 'code', $code )
            ->exists();

        if ( $codeExists )
        {
            $result = EmailVerification::verfiyEmailUpdateCode( $request, $user, $code );
        }
        else
        {
            $result = [ 'error' => 'Email could not be verified, please try again.' ];
        }

        if ( !isset( $result[ 'success' ] ) )
        {
            redirect( 'profile' )->with( 'error', $result['error']);
        }

        Mail::to( $user->email )
            ->send( new \App\Mail\EmailVerified( $user ) );

        return redirect( 'profile' )
            ->with( [ 'success' ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort( 404 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort( 403 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort( 403 );
    }
}
