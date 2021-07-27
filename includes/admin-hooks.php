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
	'title' 	=> __('Global Options'),
	'priority' 	=> 80,
	));

	$wp_customize->add_setting('global_header_img');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'global_header_img',
	array(
	'label' 	=> __('Upload Global Header Image'),
	'section' 	=> 'global_header',
	'settings' 	=> 'global_header_img',
	) ) );
	
	//button scrollup

	$wp_customize->add_setting('enable_buttonUp_scroll');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_buttonUp_scroll',
	array(
	'label' 	=> __('Enable Button Up Scroll'),
	'section' 	=> 'global_header',
	'settings' 	=> 'enable_buttonUp_scroll',
	'type' 		=> 'checkbox'
	) ) );	

	//floating add	

	$wp_customize->add_setting('floating_ad_img');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'floating_ad_img',
	array(
	'label' 	=> __('Upload Floating Ad Banner'),
	'section' 	=> 'global_header',
	'settings' 	=> 'floating_ad_img',
	'directions'=> __('Enable Banner ad by uploading image.'),
	) ) );


	//Listing
	
	$wp_customize->add_section('listing_options', array(
	'title' 	=> __('Listing Page Options'),
	'priority' 	=> 90,
	));
		
	

	$wp_customize->add_setting('archive_listing_header_img');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_listing_header_img',
	array(
	'label' 	=> __('Upload Archive Listing Header Banner'),
	'section' 	=> 'listing_options',
	'settings' 	=> 'archive_listing_header_img',
	) ) );


	$wp_customize->add_setting('listing_option_form');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'listing_option_form',
	array(
	'label' 	=> __('Add shortcode for the form for Single Listing Page'),
	'section' 	=> 'listing_options',
	'settings' 	=> 'listing_option_form',
	) ) );

	



}
add_action('customize_register', 'mbn_new_customizer_settings');
