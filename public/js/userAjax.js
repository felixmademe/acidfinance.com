'use strict';

$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
} );

$( '#changeUsername' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form     = $( this );
    var id       = form.children( "input[name='id']" ).val();
    var type     = form.children( "input[name='type']" ).val();
    var username = form.children( "input[name='username']" ).val();

    let ajax = $.ajax(
    {
        type: 'PATCH',
        url: '/user/' + id,
        data:
        {
            id: id,
            type: type,
            username: username,
        },
        dataType: 'json',
        success: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
            $( '#username' ).val( data.result );
        },
        error: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.html ).fadeIn( 400 );
        },
    } );
} );
