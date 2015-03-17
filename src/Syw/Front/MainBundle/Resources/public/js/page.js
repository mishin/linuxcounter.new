$(function(){
    var lastScroll = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScroll) {
            $("#navwrapper").animate({'margin-top': "0px"}, {queue: false, duration: 1000});
        } else {
            if (st <= 10) {
                $("#navwrapper").animate({'margin-top': "20px"}, {queue: false, duration: 1000});
            }
        }
        lastScroll = st;
    });
});






