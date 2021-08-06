<?php get_header(); global $post;
    
	$bed	 		= get_post_meta( $post->ID, '_listing_bedrooms', true );
	$bath	 		= get_post_meta( $post->ID, '_listing_bathrooms', true );
	$sq_ft	 		= get_post_meta( $post->ID, '_listing_sqft', true );
    $car			= get_post_meta( $post->ID, '_listing_garage', true );

	$price	 		= get_post_meta( $post->ID, '_listing_price', true );



	
    if ( '' != wp_listings_get_property_types() ) {
			$type = strip_tags(get_the_term_list( get_the_ID(), 'property-types', '', ', ', '' ) ,"");
    }
	$form			= get_theme_mod('listing_option_form');

    $left_col_info = [
        ['label'=>"Address","value"=>"_listing_address"],
        ['label'=>"City","value"=>"_listing_city"],
        ['label'=>"County","value"=>"_listing_county"],
        ['label'=>"State","value"=>"_listing_state"],
        ['label'=>"Country","value"=>"_listing_country"],
        ['label'=>"zip","value"=>"_listing_zip"],
        ['label'=>"Subdivision","value"=>"_listing_subdivision"],
        ['label'=>"MLS #:","value"=>"_listing_mls"],
        ['label'=>"Open House Time & Date:","value"=>"_listing_open_house"],
    ];
    $right_col_info = [
        ['label'=>"Pool","value"=>"_listing_pool"],
        ['label'=>"Year Built","value"=>"_listing_year_built"],
        ['label'=>"Floors","value"=>"_listing_floors"],
        ['label'=>"Acres","value"=>"_listing_acres"],
        ['label'=>"Lot Square Feet","value"=>"_listing_lot_sqft"],
        ['label'=>"Half Bathrooms","value"=>"_listing_half_bath"],
    ];
?>

<section class="listing_single_wrap">

	<div class="listing_sticky_info ">
		<div class="grid-container">
			<div class="grid-x cols3-s1">
				<div class="cell medium-4 large-4 small-12">
					<div class="sticky_info sticky_info_left">
						<div class="coming_soon_red"><?php echo esc_html('COMING SOON'); ?></div>				
						<div class="address"><?php the_title(); ?></div>
					</div>
				</div>
				<div class="cell medium-4 large-8 small-12">
					<div class="sticky_info sticky_info_right">
						<div class="text_wrap info_bed"><?php echo esc_html($bed . ' Bedrooms');  ?></div>
						<div class="text_wrap info_bath"><?php echo esc_html($bath . ' Bathrooms'); ?></div>
						<div class="text_wrap info_sq_ft"><?php echo esc_html($sq_ft . ' sq ft'); ?> </div>
                        <?php if(!empty($car)):?>
						<div class="text_wrap info_car"><?php echo esc_html($car . ' Car Garage');  ?></div>
                        <?php endif;?>
						<div class="text_wrap info_price"><?php echo esc_html('$' . $price);  ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="listing_content">
		<div class="grid-container">
			<div class="content_info  content_info_head">
				<div class="content_left content_info_inner info_head">
					<div class="coming_soon_red"><?php echo esc_html(wp_listings_get_status()); ?></div>				
					<div class="address"><?php the_title(); ?></div>			
					<div class="text_wrap info_price"><?php echo esc_html($price);  ?></div>
				</div>
				<div class="content_right content_info_gallery listing_gallery_wrap">
						<div class="temp_gallery"><?php echo str_replace("src","data-src",do_shortcode(get_post_meta( $post->ID, '_listing_gallery', true))); ?></div>
						<div class="listing_gallery">
							<div class="slider_for_wrap">
								<div class="slider_for"></div>
							</div>
							<div class="slider_nav_wrap">
									<div class=" slider_nav"></div>
							</div>
						</div>
					<?php /* <div class="listing_gallery">
					<?php 
						$images = get_field('photo_gallery');
						if( $images ): ?>
							<div class="slider_for_wrap">
								<div class="slider_for">
									<?php 							
									foreach( $images as $image ): ?>
										<div class="gallery_item">
											<figure class="gallery_img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="" height="550"/>
										</figure>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="slider_nav_wrap">
								<div class=" slider_nav">
									<?php foreach( $images as $image ): ?>
										<div class="gallery_item">
											<figure class="gallery_img">
												<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											</figure>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div> */?>

				</div>
			</div>
			<div class="content_info content_info_main">
				<div class="content_left content_info_inner info_main">
					<div class="cols col-1">
                        <?php  ?>
						<div class="text_wrap info_bed"><?php echo esc_html($bed . ' Bedrooms');  ?></div>	
						<div class="text_wrap info_sq_ft"><?php echo esc_html($sq_ft . ' sq ft'); ?> </div>
					</div>			
					<div class="cols col-2">
						<div class="text_wrap info_bath"><?php echo esc_html($bath . ' Bathrooms'); ?></div>
                         <?php if(!empty($car)):?>
						<div class="text_wrap info_car"><?php echo esc_html($car . ' Car Garage');  ?></div>
                        <?php endif;?>
					</div>		
				</div>		
			</div>
			<div class="content_info content_info_btn">
				<div class="content_left content_info_inner info_btn">
					<div class="schedule_btn"><button data-target="#content_info_form" class="button primary_button scrollto"><?php echo esc_html('SCHEDULE SHOWING'); ?></button></div>				
					<div class="more_btn"><button data-target="#content_info_desc" class="button light scrollto"><?php echo esc_html('MORE INFO'); ?></button></div>	
				</div>				
			</div>
			<div class="content_info content_info_addtl">
				<div class="content_left content_info_inner info_addtl">
					<div class="cols">
                        <?php foreach($left_col_info as $item):?>
                        <?php
                        $value = get_post_meta( $post->ID, $item['value'], true );
                        ?>
                         <?php if(!empty($value)):?>
						<div class="row">
							<div class="info_label"><?php echo esc_html($item['label']); ?></div>	
							<div class="info_value"><?php echo esc_html($value); ?></div>	
						</div>
                        <?php endif;?>
                        <?php endforeach;?>
					
					</div>		
					<div class="cols">
                        <?php foreach($right_col_info as $item):?>
                        <?php
                        $value = get_post_meta( $post->ID, $item['value'], true );
                        ?>
                         <?php if(!empty($value)):?>
						<div class="row">
							<div class="info_label"><?php echo esc_html($item['label']); ?></div>	
							<div class="info_value"><?php echo esc_html($value); ?></div>	
						</div>
                        <?php endif;?>
                        <?php endforeach;?>
						<div class="row">
							<div class="info_label"><?php echo esc_html('Property Type'); ?></div>	
							<div class="info_value"><?php echo $type; ?></div>	
						</div>
					</div>			
				</div>
			</div>		
			<div class="content_info">
				<div class="content_left">	
					<hr/>				
				</div>
			</div>		
			<?php 
			if( !empty(get_the_content()) ): ?>
			
			<div id="content_info_desc" class="content_info content_info_desc">
				<div class="content_left content_info_inner info_desc">
					<div class="info_label"><?php echo esc_html('DESCRIPTION'); ?></div>	
					<div class="info_value"><?php the_content(); ?></div>	
				</div>	
			</div>	
			<?php endif; ?>		
			<div id="content_info_form" class="content_info content_info_form">
				<div class="content_left content_info_inner info_form">
					<div class="sec_form">                    
						<h2>To Schedule Showing, Please Fill Out Form Below</h2>
						<?php echo do_shortcode($form); ?>
                        <?php /*if ( get_post_meta( $post->ID, '_listing_contact_form', true) != '' ) {
				echo do_shortcode( get_post_meta( $post->ID, '_listing_contact_form', true ) );
			} elseif ( ! empty( $options['wp_listings_default_form'] ) ) {
				echo do_shortcode( $options['wp_listings_default_form'] );
			} else {
				include_once IMPRESS_IDX_DIR . 'add-ons/listings/includes/listing-templates/listing-inquiry-form.php';
				listing_inquiry_form( $post );
			} */?> 
						<p class="small">Carol Royse Team is committed to protecting and respecting your privacy. 
							By clicking Get Into Our Nice Homes, you agree that we may store and process the personal information submitted above.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>


<?php get_footer();?>