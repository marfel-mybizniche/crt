<?php 

//acf fields
$banner_height = get_field('page_header_banner_height');				
$banner_right_text = get_field('banner_right_text');
$banner_right = get_field('has_banner_right');
$add_image = get_field('right_image');
$add_buttons = get_field('has_call_to_action');

?>

<?php if( !is_front_page() && is_home()) : ?>

<?php if( $banner_height == "full_height" ) : ?>
<section class="hero_banner_wrap <?php echo $banner_height; ?>" data-body-class="<?php echo $banner_height; ?>" data-height="110vh">
<?php else : ?>
<section class="hero_banner_wrap ">
<?php endif; ?>
	<div class="hero_banner">
		<?php if( get_field('page_header_image') ): ?>
		<figure class="bg">
			<img src="<?php echo get_field('page_header_image'); ?>" />
		</figure>
		<?php endif; ?>
		<div class="grid-container"> 
			
			<?php if( $banner_height == "full_height" ) : ?>
				<div class="banner_wrap " data-height="100vh">
			<?php else:  ?>
				<div class="banner_wrap">				
			<?php endif; ?>
				<div class="banner_left <?php echo get_field('banner_subtitle_style');?>">
					<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle'); ?></h3>
					<div class="banner_subtitle_body">
						<h1 class="banner_subtitle_title"><?php echo get_field('page_header_title'); ?></h1>
						<div class="banner_paragraph desktop_only">
                            <?php echo get_field('page_header_body'); ?>   
                        </div>                                           
                        <div class="banner_form_wrap">                         
                            <?php 
                            $form_shortcode = get_field('form_shortcode');
                            echo do_shortcode($form_shortcode); ?>
                        </div>   
						<?php if(is_home()) : ?><div class="divider_double_line"></div> <?php endif; ?>
						<?php 
						$show_checklists = get_field('show_checklists');
						
						if ($show_checklists): ?>                                               
							<?= do_shortcode('[banner_checklist]'); ?>
						<?php endif; ?>   
					</div>
					
						<div class="banner_paragraph mobile_only">
                            <?php echo get_field('page_header_body'); ?>   
                        </div>       

				</div>
				<div class="banner_right">					
					<?php if( $banner_right ):?>
						<?php if ($banner_right_text): ?><h5><?php echo esc_attr($banner_right_text);?></h5><?php endif; ?>
						<?php if ($add_image): ?><figure class=""><img src="<?php echo esc_attr($add_image);?>"></figure> <?php endif; ?>
							
						<div class="grid-container">
							<div class="grid-x grid-margin-x banner_contact">
								<?php if ($add_buttons): 
									// Check rows exists.
									if( have_rows('call_to_action_btns') ):

										// Loop through rows.
										while( have_rows('call_to_action_btns') ) : the_row();

											// Load sub field value.
											$sub_text = explode(" ", get_sub_field('sub_text'));							
											$main_text = get_sub_field('main_text');?>										
												<div class="cell small-6 medium-6 large-6 col-item">
													<a class="info_box" href="tel:<?php echo $main_text; ?>">
														<figure class="icon_wrapper"></figure>
														<?php 
															for( $i=0; $i <= count($sub_text); $i++ ){
																echo '<div class="address">'. $sub_text[$i] . '</div>';
															}
														?>
														<div class="phone"><?php echo $main_text; ?></div>
													</a>
												</div>
											<?php

										// End loop.
										endwhile;
									endif;					
								endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>

        </div>
	</div>
</section>
<?php else : ?>
    <section class="hero hero-s4">
        <!-- Hero Desktop -->
        <div class="hero-block hero-block_desktop">
            <figure class="bg"><img src="<?php echo MBN_ASSETS_URI ?>/img/img_hero-bg.jpg" alt=""></figure>
            <div class="grid-container hero-caption"> 
                <div class="grid-x">
                    <div class="cell large-7  <?php echo get_field('banner_subtitle_style');?>">
						<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle'); ?></h3>
                        <div class="banner_subtitle_body">
                            <h1>Your Home Sold Guaranteed or Carol Will Buy It</h1>
                            <p>Fill out the form below to get your home price now.</p>                              
                            <div class="banner_form_wrap">                         
                                <?= do_shortcode('[gravityform id="3" title="false" description="false" ajax="false"]'); ?>
                            </div>         
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

<?php endif; ?>

