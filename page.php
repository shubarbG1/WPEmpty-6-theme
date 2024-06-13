<?php get_header(); ?>

    <div id="site-content" class="site-content page-content">
        <div class="content-with-sidebar">
            <div class="page-content-main">

                <?php
                    while (have_posts()) : the_post();
                        
                        // echo '<h1 class="page-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
                        echo '<h1 class="page-title">' . get_the_title() . '</h1>';

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
