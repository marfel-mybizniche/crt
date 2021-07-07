(function($){


    
/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );

        $(this).append('<a href="#">link</a>');
        //
        clickLocation( $(this),map )
    });


    // Center map based on markers.
    centerMap( map );


    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html(),
        });        


        infowindow.close();

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }

    // Append a link to the markers DIV for each marker
    //$('.branch_list').append('<a class="marker-link" data-markerid="' + i + '" href="#">Mark</a> ');
    
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

function clickLocation( $marker, map ){
    
    var location =  $('.branch_wrap');
    
    $('.branch_wrap:first-child').addClass('is-active');


    location.each(function(){


        $(this).click(function(){
            
            if( !( $(this).hasClass('is-active') ) ) {
                $(this).addClass('is-active').siblings().removeClass("is-active");   
            }
                        
            // Get position from marker.
            var lat = $(this).data('lat');
            var lng = $(this).data('lng');

            var latLng = {
                lat: parseFloat( lat ),
                lng: parseFloat( lng )
            };

            map.setCenter(new google.maps.LatLng(lat,lng));

        });       

    });

}

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
        
        $('.banner_subtitle_text').each(function(i,val){
            $(this).attr('data-subtitle' , $(this).text());  
        })

        //gmap
        
        $('.acf-map').each(function(){
            var map = initMap( $(this) );
        });

        $('.branch_list').append('<hr/>');

        $('.branch_lists').slick({      
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
                breakpoint: 1025,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                }
              },
              {
                breakpoint: 769,
                settings: {
                  slidesToShow: 2,
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
    });
    
})(jQuery);
