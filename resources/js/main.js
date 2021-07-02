(function($){

    $(document).ready(function(){

        var stickyTop = $('.sticky').offset().top;

        $(window).scroll(function() {

            var offset = 0;
            var sticky = false;
            var top = $(window).scrollTop();
                
            if ( $(".sticky-container").offset().top < top ) {

                $('.sticky').addClass('is-stuck');
                $('.sticky').removeClass('is-anchored');
                sticky = true;

            } else {

                $('.sticky').addClass('is-anchored');
                $('.sticky').removeClass('is-stuck');

            }
        });
        
        $('.banner_subtitle').each(function(i,val){
            $(this).attr('data-subtitle' , $(this).text());  
        })
        

    });

    
})(jQuery);
