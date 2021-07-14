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
		"supports" => [ "title", "thumbnail" ],
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
