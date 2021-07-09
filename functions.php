<?php

define('MBN_DIR_URI', get_template_directory_uri());
define('MBN_DIR_PATH', get_template_directory());
define('MBN_ASSETS_URI', MBN_DIR_URI.'/resources');
define('MBN_MAP_API_KEY',"AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE");

/**
 * Theme setup
**/
function mbn_theme_setup(){

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('editor.css');
    
    // add_theme_support( 'woocommerce');
    // show_admin_bar(false);
    // set_post_thumbnail_size(1568, 9999);
    // add_image_size('small-thumbnail', '150', '100');

    // add_theme_support('custom-logo',array(
    //     'height'      => 190,
    //     'width'       => 190,
    //     'flex-width'  => false,
    //     'flex-height' => false
    // ));

    // add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    

    register_nav_menus(array(
        'main-menu'   => 'Main Menu',
    ));

}
add_action('after_setup_theme', 'mbn_theme_setup');


/**
 * Enqeueue stylesheets and scripts
**/
function mbn_enqueue_scripts(){
    global $wp_version;
    global $template;

    // Global CSS
    wp_enqueue_style('mbn-style', get_stylesheet_uri());

    // unneccessary scripts
    //wp_deregister_script('wp-embed');

    wp_enqueue_script('wp-block-library');


    // dummy handler - for using inline-css
    wp_register_style('inlinecss-handle', false);
    wp_enqueue_style('inlinecss-handle');

    wp_enqueue_style('font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', [], $wp_version);

	//Global JS
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', MBN_ASSETS_URI.'/vendor/jquery-3.4.1.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', MBN_ASSETS_URI.'/vendor/jquery-migrate-3.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery-migrate' );
    

    // Foundation JS
    wp_enqueue_script('foundation', MBN_ASSETS_URI.'/vendor/foundation/js/foundation.min.js', [], $wp_version);

    // slick
    wp_enqueue_style('slick', MBN_ASSETS_URI.'/vendor/slick/slick.css', [], $wp_version);
    wp_enqueue_script('slick', MBN_ASSETS_URI.'/vendor/slick/slick.min.js', [], $wp_version);

    // Nicescroll
    // wp_enqueue_script('nicescroll', MBN_ASSETS_URI.'/vendor/jquery.nicescroll.min.js', [], $wp_version);

    // Fancybox
    //wp_enqueue_style('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.css', [], $wp_version);
    //wp_enqueue_script('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.js', [], $wp_version);

    
    // App
    wp_enqueue_style('app', MBN_ASSETS_URI.'/css/app.css', [], $wp_version);
    wp_enqueue_script('app', MBN_ASSETS_URI.'/js/app.js', [], $wp_version, true);

    // Main
    wp_enqueue_script('main', MBN_ASSETS_URI.'/js/main.js', [], $wp_version, true);
    wp_enqueue_style('main', MBN_ASSETS_URI.'/css/main.css', [], $wp_version);
    
    // Blocks
    wp_enqueue_style('blocks', MBN_ASSETS_URI.'/css/blocks.css', [], $wp_version);

    // Fonts
    wp_enqueue_style('custom-fonts', 'https://use.typekit.net/arq8hcm.css', [], $wp_version);

    //fontawesome    
    wp_enqueue_style(
        'font-awesome',
        "//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
    );

    // localize objects
    wp_localize_script('app', 'main_obj', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'home_url'  => home_url(),
        'theme_url' => MBN_DIR_URI,
        'nonce'     => wp_create_nonce('mbn-nonce')
    ));


    // google maps
    //
    // $api_key = apply_filters( 'mbn-google-api-key', MBN_MAP_API_KEY );
    // wp_enqueue_script(
    //     'google-maps-api-v3',
    //     'https://maps.googleapis.com/maps/api/js?' . http_build_query( array(
    //         'v'         => '3',
    //         'libraries' => 'places',
    //         'language'  => substr( get_locale(), 0, 2 ),
    //         'key'       => $api_key,
    //     ) ),
    //     array(),
    //     '3',
    //     false
    // );

}
add_action('wp_enqueue_scripts', 'mbn_enqueue_scripts', 20);


// remove wp emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * Register sidebars
**/
function mbn_register_sidebars(){
    // footer menus
    for($i=1;$i<=5;$i++){
        register_sidebar(array(
            'name'          => __('Footer Column '.$i),
            'id'            => 'footer-col-'.$i,
            'before_widget' => false,
            'after_widget'  => false,
            'before_title'  => false,
            'after_title'   => false,
        ));
    }
}
add_action('widgets_init', 'mbn_register_sidebars');


/**
 * Allow SVG
**/
function mbn_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'mbn_myme_types');


require MBN_DIR_PATH.'/includes/post-types.php';
require MBN_DIR_PATH.'/includes/shortcodes.php';
require MBN_DIR_PATH.'/includes/public-hooks.php';
require MBN_DIR_PATH.'/includes/admin-hooks.php';


add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']}</button>";
}

function ct_custom_new_menu() {
    register_nav_menu('secondary',__( 'Secondary Menu' ));
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
    register_nav_menu('sell-menu',__( 'Sell Your Home Menu' ));
    register_nav_menu('buy-menu',__( 'Buy A Home Menu' ));
    register_nav_menu('additional-menu',__( 'Additional Links' ));
    register_nav_menu('footer-mobile-menu',__( 'Footer Mobile Menu' ));
  }
  add_action( 'init', 'ct_custom_new_menu' );

function mbn_insert_headers(){
    ?><link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"/><?php
}
add_action('wp_head', 'mbn_insert_headers');

add_filter( 'wpsl_info_window_template', 'custom_info_window_template' );

function custom_info_window_template() {

    global $wpsl_settings, $wpsl;
 
    $info_window_template = '<div data-store-id="<%= id %>" class="wpsl-info-window">' . "\r\n";
    $info_window_template .= "\t\t\t" . '<%= thumb %>' . "\r\n";
    $info_window_template .= "\t\t" . '<div class="location_info">' . "\r\n";
    $info_window_template .= "\t\t\t" . '<h3>' . wpsl_store_header_template() . '</h3>' . "\r\n";  // Check which header format we use
    $info_window_template .= "\t\t\t" . '<p><span><%= address %> ' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<%= address2 %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t\t" . '</span><span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format
    $info_window_template .= "\t\t" . '</p>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( phone ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><strong><%= formatPhoneNumber( phone ) %></strong></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( fax ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><%= fax %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t\t" . '<% if ( email ) { %>' . "\r\n";
    $info_window_template .= "\t\t" . '<span><%= formatEmail( email ) %></span>' . "\r\n";
    $info_window_template .= "\t\t" . '</div>' . "\r\n";
    $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
    $info_window_template .= "\t" . '</div>';
    
    return $info_window_template;
}

//remove thumbnail and directions in listings
add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {

    global $wpsl_settings;
    
    $listing_template = '<li class="loc_item" data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div class="loc_inner">' . "\r\n";
    $listing_template .= "\t\t\t\t" . wpsl_store_header_template( 'listing' ) . "\r\n"; // Check which header format we use
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
    $listing_template .= "\t\t" . '</div>' . "\r\n";

    if ( !$wpsl_settings['hide_distance'] ) {
        $listing_template .= "\t\t" . '<%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] ) . '' . "\r\n";
    }
    $listing_template .= "\t" . '</li>';

    return $listing_template;
}

add_filter( 'wpsl_thumb_size', 'custom_thumb_size' );

function custom_thumb_size() {
    
    $size = 'full';
    
    return $size;
}

add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'slick_below',
        'name' => 'Store list below map with slick',
        'path' => MBN_DIR_URI . '/wpsl-templates/custom_slick.php',
    );

    return $templates;
}
