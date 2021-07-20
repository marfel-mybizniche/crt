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
	'title' => 'Header',
	'description'=> '',
	'priority' => 80,
	));
	
	// add a setting for the global header
	$wp_customize->add_setting('global_header_img');

	// Add a control to upload the bg
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'global_header_img',
	array(
	'label' => 'Upload Global Header Background',
	'section' => 'global_header',
	'settings' => 'global_header_img',
	) ) );


}
add_action('customize_register', 'mbn_new_customizer_settings');
