<?php 
    /* Template Name: Blocks template */
    get_header();

?>


<section class="page-content">	
	<?php
		while ( have_posts() ) : the_post();
			?><h1 class="page_title"> <?php the_title(); ?> </h1><?php
		the_content();

	endwhile; // End of the loop.
	?>
</section>
<?php 
    get_footer(); 