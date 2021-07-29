<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" type="image/png" href="<?php echo MBN_ASSETS_URI ?>/img/favicon.png"> -->
    <!-- <title><?php bloginfo('title') ?></title> -->

    <?php wp_head() ?>

</head>
<body <?php body_class() ?>>

<div id="wrapper" class="<?php echo ( get_field('page_header_options') == 'no_header' )? 'disabled_header' : '' ?>" > 
    <header id="header" class="" data-sticky-container data-toggler=".show-menu">
        <div class="hsnav-s10 sticky" data-sticky data-options="marginTop:0"> 
            <div class="navbar clearfix">                               
                <div class="grid-container"> 
                    <div class="navbrand">                        
                        <div class="logo_desktop">
                            <a class="logo" href="<?php echo get_home_url(); ?>">
                                <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-2.png" alt="">
                            </a>
                            <a class="logo2" href="#"> 
                                <img src="<?php echo MBN_ASSETS_URI ?>/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="logo_mobile_wrap">
                            <a class="logo_mobile_1" href="#"> 
                                <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-mobile.png" alt="">
                            </a>  
                            <a class="logo_mobile_2" href="#"> 
                                <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-mobile-2.png" alt="">
                            </a>  
                        </div>     
                        <a class="navicon hide-for-large" data-toggle="header"><span class="nav_label_1">Menu</span><span class="nav_label_2">Back</span></a>  
                        <a href="tel:4807765231" class="navphone hide-for-large"><span>Call Now<span></a>  

                    </div>
                    <nav class="navmenu show-for-large">
                        
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'main-menu',
                                'menu'         => '',
                                'container'    => 'ul',
                                'items_wrap' => '<ul class="menu align-right dropdown" data-dropdown-menu>%3$s</ul>' ,
                                'menu_class'   => 'menu align-right dropdown',
                            ));
                        ?> 
                        <div class="secondary-menu">
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'secondary',
                                    'menu'       => '',
                                    'container'  => 'ul',
                                    'items_wrap' => '<ul class="menu align-right dropdown" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
                                    'menu_class'   => 'menu align-right dropdown',
                                ));
                            ?>                        

                            <div class="navutil">                                
                                <div class="toll-free">
                                    <span>Call Carol Today</span> 
                                    <a href="tel:4807765231">
                                        480-776-5231
                                    </a>
                                </div>
                            </div>          

                        </div>
                    </nav>
                    <nav class="mobmenu hide-for-large">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'footer-mobile-menu',
                                'menu'       => '',
                                'container'  => '',
                                'items_wrap' => '<ul class="menu accordion-menu" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">%3$s</ul>' 
                            ));
                        ?> 
                    </nav>
                </div>   
            </div>
        </div>  
    </header>

    <?php
    //button scroll up
    echo ( get_theme_mod('enable_buttonUp_scroll') )? '<button data-scroll="up" class="btn_scroll_up"><span>UP</span></button>' : ''; 
    ?>

    <?php
    
global $template, $post;

$page_slug = $post->post_name .'_page';


?>
    <main id="content" class="content <?php echo esc_attr($page_slug) ?> "> 
        <?php 
            //if(is_home()) {
            //    get_template_part( 'templates/blog-head' );
            //} else {
                get_template_part( 'templates/page-head' );
            //}
        ?>