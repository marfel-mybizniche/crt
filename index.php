<?php get_header() ?>
<section class="blog_content">
        <div class="grid-container">

            <?php if(is_home()) { ?>
            <div class="whats_new">
                <h5>What’s New</h5>
                <?php 
                    query_posts('posts_per_page=1');
                
                    while ( have_posts() ) : the_post(); 
                        $terms = get_the_terms( $post->ID, 'category' ); 
                    ?>
                        
                    <div class="grid-x grid_item">
                        <div class="cell large-6">
                            <figure class="wp-block-image media"><a href="<?php the_permalink(); ?>">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail(); 
                                } else {
                                    echo '<img loading="lazy" src="'.home_url().'/wp-content/uploads/2021/07/img-6-steps.jpg" width="450" height="250">';
                                } ?>
                            </a></figure>
                        </div>
                        <div class="cell large-5 large-offset-1 align-self-middle">
                            <div class="copy">
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
                            <?php the_excerpt(); ?>
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More <span>&#129122;</span></a>
                            </div>
                        </div>
                    </div>  

                    <?php endwhile; wp_reset_query();  ?>
            </div>
            <?php } ?>

            <div class="blog_cats">
                <?php  
                    $obj_id = get_queried_object_id(); 
                    $current_url_post = get_permalink( $obj_id ); 
                    $current_url_term = get_term_link( $obj_id );
                ?>
                <ul class="menu">
                    <li <?php if($current_url_post === get_permalink('51')) {echo "class='selected'";} ?> ><a href="<?php the_permalink('51'); ?>">All</a></li>
                    <?php
                    $categoryLists = get_categories(array('hide_empty' => false,'taxonomy' => 'category'));
                    foreach ($categoryLists as $category):
                    ?>  
                    <li <?php if($current_url_term === get_category_link( $category->term_id )) {echo "class='selected'";} ?> >
                        <a href="<?= esc_url(get_category_link( $category->term_id )) ?>"><?= $category->name; ?></a>
                        <?php //echo $category->category_count ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php echo '<div class="grid-x grid-margin-x blog_lists">';
                
                //query_posts('offset=1');
                query_posts(array('offset' => 1, 'posts_per_page' => -1);

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
                        <article>
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
                        </article>
                    </div>

                <?php endwhile; wp_reset_query(); ?>

                <div class="post_loadmore text-center">
                    <div id="post-pagination" style="display: none">
                        <?php  //echo paginate_links(); ?>
                    </div>
                    <a class="btn_loadmore" href="javascript:;" id="loadMorePosts">Load More <span>&#129122;</span></a>
                </div>

            <?php echo '</div>'; ?>

            <!-- <?php // if (paginate_links()): ?>
                <div class="post_loadmore text-center">
                    <div id="post-pagination" style="display: none">
                        <?php  //echo paginate_links(); ?>
                    </div>
                    <a class="btn_loadmore" href="javascript:;" id="loadMorePosts">Load More <span>&#129122;</span></a>
                </div> -->
                <script>
                    jQuery(function($){

                        var $nextLink = $('#post-pagination .next').attr('href');

                        $(".blog_item").slice(0, 12).show();
                        $("#loadMorePosts").on('click', function (e) {
                            e.preventDefault();
                            $(".blog_item:hidden").slice(0, 6).slideDown();
                            if ($(".blog_item:hidden").length == 0) {
                                $(".post_loadmore").hide();
                            }
                            // $('html,body').animate({
                            //     scrollTop: $(this).offset().top - 300
                            // }, 1500);
                         });
                        // $('#loadMorePosts').click(function(e){
                        //     e.preventDefault();
                        //     $(this).hide();
                            
                        //     $.get( $nextLink, function( data ) {
                        //         var getList = $(data).find('.blog_lists').html();
                        //         $('.blog_lists').append(getList);
                        //         $nextLink = $(data).find('#post-pagination .next').attr('href');
                        //         if (!$nextLink) {
                        //             $('.post_loadmore').hide();
                        //         }
                        //     });
                        //     $(this).delay(1000).show(0);

                        // });
                    })
                </script>
            <?php // endif ?>
            
        </div>     
    </section>

<?php get_footer() ?>