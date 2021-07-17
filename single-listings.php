<?php
 /**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
    get_header();
?>
<section class="hero_banner_wrap ">
	<div class="hero_banner">
		<figure class="bg">
			<?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?>
		</figure>
    </div>
</section>

<?php 
    get_footer(); 