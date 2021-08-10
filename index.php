<?php get_header() ?>
<section class="blog_content">
        <div class="grid-container">
            <div class="whats_new">
                <h5>What’s New</h5>
                <div class="grid-x grid-margin-x">

                </div>
            </div>

            <div class="blog_cats">
                <ul class="menu">
                    <?php
                    $categoryLists = get_categories(array('hide_empty' => false,'taxonomy' => 'category'));
                    foreach ($categoryLists as $category):
                    ?>  
                    <li>
                        <a href="<?= esc_url(get_category_link( $category->term_id )) ?>"><?= $category->name; ?></a>
                        <?php //echo $category->category_count ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php echo '<div class="grid-x grid-margin-x blog_lists">';

                while ( have_posts() ) : the_post(); 
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

                <?php endwhile; 
            echo '</div>'; ?>

            <?php if (paginate_links()): ?>
                <div class="text-center">
                    <div id="post-pagination" style="display: block">
                        <?php  echo paginate_links(); ?>
                    </div>
                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="javascript:;" id="loadMorePosts">Load More <span>&#129122;</span></a>
                    </div>
                </div>
                <script>
                    jQuery(function($){

                        var $nextLink = $('#post-pagination .next').attr('href');

                        $('#loadMorePosts').click(function(e){
                            e.preventDefault();
                            $(this).hide();
                            
                            $.get( $nextLink, function( data ) {
                                var getList = $(data).find('.blog_lists').html();
                                $('.blog_lists').append(getList);
                                $nextLink = $(data).find('#post-pagination .next').attr('href');
                                if (!$nextLink) {
                                    $('.btn-see-more').hide();
                                }
                            });
                            $(this).delay(2000).show(0);

                        });
                    })
                </script>
            <?php endif ?>
            
        </div>     
    </section>

<?php get_footer() ?>