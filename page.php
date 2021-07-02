<?php get_header() ?>
<section class="page-content">
	<div class="grid-container">		
		<?php
			while ( have_posts() ) : the_post();
				?><h1 class="page_title"> <?php the_title(); ?> </h1><?php
			the_content();

		endwhile; // End of the loop.
		?>
	</div>
</section>

<?php get_footer() ?>