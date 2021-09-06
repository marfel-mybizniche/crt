<?php

include_once('mbn-login/setup.php');

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

add_image_size("sold_listing_thumb",450,267,true);
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
    wp_enqueue_style('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.css', [], $wp_version);
    wp_enqueue_script('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.js', [], $wp_version);

    
    // App
    wp_enqueue_style('app', MBN_ASSETS_URI.'/css/app.css', [], $wp_version);
    wp_enqueue_script('app', MBN_ASSETS_URI.'/js/app.js', [], $wp_version, true);

    // Main
    //wp_enqueue_script('main', MBN_ASSETS_URI.'/js/main.js', [], $wp_version, true);
    //wp_enqueue_style('main', MBN_ASSETS_URI.'/css/main.css', [], $wp_version);
    
    // Blocks
    //wp_enqueue_style('blocks', MBN_ASSETS_URI.'/css/blocks.css', [], $wp_version);

    // Fonts
    wp_enqueue_style('custom-fonts', 'https://use.typekit.net/arq8hcm.css', [], $wp_version);
    wp_enqueue_style('font-lato', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap', [], $wp_version);
    wp_enqueue_style('font-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,600;1,700;1,900&display=swap', [], $wp_version);

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
/*
function ct_custom_new_menu() {
    register_nav_menu('secondary',__( 'Secondary Menu' ));
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
    register_nav_menu('sell-menu',__( 'Sell Your Home Menu' ));
    register_nav_menu('buy-menu',__( 'Buy A Home Menu' ));
    register_nav_menu('additional-menu',__( 'Additional Links' ));
    register_nav_menu('footer-mobile-menu',__( 'Footer Mobile Menu' ));
  }
add_action( 'init', 'ct_custom_new_menu' );*/

function my_acf_format_value_for_api($value, $post_id, $field){
	return str_replace( ']]>', ']]>', apply_filters( 'the_content', $value) );
}
function my_on_init(){
	if(!is_admin()){
		add_filter('acf/format_value_for_api/type=wysiwyg', 'my_acf_format_value_for_api', 10, 3);
	}
}
add_action('init', 'my_on_init');



function mbn_insert_headers(){
    ?>
    <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   
    <?php
}
add_action('wp_head', 'mbn_insert_headers');

//page type for templates

/** Get page type, eg. for customizer option */
function mbn_page_title() {
	global $template;

	if ( strpos( $template, 'archive-listings.php' ) ) {
		$title = 'listings';
	}
	elseif ( strpos( $template, 'archive-vendors.php' ) ) {
		$title = 'vendors';
	}
    else {
        $title = get_the_title();
    }

    return $title;
}


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

    if( !empty( $id )) :
        $id = trim($id);
    endif;
    $url = 'https://vimeo.com/api/v2/video/'.$id.'.php';

    if ( $id == '' ) {
        return FALSE;
    }

    $apiData = unserialize( file_get_contents( $url ) );

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

function build_find_office_map(){ 

    wp_reset_query();

    $office_args = array(  
        'post_type' => 'offices',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    );
    
    $office_loop = new WP_Query( $office_args );
   
    $returnhtml .= '<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>';
    $returnhtml .= '<script src="https://maps.googleapis.com/maps/api/js?key='. MBN_MAP_API_KEY .'&callback=initMap&libraries=&v=weekly" defer></script>';
    ?>
    <script>function initMap() {
     
        const myLatlng = { lat: 33.3344657, lng: -111.8984525 };
    
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatlng,
        });
    
    
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();  
        
        var markers_array = new Array();
        var locations = [];
        var array_holder;
        var loc_content = "";
        var loc_ctr = 0;
        var emp_phones = "";
    
        <?php 
        
        if( $office_loop->have_posts() ):
            
            while ( $office_loop->have_posts() ) : $office_loop->the_post(); ?>
                <?php if(!empty(get_field('location_map'))): ?>
                    <?php //var_dump( get_field('map') ); ?>
                    var loc_title = '<?php the_title(); ?>';
                    var office_lat = <?php echo get_field('location_map')['lat']; ?>; 
                    var office_lng = <?php echo get_field('location_map')['lng']; ?>;
            
                    loc_content = '<div id="mapInfo'+loc_ctr+'" class="map_grid grid-container">';
                    loc_content += '<div class="grid-x align-top">';
            
                    loc_content += '<div class="cell medium-12">';       
                    <?php if( !empty(get_the_post_thumbnail_url()) ) :?>
                    loc_content += '<figure class="loc_img"><img src="<?php echo esc_html( get_the_post_thumbnail_url() );?>"/></figure>';
                    <?php endif; ?>
                    loc_content += '<div class="loc_body">';
                    loc_content += '<h2 class="office_map_title">'+ loc_title +'</h2>';
                    loc_content += '<p class="office_address"><?php echo esc_html(get_field('location_map')['address']); ?></p>';
                    loc_content += '<p class="office_phone"><?php echo esc_html(get_field('location_phone')); ?></p>';
                    loc_content += '</div></div>';        
            
                    loc_content += '</div></div>';
            
                    array_holder = [loc_title, office_lat, office_lng, loc_content];
                    locations.push(array_holder);
                    loc_ctr = loc_ctr+1;
                <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>   
                loc_content +='<p style="text-align:center">'<?php echo esc_html('Sorry, no posts were found.' ) ?>'</p>';

        <?php endif; ?>
        
        for (var i = 0; i < locations.length; i++) {
          
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            bounds.extend(marker.position);
            
            infowindow.setContent(locations[0][3]);
            infowindow.open(map, marker);
            
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][3]);
                    infowindow.open(map, marker);
                    map.setCenter(this.getPosition());
                }
            })(marker, i));
    
          markers_array.push(marker);
        }
    
        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);
      
    
        //(optional) restore the zoom level after the map is done scaling
        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(10);
            google.maps.event.removeListener(listener);
        });
    
        
        $('.branch_wrap').each(function(i){
            $(this).on('click', function(e){
                google.maps.event.trigger(markers_array[i], 'click');
                e.preventDefault();
            });
        });
    
    
    }</script>
    
    <?php 
        return $returnhtml;
    }
add_action('wp_head', 'build_find_office_map');

function add_acf_body_class($class) {
	$value = get_field('add_page_specific_class');
	$class[] = $value;
	return $class;
}
add_filter('body_class', 'add_acf_body_class');

//Add fancybox to WordPress Gutenberg Gallery block
add_filter('the_content', 'fancybox_for_gutenberg_gallery');
function fancybox_for_gutenberg_gallery($content) {
	global $post;
	$pattern ="/<li class=\"blocks-gallery-item\"><figure><a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
	$replacement = '<li class="blocks-gallery-item"><figure><a$1href=$2$3.$4$5 data-fancybox="gallery" title="'.$post->post_title.'"$6>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}