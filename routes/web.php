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

Route::get( '/', 'MonthController@index' )->name( 'index' )->middleware( 'auth' );
Route::get( 'previous-months', 'MonthController@index' )->name( 'previous' )->middleware( 'auth' );

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

Route::name( 'user.' )->group( function ()
{
    Route::get( 'profile', function ()
    {
        return view( 'user.index' );
    })->name( 'profile' )->middleware( 'auth' );

    Route::patch( 'user.edit', 'UserController@edit' )->name( 'edit' );
});

Route::name( 'income.' )->group( function ()
{
    Route::get( 'income', 'IncomeController@index' )->name( 'index' )->middleware( 'auth' );
    Route::get( 'income/create', 'IncomeController@create' )->name( 'create' );
    Route::get( 'income/edit/{id}', 'IncomeController@edit' )->name( 'edit.{id}' );

    Route::post( 'income/store', 'IncomeController@store' )->name( 'store' );
    Route::post( 'income/remove/{id}', 'IncomeController@destroy' )->name( 'remove.{id}' );

    Route::put( 'income/update/{id}', 'IncomeController@update' )->name( 'update.{id}' );
});

Route::name( 'expense.' )->group( function ()
{
    Route::get( 'expense', 'ExpenseController@index' )->name( 'index' )->middleware( 'auth' );
    Route::get( 'expense/create', 'ExpenseController@create' )->name( 'create' );
    Route::get( 'expense/edit/{id}', 'ExpenseController@edit' )->name( 'edit.{id}' );

    Route::post( 'expense/store', 'ExpenseController@store' )->name( 'store' );
    Route::post( 'expense/remove/{id}', 'ExpenseController@destroy' )->name( 'remove.{id}' );

    Route::put( 'expense/update/{id}', 'ExpenseController@update' )->name( 'update.{id}' );
});
