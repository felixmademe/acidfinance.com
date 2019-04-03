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

    let form     = $( this );
    let id       = form.children( "input[name=id]" ).val();
    let type     = form.children( "input[name=type]" ).val();
    let username = form.find( "input[name=username]" ).val();

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

    let form          = $( this );
    let id            = form.children( "input[name=id]" ).val();
    let type          = form.children( "input[name=type]" ).val();
    let email         = form.find( "input[name=email]" ).val();
    let emailPassword = form.find( "input[name=emailPassword]" ).val();

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
            email.value = email;
            emailPassword.val( '' );
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

    let form            = $( this );
    let id              = form.children( "input[name=id]" ).val();
    let type            = form.children( "input[name=type]" ).val();
    let currentPassword = form.find( "input[name=currentPassword]" ).val();
    let password        = form.find( "input[name=password]" ).val();
    let confirmPassword = form.find( "input[name=confirmPassword]" ).val();

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
            currentPassword.val( '' );
            password.val( '' );
            confirmPassword.val( '' );
        },
        error: function( data )
        {
            console.log( data.message );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
        },
    } );
} );

$( '#clearHistory' ).on( 'click', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    let form     = $( this );
    let id       = form.children( "input[name=id]" ).val();
    let type     = form.children( "input[name=type]" ).val();
    let password = form.find( 'input[name=clearPassword]' ).val();

    let ajax = $.ajax( {
        type: 'PATCH',
        url: '/user/' + id,
        data:
        {
            id: id,
            type: type,
            clearPassword: password,
        },
        dataType: 'json',
        async: true,
        success: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
            clearPassword.val( '' );
        },
        error: function( data )
        {
            console.log( data );
            $( 'div.flash-message' ).html( data.message ).fadeIn( 400 );
        },
    } );
} );
