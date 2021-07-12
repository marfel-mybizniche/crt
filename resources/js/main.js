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

  });


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

  // Quick & dirty toggle to demonstrate modal toggle behavior
  $('.modal-toggle').click(function(e) {

    e.preventDefault();

    var modal = $('.modal');

    $('body, .modal').toggleClass('is-visible');

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
    
})(jQuery);
