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

Auth::routes( [ 'verify' => true ] );

Route::get( '/', function()
{
    return view( 'index' );
} )->name( 'index' );

Route::get( 'what-is-simple-finance', function ()
{
    return view( 'about' );
} )->name( 'about' );

Route::get( 'how-to-use', function ()
{
    return view( 'guide' );
} )->name( 'guide' );

Route::get( 'privacy-policy', function ()
{
    return view( 'privacy' );
} )->name( 'privacy' );

Route::get( 'verify', 'EmailVerificationController@show' );

Route::group( [ 'middleware' => 'verified' ], function ()
{
    Route::get( 'profile', 'UserController@edit' )->name( 'profile' );
    Route::get( 'dashboard', 'MonthController@index' )->name( 'dashboard' );
    Route::get( 'previous-months', 'MonthController@previous' )->name( 'previous' );
    Route::get( 'detailed-previous-months', 'MonthController@detailedPrevious' )->name( 'detailed-prev' );

    Route::resources( [
        'user' => 'UserController',
        'income' => 'IncomeController',
        'expense' => 'ExpenseController',
        'emailverification' => 'EmailVerificationController'
    ] );
} );
