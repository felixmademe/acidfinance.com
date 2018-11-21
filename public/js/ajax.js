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

    var form = $(this);
    var id = form.children( "input[name='id']" ).val();
    var row = form.parent().parent();
    let ajax = $.ajax(
    {
        type: 'POST',
        url: '/income/remove/' + id,
        data:
        {
            id: id,
        },
        dataType: 'html',
        success: function( data )
        {
            $( 'div.flash-message' ).html( data ).fadeIn(400);
            row.remove();
        },
        error: function( data )
        {
            $( 'div.flash-message' ).html( data ).fadeIn(400);
        },
    } );
} );

$( '.addIncome' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form = $(this);
    let ajax = $.ajax(
    {
        type: 'GET',
        async: false,
        url: '/income/create',
        dataType: 'json',
        success: function( data )
        {
            console.log(data);
            console.log(data.incomeView);
            incomeView = data.incomeView
            $( 'div.flash-message' ).html( data.message ).fadeIn(400);
            $( '.table tbody' ).append( incomeView );
        },
        error: function( data )
        {
            console.log(data);
            $( 'div.flash-message' ).html( data.html ).fadeIn(400);
        },
    } );
} );

$( '.expense-form' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form = $(this);
    var id = form.children( "input[name='id']" ).val();
    var row = form.parent().parent();
    let ajax = $.ajax(
    {
        type: 'POST',
        url: '/expense/remove/' + id,
        data:
        {
            id: id,
        },
        dataType: 'html',
        success: function( data )
        {
            console.log(data);
            $( 'div.flash-message' ).html( data ).fadeIn(400);
            row.remove();
        },
        error: function( data )
        {
            console.log(data);
            $( 'div.flash-message' ).html( data ).fadeIn(400);
        },
    } );
} );

$( '.addExpense' ).on( 'submit', function( e )
{
    e.preventDefault();
    e.stopPropagation();

    var form = $(this);
    let ajax = $.ajax(
    {
        type: 'GET',
        async: false,
        url: '/expense/create',
        dataType: 'json',
        success: function( data )
        {
            console.log(data);
            console.log(data.expenseView);
            expenseView = data.expenseView
            $( 'div.flash-message' ).html( data.message ).fadeIn(400);
            $( '.table tbody' ).append( expenseView );
        },
        error: function( data )
        {
            console.log(data);
            $( 'div.flash-message' ).html( data.html ).fadeIn(400);
        },
    } );
} );
