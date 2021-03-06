<?php 
if ( get_field('page_header_options', 51) !== 'no_header' ):

//acf fields
$banner_height = get_field('page_header_banner_height', 51);				
$banner_right_text = get_field('banner_right_text', 51);
$banner_right = get_field('banner_type', 51);
$add_image = get_field('right_image', 51);
$show_elements = get_field('show_elements', 51);
$custom_content = get_field('custom_content', 51);
$banner_class = get_field('page_header_class');

?>
    

<section class="hero_banner_wrap <?php echo $banner_class ?>">

	<div class="hero_banner blog_banner">
			
		<figure class="bg media">
			<img class="<?php if(get_field('page_header_image_small', 51)) echo 'show-for-medium'; ?>" src="<?php echo get_field('page_header_image', 51); ?>" alt="" />
			
			<?php if(get_field('page_header_image_small', 51)) { ?>
			<img class="hide-for-medium" src="<?php echo get_field('page_header_image_small', 51); ?>" alt="" />
			<?php } ?>
		</figure>

		<div class="grid-container copy"> 			
			<div class="banner_wrap">	
				<div class="banner_left <?php echo get_field('banner_subtitle_style', 51);?>">
					<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle', 51); ?></h3>
					<div class="banner_subtitle_body">
						<h1 class="banner_subtitle_title">
							<?php echo get_field('page_header_title', 51); ?>
						</h1>
						<div class="banner_paragraph desktop_only">
							<?php echo get_field('page_header_body', 51); ?>   
						</div>                                           
						<div class="banner_form_wrap">                         
							<?php 
							$form_shortcode = get_field('form_shortcode', 51);
							echo do_shortcode($form_shortcode); ?>
						</div>   
						<?php if(is_home()) : ?><div class="divider_double_line"></div> <?php endif; ?>
						<?php 
						$show_checklists = get_field('show_checklists', 51);
						
						if ($show_checklists): ?>                                               
							<?= do_shortcode('[banner_checklist]', 51); ?>
						<?php endif; ?>   
					</div>
					
						<div class="banner_paragraph mobile_only">
							<?php echo get_field('page_header_body', 51); ?>   
						</div>       

				</div>
				<div class="banner_right">					
					<?php if( $banner_right == 'two_column_banner'):?>

						<?php if ( $show_elements == 'show_image'): if ($add_image): ?><figure class="banner_right_img"><img src="<?php echo esc_attr($add_image);?>"></figure> <?php endif; ?>

						<?php elseif ( $show_elements == 'show_cta'): ?>

							<?php if ($banner_right_text): ?><h5><?php echo esc_attr($banner_right_text);?></h5><?php endif; ?>
								
							<div class="grid-container">
								<div class="grid-x grid-margin-x banner_contact">
									<?php	// Check rows exists.
										if( have_rows('call_to_action_btns', 51) ):

											// Loop through rows.
											while( have_rows('call_to_action_btns', 51) ) : the_row();

												// Load sub field value.
												$sub_text = explode(" ", get_sub_field('sub_text', 51));							
												$main_text = get_sub_field('main_text', 51);?>										
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
										endif;	// have ctas ?>		
								</div>
							</div>
						<?php else: ?>
							<div class="banner_custom_content"><?php echo $custom_content;?></div>
						<?php endif; //show_elements ?>
					<?php endif; //banner-right ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php endif; ?>