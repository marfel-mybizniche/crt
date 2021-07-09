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
        
        $('.banner_subtitle_text').each(function(){
            $(this).attr('data-subtitle' , $(this).text());  
        })

        // map slick
           
            var location =  $('.branch_wrap');    
            $('.branch_wrap:first-child').addClass('is-active');
            location.each(function(){
                $(this).click(function(){            
                    if( !( $(this).hasClass('is-active') ) ) {
                        $(this).addClass('is-active').siblings().removeClass("is-active");   
                    }
                });
            });

            $('.branch_list').append('<hr/>');

            $('.branch_lists').slick({      
                centerMode: false,
                arrows: true,                  
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,                    
                prevArrow: '<button class="arrow_prev">prev</button>',
                nextArrow: '<button class="arrow_next">next</button>',
                responsive: [
                  {
                    breakpoint: 1200,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                    }
                  },
                  {
                    breakpoint: 530,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]
            });

        
        $('.testimonial_block').slick({ 
            arrows: false,                  
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 530,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
          });
            
            $('figure.wp-block-embed').click(function(){
                if( !$(this).hasClass('.clicked') ){
                    $(this).toggleClass('clicked');
                    $('.wp-block-embed__wrapper iframe').show();
                    
                }

            });

            $('.video__placeholder, .video__button').on('click', function() {
              if ( !$('#video-player').length ) {
                var video = '<iframe id="video-player" src="' + $('.video__placeholder').attr('data-video') + '" frameborder="0" allowfullscreen wmode="opaque"></iframe>';
                $(video).insertAfter( $('.video__placeholder') );
                $('.video__button').addClass('is-playing');
              } else {
                $('.video__button').removeClass('is-playing');
                $('#video-player').remove();
              }
            });
 
    });
    
})(jQuery);
