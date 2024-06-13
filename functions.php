<?php
	// --------------------- 
	// --- Theme Support ---
	// ---------------------

	// Register Navigation & Footer
	add_action('after_setup_theme', 'theme_support');
	function theme_support(){
		register_nav_menus(array(
			'primary'	=> __('Primary Menu'),
			'footer'	=> __('Footer Menu'),
		));
		
		add_theme_support('post-thumbnails');
	}

	// Init Widgets | Registration	
	add_action('widgets_init', 'init_widgets');
	function init_widgets (){

		register_sidebar(array(
		'name'	=>	'Footer',
		'id'	=>	'footer',
		// 'name'	=>	'Sidebar',
		// 'id'	=>	'sidebar',
		));
	}

	// Media custom size
	// add_action( 'after_setup_theme', 'custom_image_sizes' );
	// function custom_image_sizes() {
	// 	add_image_size( 'custom-thumbnail', 300, 200, true ); // Add your custom image sizes here
	// 	add_image_size( 'another-size', 600, 400, true ); // Another example size
	// }

	// Media thumbnails support
	// Display the thumbnail size
	the_post_thumbnail('thumbnail');
	// Display the medium size
	the_post_thumbnail('medium');
	// Display the large size
	the_post_thumbnail('large');

	// SVG allowed 
	add_filter( 'upload_mimes', 'allow_svg_upload' );
	function allow_svg_upload( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	// --------------------------
	// // --- TOP NAV CLASSES ---

	// // Add level-1 & level-2 to li Ul.sub-menu	
	// add_filter('wp_nav_menu_objects', 'level_menu_classes');

	// 	function level_menu_classes($menu) {
	// 		$level = 0;
	// 		$stack = array('0');

	// 		foreach ($menu as $key => $item) {
	// 			while ($item->menu_item_parent != array_pop($stack)) {
	// 				$level--;
	// 			}
				
	// 			$level++;
	// 			$stack[] = $item->menu_item_parent;
	// 			$stack[] = $item->ID;

	// 			// Add a class to the menu item's <li> element
	// 			$menu[$key]->classes[] = 'level-' . ($level - 1);
	// 		}

	// 		return $menu;
	// 	}

	// ----------------------- 
	// --- Wp Optimization ---
	// -----------------------

	// ---------------------------------------------------
	// REMOVE DEFAULT WP (Combine functions & run on init)

	add_action('init', 'remove_unwanted_elements');
	function remove_unwanted_elements() {
		// Remove Emoji Support
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
		
		// Remove unwanted link tags from the head
		remove_action('wp_head', 'rest_output_link_wp_head');
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_shortlink_wp_head');
		remove_action('wp_head', 'wp_resource_hints', 2); //Remove WordPress.org Dns-prefetch.
		remove_action('wp_head', 'wp_generator'); // Remove WordPress version from the head
	}

	// Remove Gutenberg block library CSS and WooCommerce block CSS
	add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);
	function remove_wp_block_library_css() {
		wp_dequeue_style('wp-block-library'); // Seams to Affect some layout !See sidebar default Widget (get_sidebar) (page.php, ??see on single??)
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('wc-block-style');
		wp_dequeue_style('classic-theme-styles');
		wp_dequeue_style('global-styles'); 
	}

	// Disable REST API XML-RPC
	add_filter('xmlrpc_enabled', '__return_false');

	// ------------------------
	// --- Disable Comments ---

	// Disable comments, new posts V2, trackbacks globally
	add_filter('comments_open', '__return_false', 20, 2);
	add_filter('pings_open', '__return_false', 20, 2);
	
	// Remove comments support from all post types, including pages
	add_action('init', function () {
		$post_types = get_post_types(['public' => true], 'objects');
		foreach ($post_types as $post_type) {
			remove_post_type_support($post_type->name, 'comments');
			remove_post_type_support($post_type->name, 'trackbacks');
		}
	});

	// --------------
	// --- JQUERY ---

	// // -- Defer jQuery --
	// function defer_jquery_loading() {
	// 	if (!is_admin()) {
	// 		wp_deregister_script('jquery');
	// 		wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, null, true);
	// 		add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
	// 	}
	// }
	// add_action('wp_enqueue_scripts', 'defer_jquery_loading');
	
	// function add_defer_attribute($tag, $handle) {
	// 	if ('jquery' !== $handle) {
	// 		return $tag;
	// 	}
	// 	return str_replace(' src', ' defer="defer" src', $tag);
	// }
	
	// // -- Disabling jQuery --
	// Disable jQuery and jQuery Migrate in WordPress
	// add_action('wp_enqueue_scripts', 'disable_wp_jquery');

	// function disable_wp_jquery() {
	// 	if (!is_admin()) {
	// 		wp_deregister_script('jquery');
	// 		wp_deregister_script('jquery-migrate');
	// 	}
	// }


	// -----------------------------
	// --- Enqueueing CSS and JS ---
	// -----------------------------

	require_once get_template_directory() . '/enqueue.php';

	// -----------------
	// -- Other Stuff --
	// -----------------

	// Hide WordPress Blog Post list (index.php) | 23017012=?,23035046=CovidPage
	add_action('pre_get_posts', 'wp_exclude_from_post_list');
	function wp_exclude_from_post_list($query) {
		if ($query->is_home() ) {
			$query->set('post__not_in', array(23016990, 23035046));
		}
	}

		