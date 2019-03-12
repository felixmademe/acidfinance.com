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
    var id       = form.children( "input[name=id]" ).val();
    var type     = form.children( "input[name=type]" ).val();
    var username = form.find( "input[name=username]" ).val();

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
        async: true,
        success: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
            $( '#username' ).val( data.result );
        },
        error: function( data )
        {
            console.log( data);
            $( 'div.flash-message' ).html( data.responseJSON.message ).fadeIn( 400 );
        },
    } );
} );

$( '#changeEmail' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form          = $( this );
    var id            = form.children( "input[name=id]" ).val();
    var type          = form.children( "input[name=type]" ).val();
    var email         = form.find( "input[name=email]" ).val();
    var emailPassword = form.find( "input[name=emailPassword]" ).val();

    let ajax = $.ajax(
    {
        type: 'PATCH',
        url: '/user/' + id,
        data:
        {
            id: id,
            type: type,
            email: email,
            emailPassword: emailPassword,
        },
        dataType: 'json',
        async: true,
        success: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
            $( '#email' ).val( data.result );
        },
        error: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
        },
    } );
} );

$( '#changePassword' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form            = $( this );
    var id              = form.children( "input[name=id]" ).val();
    var type            = form.children( "input[name=type]" ).val();
    var currentPassword = form.find( "input[name=currentPassword]" );
    var password        = form.find( "input[name=password]" );
    var confirmPassword = form.find( "input[name=confirmPassword]" );

    let ajax = $.ajax( {
        type: 'PATCH',
        url: '/user/' + id,
        data:
        {
            id: id,
            type: type,
            currentPassword: currentPassword,
            password: password,
            confirmPassword: confirmPassword,
        },
        dataType: 'json',
        async: true,
        success: function( data )
        {
            console.log( data.message );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
        },
        error: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.error ).fadeIn( 400 );
        },
    } );
} );
