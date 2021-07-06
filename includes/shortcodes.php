<?php

function mbn_shortcode_home_url($atts = null, $content = null){
    return home_url();
}
add_shortcode('home_url', 'mbn_shortcode_home_url');


/* toll free buttons */
function ct_toll_free_buttons() {
          
    $returnhtml .= '<div class="grid-x grid-margin-x cols2-s2 info_boxes">';
    // Check rows exists.
    if( have_rows('call_to_action_btns') ):

        // Loop through rows.
        while( have_rows('call_to_action_btns') ) : the_row();

            // Load sub field value.
            $sub_text = explode(" ", get_sub_field('sub_text'));							
            $main_text = get_sub_field('main_text');
                    
            $returnhtml .= '<div class="cell small-6 medium-6 large-6 col-item">';
            $returnhtml .= '<a class="info_box" href="tel:'.$main_text.'">';
            $returnhtml .= '<figure class="icon_wrapper"><img src="'.MBN_ASSETS_URI.'/img/phone.png" alt=""></figure>';
            for( $i=0; $i <= count($sub_text); $i++ ){
                $returnhtml .= '<div class="address">'. $sub_text[$i] . '</div>';
            }
            $returnhtml .= '<div class="phone">'.$main_text.'</div>';
            $returnhtml .= '</a>';
            $returnhtml .= '</div>';

            // End loop.
            endwhile;
        endif;		
    $returnhtml .= '</div></div>';
    return $returnhtml;
}
add_shortcode('ct_contact_button', 'ct_toll_free_buttons');    


function mbn_banner_checklist(){


    $returnhtml .= '<div class="banner_checklist">';
        
        // Check rows exists.
        if( have_rows('add_checklists') ):

            // Loop through rows.
            while( have_rows('add_checklists') ) : the_row();

                // Load sub field value.							
                $checklist_text = get_sub_field('checklist_text'); 
                $returnhtml .= '<div class="text_wrap media_flex">';
                $returnhtml .= '<div class="media_left">';
                $returnhtml .= '<figure class="icon_wrapper"><img src="'. MBN_ASSETS_URI .'/img/check-icon.png" alt=""></figure></div>';
                $returnhtml .= '<div class="media_body">';
                $returnhtml .= '<h3>'. $checklist_text .'</h3></div></div>';
               
            // End loop.
            endwhile;
        endif;   
        $returnhtml .= '</div>';
        
        return $returnhtml;
}
add_shortcode('banner_checklist', 'mbn_banner_checklist');

    

add_shortcode('ct_map', 'ct_snazzy_map');
function ct_snazzy_map(){
  ?>
  
  <style type="text/css">
        /* Set a size for our map container, the Google Map will take up 100% of this container */
        #map {
            width: 750px;
            height: 500px;
        }
    </style>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
    
        function init() {
            var mapOptions = {
                zoom: 11,

                center: new google.maps.LatLng(40.6700, -73.9400), // New York
                styles: [
                        {
                            "featureType": "administrative.country",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                },
                                {
                                    "hue": "#ff0000"
                                }
                            ]
                        }
                    ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: ''
            });
        }

        
    </script>
    <div id="map"></div>

  <?php
}



//gmaps helper

function mbn_acf_gmap_shortcode( ){


$query = array(
    'post_type'      => 'branch_locator',
);

$branches = new WP_Query( $query );

$returnhtml .= '<div id="googleMap" class="acf-map" data-zoom="16">';


while ( $branches->have_posts() ) : $branches->the_post();

    $title = get_field('branch_title', $branch);    
    $location = get_field('branch_address', $branch);
    $lat = $location['lat'];
    $lng = $location['lng'];

    if( $location ): 
        $returnhtml .= '<div class="marker" data-lat="'. esc_attr($lat) .'" data-lng="'. esc_attr($lng) .'" data-location="'. esc_html( $title ) .'">';
        $returnhtml .= '<h3>'. esc_html( $title ). '</h3><p><em>'. esc_html( $location['address'] ) .'</em></p></div>';

    endif;


endwhile;


wp_reset_postdata();

$returnhtml .= '</div>';

$returnhtml .= '<div class="grid-x grid-margin-x cols4-s2">';

while ( $branches->have_posts() ) : $branches->the_post();

    $title = get_field('branch_title', $branch);    
    $phone = get_field('branch_phone_num', $branch);
    $location = get_field('branch_address', $branch);
    $lat = $location['lat'];
    $lng = $location['lng'];
    
    $returnhtml .= '<div class="cell large-6 xlarge-3 col-item">';
    $returnhtml .= '<a class="branch_link" data-lat="'. esc_attr($lat) .'" data-lng="'. esc_attr($lng) .'" data-location="'.esc_attr($title).'">';
    $returnhtml .= '<h class="branch_title">'. $title .'</h2>';
    $returnhtml .= '<p class="branch_address">' . $location .'</p>';
    $returnhtml .= '<p class="branch_phone">' . $phone .'</p>';
    $returnhtml .= '</a></div>';
    

endwhile;

wp_reset_postdata();

return $returnhtml;
}
add_shortcode('mbn_branch_locator', 'mbn_acf_gmap_shortcode');

