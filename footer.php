

    </main>
    
    <footer id="footer" class="footer">
        <div class="grid-container">
            <div class="foottop">
                <div class="foot_logo">
                        <a class="logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-2.png" alt="">
                        </a>
                        
                        <a class="logo_mobile" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/footer-logo-mobile.png" alt="">
                        </a>
                        
                    </div>
                <div class="foot_contact">
                    <div class="foot_contact_text"><a class="">Download Our App</a></div>
                    <div class="foot_contact_img">
                        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/download-app-store.png" alt=""></figure>
                        <figure><img src="<?php echo MBN_ASSETS_URI ?>/img/download-android-store.png" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="footer_wrap">
                <div class="grid-container"> 
                    <div class="grid-x ct_margin_both_0 cols4-s2 footer_desktop">
                        <div class="cell medium-6 large-3 xlarge-3 col-item">                       
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'footer-menu',
                                    'menu'         => '',
                                    'container'    => 'ul',
                                    'items_wrap' => '<ul class="footer_menu">%3$s</ul>' ,
                                    'menu_class'   => 'footer_menu',
                                ));
                            ?> 
                        </div>
                        <div class="cell medium-6 large-3 xlarge-3 col-item">                  
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'sell-menu',
                                    'menu'         => '',
                                    'container'    => 'ul',
                                    'items_wrap' => '<ul class="footer_menu bulleted_menu">%3$s</ul>' ,
                                    'menu_class'   => 'footer_menu bulleted_menu',
                                ));
                            ?> 
                        </div>
                        <div class="cell medium-6 large-3 xlarge-3 col-item">                  
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'buy-menu',
                                    'menu'         => '',
                                    'container'    => 'ul',
                                    'items_wrap' => '<ul class="footer_menu bulleted_menu">%3$s</ul>' ,
                                    'menu_class'   => 'footer_menu bulleted_menu',
                                ));
                            ?> 
                        </div>
                        <div class="cell medium-6 large-3 xlarge-3 col-item">                
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'additional-menu',
                                    'menu'         => '',
                                    'container'    => 'ul',
                                    'items_wrap' => '<ul class="footer_menu additional_menu" >%3$s</ul>' ,
                                    'menu_class'   => 'footer_menu',
                                ));
                            ?> 
                        </div>
                    </div>                    
                    <div class="footer_mobile">                  
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'footer-mobile-menu',
                                'menu'         => '',
                                'container'    => 'ul',
                                'items_wrap' => '<ul class="footer_menu footer_mobile_menu">%3$s</ul>' ,
                                'menu_class'   => 'footer_menu footer_mobile_menu',
                            ));
                        ?> 
                    </div>
                </div>
            </div>
            
            <div class="footer_bottom_top">
                <a href="#">PRIVACY POLICY</a>
                <a href="#">TERMS AND CONDITIONS</a>
            </div>
            <div class="footer_bottom">
                <div class="footer_bottom_left">
                    <div class="copyright"><?php echo date('Y'); ?> &copy; <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Carol Royse Team</a> | </div>        
                    <div class="designby"> Website Design <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">by: My Biz Niche</a></div>
                </div>
                <div class="footer_bottom_right">
                    <a href="#">PRIVACY POLICY</a>
                    <a href="#">TERMS AND CONDITIONS</a>
                </div>
            </div>
        </div>
    </footer>
</div>  

<?php wp_footer() ?>

</body>
</html>