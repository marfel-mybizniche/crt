<?php

/**
 * Custom Field Map Api
 */
function mbn_acf_google_map_api($api){
	$api['key'] = MBN_MAP_API_KEY;
	
	return $api;
}
add_filter('acf/fields/google_map/api', 'mbn_acf_google_map_api');

/**
* Create Gloabl Header Bg Setting and Upload Control
*/
function mbn_new_customizer_settings($wp_customize) {

	// Add Global Header Section
	$wp_customize->add_section('global_header', array(
	'title' => __('Header'),
	'description'=> '',
	'priority' => 80,
	));

	$wp_customize->add_setting('global_header_img');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'global_header_img',
	array(
	'label' => __('Upload Global Header Background'),
	'section' => 'global_header',
	'settings' => 'global_header_img',
	) ) );


	//Listing
	
	$wp_customize->add_section('listing_options', array(
		'title' => __('Listing Page Options'),
		'description'=> '',
		'priority' => 90,
	));
		
	

	$wp_customize->add_setting('archive_listing_header_img');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_listing_header_img',
	array(
	'label' => __('Upload Archive Listing Header Banner'),
	'section' => 'listing_options',
	'settings' => 'archive_listing_header_img',
	) ) );


	$wp_customize->add_setting('listing_option_form');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'listing_option_form',
	array(
	'label' => __('Add shortcode for the form for Single Listing Page'),
	'section' => 'listing_options',
	'settings' => 'listing_option_form',
	) ) );


}
add_action('customize_register', 'mbn_new_customizer_settings');
