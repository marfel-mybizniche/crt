<?php 

//acf fields
$banner_height = get_field('page_header_banner_height');				
$banner_right_text = get_field('banner_right_text');
$banner_right = get_field('has_banner_right');
$add_image = get_field('right_image');
$add_buttons = get_field('has_call_to_action');

?>

<?php if( !is_home()) : ?>

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
<?php elseif( is_home() ) : ?>
    <section class="hero hero-s4">
        <!-- Hero Desktop -->
        <div class="hero-block hero-block_desktop">

			<?php if( get_field('page_header_image') ): ?>
				<figure class="bg">
					<img src="<?php echo get_field('page_header_image'); ?>" />
				</figure>
			<?php endif; ?>

            <div class="grid-container hero-caption"> 
                <div class="grid-x">
                    <div class="cell large-7  <?php echo get_field('banner_subtitle_style');?>">
						<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle'); ?></h3>
                        <div class="banner_subtitle_body">
                            <h1><?php echo get_field('page_header_title'); ?></h1>
                            <p> <?php echo get_field('page_header_body'); ?></p>                              
                            <div class="banner_form_wrap">                               
								<?php 
								$form_shortcode = get_field('form_shortcode');
								echo do_shortcode($form_shortcode); 
								?>
                            </div>         
                        </div>
                        <div class="divider_double_line"></div>                                                
                        <?php 
						$show_checklists = get_field('show_checklists');
						
						if ($show_checklists): ?>                                               
							<?= do_shortcode('[banner_checklist]'); ?>
						<?php endif; ?>  
						
                    </div>

					<?php if( $banner_right ):?>
                    <div class="cell small-10 small-offset-1 large-5 large-offset-0 align-self-bottom">
						<?php if ($banner_right_text): ?><h5><?php echo esc_attr($banner_right_text);?></h5><?php endif; ?>
						<?php if ($add_image): ?><figure class="right_img text-center"><img src="<?php echo esc_attr($add_image);?>"></figure> <?php endif; ?>
						
							<?php echo ($add_buttons) ? do_shortcode('[ct_contact_button]') : '' ; ?>

                    </div>
					<?php endif ?>
                </div>
            </div>
        </div>        
        <!-- Hero Mobile -->
        
        <div class="hero-block_mobile">
            <div class="hero-block hero_mobile_top">

			<?php if( get_field('page_header_image') ): ?>
				<figure class="bg">
					<img src="<?php echo get_field('page_header_image'); ?>" />
				</figure>
			<?php endif; ?>

                <div class="grid-container"> 
                    <div class="grid-x hero-caption">
                        <div class="cell small-10 small-offset-1 large-5 large-offset-0 align-self-bottom">
						<?php if ($add_image): ?><figure class="right_img text-center"><img src="<?php echo esc_attr($add_image);?>"></figure> <?php endif; ?>    
                        </div>
                    </div>
                </div> 
            </div>        
            <div class="hero-block hero_mobile_bottom">
                <div class="grid-container">
                    <div class="sec_body  <?php echo get_field('banner_subtitle_style');?>">
                        <h3 class="banner_subtitle"><?php echo get_field('page_header_subtitle'); ?></h3>
                        <div class="banner_subtitle_body">
                            <h1><?php echo get_field('page_header_title'); ?></h1>
                            <p> <?php echo get_field('page_header_body'); ?></p>                                  
                            <div class="banner_form_wrap">                                            
								<?php 
								$form_shortcode = get_field('form_shortcode');
								echo do_shortcode($form_shortcode); 
								?>
                            </div>         
                        </div>
                        
						<?php 
						$show_checklists = get_field('show_checklists');
						
						if ($show_checklists): ?>                                               
							<?= do_shortcode('[banner_checklist]'); ?>
						<?php endif; ?>  
						  
                    </div>
                </div>
            </div> 
        </div>
    </section>

<?php endif; ?>

