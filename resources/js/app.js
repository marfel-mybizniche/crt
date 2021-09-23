(function ($) {

    var app = {
        onReady: function () {
            app.customDropdown();
        },
        onLoad: function () {
            $(document).foundation();
            app.utils();
        },


        utils: function () {

            $('.fancybox').fancybox();
            
            $(window).scroll(function () {
                var getTop = $('.courses_results').offset().top;
                if ($(this).scrollTop() > getTop) {
                    $('.filter_sticky').addClass("active");
                    if (!$(".listing_sticky_info").hasClass("active")) {
                        $(".listing_sticky_info").addClass("active");
                    }
                }
                else {
                    $('.filter_sticky').removeClass("active");
                    $(".listing_sticky_info").removeClass("active");
                }


            });

            $(".scrollto").click(function (e) {
                e.preventDefault();
                var data_target = $(this).data("target");

                if (data_target == undefined) {
                    alert("Missing data-target attribute");
                    return false;
                }
                if ($(data_target)[0]) {
                    var offset = $("header .hsnav-s10")[0] ? $("header .hsnav-s10").height() : 0;
                    $("html,body").animate({ scrollTop: $(data_target).offset().top - offset }, 500);
                }
                return false;
            });

        },

        customDropdown: function () {
            $('.custom_dropdown > li').hover(function () {
                $(this).addClass('hover');
            }, function () {
                $(this).removeClass('hover');
            })

            $('.custom_dropdown > li').click(function () {
                $(this).toggleClass('hover');
            });


        }


    }


    document.addEventListener('DOMContentLoaded', app.onReady);
    window.addEventListener('load', app.onLoad);

})(jQuery);




// From main.js
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
    
    //close popup floating banner ad
    $('.floating_ad_banner').fadeIn('slow');
    $('.floating_ad_banner').click(function(){
        $(this).fadeOut('slow');
    });

            /*
                Vendors Type Singe - Scrolling Form (vts_)
                < Set variables from page calculations. >
            */
            var vts_bottomMargin = $('.footer').outerHeight();
            //</ Set variables from page calculations. >

            /*
                < Calculate on-scrolls and dynamically adjust form placement. >
            */
            $(window).on('scroll', function() {
                var vts_scrollBottomPos = $(window).scrollTop() + $(window).height();
                var vts_scrollHeight = $(document).height() - vts_bottomMargin;
    
                if (!($(window).width() <= 768)) {
                    if (vts_scrollBottomPos > vts_scrollHeight) {
                        var vts_formBottomOffset = (vts_scrollBottomPos - vts_scrollHeight) + 40;
                        $('.vendors_wrapper .sticky_form').css('bottom',vts_formBottomOffset+'px');
                    } else if (vts_scrollHeight == vts_scrollBottomPos) {
                        $('.btn_scroll_up').css('display','none');
                    }
                    else {
                        $('.vendors_wrapper .sticky_form').css('bottom','40px');
                    }
                }
    
            });
            // </ Calculate on-scrolls and dynamically adjust form placement. >

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
                                    var scrollBottomPos = top + $(window).height();
                                    var scrollTopButtonOffset = $(document).height() - 150;

                  button = $('.btn_scroll_up');
                  if (top > $(window).offset().top && !(scrollBottomPos > scrollTopButtonOffset)){
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
            adaptiveHeight: true,
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

          var sliderAdaptiveHeight = function(){
            var heights = []; 
            $('.testimonial_block .slick-active').each(function(){
              heights.push($(this).height());
            });
            $('.testimonial_block .slick-list').height(Math.max.apply(null, heights));
          }
          
          sliderAdaptiveHeight();
          
          $('.testimonial_block').on('afterChange', function(event, slick, currentSlide, nextSlide){
            sliderAdaptiveHeight();
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
                
                if ($windowWidth <= 1023) {

                  //vendors nav 
                  $('.vendors_nav').slick({
                    dots: false,
                    arrow: true,
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

                  $('.blog_cats .menu').slick({
                    dots: false,
                    arrow: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    variableWidth: true,
                    responsive: [
                      {
                        breakpoint: 768,
                        settings: {
                          slidesToShow: 3
                        }
                      },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: 2
                          }
                        }
                      ]
                  });
                }
            }); 

              if($(".temp_gallery")[0]){
                $(".temp_gallery").find("img").each(function(i,img){
                  var data_src_orig = String($(img).attr("data-src")).replace("/az/","/az/1280x1024/true/");
                  var data_src_orig = String(data_src_orig).replace("photos","resize");
                  var src_thumb = String(data_src_orig).replace("/az/1280x1024/true/","/az/640x480/true/")
                  var gal_item = $("<div class='gallery_item'><figure class='gallery_img'><img data-lazy='"+data_src_orig+"'/></figure></div>");
                  $(".slider_for_wrap .slider_for").append(gal_item);
                  var thumb = gal_item.clone();
                  thumb.find('img').attr("data-lazy",src_thumb);
                  $(".slider_nav_wrap .slider_nav").append(thumb);
                })
              }

              // gallery single listing
              $('.slider_for').slick({
                lazyLoad: 'ondemand',
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider_nav'
              });
              $('.slider_nav').slick({
                 lazyLoad: 'ondemand',
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

              if( $('.moreless')[0]){
                $('.moreless').each(function(i, e){
                  var content = $(e).text().trim(),
                    length  = 370,
                    output  = '';

                  if(content.length > length){
                    output += '<div class="short">'+wrapP(content.substr(0, length)+'... <span class="toggler">[more]</span>')+'</div>';
                    output += '<div class="full">'+wrapP(content+' <span class="toggler">[less]</span>')+'</div>';
                  }else{
                    output += wrapP(content);
                  }

                  $(e).html(output);


                  $(e).on('click', '.toggler', function(){
                    $(e).toggleClass('in');
                    return false;
                  });
                });

              }
              function wrapP(text){
                return '<p>'+text.split(/\r?\n/).join('</p><p>')+'</p>';
              }





        $('.schema-faq-question').click(function(){
          $(this).parent().toggleClass('active');
          $(this).parent().siblings().removeClass('active');
        });

        // $('[href=#showpopup], .xclose').click(function(e){
        //   $('body').toggleClass('show-popup');
        //   return false;
        // });
        
    
        // $('.sec_popup').append('<span class="xclose">×</span>');
        // $('.sec_faqs [href]').click(function () {
        //   $('html, body').stop().animate();
        //   var getHash = $(this).prop("hash");
        //   $(getHash).addClass('active');
        //   $('body').addClass('show-popup');
        //   return false;
        // });

        // $('.xclose').click(function () {
        //   $('.sec_popup').removeClass('active');
        //   $('body').removeClass('show-popup');
        // });

    /*
        Vendors Type Singe - Scrolling Form (vts_)
        < Set variables from page calculations. >
    */
});

    
})(jQuery);

