<?php
 /**
 * The template for displaying all single listings and attachments
 *
 * @package WordPress
 * @subpackage MBN
 * @since MBN
 */
    get_header();

	$postid = get_the_ID();
	
	$address 		= get_field('property_address');
	$city		 	= get_field('property_city'); 
	$state		 	= get_field('property_state');
	$zip		 	= get_field('property_zip');
	$bed	 		= get_field('property_bedrooms');
	$bath	 		= get_field('property_half_bathrooms');
	$sq_ft	 		= get_field('property_square_feet');
	$car			= get_field('property_garage');

	$price	 		= get_field('property_price');
	preg_match_all('!\d+!', $price, $matches);
	$price = number_format( implode(' ', $matches[0]) ,3, ',', '.');

	$pool	 		= get_field('property_pool');
	$year	 		= get_field('property_year_built');
	$type	 		= get_field('property_type');

	$form			= get_theme_mod('listing_option_form');

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
						<div class="text_wrap info_car"><?php echo esc_html($car . ' Car Garage');  ?></div>
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
					<div class="coming_soon_red"><?php echo esc_html('COMING SOON'); ?></div>				
					<div class="address"><?php the_title(); ?></div>			
					<div class="text_wrap info_price"><?php echo esc_html('$ ' . $price);  ?></div>
				</div>
				<div class="content_right content_info_gallery listing_gallery_wrap">

					<div class=" listing_gallery">
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
					</div>

				</div>
			</div>
			<div class="content_info content_info_main">
				<div class="content_left content_info_inner info_main">
					<div class="cols col-1">
						<div class="text_wrap info_bed"><?php echo esc_html($bed . ' Bedrooms');  ?></div>	
						<div class="text_wrap info_bath"><?php echo esc_html($bath . ' Bathrooms'); ?></div>
					</div>			
					<div class="cols col-2">
						<div class="text_wrap info_sq_ft"><?php echo esc_html($sq_ft . ' sq ft'); ?> </div>
						<div class="text_wrap info_car"><?php echo esc_html($car . ' Car Garage');  ?></div>
					</div>		
				</div>		
			</div>
			<div class="content_info content_info_btn">
				<div class="content_left content_info_inner info_btn">
					<div class="schedule_btn"><a href="" class="button primary_button"><?php echo esc_html('SCHEDULE SHOWING'); ?></a></div>				
					<div class="more_btn"><a href="" class="button light"><?php echo esc_html('MORE INFO'); ?></a></div>	
				</div>				
			</div>
			<div class="content_info content_info_addtl">
				<div class="content_left content_info_inner info_addtl">
					<div class="cols">
						<div class="row">
							<div class="info_label"><?php echo esc_html('ADDRESS'); ?></div>	
							<div class="info_value"><?php echo esc_html($address); ?></div>	
						</div>
						<div class="row">
							<div class="info_label"><?php echo esc_html('City'); ?></div>	
							<div class="info_value"><?php echo esc_html($city); ?></div>	
						</div>
						<div class="row">
							<div class="info_label"><?php echo esc_html('state'); ?></div>	
							<div class="info_value"><?php echo esc_html($state); ?></div>	
						</div>
						<div class="row">
							<div class="info_label"><?php echo esc_html('zip'); ?></div>	
							<div class="info_value"><?php echo esc_html($zip); ?></div>	
						</div>
					</div>		
					<div class="cols">
						<div class="row">
							<div class="info_label"><?php echo esc_html('pool'); ?></div>	
							<div class="info_value"><?php echo esc_html($pool); ?></div>	
						</div>
						<div class="row">
							<div class="info_label"><?php echo esc_html('year built'); ?></div>	
							<div class="info_value"><?php echo esc_html($year); ?></div>	
						</div>
						<div class="row">
							<div class="info_label"><?php echo esc_html('type'); ?></div>	
							<div class="info_value"><?php echo esc_html($type); ?></div>	
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
			if( !empty(the_content()) ): ?>
			
			<div class="content_info content_info_desc">
				<div class="content_left content_info_inner info_desc">
					<div class="info_label"><?php echo esc_html('DESCRIPTION'); ?></div>	
					<div class="info_value"><?php the_content(); ?></div>	
				</div>	
			</div>	
			<?php endif; ?>		
			<div class="content_info content_info_form">
				<div class="content_left content_info_inner info_form">
					<div class="sec_form">                    
						<h2>To Schedule Showing, Please Fill Out Form Below</h2>
						<?= do_shortcode($form); ?>
						<p class="small">Carol Royse Team is committed to protecting and respecting your privacy. 
							By clicking Get Into Our Nice Homes, you agree that we may store and process the personal information submitted above.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<?php 
    get_footer(); 