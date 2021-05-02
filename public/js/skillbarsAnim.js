var offsetTop = $('#presentation').offset().top;
$(window).scroll(function() {
    var height = $(window).height();
    if($(window).scrollTop()+height > offsetTop) {
        jQuery('.skillbar').each(function(){
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },2000);
        });
    }
});
