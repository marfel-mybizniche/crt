

    </main>
    
    <footer id="footer" class="footer">
        <div class="grid-container">
            <div class="foottop">
                <div class="foot_logo">
                        <a class="logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-2.png" alt="">
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
                <div class="footer_4_cols footer_col_1">                        
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
                <div class="footer_4_cols footer_col_2">                        
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
                <div class="footer_4_cols footer_col_3">                   
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
                <div class="footer_4_cols footer_col_4">                   
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
            <div class="footer_bottom">
                <div class="copyright"><?php echo date('Y'); ?> &copy; <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Carol Royse Team</a> | </div>        
                <div class="designby"> Website Design <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">by: My Biz Niche</a></div>
            </div>
        </div>
    </footer>
</div>  

<?php wp_footer() ?>

</body>
</html>