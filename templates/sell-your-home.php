<?php 
    /* Template Name: Sell Your Home template */
    get_header();
?>

<section class="hero hero-s4 hero_for_pages">
    <!-- Hero Desktop -->
    <div class="hero-block hero-block_desktop">
        <figure class="bg"><img src="<?php echo MBN_ASSETS_URI ?>/img/carol-got-the-offer.jpg" alt=""></figure>
        <div class="grid-container hero-captio"> 
            <div class="grid-xn">
                <div class="cell large-6 medium-4 xlarge-4">
                    <h3 class="banner_subtitle">Carol Has The Cash Offer!</h3>
                    <div class="banner_subtitle_body"><h1>Get a cash offer on your home!</h1></div>
                </div>                
            </div>
        </div>
    </div>        
    <!-- Hero Mobile -->
    
    <div class="hero-block_mobile">
        <div class="hero_mobile_top">
            <figure class="hero_img"><img src="<?php echo MBN_ASSETS_URI ?>/img/carol-got-the-offer.jpg" alt=""></figure>
        </div>        
        <div class="hero_mobile_bottom">
            <div class="grid-container">
                <div class="sec_body align-middle">
                    <h3 class="banner_subtitle" data-subtitle="" >Carol Has The Cash Offer!</h3>                    
                    <div class="banner_subtitle_body"><h1>Get a cash offer on your home!</h1><div>
                </div>
            </div>
        </div> 
    </div>
</section>
<section class="sec_column_item column_template_1">
    <div class="grid-container">
        <div class="grid-x ct_margin_both_0 cols2-s2 ">
            <div class="cell medium-12 large-6 column_left">
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