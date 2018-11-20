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

Route::get( '/', function ()
{
    return view( 'index' );
});

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

Route::get( 'previous-months', function ()
{
    return view( 'previous' );
})->name( 'previous' );

Route::name( 'user.' )->group( function ()
{
    Route::get( 'profile', function ()
    {
        return view( 'user.index' );
    })->name( 'profile' )->middleware( 'auth' );

    Route::patch('edit', 'UserController@edit')->name( 'edit' );
});

Route::name( 'income.' )->group( function ()
{
    Route::get( 'income', 'IncomeController@index' )->name( 'index' )->middleware( 'auth' );
    Route::post( 'create', 'IncomeController@create' )->name( 'create' );
    Route::patch('edit', 'IncomeController@edit')->name( 'edit' );
});

Route::name( 'expense.' )->group( function ()
{
    Route::get( 'expense', function ()
    {
        return view( 'expense.index' );
    })->name( 'index' )->middleware( 'auth' );

    Route::patch('edit', 'ExpenseController@edit')->name( 'edit' );
});
