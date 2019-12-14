$('.loading').fadeIn('slow');
$(window).on('load', function () {
    $('#Photos').fadeIn('slow');
    $('.loading').fadeOut('slow');
});
//Carrega os elementos do jquery e do materialize
$(document).ready(function () {
    $('.slider').slider();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.comment').hide();
    $('.parallax').parallax();
});
//Fim