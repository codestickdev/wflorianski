(function($){

    /**
     * Mouse right click disable
     */
    if(!$('body').hasClass('logged-in')){
        $(document.body).on('contextmenu', function(e) {
            e.preventDefault();
        });
    }
    

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

    /**
     * Menu mobile toggler
     */
    $(document).ready(function(){
        $('.menu-toggle').on('click', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
    
                $('.menuMobile').removeClass('menuMobile--active');
                setTimeout(function(){
                    $('.menuMobile').removeClass('menuMobile--ready');
                }, 300);
            }else{
                $(this).addClass('active');

                $('.menuMobile').addClass('menuMobile--ready');
                setTimeout(function(){
                    $('.menuMobile').addClass('menuMobile--active');
                }, 500);
            }
        });
    });

    /**
     * Menu mobile sub-menu switcher
     */
    $(document).ready(function(){
        var li = $('.menuMobile').find('.menu-item-has-children');
        var link = li.find('a').first();
        var href = link.attr('href');
        var text = link.text();

        link.replaceWith('<div class="link"><a href="' + href + '">' + text + '</a><span class="open-sub-menu"></span></div>');

        $('.open-sub-menu').on('click', function(){
            $(this).toggleClass('active');
            $(this).parents('.menu-item-has-children').find('.sub-menu').slideToggle();
        });
    });
}(jQuery));