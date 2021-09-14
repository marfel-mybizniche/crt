

    </main>
    
    <footer id="footer" class="footer">
        <div class="grid-container">
            <div class="foottop">
                <div class="foot_logo">
                        <a class="logo" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-2.svg" alt="">
                        </a>
                        
                        <a class="logo_mobile" href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo MBN_ASSETS_URI ?>/img/logo-mobile-2.svg" alt="">
                        </a>
                        
                    </div>
                <div class="foot_contact">
                    <div class="foot_contact_text"><a class="">Download Our App</a></div>
                    <div class="foot_contact_img">
                        <figure><a href="https://apps.apple.com/tt/app/carol-royse-team/id1497073904" target="_blank"><img src="<?php echo MBN_ASSETS_URI ?>/img/download-app-store.png" alt=""></a></figure>
                        <figure><a href="https://play.google.com/store/apps/details?id=com.carolroyseteam.main" target="_blank"><img src="<?php echo MBN_ASSETS_URI ?>/img/download-android-store.png" alt=""></a></figure>
                    </div>
                </div>
            </div>
            <div class="footer_wrap">
                <div class="grid-x ct_margin_both_0 cols4-s2 footer_desktop">
                    <div class="cell medium-6 large-3 xlarge-3 col-item">                                      
                        <?php 
                        if ( is_active_sidebar( 'footer-col-1' ) ) :
                            dynamic_sidebar( 'footer-col-1' );
                        endif; 
                        ?>
                    </div>
                    <div class="cell medium-6 large-3 xlarge-3 col-item">
                        <?php 
                        if ( is_active_sidebar( 'footer-col-2' ) ) :
                            dynamic_sidebar( 'footer-col-2' );
                        endif; 
                        ?>
                    </div>
                    <div class="cell medium-6 large-3 xlarge-3 col-item"> 
                        <?php 
                        if ( is_active_sidebar( 'footer-col-3' ) ) :
                            dynamic_sidebar( 'footer-col-3' );
                        endif; 
                        ?>
                    </div>
                    <div class="cell medium-6 large-3 xlarge-3 col-item">     
                        <?php 
                        if ( is_active_sidebar( 'footer-col-4' ) ) :
                            dynamic_sidebar( 'footer-col-4' );
                        endif; 
                        ?>
                    </div>
                </div>                    
                <div class="footer_mobile">        
                    <?php 
                    if ( is_active_sidebar( 'mobile-menu-widget' ) ) :
                        dynamic_sidebar( 'mobile-menu-widget' );
                    endif; 
                    ?>
                </div>
            </div>
            
            <div class="footer_bottom_top">
                
                <?php 
                if ( is_active_sidebar( 'footer-bottom-sidebar' ) ) :
                    dynamic_sidebar( 'footer-bottom-sidebar' );
                endif; 
                ?>
            </div>
            <div class="footer_bottom">
                <div class="footer_bottom_left">
                    <div class="copyright"><?php echo date('Y'); ?> &copy; Carol Royse Team | </div>        
                    <div class="designby"> <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Website Design by:</a> My Biz Niche</div>
                </div>
                <div class="footer_bottom_right"> 
                    <?php 
                    if ( is_active_sidebar( 'footer-bottom-sidebar' ) ) :
                        dynamic_sidebar( 'footer-bottom-sidebar' );
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </footer>
</div>  
<?php wp_footer() ?>

<?php
    //floating banner ad   

    if( !empty(get_theme_mod('floating_ad_img')) ): ?>

        <div class="floating_ad_banner">
            <figure>
                <img src="<?php echo esc_url(get_theme_mod('floating_ad_img')); ?>" />
            </figure>
        </div>

   <?php endif;?>

</body>
</html>