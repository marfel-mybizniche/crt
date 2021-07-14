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
    $returnhtml .= '<div class="gmap_wrap">'. build_find_office_map() .'<div id="map"></div></div>';
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
    $returnhtml .= '<a class="modal-close modal-toggle"><span>Menu</span></a>';
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

function mbn_view_listings_shortcode($atts){

    if( ! empty( $atts['category'] ) ):
        $cat = $atts['category'] ;
        $term = get_term_by('name', $cat, 'listings_cat' );
        $cat_slug = $term->name;
        $tax_arg = array(
            array(
                'taxonomy' => 'listings_cat',
                'field' => 'slug', //can be set to ID
                'terms' => $cat_slug  //if field is ID you can reference by cat/term number
            )
        );
    endif;

    $listings_args = array(  
        'post_type' => 'listings',
        'posts_per_page' => 6, 
        'post_status' => 'publish',
        'orderby' => 'id',
        'tax_query' => $tax_arg,
        'order' => 'asc',
    );

    $listings = new WP_Query( $listings_args );   

    //$returnhtml .= '<div class="sec-3cols">';
    $returnhtml .= '<div class="grid-x cols3-s2 listing_container">';

    while ( $listings->have_posts() ) : $listings->the_post();

        $title = get_the_title();
        $img_url = get_the_post_thumbnail_url();
        $url = get_the_permalink();

        $property_price = get_field('property_price');
        preg_match_all('!\d+!', $property_price, $matches);
        $property_price = number_format( implode(' ', $matches[0]) ,3, ',', '.');
        
        $property_address = get_field('property_address');
        $property_city = get_field('property_city');
        $property_state = get_field('property_state');
        $property_zip = get_field('property_zip');
        $property_address = $property_address.' '.$property_city.' '.$property_state.' '.$property_zip;
        $property_bedrooms = get_field('property_bedrooms');
        $property_half_bathrooms = get_field('property_half_bathrooms');
        $property_square_feet = get_field('property_square_feet');

            $returnhtml .= '<div class="cell medium-6 large-4 col-item listing_item">';            
                $returnhtml .= '<a href="'.esc_url($url).'">';
                    $returnhtml .= '<div class="listing-wrap">';
                        $returnhtml .= '<div class="listing-widget-thumb"><figure><img src="'. esc_attr($img_url) .'" /></figure></div>';
                        $returnhtml .= '<div class="listing-widget-details">';                    
                            $returnhtml .= '<div class="listing-tag listing-tag-mob"><span>'.esc_html($cat_name).'</span></div>';
                            $returnhtml .= '<div class="listing-price-address">';
                                $returnhtml .= '<div class="listing-price"><span><strong>'.esc_html('$').'</strong></span>'.esc_html($property_price).'</div>';
                                $returnhtml .= '<div class="listing-title"></div>';
                                $returnhtml .= '<div class="listing-address"><span class="loc_pin"></span>'.esc_html($property_address).'</div>';
                                //$returnhtml .= '<div class="listing-city-state-zip"></div>';
                            $returnhtml .= '</div>'; // listing-price-address                
                                $returnhtml .= '<div class="listing-other-info">';
                                    $returnhtml .= '<div class="listing-beds-baths-sqft">';
                                        $returnhtml .= '<div class="beds"><span class="listing-beds">'.esc_html($property_bedrooms).'</span><span>'.esc_html('BEDS').'</span></div>';
                                        $returnhtml .= '<div class="baths"><span class="listing-baths">'.esc_html($property_half_bathrooms).'</span><span>'.esc_html('BATHS').'</span></div>';
                                        $returnhtml .= '<div class="sq_ft"><span class="listing-sqft">'.esc_html($property_square_feet).'</span><span>'.esc_html('SQ. FEET').'</span></div>';
                                    $returnhtml .= '</div>';
                                    $returnhtml .= '<div class="listing-tag listing-tag-desk"><span>'.esc_html($cat_name).'</span></div>';
                                $returnhtml .= '</div>'; // listing-other-info     
                        $returnhtml .= '</div>'; // listing-widget-details
                        $returnhtml .= '</div>'; // media-tex
                    $returnhtml .= '</a>'; // media-text
            $returnhtml .= '</div>'; //cell

    endwhile;

    if( $listings->found_posts > 6 ) {
        $returnhtml .= '<a href="'.get_site_url() .'/listings_cat/'. $cat_slug .'">LOAD MORE</a>';
    }
    wp_reset_postdata();

    $returnhtml .= '</div>'; //listing-wrap
    //$returnhtml .= '</div>'; // sec-3cols
    
    return $returnhtml;

}
add_shortcode('mbn_view_listings', 'mbn_view_listings_shortcode');
