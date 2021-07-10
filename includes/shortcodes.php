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
            $returnhtml .= '<figure class="icon_wrapper"></figure>';
            for( $i=0; $i <= count($sub_text); $i++ ){
                $returnhtml .= '<div class="address">'. $sub_text[$i] . '</div>';
            }
            $returnhtml .= '<div class="phone">'.$main_text.'</div>';
            $returnhtml .= '</a>';
            $returnhtml .= '</div>';

            // End loop.
            endwhile;
        endif;		
    $returnhtml .= '</div>';
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

    

add_shortcode('mbn_testimonials', 'mbn_testimonials_shortcode');
function mbn_testimonials_shortcode(){

    $query = array(
        'post_type'  => 'client_testimonials',
        'orderby'    => '',
        'order'      => 'asc'   
    );
    
    $testimonials = new WP_Query( $query );

       
    $returnhtml .= '<section class="sec-3cols testimonial_block_wrap">';
    $returnhtml .= '<div class="grid-container">';
    $returnhtml .= '<div class="grid-x grid-margin-x cols3-s3 testimonial_block">';

    while ( $testimonials->have_posts() ) : $testimonials->the_post();

        $testimonial_name           = get_field('testimonial_name'); 
        $testimonial_img            = get_the_post_thumbnail_url();
        $testimonial_role_position  = get_field('testimonial_role_position'); 
        $testimonial_company        = get_field('testimonial_company'); 
        $testimonial_rating         = get_field('testimonial_rating'); 
        $testimonial_video          = get_field('testimonial_video'); 
        $short_excerpt          = get_field('short_excerpt'); 

        $returnhtml .= '<div class="testimonial_item">';
        
        $returnhtml .= '<div class="testimonial_blockitem">';
        $returnhtml .= ($testimonial_img) ? '<figure class="col-image"><img src="'. $testimonial_img .'" alt=""></figure>' : '<figure><img src="https://via.placeholder.com/1200x500"/></figure>';
        $returnhtml .= '<div class="testimonial_body">';    
        $returnhtml .= '<div class="testimonial_vbtn"><figure><img src="'. MBN_ASSETS_URI .'/img/icn-play-w.svg" alt=""></figure><span>PLAY VIDEO</span></div>';
        $returnhtml .= '<div class="testimonial_info">'. $testimonial_rating;
        $returnhtml .= ( $short_excerpt ) ? '<h3>'. $short_excerpt .'</h3>': '';
        $returnhtml .= ( $testimonial_name ) ? '<p class="testimonial_name">'. $testimonial_name .'</p>': '';
        $returnhtml .= ( $testimonial_role_position ) ? '<p>'. $testimonial_role_position .' | '. $testimonial_company .'</p>' : '';
        $returnhtml .= '</div></div></div>';
        //$returnhtml .= $testimonial_name .' '. $testimonial_role_position . $testimonial_company;
        $returnhtml .= '</div>';

    endwhile;
    $returnhtml .= '</div></div></section>';
    wp_reset_postdata();
    return $returnhtml;

}



function build_contact_us_map(){

    $query = array(
        'post_type'  => 'offices',
        'orderby'    => '',
        'order'      => 'asc'   
    );
    $branches = new WP_Query( $query );
    
    $returnhtml .='<div class="office_locator">'; // office_locator
    $returnhtml .= '<div class="gmap_wrap">'. do_shortcode('[display_map]') .'<div id="map"></div></div>';
    $returnhtml .= '<div class="grid-container">';
    $returnhtml .= '<div class="grid-x cols4-s2 branch_lists">';
    
    while ( $branches->have_posts() ) : $branches->the_post();
    
        $title = get_the_title();    
        $phone = get_field('location_phone');
        $loc_map = get_field('location_map');
        $lat = $loc_map['lat'];
        $lng = $loc_map['lng'];
    

        $returnhtml .= '<div class="cell large-6 xlarge-3 col-item branch_wrap" data-lat="'. esc_attr($lat) .'" data-lng="'. esc_attr($lng) .'" data-location="'.esc_attr($title).'">';
        $returnhtml .= '<div class="branch_link" >';
        $returnhtml .= '<h2 class="branch_title">'. $title .'</h2>';
        $returnhtml .= '<p class="branch_address">' . $loc_map['address'] .'</p>';
        $returnhtml .= '<p class="branch_phone">' . $phone .'</p>';
        $returnhtml .= '</div></div>'; //branch_wrap
        
    
    endwhile;    
    wp_reset_postdata();
    
    $returnhtml .= '</div>';// grid-x branch_lists
    $returnhtml .= '<hr/>';
    $returnhtml .= '</div>';//grid-container     
    $returnhtml .='</div>'; // office_locator
    
    return $returnhtml;
}
add_shortcode('office_locator','build_contact_us_map');

function build_find_office_map(){ 

    $office_args = array(  
        'post_type' => 'offices',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    );
    
    $office_loop = new WP_Query( $office_args );
   
    $returnhtml .= '<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
    $returnhtml .= '<script src="https://maps.googleapis.com/maps/api/js?key='. MBN_MAP_API_KEY .'&callback=initMap&libraries=&v=weekly" defer></script>';
    ?>
    <script>function initMap() {
     
        const myLatlng = { lat: 33.3344657, lng: -111.8984525 };
    
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatlng,
        });
    
    
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();  
        
        var markers_array = new Array();
        var locations = [];
        var array_holder;
        var loc_content = "";
        var loc_ctr = 0;
        var emp_phones = "";
    
        <?php while ( $office_loop->have_posts() ) : $office_loop->the_post(); ?>
            <?php if(!empty(get_field('location_map'))): ?>
                <?php //var_dump( get_field('map') ); ?>
                var loc_title = '<?php the_title(); ?>';
                var office_lat = <?php echo get_field('location_map')['lat']; ?>; 
                var office_lng = <?php echo get_field('location_map')['lng']; ?>;
        
                loc_content = '<div id="mapInfo'+loc_ctr+'" class="map_grid grid-container">';
                loc_content += '<div class="grid-x align-top">';
        
                loc_content += '<div class="cell medium-12">';       
                <?php if( !empty(get_the_post_thumbnail_url()) ) :?>
                loc_content += '<figure class="loc_img"><img src="<?php echo esc_html( get_the_post_thumbnail_url() );?>"/></figure>';
                <?php endif; ?>
                loc_content += '<div class="loc_body">';
                loc_content += '<h2 class="office_map_title">'+ loc_title +'</h2>';
                loc_content += '<p class="office_address"><?php echo esc_html(get_field('location_map')['address']); ?></p>';
                loc_content += '<p class="office_phone"><?php echo esc_html(get_field('location_phone')); ?></p>';
                loc_content += '</div></div>';        
        
                loc_content += '</div></div>';
        
                array_holder = [loc_title, office_lat, office_lng, loc_content];
                locations.push(array_holder);
                loc_ctr = loc_ctr+1;
            <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); ?>
        
        
        for (var i = 0; i < locations.length; i++) {
          
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });
    
           bounds.extend(marker.position);
    
    
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][3]);
              infowindow.open(map, marker);
              map.setCenter(this.getPosition());
            }
          })(marker, i));
    
          markers_array.push(marker);
        }
    
        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);
      
    
        //(optional) restore the zoom level after the map is done scaling
        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(10);
            google.maps.event.removeListener(listener);
        });
    
        
        $('.branch_wrap').each(function(i){
            $(this).on('click', function(e){
                google.maps.event.trigger(markers_array[i], 'click');
                e.preventDefault();
            });
        });
    
    
    }</script>
    
    <?php 
        return $returnhtml;
    }
add_shortcode('display_map', 'build_find_office_map');

function mbn_video_list_shortcode() {
    
    $video_args = array(  
        'post_type' => 'videos',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'asc',
    );

    $videos = new WP_Query( $video_args );   
    $ctr = $videos->found_posts; 


    //$returnhtml .= count($videos);
    $returnhtml .= '<div id="video_container" class="video_container">';
        $returnhtml .= '<div class="video_inner">';
            $returnhtml .= '<div class="video_header">';
                $returnhtml .= '<div class="video_header_title">';
                    $returnhtml .= '<span>'. esc_html('Video Playlist') .' (<em>'. esc_html($ctr) .'</em>)</span>';
                $returnhtml .= '</div>'; //video_header_title
                $returnhtml .= '<div class="video_header_toggle">';
                $returnhtml .= '<a href="#/" class="video_toggle">';
                $returnhtml .= '<div class="video_toggle_open">'. esc_html('More Videos') .'<span class="video_toggle_icon"><i class="fa fa-angle-right"></i></span></div>';
                $returnhtml .= '<div class="video_toggle_close">'. esc_html('Collapse') .'<span class="video_toggle_icon"><i class="fa fa-angle-down"></i></span></div>';
                    $returnhtml .= '</div></a>';
                    $returnhtml .= '</div>'; //video_header_toggle
            $returnhtml .= '</div>'; //video_header
            $returnhtml .= '<div class="video_body">';
            $returnhtml .= '<div class="video_lists_wrap">';
                $returnhtml .= '<div class="video_lists">';

                while ( $videos->have_posts() ) : $videos->the_post();

                $video_url = get_field('video_link');

                $video_thumb = get_video_thumb($video_url);
                $video_type = videoType($video_url);
                $video_id = get_video_id($video_url);
                $postID = get_the_ID();
				$terms = wp_get_post_terms( $postID, 'category' );
                
                $returnhtml .= '<a href="#" data-video-id="'.esc_attr($video_id) .'" class="modal-toggle" data-video-type="'.esc_attr($video_type).'">';
                $returnhtml .= '<div class="video_item media_flex">';
                $returnhtml .= '<div class="media_left">';
                $returnhtml .= '<figure class="video_thumb is-type-video"><img src="'. esc_url($video_thumb) .'" width="100" height="60"/></figure></div>';
                $returnhtml .= '<div class="media_body">';

                if ( $terms || !is_wp_error( $terms ) ):
                    foreach ( $terms as $term ):
                        $returnhtml .= '<span class="video_cat">'. $term->name .'</span>';
                    endforeach;
                endif;
                
                $returnhtml .= '<span class="video_title">'. get_the_title() .'</span>';
                $returnhtml .= '</div>'; //media_body
                $returnhtml .= '</div>'; //video_item
                $returnhtml .= '</a>'; //video_link

                endwhile;    
                wp_reset_postdata();
        
                    $returnhtml .= '</div>'; //video_lists
                $returnhtml .= '</div>'; //video_lists_wrap
            $returnhtml .= '</div>'; //video_body
        $returnhtml .= '</div>'; //video_inner
    $returnhtml .= '</div>'; // video_container

    $returnhtml .= '';


    $returnhtml .= '<div class="modal">';
    $returnhtml .= '<div class="modal-overlay modal-toggle"></div>';
    $returnhtml .= '<div class="modal-wrapper modal-transition">';
    $returnhtml .= '<div class="modal-header">';
    $returnhtml .= '<a class="modal-close modal-toggle" data-toggle="header" aria-expanded="true" aria-controls="header"><span>Menu</span></a>';
    $returnhtml .= '</div>';      
    $returnhtml .= '<div class="modal-body">';
    $returnhtml .= '<div class="modal-content">';
    $returnhtml .= '<iframe width="1280" height="720"  src="" frameborder="0" allow="autoplay" allowfullscreen></iframe></div>';
    $returnhtml .= '</div>';
    $returnhtml .= '</div>';
    $returnhtml .= '</div>';
    $returnhtml .= '</div>';

    return $returnhtml;
}
add_shortcode('mbn_video_list', 'mbn_video_list_shortcode');

