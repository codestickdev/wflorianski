(function($){

    /**
     * Site header clone
     */
    $(document).ready(function(){
        var headerHeight = $('.siteHeader').outerHeight();

        $('.header-clone').css('height', headerHeight);
    });

    /**
     * Site header scrolled
     */
     $(document).ready(function(){
        setTimeout(function(){
            var siteHeader = $('.siteHeader');
            var didScroll;
            var lastScrollTop = 0;
            var delta = 50;
            var navbarHeight = siteHeader.outerHeight();

            $(window).scroll(function(event){
                var siteHeader = $('.siteHeader');
                if($(document).scrollTop() > 67){
                    siteHeader.addClass('siteHeader--shadow');
                }else{
                    siteHeader.removeClass('siteHeader--shadow');
                }
                didScroll = true;
            });

            setInterval(function() {
                if (didScroll) {
                    hasScrolled();
                    didScroll = false;
                }
            }, 250);

            function hasScrolled() {
                var siteHeader = $('.siteHeader');
                var st = $(this).scrollTop();
                
                if(Math.abs(lastScrollTop - st) <= delta)
                    return;
                
                if (st > lastScrollTop && st > navbarHeight){
                    siteHeader.addClass('siteHeader--scrolled');
                } else {
                    if(st + $(window).height() < $(document).height()) {
                        siteHeader.removeClass('siteHeader--scrolled');
                    }
                }
                lastScrollTop = st;
            }
        }, 150);
    });
}(jQuery));