<?php 
    /* Template Name: Blocks template */
    get_header();


//acf fields
$banner_height = get_field('page_header_banner_height');				
$banner_right_text = get_field('banner_right_text');
$banner_right = get_field('has_banner_right');
$add_image = get_field('right_image');
$add_buttons = get_field('has_call_to_action');

?>


<section class="hero_banner_wrap <?php echo $banner_height; ?>" data-body-class="<?php echo $banner_height; ?>" data-height="<?php echo ( $banner_height == "full_height" ) ? '100vh' : '780px';?>">
	<div class="hero_banner">
		<figure class="bg">
			<img src="<?php echo get_field('page_header_image'); ?>" />
		</figure>
		<div class="grid-container"> 
			<div class="banner_wrap " data-height="<?php echo ( $banner_height == "full_height" ) ? '100vh' : '780px';?>">
				<div class="banner_left <?php echo get_field('banner_subtitle_style');?>">
					<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle'); ?></h3>
					<div class="banner_subtitle_body">
						<h1 class="banner_subtitle_title"><?php echo get_field('page_header_title'); ?></h1>
						<div class="banner_paragraph">
                            <?php echo get_field('page_header_body'); ?>   
                        </div>                                           
                        <div class="banner_form_wrap">                         
                            <?php 
                            $form_shortcode = get_field('form_shortcode');
                            echo do_shortcode($form_shortcode); ?>
                        </div>   
						<?php 

						$show_checklists = get_field('show_checklists');
						
						if ($show_checklists): ?>
							<div class="divider_double_line"></div>                                                
							<?= do_shortcode('[banner_checklist]'); ?>
						<?php endif; ?>   
					</div>
				</div>
				<div class="banner_right">					
				<?php 
				
				if( $banner_right ):
				?>
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
<section class="page-content">	
	<?php
		while ( have_posts() ) : the_post();
			?><h1 class="page_title"> <?php the_title(); ?> </h1><?php
		the_content();

	endwhile; // End of the loop.
	?>
</section>
<?php 
/*$add_call_to_action_bottom = get_field('add_call_to_action_bottom');

if($add_call_to_action_bottom):?>
    <section class="sec_info_wrap">
        <?php echo do_shortcode('[ct_contact_button]'); ?>
    </section>
<?php  endif; */ ?>



<?php 
    get_footer(); 