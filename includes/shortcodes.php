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

    if($testimonials->have_posts()):

        while ( $testimonials->have_posts() ) : $testimonials->the_post();

            $testimonial_name           = get_field('testimonial_name'); 
            $testimonial_img            = get_field('testimonial_video_thumb');
            $testimonial_role_position  = get_field('testimonial_role_position'); 
            $testimonial_company        = get_field('testimonial_company'); 
            $testimonial_rating         = get_field('testimonial_rating'); 
            $testimonial_greview        = get_field('google_review_excerpt'); 
            $video_url                  = get_field('testimonial_video'); 
            $review_type                = get_field('review_type'); 
            $video_thumb                = get_video_thumb($video_url);
            $video_type                 = videoType($video_url);
            $video_id                   = get_video_id($video_url);

            $short_excerpt          = get_field('short_excerpt'); 

            $returnhtml .= '<div class="testimonial_item">';
            
            if( $review_type == 'video_review' ) :
                $returnhtml .= '<div class="testimonial_blockitem">';
                $returnhtml .= ($testimonial_img) ? '<figure class="col-image"><img src="'. $testimonial_img .'" alt=""></figure>' : '<figure><img src="https://via.placeholder.com/1200x500"/></figure>';
                $returnhtml .= '<div class="testimonial_body">';    
                $returnhtml .= '<a href="#" data-video-id="'.esc_attr($video_id) .'" class="modal-toggle testimonial_vbtn" data-video-type="'.esc_attr($video_type).'">';
                $returnhtml .= '<figure><img src="'. MBN_ASSETS_URI .'/img/icn-play-w.svg" alt=""></figure><span>PLAY VIDEO</span></a>';
                $returnhtml .= '<div class="testimonial_info">'. $testimonial_rating;
                $returnhtml .= ( $short_excerpt ) ? '<h3>'. $short_excerpt .'</h3>': '';
                $returnhtml .= ( $testimonial_name ) ? '<p class="testimonial_name">'. $testimonial_name .'</p>': '';
                $returnhtml .= ( $testimonial_role_position ) ? '<p>'. $testimonial_role_position .' | '. $testimonial_company .'</p>' : '';
                $returnhtml .= '</div></div></div>';
            else:
                $returnhtml .= '<div class="testimonial_greview_item">';
                $returnhtml .= '<figure class="col-image"><img src="'. MBN_ASSETS_URI .'/img/icn-quote-r.png" alt=""></figure>';
                $returnhtml .= '<div class="testimonial_body">';    
                $returnhtml .= '<h3>'. $testimonial_greview .'</h3>';
                $returnhtml .= '</div><div class="testimonial_info">';
                $returnhtml .= ( $testimonial_name ) ? '<div class="testimonial_name">'. $testimonial_name .'</div>' : '';
                $returnhtml .= '<span class="border"></span>';
                $returnhtml .= ( $testimonial_rating ) ?'<div class="testimonial_rating">'. $testimonial_rating .'<div class="greview"><figure><img src="'. MBN_ASSETS_URI .'/img/Google-Review.png" alt=""></figure></div></div>' : '';
                $returnhtml .= '</div><div class="testimonial_link"><figure><img src="'. MBN_ASSETS_URI .'/img/icn-anchor.png" alt=""></figure></div>';
                $returnhtml .= '</div>';
            endif;
            $returnhtml .= '</div>';

        endwhile;
        $returnhtml .= '</div></div></section>';
        wp_reset_postdata();
        

    else:               
                        
        $returnhtml .= '<p>'. esc_html('Sorry, no posts were found.') .'</p>';

    endif;

    $returnhtml .= '<div class="modal">';
        $returnhtml .= '<div class="modal-overlay modal-toggle"></div>';//modal-overlay
        $returnhtml .= '<div class="modal-wrapper modal-transition">';
            $returnhtml .= '<div class="modal-header">';
                $returnhtml .= '<a class="modal-close modal-toggle"><span>Menu</span></a>';
            $returnhtml .= '</div>';    //modal-header  
            $returnhtml .= '<div class="modal-body">';
                $returnhtml .= '<div class="modal-content">';
                    $returnhtml .= '<iframe width="1280" height="720"  src="" frameborder="0" allow="autoplay" allowfullscreen></iframe>';
                $returnhtml .= '</div>'; //modal-content
            $returnhtml .= '</div>';//modal-body
        $returnhtml .= '</div>';//modal-wrapper
    $returnhtml .= '</div>'; //modal-modal

    return $returnhtml;

}

add_shortcode('mbn_regular_testimonials', 'mbn_regular_testimonials_shortcode');
function mbn_regular_testimonials_shortcode(){

    $query = array(
        'post_type'  => 'client_testimonials',
        'orderby'    => '',
        'order'      => 'asc',
				'meta_key'		=> 'review_type',
				'meta_value'	=> 'regular_review',
				'posts_per_page' => -1
    );
    
    $testimonials = new WP_Query( $query );

    
		$returnhtml = "";
    $returnhtml .= '<div class="wp-block-group happy_clients_section slick_on">';
    $returnhtml .= '<div class="wp-block-group__inner-container">';

    if($testimonials->have_posts()):

        while ( $testimonials->have_posts() ) : $testimonials->the_post();

						$review_type                = get_field('review_type');
						$short_excerpt        			= get_field('short_excerpt');
						$testimonial_name           = get_field('testimonial_name');
						$testimonial_picture        = get_field('testimonial_picture');
						$long_description           = get_field('long_description');

            $returnhtml .= '<div class="wp-block-columns slick_item grid-x grid-margin-x">';
            
            if( $review_type == 'regular_review' ) :
                $returnhtml .= '<div class="wp-block-column cell large-6 xlarge-5 copy column_invert_left testimonial_text_container">';
                $returnhtml .= ( $testimonial_name ) ? '<h3 class="section_subtitle has-text-color" style="color:#db323f">'. $testimonial_name .'</h3>': '';
								$returnhtml .= ( $short_excerpt ) ? '<h3><strong>'. $short_excerpt .'</strong></h3>': '';
								$returnhtml .= ( $long_description ) ? '<div class="moreless"><p>'. $long_description .'</p></div>': '';
								$returnhtml .= '</div>';
                $returnhtml .= '<div class="wp-block-column cell large-6 xlarge-7 media column_invert_right testimonial_picture_container">';
								$returnhtml .= ($testimonial_picture) ? '<figure class="wp-block-image size-large happy_client_img is-style-default"><img src="'. $testimonial_picture .'" alt=""></figure>' : '<figure><img src="https://via.placeholder.com/1200x500"/></figure>';
								$returnhtml .= '</div>';
            else:
                return;
            endif;
            $returnhtml .= '</div>';

        endwhile;
        $returnhtml .= '</div></div>';
        wp_reset_postdata();

    else:
        $returnhtml .= '<p>'. esc_html('Sorry, no posts were found.') .'</p>';

    endif;

    return $returnhtml;

}

function build_contact_us_map(){

    wp_reset_query();

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
    
    if($branches->have_posts()) :
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
        
    else:
                        
        $returnhtml .= '<p>'. esc_html('Sorry, no posts were found.' ) .'</p>';

    endif;

    $returnhtml .= '</div>';// grid-x branch_lists
    $returnhtml .= '<hr/>';
    $returnhtml .= '</div>';//grid-container     
    $returnhtml .='</div>'; // office_locator
    
    return $returnhtml;
}
add_shortcode('office_locator','build_contact_us_map');

function mbn_video_list_shortcode() {

    wp_reset_query();

    
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
    $returnhtml .= '<div id="video_container" class="video_container show_tab">';
        $returnhtml .= '<div class="video_inner">';
            $returnhtml .= '<div class="video_header">';
                $returnhtml .= '<div class="video_header_title">';
                    $returnhtml .= '<span>'. esc_html('Video Playlist') .' (<em>'. esc_html($ctr) .'</em>)</span>';
                $returnhtml .= '</div>'; //video_header_title
                $returnhtml .= '<div class="video_header_toggle">';
                $returnhtml .= '<a href="#" class="video_toggle">';
                $returnhtml .= '<div class="video_toggle_open">'. esc_html('More Videos') .'<span class="video_toggle_icon"><i class="fa fa-angle-right"></i></span></div>';
                $returnhtml .= '<div class="video_toggle_close">'. esc_html('Collapse') .'<span class="video_toggle_icon"><i class="fa fa-angle-down"></i></span></div>';
                    $returnhtml .= '</a>';
                    $returnhtml .= '</div>'; //video_header_toggle
            $returnhtml .= '</div>'; //video_header
            $returnhtml .= '<div class="video_body">';
            $returnhtml .= '<div class="video_lists_wrap">';
                $returnhtml .= '<div class="video_lists">';

            if ( $videos->have_posts() ) :
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
                        $returnhtml .= '<span class="video_cat">'. esc_html($term->name) .'</span>';
                    endforeach;
                endif;
                
                $returnhtml .= '<span class="video_title">'. get_the_title() .'</span>';
                $returnhtml .= '</div>'; //media_body
                $returnhtml .= '</div>'; //video_item
                $returnhtml .= '</a>'; //video_link

                endwhile;
                wp_reset_postdata();
            else:               
                    
                $returnhtml .= '<p style="text-align:center">'. esc_html('Sorry, no posts were found.' ) .'</p>';

            endif;

                    $returnhtml .= '</div>'; //video_lists
                $returnhtml .= '</div>'; //video_lists_wrap
            $returnhtml .= '</div>'; //video_body
        $returnhtml .= '</div>'; //video_inner
    $returnhtml .= '</div>'; // video_container

    $returnhtml .= '';


    $returnhtml .= '<div class="modal">';
        $returnhtml .= '<div class="modal-overlay modal-toggle"></div>';//modal-overlay
        $returnhtml .= '<div class="modal-wrapper modal-transition">';
            $returnhtml .= '<div class="modal-header">';
                $returnhtml .= '<a class="modal-close modal-toggle"><span>Menu</span></a>';
            $returnhtml .= '</div>';    //modal-header  
            $returnhtml .= '<div class="modal-body">';
                $returnhtml .= '<div class="modal-content">';
                    $returnhtml .= '<iframe width="1280" height="720"  src="" frameborder="0" allow="autoplay" allowfullscreen></iframe>';
                $returnhtml .= '</div>'; //modal-content
            $returnhtml .= '</div>';//modal-body
        $returnhtml .= '</div>';//modal-wrapper
    $returnhtml .= '</div>'; //modal-modal

    return $returnhtml;
}
add_shortcode('mbn_video_list', 'mbn_video_list_shortcode');



/** Listings **/

// ALL LISTINGS
function mbn_view_listings_all_filter_shortcode($atts){

    wp_reset_query();

    $exclude_cat = (isset($atts['exclude_category'])) ? $atts['exclude_category'] : '';    
    $exclude_cat = get_term_by('name', $exclude_cat, 'listings_cat' );
    $exclude_cat = $term->term_id;

$returnhtml .= '<div class="grid-container">';
    $returnhtml .= '<div class="listings_nav_wrap">';
        $returnhtml .= '<div class="listings_nav">';

    $terms = get_terms( 'listings_cat', array( 'hide_empty' => false, 'orderby' => 'id', 'exclude' => $exclude_cat ) ); // Get all terms of a taxonomy

    if ( $terms && !is_wp_error( $terms ) ) :
        
        foreach ( $terms as $term ) :

            $returnhtml .= '<div class="cat_item" data-anchor="'. esc_attr( $term->slug ) .'"><div class="cat_link" ><span>'. esc_html( $term->name ) .'</span></div></div>';

        endforeach;

    endif;

        $returnhtml .= '</div>';//listings_nav    
    $returnhtml .= '</div>';//listings_nav_wrap    
    $returnhtml .= '<div class="listings">';

    if ( $terms && !is_wp_error( $terms ) ) :
        
        foreach ( $terms as $term ) :

            $listings_args = array(  
                'post_type' => 'listings',
                'posts_per_page' => 6, 
                'post_status' => 'publish',
                'orderby' => 'id',
                'tax_query' => $term->slug,
                'order' => 'asc',
                'category__not_in' => $exclude_cat,
            );

            $listings = new WP_Query( $listings_args );   

            $returnhtml .= '<div id="'.esc_attr($term->slug).'" class="listing_container">';
                $returnhtml .= '<h2>'.esc_html($term->name).'</h2>';
                $returnhtml .= '<div class="grid-x cols3-s2 listing_inner">';

                if( $listings->have_posts()) :

                    while ( $listings->have_posts() ) : $listings->the_post();

                        $title = get_the_title();
                        $img_url = get_the_post_thumbnail_url();
                        $url = get_the_permalink();

                        $property_price = get_field('property_price');
                        preg_match_all('!\d+!', $property_price, $matches);
                        $property_price = number_format( implode(' ', $matches[0]) ,3, ',', '.');
                        
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $listings->ID ), 'large' ); 
                        if( isset( $img[0] ) ): 
                            $img = $img[0]; 
                        else : 
                            $img = 'https://via.placeholder.com/470x300';         
                        endif;

                        $property_address = get_field('property_address');
                        $property_city = get_field('property_city');
                        $property_state = get_field('property_state');
                        $property_zip = get_field('property_zip');
                        $property_address = $property_address.' '.$property_city.' '.$property_state.' '.$property_zip;
                        $property_bedrooms = get_field('property_bedrooms');
                        $property_half_bathrooms = get_field('property_half_bathrooms');
                        $property_square_feet = get_field('property_square_feet');



                        $returnhtml .= '<div id="'.esc_attr($cat_slug).'" class="cell medium-6 large-4 col-item listing_item">';            
                            $returnhtml .= '<a href="'.esc_url($url).'">';
                                $returnhtml .= '<div class="listing-wrap">';
                                    $returnhtml .= '<div class="listing-widget-thumb"><figure><img src="'. esc_attr($img) .'" /></figure></div>';
                                    $returnhtml .= '<div class="listing-widget-details">';                    
                                        $returnhtml .= '<div class="listing-tag listing-tag-mob"><span>'.esc_html($term->name).'</span></div>';
                                        $returnhtml .= '<div class="listing-price-address">';
                                            $returnhtml .= '<div class="listing-price"><span><strong>'.esc_html('$').'</strong></span>'.esc_html($property_price).'</div>';
                                            $returnhtml .= '<div class="listing-title"></div>';
                                            $returnhtml .= '<div class="listing-address"><span class="loc_pin"></span>'.esc_html($property_address).'</div>';
                                        $returnhtml .= '</div>'; // listing-price-address                
                                        $returnhtml .= '<div class="listing-other-info">';
                                            $returnhtml .= '<div class="listing-beds-baths-sqft">';
                                                $returnhtml .= '<div class="beds"><span class="listing-beds">'.esc_html($property_bedrooms).'</span><span>'.esc_html('BEDS').'</span></div>';
                                                $returnhtml .= '<div class="baths"><span class="listing-baths">'.esc_html($property_half_bathrooms).'</span><span>'.esc_html('BATHS').'</span></div>';
                                                $returnhtml .= '<div class="sq_ft"><span class="listing-sqft">'.esc_html($property_square_feet).'</span><span>'.esc_html('SQ. FEET').'</span></div>';
                                            $returnhtml .= '</div>';
                                            $returnhtml .= '<div class="listing-tag listing-tag-desk"><span>'.esc_html($term->name).'</span></div>';
                                        $returnhtml .= '</div>'; // listing-other-info     
                                    $returnhtml .= '</div>'; // listing-widget-details
                                $returnhtml .= '</div>'; // listing-wrap
                            $returnhtml .= '</a>'; // media-text
                        $returnhtml .= '</div>'; //cell


                    endwhile;
                    wp_reset_postdata();
                
                else:               
                        
                    $returnhtml .= '<p>'. esc_html('Sorry, no posts were found.' ) .'</p>';

                endif;
                
                $returnhtml .= '</div>'; //listing_inner

                if( $listings->found_posts > 6 ) {
                    $returnhtml .= '<div class="loadMore_btn"><a href="'.get_site_url() .'/listings' .'" class="btn_primary_hollow">LOAD MORE</a></div>';
                }

            $returnhtml .= '</div>'; // listing_container
        endforeach;
    endif;
    
    $returnhtml .= '</div>';//listings
    $returnhtml .= '</div>';//grid-container

    return $returnhtml;

}
add_shortcode('mbn_view_listings_filter', 'mbn_view_listings_all_filter_shortcode');

// listings single by atts = category

function mbn_view_listings_shortcode($atts){

    if( ! empty( $atts['category'] ) ):
        $cat = $atts['category'] ;
        $term = get_term_by('name', $cat, 'listings_cat' );
        $cat_slug = $term->slug;

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
        'posts_per_page' => 7, 
        'post_status' => 'publish',
        'orderby' => 'id',
        'tax_query' => $tax_arg,
        'order' => 'asc',
    );

    $listings = new WP_Query( $listings_args );   

    //$returnhtml .= '<div class="grid-container">';
    $returnhtml .= '<div id="'.$term->slug.'" class="listing_container">';
    $returnhtml .= '<div class="grid-x cols3-s2 listing_inner">';

    while ( $listings->have_posts() ) : $listings->the_post();

        $terms = get_the_terms( $listings->ID, 'listings_cat' );
        $term = array_pop($terms);

        $cat = (empty($cat)) ? $term->name : $cat;

        $title = get_the_title();
        $img_url = get_the_post_thumbnail_url();
        $url = get_the_permalink();

        $property_price = get_field('property_price');
        preg_match_all('!\d+!', $property_price, $matches);
        $property_price = number_format( implode(' ', $matches[0]) ,3, ',', '.');
        
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $listings->ID ), 'large' ); 
        if( isset( $img[0] ) ): 
            $img = esc_url($img[0]); 
        else : 
            $img = esc_url('https://via.placeholder.com/470x300');         
        endif;

        $property_address = get_field('property_address');
        $property_city = get_field('property_city');
        $property_state = get_field('property_state');
        $property_zip = get_field('property_zip');
        $property_address = $property_address.' '.$property_city.' '.$property_state.' '.$property_zip;
        $property_bedrooms = get_field('property_bedrooms');
        $property_half_bathrooms = get_field('property_half_bathrooms');
        $property_square_feet = get_field('property_square_feet');

            $returnhtml .= '<div id="'.esc_attr($cat_slug).'" class="cell medium-6 large-4 col-item listing_item">';            
                $returnhtml .= '<a href="'.esc_url($url).'">';
                    $returnhtml .= '<div class="listing-wrap">';
                        $returnhtml .= '<div class="listing-widget-thumb"><figure><img src="'. esc_url($img) .'" /></figure></div>';
                        $returnhtml .= '<div class="listing-widget-details">';                    
                            $returnhtml .= '<div class="listing-tag listing-tag-mob"><span>'.esc_html($cat).'</span></div>';
                            $returnhtml .= '<div class="listing-price-address">';
                                $returnhtml .= '<div class="listing-price"><span><strong>'.esc_html('$').'</strong></span>'.esc_html($property_price).'</div>';
                                $returnhtml .= '<div class="listing-title"></div>';
                                $returnhtml .= '<div class="listing-address"><span class="loc_pin"></span>'.esc_html($property_address).'</div>';
                            $returnhtml .= '</div>'; // listing-price-address                
                            $returnhtml .= '<div class="listing-other-info">';
                                $returnhtml .= '<div class="listing-beds-baths-sqft">';
                                    $returnhtml .= '<div class="beds"><span class="listing-beds">'.esc_html($property_bedrooms).'</span><span>'.esc_html('BEDS').'</span></div>';
                                    $returnhtml .= '<div class="baths"><span class="listing-baths">'.esc_html($property_half_bathrooms).'</span><span>'.esc_html('BATHS').'</span></div>';
                                    $returnhtml .= '<div class="sq_ft"><span class="listing-sqft">'.esc_html($property_square_feet).'</span><span>'.esc_html('SQ. FEET').'</span></div>';
                                $returnhtml .= '</div>';
                                $returnhtml .= '<div class="listing-tag listing-tag-desk"><span>'.esc_html($cat).'</span></div>';
                            $returnhtml .= '</div>'; // listing-other-info     
                        $returnhtml .= '</div>'; // listing-widget-details
                    $returnhtml .= '</div>'; // listing-wrap
                $returnhtml .= '</a>'; // media-text
            $returnhtml .= '</div>'; //cell

    endwhile;
    wp_reset_postdata();
    $returnhtml .= '</div>'; // listing_inner

    if( $listings->found_posts > 6 &&  !(empty($cat)) ) {
        $returnhtml .= '<a href="'.get_site_url() . '/listings' .'" class="btn_primary_hollow">LOAD MORE</a>';
    }

    $returnhtml .= '</div>'; // listing_container
    
    return $returnhtml;

}
add_shortcode('mbn_view_listings', 'mbn_view_listings_shortcode');

// [featured-post-slider posts_per_page=""]
function featured_post_slider($attr) {
    extract( shortcode_atts( array(
        'post_type' => 'post',
        'posts_per_page' => '',
    ), $attr ) );

    $args   =   array(
        'post_type' =>  $post_type,
        'posts_per_page' => $posts_per_page,
        // 'orderby' => $orderby,
        // 'order' => $order,
        'post_status' => 'publish'
    );

    $postslist = new WP_Query( $args );

    if ( $postslist->have_posts() ) :
        $html   .= '<div class="wp-block-columns grid-x grid-margin-x home_news_list blog_news_slider">';
    
        while ( $postslist->have_posts() ) : $postslist->the_post();   
            $terms = get_the_terms( $post->ID, 'category' );     

            $html    .= '<div class="wp-block-column cell large-4 news_item">';
            $html    .= '<figure class="wp-block-image size-full"><a href="'. get_permalink() .'">';
            if ( has_post_thumbnail() ) {
                $html    .= '<img loading="lazy" src="'.get_the_post_thumbnail_url().'" width="450" height="250">';
            }
            else {
                $html    .= '<img loading="lazy" src="'.home_url().'/wp-content/uploads/2021/07/img-6-steps.jpg" width="450" height="250">';
            }
            $html    .= '</a></figure>';
            $html    .= '<h6>';
            if($terms) foreach( $terms as $term ) {
                $html    .= '<a href="'.get_category_link( $term->term_id ).'">'.$term->name.'</a>';
            }
            $html    .= '</h6>';
            $html    .= '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';
            $html    .= '</div>';
        endwhile;
        wp_reset_postdata();

        $html  .= '</div>';

        $html  .= '
            <script>
                jQuery(function($){
                    $(".blog_news_slider").slick({
                        dots: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        responsive: [
                          {
                            breakpoint: 1200,
                            settings: {
                              slidesToShow: 2
                            }
                          },
                          {
                            breakpoint: 768,
                            settings: {
                              slidesToShow: 1
                            }
                          }
                        ]
                    });
                });
            </script>
        ';   

    endif;    

    
    return $html;
}
add_shortcode( 'featured-post-slider', 'featured_post_slider' );

// vendors
function vendors_list_shortcode(){
    
    $terms = get_terms( 'vendors_cat', array('hide_empty' => false, 'orderby' => 'name', 'order' => 'asc' ));
    $returnhtml .= '<section class="vendors_container">';
        $returnhtml .= '<div class="grid-container">';  
            $returnhtml .= '<div class="grid-x grid-margin-x cols2-s3">';
                $returnhtml .='<div class="cell large-3">';
                    $returnhtml .='<div class="vendors_nav">';
                    // categories list
                
                    if ( $terms && !is_wp_error( $terms ) ) :            
                        foreach ( $terms as $term ) : 
                            $returnhtml .= '<div class="vendors_category"><a href="#'.esc_attr( $term->slug ).'">'.esc_html( $term->name ).'</a></div>';
                        endforeach;
                    endif;
                    $returnhtml .='</div>'; //vendors_nav
                $returnhtml .='</div>'; //cell
                $returnhtml .= '<div class="cell large-9 col-copy  align-self-middle">';
                    $returnhtml .='<div class="vendors_list">';

                    if ( $terms && !is_wp_error( $terms ) ) :
                
                        foreach ( $terms as $term ) :
                                
                            $vendors_args = array(  
                                'post_type' => 'vendors_type',
                                'post_status' => 'publish',
                                'orderby' => 'name',
                                'hide_empty' => true,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'vendors_cat',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug,
                                    ),
                                ),
                                'order' => 'asc',
                            );
                            $vendors = new WP_Query( $vendors_args );  
                            
                            $returnhtml .= '<div id="'.esc_attr($term->slug).'" class="vendors_container">';
                                $returnhtml .= '<h4 class="vendor_cat_title">'. esc_html($term->name) . $vendors->found_posts().'</h4>';
                                $returnhtml .= '<div class="vendor_wrap">';
                                
                                //vendors list
                                while ( $vendors->have_posts() ) : $vendors->the_post();
                                                
                                    /*$img = wp_get_attachment_image_src( get_post_thumbnail_id( $vendors->ID ), 'medium' ); 
                                    if( isset( $img[0] ) ): 
                                        $img = $img[0]; 
                                    else : 
                                        $img = 'https://via.placeholder.com/470x300';         
                                    endif;
                                    */
                                    $img = get_the_post_thumbnail_url();
                                    $returnhtml .= '<div class="vendor_inner">';
                                        $returnhtml .= '<div class="vendor_media"><div class="vendor_logo"><figure><img src="'. esc_url($img) .'"/></figure></div></div>';
                                        $returnhtml .= '<hr/>';
                                        $returnhtml .= '<div class="vendor_name">';
                                            $returnhtml .= '<h3>'. get_the_title() .'</h3>';
                                            $returnhtml .= '<a href="'.get_the_permalink().'" target="_blank" >'.esc_html('View Info & Promos').'</a>';
                                        $returnhtml .= '</div>'; //vendor_name
                                    $returnhtml .= '</div>'; //vendor_inner

                                endwhile;
                                wp_reset_postdata();

                                $returnhtml .='</div>'; //vendor_wrap
                            $returnhtml .='</div>'; //vendors_container
                        endforeach;
                    endif;
                    $returnhtml .='</div>'; //vendors_list
                $returnhtml .='</div>'; //cell
            
            $returnhtml .= '</div';
        $returnhtml .= '</div>';
    $returnhtml .= '</section>';
    return $returnhtml;

}
add_shortcode ('vendors_list', 'vendors_list_shortcode');


//search form

function mbn_search_form($atts) {
    $placeholder = isset($atts['placeholder']) ? $atts['placeholder'] : 'Search..';

    $search_form = '<div class="site-search" id="search" ><form method="get" id="search-form-alt" action="'. esc_url(home_url('/')) .'">
        <input type="text" name="s" id="s" placeholder="'. esc_attr($placeholder) .'" value="">        
        <input type="image" src="'. MBN_ASSETS_URI .'/img/icn-search.svg">
    </form></div>';
    return $search_form;
}
add_shortcode( 'search_form', 'mbn_search_form' );



function mbn_sold_listings(){

    $query = query_posts([
        'post_type'=>'sold-listings',
        'publish_status'=>'publish',
        'orderby'=>'menu_order',
        'order'=>'asc'
    ]);
    $str = "<div class='sold-boxes'>";
    foreach($query as $post){
        $img = wp_get_attachment_image( get_field("image",$post->ID), "sold_listing_thumb", false,'' );
        $str .="<div class='box'>";
        $str .="<div class='thumb'>";
        $str .="<span class='addr'>".get_field("address",$post->ID)."</span>";
        $str .=$img;
        $str .="</div>";
        $str .="<h4>".$post->post_title."</h4>";
        $str .="<span class='price'>".get_field("price",$post->ID)."</span>";
        $str .="</div>";
    }

     $str .= "</div>";



    return $str;
}

add_shortcode( 'mbn_sold_listings', 'mbn_sold_listings' );


//podcast news
function mbn_podcast_news_box($atts) {
	$podcast_news_box = "";

    $podcast_news_box .= "<div class='podcast_news_app'>";

	if( have_rows('podcast_programs') ):

    $podcast_news_box .= "<ul class='podcast_news_items'>";

    while( have_rows('podcast_programs') ): the_row();
        $image_logo = get_sub_field('podcast_program_logo');
        //$image_logo = wp_get_attachment_image( $image_logo, 'full' );   

        $podcast_news_box .= "<li>";
        $podcast_news_box .= "<figure><img src='".$image_logo['url']."' alt='' /></figure>";
        $podcast_news_box .= "<h4>".get_sub_field('podcast_program_title')."</h4>";
        $podcast_news_box .= "<p>".get_sub_field('podcast_program_schedule')."</p>";
        $podcast_news_box .= "</li>";
             
    endwhile;

    $podcast_news_box .= "</ul>";

	endif;

    if( have_rows('podcast_source_links') ):

    $podcast_news_box .= "<ul class='podcast_app_links'>";

    while( have_rows('podcast_source_links') ): the_row();

        $image_slogo = get_sub_field('source_logo');
        //$image_slogo = wp_get_attachment_image( $image_slogo, 'full' );   

        $podcast_news_box .= "<li>";
        $podcast_news_box .= "<a href='".get_sub_field('source_link')."'>";
        $podcast_news_box .= "<img src='".$image_slogo['url']."' alt='' />";
        $podcast_news_box .= "</a>";
        $podcast_news_box .= "</li>";

    endwhile;

    $podcast_news_box .= "</ul>";

    endif;

    $podcast_news_box .= "</div>";


	return $podcast_news_box;
}
add_shortcode( 'podcast_news_box', 'mbn_podcast_news_box' );