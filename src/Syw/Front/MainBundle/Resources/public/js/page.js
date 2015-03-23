
var $loading = $('#loadingDiv').hide();
$(document)
    .ajaxStart(function () {
        $loading.show();
    })
    .ajaxStop(function () {
        $loading.hide();
    });

$(document).ready(function() {

    if ($('#myCarousel').length >= 1) {
        $('.carousel').carousel({
            interval: 1000 * 10
        });

        $("#myCarousel").swiperight(function () {
            $("#myCarousel").carousel('prev');
        });
        $("#myCarousel").swipeleft(function () {
            $("#myCarousel").carousel('next');
        });
    }
});


