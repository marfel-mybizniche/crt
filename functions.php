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


//check video type if vimeo or youtube
function videoType($url) {
    if (strpos($url, 'youtu') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
        return 'unknown';
    }
}

  /**
     * Gets the thumbnail url for a vimeo video using the video id. This only works for public videos.
     *
     * @param string $id        The video id.
     * @param string $thumbType Thumbnail image size. supported sizes: small, medium (default) and large.
     *
     * @return string|bool
     */

function getVimeoVideoThumbnailByVideoId( $id = '', $thumbType = 'medium' ) {

    $id = trim($id);

    if ( $id == '' ) {
        return FALSE;
    }

    $apiData = unserialize( file_get_contents( "http://vimeo.com/api/v2/video/$id.php" ) );

    if ( is_array( $apiData ) && count( $apiData ) > 0 ) {

        $videoInfo = $apiData[ 0 ];

        switch ( $thumbType ) {
            case 'small':
                return $videoInfo[ 'thumbnail_small' ];
                break;
            case 'large':
                return $videoInfo[ 'thumbnail_large' ];
                break;
            case 'medium':
                return $videoInfo[ 'thumbnail_medium' ];
            default:
                break;
        }

    }

    return FALSE;

}

//get video id for vimeo and youtube
function get_video_id($url){

    $video_type = videoType($url);

    if( $video_type == 'youtube'){

        preg_match('#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#', $url, $match);
        $video_id = $match[0];        
        
    }
    else {

        $video_id =(int) substr(parse_url($url, PHP_URL_PATH), 1);
    
    }

    return $video_id;

}

//get video thumb for vimeo and youtube
function get_video_thumb($url){

        $video_type = videoType($url);
        $video_id = get_video_id($url);

        if( $video_type == 'youtube'){
            $video_thumb = 'http://img.youtube.com/vi/'. $video_id .'/sddefault.jpg';    
        }
        else {            
            $video_thumb = getVimeoVideoThumbnailByVideoId($video_id);                
        }
    return $video_thumb;

}

