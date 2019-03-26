'use strict';

$(function ()
{
  $( '[data-toggle="tooltip"]' ).tooltip();
});

var sponsors = new Swiper( '.sponsors',
{
    slidesPerView: 2,
});

$( '#settingsTab nav-link' ).on( 'click', function ( e )
{
    e.preventDefault();
    $(this).tab( 'show' );
    $( '#settingsTab' ).find( '.active' ).removeClass( 'active' );
    $(this).addClass( 'active' );
})
