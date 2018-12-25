<?php

namespace App\Http\Controllers;

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
    public function update(Request $request, $id)
    {
        $user = User::find( $id );

        if( $request->has( 'username' ) )
        {
            $request->validate([
                'username' => 'string|max:255',
            ]);
            $user->username = $request->username;
        }
        elseif( $request->has( 'email' ) )
        {
            $request->validate([
                'email'    => 'required|email|unique|max:255',
                'password' => 'required|confirmed|min:6'

            ]);
            $user->email = $request->email;
        }
        elseif( $request->has( 'password' ) )
        {
            $request->validate([
                'currentPassword' => 'required',
                'password'        => 'required|confirmed|min:6|same:password',
                'confirmPassword' => 'required|same:password',
            ]);
            $user->password = Hash::make( $request->password );
        }
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $user = Auth::user();

        $user->destroy();
    }
}
