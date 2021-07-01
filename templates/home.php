<?php 
    /* Template Name: Home template */
    get_header();
?>

    <section class="hero hero-s4">
        <!-- Hero Desktop -->
        <div class="hero-block hero-block_desktop">
            <figure class="bg"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_hero-bg.jpg" alt=""></figure>
            <div class="grid-container"> 
                <div class="grid-x hero-caption">
                    <div class="cell large-7 hero-caption">
                        <h3 class="banner_subtitle">CAROL HAS THE BUYERS!</h3>
                        <h1>Your Home Sold Guaranteed or Carol Will Buy It</h1>
                        <p>Fill out the form below to get your home price now.</p>                              
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
                    <div class="cell small-10 small-offset-1 large-5 large-offset-0 align-self-bottom">
                        <figure class="right_img text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_vikki-carol-tim.png" alt=""></figure>                        
                        <div class="text_wrap text-center right_text">
                            <h2 class="ct_margin_both_0">Carol Royse</h2>
                            <p class="small">REAL ESTATE EXPERT & RADIO HOST <Br/>OF THE CAROL ROYSE REAL ESTATE RADIO SHOW</p>
                        </div>                      
                        <div class="text_wrap row_column_flex text-center">
                            <div class="row_col row_col_3">
                                <h2 class="ct_margin_both_0">Vikki</h2>
                                <h3>Royse-Middlebrook</h3>
                            </div>
                            <div class="row_col_3 row_column_flex">                                
                                <div class="row_col_2">
                                    <figure class="text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/logo-ktar.png" alt=""></figure>
                                    <span>
                                        <p class="ct_twoline_text tiny">Saturday</p>
                                        <p class="ct_twoline_text tiny">2:00 to 3:00pm</p>
                                    </span>
                                </div>                                
                                <div class="row_col row_col_2">
                                    <figure class="text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/logo-550kfyi.png" alt=""></figure>
                                    <span>
                                        <p class="ct_twoline_text tiny">Sunday</p>
                                        <p class="ct_twoline_text tiny">2:00 to 3:00pm</p>
                                    </span>
                                </div>
                            </div>
                            <div class="row_col row_col_3">
                                <h2 class="ct_margin_both_0 ct_twoline_text">Tim</h2>
                                <h2 class="ct_margin_both_0 ct_twoline_text">Evans</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <!-- Hero Mobile -->
        
        <div class="hero-block_mobile">
            <div class="hero-block hero_mobile_top">
                <figure class="bg"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_hero-bg.jpg" alt=""></figure>
                <div class="grid-container"> 
                    <div class="grid-x hero-caption">
                        <div class="cell small-10 small-offset-1 large-5 large-offset-0 align-self-bottom">
                            <figure class="right_img text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_vikki-carol-tim.png" alt=""></figure>                        
                            <div class="text_wrap text-center right_text">
                                <h2 class="ct_margin_both_0">Carol Royse</h2>
                                <p class="small">REAL ESTATE EXPERT & RADIO HOST <Br/>OF THE CAROL ROYSE REAL ESTATE RADIO SHOW</p>
                            </div>                      
                            <div class="text_wrap row_column_flex text-center">
                                <div class="row_col row_col_3">
                                    <h2 class="ct_margin_both_0">Vikki</h2>
                                    <h3>Royse-Middlebrook</h3>
                                </div>
                                <div class="row_col_3 row_column_flex">                                
                                    <div class="row_col_2">
                                        <figure class="text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/logo-ktar.png" alt=""></figure>
                                        <span>
                                            <p class="ct_twoline_text tiny">Saturday</p>
                                            <p class="ct_twoline_text tiny">2:00 to 3:00pm</p>
                                        </span>
                                    </div>                                
                                    <div class="row_col row_col_2">
                                        <figure class="text-center"><img src="<?php echo MBN_ASSETS_URI ?>/img/logo-550kfyi.png" alt=""></figure>
                                        <span>
                                            <p class="ct_twoline_text tiny">Sunday</p>
                                            <p class="ct_twoline_text tiny">2:00 to 3:00pm</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="row_col row_col_3">
                                    <h2 class="ct_margin_both_0 ct_twoline_text">Tim</h2>
                                    <h2 class="ct_margin_both_0 ct_twoline_text">Evans</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>        
            <div class="hero-block hero_mobile_bottom">
                <div class="grid-container">
                    <div class="sec_body">
                        <h3 class="banner_subtitle">CAROL HAS THE BUYERS!</h3>
                        <div class="banner_subtitle_body">
                            <h1>Your Home Sold Guaranteed or Carol Will Buy It</h1>
                            <p>Fill out the form below to get your home price now.</p>                              
                            <div class="banner_form_wrap">                         
                                <?= do_shortcode('[gravityform id="3" title="false" description="false" ajax="false"]'); ?>
                            </div>         
                        </div>
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
                </div>
            </div> 
        </div>
    </section>



<?php 
    get_footer(); 