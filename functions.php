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

    // localize objects
    wp_localize_script('app', 'main_obj', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'home_url'  => home_url(),
        'theme_url' => MBN_DIR_URI,
        'nonce'     => wp_create_nonce('mbn-nonce')
    ));
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


  /* toll free buttons */
  function ct_toll_free_buttons() {
				
    $banner_right_text = get_field('banner_right_text');
    $banner_right = get_field('has_banner_right');
    $add_image = get_field('has_image');
    $add_buttons = get_field('has_call_to_action');
    
    if( $banner_right ):
          
        $returnhtml .= '<div class="grid-container">';
        $returnhtml .= '<div class="grid-x grid-margin-x cols2-s2">';
        
         if ($add_buttons): 
            // Check rows exists.
            if( have_rows('call_to_action_btns') ):

                // Loop through rows.
                while( have_rows('call_to_action_btns') ) : the_row();

                    // Load sub field value.
                    $sub_text = explode(" ", get_sub_field('sub_text'));							
                    $main_text = get_sub_field('main_text');
                            
                    $returnhtml .= '<div class="cell small-6 medium-6 large-6 col-item">';
                    $returnhtml .= '<a class="info_box" href="tel:'.$main_text.'">';
                    $returnhtml .= '<figure class="icon_wrapper"><img src="'.MBN_ASSETS_URI.'/img/phone.png" alt=""></figure>';
                    for( $i=0; $i <= count($sub_text); $i++ ){
                        $returnhtml .= '<div class="address">'. $sub_text[$i] . '</div>';
                    }
                    $returnhtml .= '<div class="phone">'.$main_text.'</div>';
                    $returnhtml .= '</a>';
                    $returnhtml .= '</div>';

                        // End loop.
                        endwhile;
                    endif;					
                endif; 
                $returnhtml .= '</div></div>';
            endif; 
        return $returnhtml;
  }
  add_shortcode('ct_contact_button', 'ct_toll_free_buttons');    