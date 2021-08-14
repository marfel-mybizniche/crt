<?php


// Register courses Post Type
function courses_post() {
    register_post_type( 'course',
        array(
            'labels'    => array(
                'name' => __( 'Courses' ),
                'singular_name' => __('Course')
            ),
            'public'        => true,
            'has_archive'   => true,
            'show_in_rest'  => true,
            'menu_position' => 20,
            'with_front' => true,
            'supports'      =>  array('title', 'editor', 'page-attributes', 'thumbnail'),
            'menu_icon'     => 'dashicons-editor-paragraph',
        )
    );

    register_taxonomy(  
        'courses',
        'course',
        array(
            'hierarchical' => true,         
            'has_archive' => true,
            'label' => 'Categories',            
            'query_var' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            /*'rewrite' => array(
                'slug' => 'courses',
                'with_front' => true  
            )*/
        )
    );
}
//add_action( 'init', 'courses_post' ); 



function cptui_register_my_cpts_listings() {

	/**
	 * Post Type: Listings.
	 */

	$labels = [
		"name" => __( "Listings", "custom-post-type-ui" ),
		"singular_name" => __( "Listing", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Listings", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "listings", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-home",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "listings", $args );
}

add_action( 'init', 'cptui_register_my_cpts_listings' );


function cptui_register_my_taxes_listings_cat() {

	/**
	 * Taxonomy: Category.
	 */

	$labels = [
		"name" => __( "Category", "custom-post-type-ui" ),
		"singular_name" => __( "Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Category", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'listings_cat', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "listings_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "listings_cat", [ "listings" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_listings_cat' );

function cptui_register_my_cpts() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __( "Testimonials", "custom-post-type-ui" ),
		"singular_name" => __( "Testimonial", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Testimonials", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "client_testimonials", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-chat",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "client_testimonials", $args );

	/**
	 * Post Type: Offices.
	 */

	$labels = [
		"name" => __( "Offices", "custom-post-type-ui" ),
		"singular_name" => __( "Office", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Offices", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "offices", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "offices", $args );

	/**
	 * Post Type: Videos.
	 */

	$labels = [
		"name" => __( "Videos", "custom-post-type-ui" ),
		"singular_name" => __( "Video", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Videos", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "videos", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "videos", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_client_testimonials() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __( "Testimonials", "custom-post-type-ui" ),
		"singular_name" => __( "Testimonial", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Testimonials", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "client_testimonials", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-chat",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "client_testimonials", $args );
}

add_action( 'init', 'cptui_register_my_cpts_client_testimonials' );


function cptui_register_my_cpts_offices() {

	/**
	 * Post Type: Offices.
	 */

	$labels = [
		"name" => __( "Offices", "custom-post-type-ui" ),
		"singular_name" => __( "Office", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Offices", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "offices", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "offices", $args );
}

add_action( 'init', 'cptui_register_my_cpts_offices' );


function cptui_register_my_cpts_videos() {

	/**
	 * Post Type: Videos.
	 */

	$labels = [
		"name" => __( "Videos", "custom-post-type-ui" ),
		"singular_name" => __( "Video", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Videos", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "videos", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "videos", $args );
}

add_action( 'init', 'cptui_register_my_cpts_videos' );


function cptui_register_my_taxes_video_cat() {

	/**
	 * Taxonomy: Videos Category.
	 */

	$labels = [
		"name" => __( "Category", "custom-post-type-ui" ),
		"singular_name" => __( "Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Category", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_cat', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "video_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "video_cat", [ "videos" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_video_cat' );


function cptui_register_my_cpts_vendors() {

	/**
	 * Post Type: Vendors.
	 */

	$labels = [
		"name" => __( "Vendors", "custom-post-type-ui" ),
		"singular_name" => __( "Vendor", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Vendors", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "vendors_type", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-store",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vendors_type", $args );
}

add_action( 'init', 'cptui_register_my_cpts_vendors' );


function cptui_register_my_taxes_vendors_cat() {

	/**
	 * Taxonomy: Vendors Category.
	 */

	$labels = [
		"name" => __( "Category", "custom-post-type-ui" ),
		"singular_name" => __( "Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Category", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'vendors_cat', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "vendors_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "vendors_cat", [ "vendors_type" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_vendors_cat' );





function cptui_register_my_cpts_sold_listings() {

	/**
	 * Post Type: Listings.
	 */

	$labels = [
		"name" => __( "Sold Listings", "custom-post-type-ui" ),
		"singular_name" => __( "Sold Listing", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Sold Listings", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "sold-listings", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-home",
		"supports" => [ "title", "editor", "thumbnail","page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "sold-listings", $args );
}

add_action( 'init', 'cptui_register_my_cpts_sold_listings' );