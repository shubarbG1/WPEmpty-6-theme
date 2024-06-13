<?php get_header(); ?>

    <div id="site-content" class="site-content index-content">
        <div class="content-with-sidebar">
            <div class="index-content-main">

                <!-- Display the title of the current page (main blog page) -->
                <h1 class="page-title">
                    <?php echo get_the_title(get_option('page_for_posts')); ?>
                </h1>

                <div class="flex-content">
                    
                    <!-- The Loop -->
                    <?php while (have_posts()) : the_post(); ?>

                        <div class="post-wrap">
                            
                            <?php
                                // Display the post thumbnail if available
                                if (has_post_thumbnail()) {
                                    echo '<div class="post-thumbnail"><a href="' . get_permalink() . '">';
                                    the_post_thumbnail();
                                    echo '</a></div>';
                                }

                                // Display the post title as a clickable link to the full post
                                echo '<h2 class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                                
                                // Display the post excerpt rather than post
                                the_excerpt();
                                
                                // Read More Button
                                echo '<a class="btn-read-more" href="' . get_permalink() . '">Read more</a>';
                            ?>
                            
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
            
            <div class="asidebar">
            
                <!-- Sidebar -->
                <?php 
                    // get_sidebar(); 
                ?>

            </div>

        </div>
    </div>

<?php get_footer(); ?>
