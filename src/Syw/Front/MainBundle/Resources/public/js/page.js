$(document).ready(function() {

    $('.carousel').carousel({
        interval: 1000 * 10
    });

    $("#myCarousel").swiperight(function() {
        $("#myCarousel").carousel('prev');
    });
    $("#myCarousel").swipeleft(function() {
        $("#myCarousel").carousel('next');
    });




});


