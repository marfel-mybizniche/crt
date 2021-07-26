<?php  
/**
 * The template for displaying all single vendor and attachments
 *
 * @package WordPress
 * @subpackage MBN
 * @since MBN
 */
    get_header(); 

	$vendor_employee	= get_field('vendor_employee');
	$vendor_owner 		= get_field('vendors_owner_name');
	$vendor_position 	= get_field('vendor_title_position');
	$vendor_form 		= get_field('vendor_contact_form');

?>


<section class="vendors_wrapper">
	<div class="grid-container">
		<div class="vendors_header">
			<div class="back_to_vendors_list"><figure><img src="<?php echo esc_url(MBN_ASSETS_URI .'/img/icn-arrow-lr.svg'); ?>"></figure><span><?php echo esc_html('Back to Vendors List'); ?></span></div>
			<h2 class="vendors_name"><?php the_title() ?></h2>
		</div>
	</div>
	<div class="grid-container">
		<div class="grid-x cols3-s1">
			<div class="cell medium-6 large-6 small-12">
				<div class="vendors_info_left">
					<div class="vendors_contact_wrapper">
						<?php if( !empty(get_the_post_thumbnail_url()) ): ?>
							<div class="vendor_logo"><figure><img src="<?php echo get_the_post_thumbnail_url() ?>" width="300" /></figure></div>
						<?php endif; ?>	
						<div class="vendor_contact">
							
							<?php	
							if( have_rows('vendor_employee') ):

								while( have_rows('vendor_employee') ) : the_row();


								$vendor_owner 		= get_sub_field('vendors_owner_name'); 
								$vendor_position 	= '- '. get_sub_field('vendor_title_position');
							?>
								<div class="vendor_owner"><?php echo esc_html($vendor_owner .' '. $vendor_position)?></div>
							<?php	
								endwhile;
							endif;
							if( have_rows('vendor_contact_info') ):
								// Loop through rows.
								while( have_rows('vendor_contact_info') ) : the_row();


								$contact_type = get_sub_field('vendor_contact_info_type'); 

								if ( $contact_type == 'phone_type' ):
									$value 	= get_sub_field('vendor_phone_number');
									$icon 	= '<figure><img src="'. MBN_ASSETS_URI .'/img/icn-phone-hollow-r.svg"/></figure>';
									$text	= '<a href="tel:'.$value.'"><p>'.$value.'</p></a>';									
								elseif( $contact_type == 'office_phone_type' ):										
									$value 	= get_sub_field('vendor_office_number');
									$icon 	= '<figure><img src="'. MBN_ASSETS_URI .'/img/icn-office-r.svg"/></figure>';
									$text 	= '<a href="tel:'.$value.'"><p>'.$value.'</p></a>';
								elseif( $contact_type == 'email_type' ):								
									$value 	= get_sub_field('vendor_email_address');
									$icon 	= '<figure><img src="'. MBN_ASSETS_URI .'/img/icn-envelope-hollow-r.svg"/></figure>';
									$text 	= '<a href="mailto:'.$value.'"><p>'.$value.'</p></a>';	
								elseif( $contact_type == 'website_type' ):							
									$value 	= get_sub_field('vendor_website');						
									$url 	= preg_replace("(^https?://)", "", $value );
									$icon 	= '<figure><img src="'. MBN_ASSETS_URI .'/img/icn-globe-hollow-r.svg"/></figure>';
									$text 	= '<a href="'.$value.'" target="_blank"><p>'.$url .'</p></a>';
								elseif( $contact_type == 'location_type' ):					
									$value 	= get_sub_field('vendor_location_address');	
									$icon 	= '<figure class="icn-map-pin"><img src="'. MBN_ASSETS_URI .'/img/icn-map-r.png"/></figure>';
									$text 	= '<p>'.$value.'</p>';
								endif; ?>														
									<div class="text_wrap">
										<div class="media_left">
											<?php echo $icon; ?>
										</div>
										<div class="media_right">
											<?php echo $text; ?>
										</div>
									</div>
							<?php endwhile;
							endif; ?>							
						</div><!--vendor_contact -->
					</div><!--vendors_contact_wrapper -->		
					<?php
					if( have_rows('vendor_video_urls') ):

						// Loop through rows.
						while( have_rows('vendor_video_urls') ) : the_row();	
							
							$video_url 		= get_sub_field('vendor_video_url');
							$video_type 	= videoType($video_url);
							$video_id 		= get_video_id($video_url);

							if ( $video_type == 'youtube'):
								$video_url = 'https://www.youtube.com/embed/'. $video_id;
							elseif ( $video_type == 'vimeo'):
								$video_url = 'https://player.vimeo.com/video/'. $video_id;
							endif;
							
					?>
					<div class="vendor_video_wrap">
						<figure>
							<iframe title="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url($video_url) ?>"  width="700" height="395" ></iframe>
						</figure>
					</div>
					<?php endwhile;
					endif;?>		
					<?php
					if( have_rows('vendor_audio_urls') ):

						// Loop through rows.
						while( have_rows('vendor_audio_urls') ) : the_row();	
							
						$audio_title 	= get_sub_field('vendor_audio_title');
						$audio_url 		= get_sub_field('vendor_audio_url');

							$attr = array(
								'src'      => $audio_url,
								'loop'     => '',
								'autoplay' => '',
								'preload' => 'none'
							);

							
					?>
					<div class="vendor_audio_wrap">
						<h3><?php echo esc_html($audio_title); ?></h3>
						<figure>
							<?php echo wp_audio_shortcode($attr); ?>
						</figure>
					</div>
					<?php endwhile;
					endif;?>
					<?php if (!empty(get_the_content())): ?>
					<div class="vendor_content">
						<?php the_content(); ?>
					</div>
					<?php endif; ?> 
				</div><!-- vendors_info_left -->
				<div class="image_badge_bottom desktop_only">
					<figure><img src="<?php echo esc_url( MBN_ASSETS_URI .'/img/carol-royse-badge.png'); ?>" alt=""/><figure>
				</div>
			</div>
			<div class="cell medium-6 large-6 small-12">
				<div class="sticky_form vendors_info_right">
					<div class="sec_form sec_form_light">
						<h4><?php echo esc_html('Fill the form to receive a special pricing coupon!') ?></h4>
						<?php echo do_shortcode($vendor_form); ?>
						<p><?php echo esc_html('Carol Royse Team is committed to protecting and respecting your privacy. By clicking Get Your Special Pricing Code, you agree that we may store and process the personal information submitted above.') ?></p>
					</div>
				</div>
			</div>
		</div> <!-- grid-x -->
	</div>
</section>
<?php 
    get_footer(); 