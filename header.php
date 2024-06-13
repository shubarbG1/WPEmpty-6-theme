<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        
        <title><?php echo esc_html( wp_get_document_title() ); ?></title>  
        <!-- !! Or, for specific RankMath use !! ( RankMath\Paper\Paper::get()->get_title() ); -->
                
        <?php wp_head(); ?>

        <!-- Google Tag Manager -->

    </head>

    <body <?php body_class(); ?>>

        <!-- Google Tag Manager (noscript) -->

        <!-- Accessibility - Strait to Main Content -->
        <a href="#site-content" class="skip-to-main-content-link">Skip to main content</a>

        <header class="site-header">
            <div class="nav-wrap">
                <nav class="navbar">

                    <a class="site-logo" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="site-logo" alt="YogaBreezeBali logo">
                    </a>

                    <div class="hamburger-wrap">
                        <div class="hamburger">
                            <span class="mobile-menu-line-1"></span>
                            <span class="mobile-menu-line-2"></span>
                            <span class="mobile-menu-line-3"></span>
                        </div>
                    </div>

                    <div class="container nav-links">

                        <div class="site-logo-mobile-menu">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="site-logo" alt="Your Logo">
                            </a>
                        </div>
    
                        <?php
                            $args = array(
                                'theme_location' => 'primary'
                            );
                        ?>

                        <?php wp_nav_menu($args); ?>

                    </div>
                </nav>
            </div>
        </header>

                        