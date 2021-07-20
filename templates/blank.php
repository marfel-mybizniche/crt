<?php 
    /* Template Name: Blank template */
    get_header();

?>

<?php
	while ( have_posts() ) : the_post();
		?><h1 class="page_title"> <?php the_title(); ?> </h1><?php
	the_content();

endwhile; // End of the loop.
?>

<?php 
    get_footer(); 