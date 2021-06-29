<?php 
    /* Template Name: About template */
    get_header();
?>
<section class="sec_column_item column_template_2 about_template">
    <div class="grid-container">
        <div class="grid-x grid-margin-x cols2-s2 ">
            <div class="cell medium-12 large-6 column_left">
                <div class="sec_body">
                    <div class="text_header">
                        <div class="sec_title">
                            <div class="subtitle">Learn Why We Love What We Do</div>
                            <h2 class="title">About The Carol Royse Team</h2>
                            <p>“There is a higher calling to serving people.”</p>
                        </div>
                        <p>In 1985, Carol was a PTA President, a mother of two. Following the death of her husband, she needed a source of income to provide for her family. Her friend suggested she become a realtor, and she enrolled in real estate school. A month later, she was licensed and ready.</p>
                        <p>Fast forward 10 years. Carol had become an established realtor and was joined by her daughter, Vikki Royse Middlebrook, and son-in-law, Eric Middlebrook. She hired a few administrative assistants, and The Carol Royse Team was born!</p>
                        <p>In 2001, Carol’s son, Tim Evans, joined the team, thus making it a true “family business”. The Carol Royse Team thrived and expanded over the years, through great markets, and a Great Recession. Today there are 25 members on The Carol Royse Team, and we’ve helped serve over 7,000 families. Our team’s mission, “To Elevate Others to Prosper”, has been a leading cause to our success.</p>
                        <p>The Carol Royse Team has become one of the top teams across the United States of America. The team currently has 8 family members, all licensed and serving the team in various departments, along with 17 additional agents and admin. Each day, The Carol Royse Team strives to elevate our clients with an exceptional experience. Exceeding their expectations is our team’s daily commitment.</p>
                        <?= do_shortcode('[video mp4=' . $video_file . ' poster = ' . get_template_directory_uri() . '/images/album_cover.jpg]'); ?>
                    </div>
                    
                </div>
            </div>
            <div class="cell medium-12 large-6 col-item column_right">
                <div class="sec_body">
                    <div class="text_wrap media_flex">
                        <div class="media_body">
                            <figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/bullseye.png" alt=""></figure>
                            <h3>Our Mission</h3>
                            <p>Elevate Others To Prosper Clients <br/>Team, Business Partners and Community</p>
                        </div>
                    </div>                
                    <div class="text_wrap  media_flex">
                        <div class="media_body">
                            <figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/heart-hands.png" alt=""></figure>
                            <h3>Our Core Values</h3>
                            <ul>
                                <li>Elevate Our Clients to Have an Exceptional</li>
                                <li>Elevate Our Team Personally and Professionally</li>
                                <li>Elevate Our Business Partners to Enjoy More</li>
                                <li>Elevate Our Community By Creating Awareness <br/> and Sharing Resources
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec_info_wrap">    
    <div class="grid-container">
        <div class="grid-x grid-margin-x cols2-s2 ">
            <div class="cell small-6 medium-6 large-6 col-item">
                <a class="info_box" href="tel:4807765231">
                    <figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/phone.png" alt=""></figure>
                    <div class="address">Metro</div>
                    <div class="address">Phoenix</div>
                    <div class="phone">480-776-5231</div>

                </a>
            </div>  
            <div class="cell small-6 medium-6 large-6 col-item">
                <a class="info_box" href="tel:9282273336">
                    <figure class="icon_wrapper"><img src="<?php echo MBN_ASSETS_URI ?>/img/phone.png" alt=""></figure>
                    <div class="address">Northern</div>
                    <div class="address">Arizona</div>
                    <div class="phone">928-227-3336</div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php 
    get_footer(); 