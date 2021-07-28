<?php get_header() ?>
<section class="page-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x blog_lists">

                <?php while ( have_posts() ) : the_post(); 
                    $terms = get_the_terms( $post->ID, 'category' ); 
                ?>
                    
                    <div class="cell large-4 blog_item">
                        <figure class="wp-block-image"><a href="<?php the_permalink(); ?>">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail(); 
                            } else {
                                echo '<img loading="lazy" src="'.home_url().'/wp-content/uploads/2021/07/img-6-steps.jpg" width="450" height="250">';
                            } ?>
                        </a></figure>
                        <h6>
                            <?php if($terms) foreach( $terms as $term ) {
                                echo '<a href="'.get_category_link( $term->term_id ).'">'.$term->name.'</a>';
                            } ?>
                        </h6>
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title() ?>
                            </a>
                        </h3>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php if (paginate_links()): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: none">
                        <?php  echo paginate_links(); ?>
                    </div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">SEE MORE</a>
                    </div>
                </div>
            <?php endif ?>
            
        </div>     
    </section>

<?php get_footer() ?>