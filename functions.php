<?php 

define("FILE_VERSION",     "0.0.1");


/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
    return array();
    }
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}
   
/**
 * Disable search function 
*/
function dsiable_search( $query, $error = true ) {
	
	if ( is_search() ) {
		$query->is_search = false;
		$query->query_vars[s] = false;
		$query->query[s] = false;
		
		// to error
		if ( $error == true )
			$query->is_404 = true;
	}
}

add_action( 'parse_query', 'dsiable_search' );

/**
 * Set up functions and add theme support
*/
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');

if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup(){
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_filter( 'widget_text', 'shortcode_unautop');
        add_filter('widget_text', 'do_shortcode');

	}
}


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'is-active ';
    }
    return $classes;
}

add_action( 'after_setup_theme', 'theme_setup' );
// Enqueue scripts and styles
function enqueue_scripts_styles(){
	// styles
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), FILE_VERSION );
    wp_enqueue_style('flexbox-grid', "https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css", "", false, 'all');
    // wp_enqueue_style('roboto', "https://fonts.googleapis.com/css?family=Roboto:300,400,700", "", false, 'all');
    // wp_enqueue_style('droid-sans-mono', "https://fonts.googleapis.com/css?family=Droid+Sans+Mono", "", false, 'all');
    // wp_enqueue_style('open-sans', "https://fonts.googleapis.com/css?family=Open+Sans:300,400", "", false, 'all');
    wp_enqueue_style('lato', "https://fonts.googleapis.com/css?family=Lato:300,400", "", false, 'all');
    
    
	// scripts
    wp_deregister_script( 'jquery' );
    
    
    if(is_user_logged_in()){
        wp_register_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, NULL, true );
        wp_enqueue_script( 'jquery' );
    }
	wp_enqueue_script( 'script', get_template_directory_uri() . '/script.js', array('jquery'), FILE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );

/*--------------------------------------------------------------
# Register Menu and Widgets
--------------------------------------------------------------*/ 
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
    register_nav_menu( 'primary', ( 'Primary Menu' ) );
    register_nav_menu( 'mobile-menu', ( 'Mobile Menu' ) );
}

/*--------------------------------------------------------------
# add class for prev and next posts link
--------------------------------------------------------------*/ 
function posts_link_attributes_1() {
    return 'class="prev-posts"';
}
function posts_link_attributes_2() {
    return 'class="next-posts"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');


include_once get_parent_theme_file_path( './utilities/shortcodes.php' );