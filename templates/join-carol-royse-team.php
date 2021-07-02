<?php 
    /* Template Name: Join the Carol Royse Team template */
    get_header();
?>

<section class="hero hero-s4 hero_for_pages column_template_2">
    <!-- Hero Desktop -->
    <div class="hero-block hero-block_desktop">
        <figure class="bg"><img src="<?php echo MBN_ASSETS_URI ?>/img/join-the-team-hero.jpg" alt=""></figure>
        <div class="grid-container"> 
            <div class="grid-x hero-caption">
                <div class="cell large-7">
                    <div class="text_header">
                        <div class="sec_title">
                            <div class="subtitle">Change Your Life Now!</div>
                            <h2 class="title">The Carol Royse Team would be glad to have you join our team</h2>
                            <p>You will net $100,000 over the next 12 months or we’ll pay you the difference!*</p>
                        </div>
                        <div class="text_wrap">
                            <p class="small">Some terms and conditions may apply.<span class="required">*</span</p>
                        </div>
                    </div>                    
                </div>
                <div class="cell small-10 small-offset-1 large-5 large-offset-0 align-self-bottom">  
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
                </div>
            </div>
        </div>
    </div>        
    <!-- Hero Mobile -->
    
    <div class="hero-block_mobile">
        <div class="hero_mobile_top">
            <figure class="hero_img"><img src="<?php echo MBN_ASSETS_URI ?>/img/join-the-team-hero.jpg" alt=""></figure>
        </div>        
        
    </div>
</section>
<section class="sec_column_item column_template_2">
    <div class="grid-container">
        <div class="grid-x grid-margin-x cols2-s2 ">
            <div class="cell medium-12 large-6 column_left">
                <div class="sec_body">
                    <div class="text_header">
                        <div class="sec_title">
                            <div class="subtitle">Change Your Life Now!</div>
                            <h2 class="title">The Carol Royse Team would be glad to have you join our team</h2>
                            <p>You will net $100,000 over the next 12 months or we’ll pay you the difference!*</p>
                        </div>
                        <p>We are always looking for talented team members to join our growing team! Are you an agent who wants to just focus on the things that you love – YOUR clients? We have a unique system that allows for our agents to focus on buyers and sellers. We provide appointments for our agents, as well as the BEST support team in the industry!</p>
                        <p>We are a group of people that have come together and share the same core values, always put our clients first, and want to accomplish BIG things together! We are fun, supportive, and hardworking!</p>
                    </div>
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
            <div class="cell medium-12 large-6 col-item column_right">
                <div class="sec_form">
                    <h4>Fill the form below and we will contact you.</h4>
                    <?= do_shortcode('[gravityform id="2" title="false" description="false" ajax="false"]'); ?>
                    <p class="small">Carol Royse Team is committed to protecting and respecting your privacy. By clicking Schedule a Call Now, you agree that we may store and process the personal information submitted above.</p>
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