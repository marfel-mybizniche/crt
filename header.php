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
                                'menu_class'   => '',
                            ));
                        ?> 
                        <div class="secondary-menu">
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'secondary',
                                    'menu'       => '',
                                    'container'  => 'ul',
                                    'items_wrap' => '<ul class="menu align-right dropdown" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
                                    'menu_class'   => '',
                                ));
                            ?>                        

                            <div class="navutil">
                                
                                <div class="toll-free">
                                    <span>Toll Free Number</span> 
                                    <a href="tel:18886651270">
                                        <i class="icn-phone dark"></i>
                                        0.000.000.000
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
        
    </header>
    <main id="content" class="content"> 