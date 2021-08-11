<?php get_header() ?>
<section class="blog_content">  
    <div class="grid-container">    
        <div class="grid-x grid-margin-x">
            <div class="cell large-10 large-offset-1">
                <div class="post_back show-for-large"><a href="javascript:history.back()"><span>&#129120;</span> Back</a></div>
                <?php  while ( have_posts() ) : the_post(); ?>
                <div class="post_cats">
                    <?php $category = get_the_category();
                        $allcategory = get_the_category(); 
                    foreach ($allcategory as $category) { ?>
                    <a href="<?= esc_url(get_category_link( $category->term_id )) ?>"><?php echo $category->cat_name; ?></a>
                    <?php  } ?>
                </div>
                <h1 class="post_title">
                    <?php the_title(); ?>
                </h1>
                <div class="post_meta">
                    <figure class="author">
                        <span><img src="<?php echo MBN_ASSETS_URI ?>/img/icn-carol-royse.png" alt="<?php the_author(); ?>"></span>
                        <figcaption><?php the_author(); ?></figcaption>
                    </figure>
                </div>
                <div class="post_body">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>


<?php 
    // Reusable Blocks
    $post_cta = get_post(45552);
    echo apply_filters('the_content',$post_cta->post_content);
?>

<?php get_footer() ?>