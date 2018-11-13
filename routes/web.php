<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get( 'index', function ()
{
    return view( 'index' );
})->name( 'home' );

Route::get( 'what-is-simple-finance', function ()
{
    return view( 'about' );
})->name( 'about' );

Route::get( 'how-to-use', function ()
{
    return view( 'guide' );
})->name( 'guide' );

Route::get( 'privacy-policy', function ()
{
    return view( 'privacy' );
})->name( 'privacy' );

Route::get('profile', function ()
{
    return view( 'profile' )
})->middleware('auth');
