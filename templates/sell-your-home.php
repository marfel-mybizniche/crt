<?php 
    /* Template Name: Sell Your Home template */
    get_header();
?>
<section class="sec_column_item">
    <div class="grid-container">
        <div class="grid-x grid-margin-x cols2-s2 ">
            <div class="cell medium-12 large-5 column_left">
                
                <div class="text_title">
                    <h2>Why get a cash offer?</h2>
                    <p>With our Cash Offer program, you bypass all the traditional ways of selling your home.</p>
                </div>
                <div class="text_wrap media-flex">
                    <div class="media-left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                    <div class="media-body">
                        <h3>No Waiting To Receive An Offer</h3>
                        <p>You don’t have to wait for a buyer to submit an offer. You choose when you want to sale and when you want to close.</p>
                    </div>
                </div>                
                <div class="text_wrap  media-flex">
                    <div class="media-left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                    <div class="media-body">
                        <h3>No Home Prepping For Sale</h3>
                        <p>You won’t have to worry about preparing your home for sale, that means no need to paint, add new carpet/floor or any other minor home prepping you would need to do in a traditional sale. </p>
                    </div>
                </div>           
                <div class="text_wrap media-flex">
                    <div class="media-left"><figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/dollar-icon.png" alt=""></figure></div>
                    <div class="media-body">
                        <h3>No Strangers In Your Home</h3>
                        <p>You won’t have to worry about having to show your home to strangers.</p>
                    </div>
                </div>
                <div class="text_wrap">
                    <small>Some terms and conditions may apply.*</small>
                </div>
            </div>
            <div class="cell medium-12 large-7 col-item column_right">
                <div class="sec_form">
                    <h4>Fill Form Below to Get Your Cash Offer!</h4>
                    <?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
                    <small>Carol Royse Team is committed to protecting and respecting your privacy. By clicking Schedule a Call Now, you agree that we may store and process the personal information submitted above.</small>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    get_footer(); 