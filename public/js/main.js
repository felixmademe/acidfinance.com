$( document ).ready( function ()
{
    $( '#incomedt').DataTable(
        {
            paging: true,
            searching: false,
        } );
    $( '#expensedt').DataTable(
        {
            paging: true,
            searching: false,
        } );
    $( '[data-toggle="tooltip"]' ).tooltip()
} );
