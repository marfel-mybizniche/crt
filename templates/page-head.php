<?php 
if ( get_field('page_header_options') !== 'no_header' ):

//acf fields
$banner_height = get_field('page_header_banner_height');				
$banner_right_text = get_field('banner_right_text');
$banner_right = get_field('banner_type');
$header_banner_position = get_field('header_banner_position');
$header_banner_overlay = get_field('header_banner_overlay');
$add_image = get_field('right_image');
$show_elements = get_field('show_elements');
$custom_content = get_field('custom_content');

if( $banner_height == "full_height" ) {
	$height = '100vh';
}
else {
	$height = '88vh';
}

if(! strpos( $template, 'single-listings.php' )): // not in single post template
	
	//if global header setting
	if( get_field('page_header_options') == "global_header_opt" || is_post_type_archive() || is_single() ):
?>
    
    <section class="hero_banner_wrap hero_banner_default <?php echo $header_banner_overlay ? 'dark_overlay' : ''; ?>">
		<div class="hero_banner <?php echo $header_banner_position; ?>">
			<figure class="bg <?php echo $header_banner_position; ?>"><img src="<?php echo get_theme_mod( 'global_header_img' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></figure>
			<div class="grid-container">
				<div class="banner_wrap">
					<div class="banner_left banner_style_2">
						<div class="banner_subtitle_body">
							<h1 class="banner_subtitle_title"><?php echo mbn_page_title(); ?></h1>		
						</div>				
					</div>
					<div class="banner_right">					
					</div>
				</div>
			</div>
		</div>		
    </section>


<?php 

	else: 
		
	if( $banner_height == "full_height" || $banner_height == "medium_height" ) : 
		
?>

<section class="hero_banner_wrap <?php echo $banner_height; ?> <?php echo $banner_class ?>" data-body-class="<?php echo $banner_height; ?>" data-height="<?php echo $height; ?> <?php echo $header_banner_overlay ? 'dark_overlay' : ''; ?>">
<?php else : ?>
<section class="hero_banner_wrap <?php echo $header_banner_overlay ? 'dark_overlay' : ''; ?> <?php echo $banner_class ?>">
<?php endif; ?>
	<div class="hero_banner">

		<?php if( get_field('page_header_image') ): ?>
			<style type="text/css">
				/* .hero_banner .bg{
					background: url("<?php echo get_field('page_header_image');?>")  center center no-repeat;
					background-size: cover;
					background-blend-mode: multiply;
  					background-image: linear-gradient(to top, rgba(26, 23, 78, 0.8), rgba(26, 23, 78, 0), rgba(47, 35, 64, 0.65), rgba(84, 56, 40, 0.92));
				} */
				</style>
				
		<figure class="bg <?php echo $header_banner_position; ?>">
			<img class="<?php if(get_field('page_header_image_small')) echo 'show-for-medium'; ?>" src="<?php echo get_field('page_header_image'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			
			<?php if(get_field('page_header_image_small')) { ?>
			<img class="hide-for-medium" src="<?php echo get_field('page_header_image_small'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			<?php } ?>
		</figure>
		<?php elseif( strpos($template, 'archive-listings.php') ): ?>
			<figure class="bg <?php echo $header_banner_position; ?>">
				<img src="<?php echo get_theme_mod('global_header_img'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</figure>
		<?php endif; ?>

		<div class="grid-container"> 			
		<?php if( $banner_height == "full_height"  || $banner_height == "medium_height" ) :?>
			<div class="banner_wrap " data-height="<?php echo $height; ?>">
		<?php else:  ?>
			<div class="banner_wrap">				
		<?php endif; ?>
				<div class="banner_left <?php echo get_field('banner_subtitle_style');?>">
					<h3 class="banner_subtitle_text"><?php echo get_field('page_header_subtitle'); ?></h3>
					<div class="banner_subtitle_body">
						<h1 class="banner_subtitle_title">
						<?php 
							if( strpos($template, 'archive-listings.php') ) : 
								echo esc_html('Listings');
							else:
								echo get_field('page_header_title'); 
							endif;?></h1>
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
					<?php if( $banner_right == 'two_column_banner'):?>

						<?php if ( $show_elements == 'show_image'): if ($add_image): ?><figure class="banner_right_img"><img src="<?php echo esc_attr($add_image);?>"></figure> <?php endif; ?>

						<?php elseif ( $show_elements == 'show_cta'): ?>

							<?php if ($banner_right_text): ?><h5><?php echo esc_attr($banner_right_text);?></h5><?php endif; ?>
								
							<div class="grid-container">
								<div class="grid-x grid-margin-x banner_contact">
									<?php	// Check rows exists.
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
<?php if( $banner_height == "medium_height" ) : ?>
<section class="<?php echo $banner_height .'_' ?>mobile">
	<!-- for medium height on mobile -->
	<div class="grid-container"> 			
		<div class="banner_wrap " data-height="<?php echo $height; ?>">
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
		</div><!-- banner_wrap -->
	</div>	<!-- grid-container -->	
</section>
<?php endif; 
 endif; 
endif;
endif;
 ?>