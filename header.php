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

<div id="wrapper"> 
    <header id="header" class="" data-sticky-container data-toggler=".show-menu">
        <div class="hsnav-s10 sticky" data-sticky data-options="marginTop:0">
            <div class="navbar clearfix">
                <div class="grid-container">
                    <div class="navbrand">
                        <a class="logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-2.png" alt="">
                        </a>
                        <a class="logo2" href="#"> 
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo.png" alt="">
                        </a>            

                        <span class="navicon hide-for-large" data-toggle="header">mobile menu</span>  

                        <span class="navsearch hide-for-large" data-toggle="search">search</span>  
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
                                        <i class="icn-phone dark"></i>
                                        480-776-5231
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <nav class="mobmenu hide-for-large">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'main-menu',
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
    <div id="banner" class="banner">
        <div class="hero_wrap">
           <div class="grid-container">
                <div class="banner_columns">
                    <div class="banner_col banner_col_1">
                        <h3 class="banner_subtitle">CAROL HAS THE BUYERS!</h3>
                        <h1 class="banner_title">Your Home Sold Guaranteed or Carol Will Buy It</h1>
                        <p class="banner_text">Fill out the form below to get your home price now.</p>                              
                        <div class="banner_form_wrap">                         
                            <?= do_shortcode('[gravityform id="3" title="false" description="false" ajax="false"]'); ?>
                        </div>         
                    
                        <div class="divider_double_line"></div>
                        <div class="banner_checklist">
                            <div class="text_wrap media_flex">
                                <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/check-icon.png" alt=""></figure></div>
                                <div class="media_body">
                                    <h3>Your Home Sold Guaranteed or Carol Will Buy It*</h3>
                                </div>
                            </div>
                            <div class="text_wrap media_flex">
                                <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/check-icon.png" alt=""></figure></div>
                                <div class="media_body">
                                    <h3>100% of your asking Price Guaranteed</h3>
                                </div>
                            </div>     
                            <div class="text_wrap media_flex">
                                <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/check-icon.png" alt=""></figure></div>
                                <div class="media_body">
                                    <h3>Client Satisfaction Guaranteed</h3>
                                </div>
                            </div>
                            <div class="text_wrap media_flex">
                                <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/check-icon.png" alt=""></figure></div>
                                <div class="media_body">
                                    <h3>Moving Truck for Free</h3>
                                </div>
                            </div>
                        </div>               
                    </div>
                    <div class="banner_col banner_col_2">
                        <figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_vikki-carol-tim.png" alt=""></figure>
                            
                    </div>
                </div>
           </div>
        </div>
    </div>
    <main id="content" class="content"> 