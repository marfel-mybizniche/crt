<?php 
    /* Template Name: Sell Your Home template */
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
<section class="sec_column_item column_template_">
    <div class="grid-container">
        <div class="grid-x ct_margin_both_0 cols2-s2 ">
            <div class="cell medium-12 large-6 column_left1">
                <div class="sec_body">
                    <div class="text_header">
                        <h2>Why get a cash offer?</h2>
                        <p>With our Cash Offer program, you bypass all the traditional ways of selling your home.</p>
                    </div>
                    <div class="text_wrap media_flex">
                        <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                        <div class="media_body">
                            <h3>No Waiting To Receive An Offer</h3>
                            <p>You don’t have to wait for a buyer to submit an offer. You choose when you want to sale and when you want to close.</p>
                        </div>
                    </div>                
                    <div class="text_wrap media_flex">
                        <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                        <div class="media_body">
                            <h3>No Home Prepping For Sale</h3>
                            <p>You won’t have to worry about preparing your home for sale, that means no need to paint, add new carpet/floor or any other minor home prepping you would need to do in a traditional sale. </p>
                        </div>
                    </div>           
                    <div class="text_wrap media_flex">
                        <div class="media_left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                        <div class="media_body">
                            <h3>No Strangers In Your Home</h3>
                            <p>You won’t have to worry about having to show your home to strangers.</p>
                        </div>
                    </div>
                    <div class="text_wrap">
                        <p class="small">Some terms and conditions may apply.<span class="required">*</span</p>
                    </div>
                </div>
            </div>
            <div class="cell medium-12 large-6 col-item column_right">
                <div class="sec_form">
                    <h4>Fill Form Below to Get Your Cash Offer!</h4>
                    <?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
                    <p class="small">Carol Royse Team is committed to protecting and respecting your privacy. By clicking Schedule a Call Now, you agree that we may store and process the personal information submitted above.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    get_footer(); 