<?php 
    /* Template Name: Home template */
    get_header();
?>

<section class="home_content">	
	<?php
		while ( have_posts() ) : the_post();
		
		the_content();

	endwhile; // End of the loop.
	?>
</section>


<?php 
    get_footer(); 