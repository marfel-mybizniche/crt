(function($){

var device_height, device_width, set_height;

device_width = window.innerWidth > 0 ? window.innerWidth : screen.width;

device_height = window.innerHeight > 0 ? window.innerHeight : screen.height;


set_height = function () {
  if (jQuery('[data-height]').length > 0) {
    
      return jQuery('[data-height]').each(function () {

          var height, that;
          that = jQuery(this);
          height = that.attr('data-height');   

          if (device_width >= 1024){

              if (height.indexOf('%') > -1) {

                  that.css('min-height', device_height * parseInt(height, 10) / 100);

              } else {

                  that.css('min-height', height);
              }

          }
          else if(device_width <= 1023) {
            
              that.css('min-height', ( parseInt(height, 10) - 20 ) + 'vh'); 

          }

      });
  }
};


$(document).ready(function(){
      

    /* Height */
    set_height();
    var bodyClass = $('.hero_banner_wrap').data('body-class');
    $('body').addClass(bodyClass);

    var stickyTop = $('.sticky').offset().top;
    var listing_single_wrap = $('.listing_single_wrap').offset().top;


    //smooth scroll
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 150
        }, 900, 'swing', function () {
            // window.location.hash = target;
        });
    });
    

          $(window).scroll(function() {
              var offset = 0, button_up;
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

                
              /* Button Scroll Up */
              (button_up = function() {
                  var button;
                  button = $('.btn_scroll_up');
                  if (top > $(window).offset().top){
                      return button.fadeIn('slow');
                  } else {
                      return button.fadeOut('slow');
                  }
              })();

              
          });

          //Click event to scroll to top
          $('.btn_scroll_up').click(function(){
              $('html, body').animate({scrollTop : 0},800);
              return false;
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
            centerPadding: '50px',
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
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
                breakpoint: 768,
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
                  breakpoint: 610,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
          });
                
          $('.is-type-video iframe').each(function(){      
            var $this = $(this); // get each video
            var vid_src = $this.attr('src'); // get video src
            vid_src += '?title=0&byline=0&portrait=0&sidedock=0&showinfo=0&controls=0&modestbranding=1&autohide=1'; //remove controls
            $this.attr('src', vid_src);

            $('.is-type-video').click(function(){
              vid_src += vid_src +'?title=1&byline=1&portrait=1&sidedock=1&showinfo=1&controls=1&autoplay=1';
              $(this).find('.wp-block-embed__wrapper iframe').attr('src', vid_src);
              $(this).addClass('is_played');
            });  
          })

          // video list slide up

          var container = $('#video_container');

          $('.video_toggle').click(function(e){
            // Prevent the default event.
            e.preventDefault();    

            container.toggleClass('show_tab');

          });

          if(device_width <= 1023) {
            if( !container.hasClass('show_tab') ){
              container.addClass('show_tab');
            }
          }

          /* modal video */
          var modal = $('.modal');

          $('.modal-toggle').each(function(){

            $(this).click(function(e) {

              e.preventDefault();

              

              $('body, .modal').toggleClass('is-visible');

              modal.find('iframe').attr('src', $('iframe').attr('src'));

              var vid_id = $(this).data('video-id');
              var vid_type = $(this).data('video-type');

              var yt_url = 'https://www.youtube.com/embed/';
              var vim_url = 'https://player.vimeo.com/video/';

              if( vid_type == 'youtube' ) {
                modal.find('iframe').attr('src', yt_url + vid_id + '/?autoplay=1&loop=1&rel=0&loop=1');
              }
              else {
                modal.find('iframe').attr('src', vim_url + vid_id +'/?autoplay=1&loop=1&rel=0&loop=1');
              }
            });
          });
          

              if( device_width <= 781 ){

                $('.listings:first-child').show();
                $('.listing_container:not(:first-child)').hide();

              }
            
              $('.cat_item').on('click', function(event) {
            
                var target = $(this).data('anchor');
                
                $('#' + target).fadeIn('slow').siblings('.listing_container').fadeOut('slow');
            
              });

            
              /* listing slick */
              $('.listings_nav').slick({
                dots: false,
                arrow: false,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,                
              });

              $(window).resize(function(){
                var $windowWidth = $(window).width();
                console.log($windowWidth);
                if ($windowWidth <= 1023) {

                  //vendors nav 
                  $('.vendors_nav').slick({
                    dots: false,
                    arrow: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    variableWidth: true,
                    responsive: [
                      {
                        breakpoint: 768,
                        settings: {
                          slidesToShow: 3,
                          slidesToScroll: 1
                        }
                      },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                          }
                        }
                      ]
                  });
                }
            });

              // gallery single listing
              $('.slider_for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider_nav'
              });
              $('.slider_nav').slick({
                slidesToShow: 9,
                slidesToScroll: 1,
                asNavFor: '.slider_for',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                adaptiveHeight: true,
                arrows: true,                
                prevArrow: '<button class="arrow_prev">prev</button>',
                nextArrow: '<button class="arrow_next">next</button>',
                responsive: [
                  {
                    breakpoint: 1200,
                    settings: {
                      slidesToShow: 5,
                      slidesToScroll: 1
                    }
                  },
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
                    }
                  ]
              });

                  
              //happy client section 1              
              $('.slick_on .wp-block-group__inner-container ').slick({
                dots: false,
                arrow: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1                     
              });

        });

    
})(jQuery);
