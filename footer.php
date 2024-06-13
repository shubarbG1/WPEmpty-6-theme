        <footer class="site-footer">
            <div class="footer-wrap">

                <?php if (is_active_sidebar('footer')) : ?>

                    <div class="widget-area">
                        <?php dynamic_sidebar('footer'); ?>
                    </div>

                    <?php else : ?>

                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'footer'
                        )); ?>

                <?php endif; ?>

            </div>

            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
            </div>
        </footer>

        <?php wp_footer(); ?>

    </body>
</html>
