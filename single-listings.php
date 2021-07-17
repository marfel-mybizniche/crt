<?php
 /**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage MBN
 * @since MBN
 */
    get_header();

	$postid = get_the_ID();

	var_dump(get_post($postid));
	
	$address = get_field('property_address').' '.get_field('property_city').' '.get_field('property_state').', '.get_field('property_zip');
	$bed	 = get_field('property_bedrooms');
	$bath	 = get_field('property_half_bathrooms');
	$sq_ft	 = get_field('property_square_feet');
	$car	 = get_field('property_garage');
?>
<div class="listing_sticky_info ">
	<div class="grid-x cols3-s1">
		<div class="cell medium-4 large-12">
			<div class="sticky_info_left">
				<div class="coming-soon"><?php echo esc_html('COMING SOON'); ?>				
				<div class="address"><?php echo esc_html($address); ?>
			</div>
		</div>
		<div class="cell medium-8 large-12">
			<div class="sticky_info_right">
				<div class="text_wrap info_bed"><?php echo esc_html($bed);  ?></div>
				<div class="text_wrap info_bath"><?php echo esc_html($bath); ?></div>
				<div class="text_wrap info_sq_ft"><?php echo esc_html($sq_ft);  ?></div>
				<div class="text_wrap info_car"><?php echo esc_html($car);  ?></div>
			</div>
		</div>
</section>

<?php 
    get_footer(); 