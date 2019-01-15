<?php

namespace App\Http\Controllers;

use Session;
use View;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'user.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request )
    {
        return view( 'user.edit' );
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
        $user = User::find( $id );
        $this->authorize( 'update', Auth::user(), $user );

        switch ( $request->type )
        {
            case 'username':
                $result = User::updateUsername( $request, $user );
                break;

            case 'email':
                $result = User::updateEmail( $request, $user );
                break;

            case 'password':
                $result = User::updatePassword( $request, $user );
                break;

            case 'clearHistory':
                $result = User::clearHistory( $request, $user );
                break;

            default:
                $result = [ 'error' => 'Method not allowed.'];
                break;
        }

        if ( !$result[ 'success' ] )
        {
            abort( '403' );
        }
        Session::flash( 'success' );
        $message = View::make( 'partials/flash-messages' );

        return back()->with( 'success' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        $user = Auth::user();
        $request->validate( [
            'password' => 'required'
        ] );
        if( Hash::check( $request->password, $user->password ) )
        {
            $this->authorize( 'delete', Auth::user(), $user );

            User::clearHistory( $request, $user );
            $user->delete();
            $request->session->flush();
            return view( 'index' );
        }
    }
}
