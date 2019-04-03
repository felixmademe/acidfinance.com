'use strict';

$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
} );

$( '.income-form' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    let form = $( this );
    let id = form.children( "input[name='id']" ).val();
    let row = form.parent().parent();

    let ajax = $.ajax(
    {
        type: 'DELETE',
        url: '/income/' + id,
        data:
        {
            id: id,
        },
        dataType: 'json',
        async: true,
        success: function( data )
        {
            $( 'div.flash-message' ).html( data.message ).fadeIn(400);
            row.fadeOut();
            row.remove();
        },
        error: function( data )
        {
            $( 'div.flash-message' ).html( data.message ).fadeIn(400);
        },
    } );
} );

$( '.addIncome' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    let form = $( this );
    let ajax = $.ajax(
    {
        type: 'POST',
        async: true,
        url: '/income',
        dataType: 'json',
        success: function( data )
        {
            let row = data.view;
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
            $( '.table tbody' ).append( row );
        },
        error: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.html ).fadeIn( 400 );
        },
    } );
} );
