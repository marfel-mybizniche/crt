<?php 
    /* Template Name: About template */
    get_header();

    $listings_args = array(  
        'post_type' => 'listings',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
        'orderby' => 'id',
        'order' => 'asc',
    );

    $listings = new WP_Query( $listings_args );   
?>
<section class="sec-3cols">
    <div class="grid-container">
        <div class="grid-x cols3-s2 listing_container">
<?php

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
?>
            <div class="cell medium-6 large-4 col-item listing_item">            
                <a href="<?php echo esc_url($url); ?>">
                    <div class="listing-wrap">
                        <div class="listing-widget-thumb"><figure><img src="<?php echo esc_attr($img_url); ?>" /></figure></div>
                        <div class="listing-widget-details">                 
                            <div class="listing-tag listing-tag-mob"><span><?php echo esc_html($cat_name); ?></span></div>
                            <div class="listing-price-address">
                                <div class="listing-price"><span><strong><?php echo esc_html('$'); ?></strong></span><?php echo esc_html($property_price); ?></div>
                                <div class="listing-title"></div>
                                <div class="listing-address"><span class="loc_pin"></span><?php echo esc_html($property_address); ?></div>
                                <div class="listing-city-state-zip"></div>
                            </div>               
                                <div class="listing-other-info">
                                    <div class="listing-beds-baths-sqft">
                                        <div class="beds"><span class="listing-beds"><?php echo esc_html($property_bedrooms); ?></span><span><?php echo esc_html('BEDS'); ?></span></div>
                                        <div class="baths"><span class="listing-baths"><?php echo esc_html($property_half_bathrooms); ?></span><span><?php echo esc_html('BATHS'); ?></span></div>
                                        <div class="sq_ft"><span class="listing-sqft"><?php echo esc_html($property_square_feet); ?></span><span><?php echo esc_html('SQ. FEET'); ?></span></div>
                                    </div>
                            <div class="listing-tag listing-tag-desk"><span><?php echo esc_html($cat_name); ?></span></div>
                        </div> 
                    </div>
                </div>
              </a> 
            </div> 

 <?php 
    endwhile;
    wp_reset_postdata();
?>
        </div> 
    </div> 
</section>
<?php
    get_footer(); 