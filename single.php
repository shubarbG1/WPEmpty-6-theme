<?php get_header(); ?>

    <div id="site-content" class="site-content single-content">
        <div class="content-with-sidebar">
            <div class="single-content-main">

                <?php
                    while (have_posts()) : the_post();

                        // echo '<h1 class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
                        echo '<h1 class="post-title">' . get_the_title() . '</h1>';
                        // echo '<p class="post-date">' . get_the_date() . '</p>';
                        
                        the_content();

                    endwhile;
                ?>

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
