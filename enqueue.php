<?php

    // ---------------------------------- 
	// --- Enqueue OR Inline CSS & JS ---
	// ----------------------------------

	add_action('wp_head', 'inline_css_and_js');
	function inline_css_and_js() {
		// Inline style.css
		$style_css = file_get_contents(get_stylesheet_directory() . '/style.css');
		if ($style_css !== false) {
		echo '<style>' . $style_css . '</style>';
		}
		// Inline utilities.css
		$utilities_css = file_get_contents(get_stylesheet_directory() . '/css/utilities.css');
		if ($utilities_css !== false) {
		echo '<style>' . $utilities_css . '</style>';
		}
		// Inline fonts.css
		$fonts_css = file_get_contents(get_stylesheet_directory() . '/css/fonts.css');
		if ($fonts_css !== false) {
		echo '<style>' . $fonts_css . '</style>';
		}
		// Inline navbar.css
		$navbar_css = file_get_contents(get_stylesheet_directory() . '/css/navbar.css');
		if ($navbar_css !== false) {
		echo '<style>' . $navbar_css . '</style>';
		}
	}

	// ----------------------------
	// Enqueue CSS & JS Globally
	add_action('wp_enqueue_scripts', 'enqueue_css_and_js');
	function enqueue_css_and_js() {

		// General CSS
		// wp_enqueue_style('style-css', get_stylesheet_uri());
		// wp_enqueue_style('utilities-css', get_stylesheet_directory_uri() . '/css/utilities.css', array(), '1.0');
		// wp_enqueue_style('fonts-css', get_stylesheet_directory_uri() . '/css/fonts.css', array(), '1.0');

		// NavBar CSS & JS
		// wp_enqueue_style('navbar-css', get_stylesheet_directory_uri() . '/css/navbar.css', array(), '1.0');
		wp_enqueue_style('navbar-anim-css', get_stylesheet_directory_uri() . '/css/navbar-anim.css', array(), '1.0');
		wp_enqueue_script('navbar-js', get_stylesheet_directory_uri() . '/js/navbar.js', array(), '1.0', true);
		
		// Other CSS
		wp_enqueue_style('footer-css', get_stylesheet_directory_uri() . '/css/footer.css', array(), '1.0');
		wp_enqueue_style('sidebar-css', get_stylesheet_directory_uri() . '/css/sidebar.css', array(), '1.0');
		wp_enqueue_style('wpcf7-css', get_stylesheet_directory_uri() . '/css/wpcf7.css', array(), '1.0');
		
		// Global Templates CSS
		if (is_page()) {
			wp_enqueue_style('page-css', get_template_directory_uri() . '/css/page.css', array(), '1.0');
		}
		if (is_single()) {
			wp_enqueue_style('single-css', get_template_directory_uri() . '/css/single.css', array(), '1.0');
		}
		if (is_home() || is_archive() || is_category() || is_tag()) {
			wp_enqueue_style('index-css', get_template_directory_uri() . '/css/index.css', array(), '1.0');
		}
		
		// Conditional Page/Post CSS & JS

		// -- Pages| Post Page
		// Enqueue from template name
		if (is_page_template('page-templates/page-reconnection-yoga-retreat.php')) {
			wp_enqueue_style('reconnection-yoga-retreat', get_stylesheet_directory_uri() . '/css/reconnection-yoga-retreat.css', array(), '1.0');
		}
		if (is_page_template('page-templates/page-yoga-retreat-multi-styles.php')) {
			wp_enqueue_style('multi-styles-yoga-retreat', get_stylesheet_directory_uri() . '/css/multi-styles-yoga-retreat.css', array(), '1.0');
		}
		if (is_page_template('page-templates/page-50-hour-yoga-teacher-training.php')) {
			wp_enqueue_style('50-hour-yoga-teacher-training', get_stylesheet_directory_uri() . '/css/50-hour-yoga-teacher-training.css', array(), '1.0');
		}
		if (is_page_template('page-templates/page-yoga-poses-library.php')) {
			wp_enqueue_style('yoga-poses-library', get_stylesheet_directory_uri() . '/css/yoga-poses-library.css', array(), '1.0');
		}
		if (is_page_template('page-templates/page-yoga-poses-common.php') || is_page_template('page-templates/page-yoga-poses-sun-salutations.php')) {
			wp_enqueue_style('yoga-poses-common', get_stylesheet_directory_uri() . '/css/yoga-poses-common.css', array(), '1.0');
		}

		// -- Blog Post | Post Post
		// Enqueue from url
		if (is_single('yoga-poses')) {
			wp_enqueue_style('yoga-poses-guide', get_stylesheet_directory_uri() . '/css/yoga-poses-guide.css', array(), '1.0');
			wp_enqueue_style('popup-1', get_stylesheet_directory_uri() . '/css/popup-1.css', array(), '1.0');
			wp_enqueue_script('poses-guide-sort-js', get_stylesheet_directory_uri() . '/js/poses-guide-sort.js', array(), '1.0', true);
			wp_enqueue_script('poses-guide-search-js', get_stylesheet_directory_uri() . '/js/poses-guide-search.js', array(), '1.0', true);
			wp_enqueue_script('poses-guide-add-active-js', get_stylesheet_directory_uri() . '/js/poses-guide-add-active.js', array(), '1.0', true);
			wp_enqueue_script('popup-1-js', get_stylesheet_directory_uri() . '/js/popup-1.js', array(), '1.0', true);
			wp_enqueue_script('up-icon-js', get_stylesheet_directory_uri() . '/js/up-icon.js', array(), '1.0', true);
		}
		if (is_single('yoga-poses-index')) {
			wp_enqueue_style('yoga-poses-names', get_stylesheet_directory_uri() . '/css/yoga-poses-names.css', array(), '1.0');
			wp_enqueue_script('up-icon-js', get_stylesheet_directory_uri() . '/js/up-icon.js', array(), '1.0', true);
		}

		
		// --------------------
		// --- Logged Front End
		// --------------------

		if (is_user_logged_in() && (current_user_can('administrator') || current_user_can('editor') || current_user_can('author'))) {
			// Enqueue your custom CSS file
			wp_enqueue_style('admin-top-bar-css', get_stylesheet_directory_uri() . '/css/admin-top-bar.css', array(), '1.0');
		}
	}