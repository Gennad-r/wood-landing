<?php 
// tags inside admin
//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

if ( ! function_exists( 'wood_setup' ) ) :
	function wood_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => 'Primary menu'
		) );

		register_nav_menus( array(
			'main-menu-reg' => 'Primary menu reg'
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-thumbnails' );
		// pictures for page backgrounds
		add_image_size( 'front_bg', 1920, 99999, false );
		add_image_size( 'slider', 1169, 750, true );
		add_image_size( 'texture', 170, 100, true );
		add_image_size( 'plate', 350, 350, true );
		add_image_size( 'dimensions', 174, 176, true );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;


add_action( 'after_setup_theme', 'wood_setup' );

function wood_scripts() {

	if(isset($_SERVER['HTTP_GEOIP_COUNTRY_CODE'])){
		$geo = $_SERVER['HTTP_GEOIP_COUNTRY_CODE'];
	} else {
		$geo = 'not specified';
	}
	$agent = $_SERVER['HTTP_USER_AGENT'];


	global $wp_query;

	wp_enqueue_style( 'wood-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wood-main', get_template_directory_uri() . '/app/css/main.min.css' );

	wp_deregister_script( 'jquery' );

	wp_register_script( 'wood-vivus', get_template_directory_uri() . '/app/js/vivus.min.js', array(), null, true );

	if ( is_front_page()) {
		wp_enqueue_script( 'wood-vivus' );
	}

	wp_register_script( 'wood-main-js', get_template_directory_uri() . '/app/js/scripts.min.js', array(), null, true );

	wp_localize_script( 'wood-main-js', 'wood_main_params', array(
		'ajaxurl' => admin_url("admin-ajax.php"),
		'mail_ajaxurl' => site_url( 'mail.php' ),
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'geo' => $geo,
		'agent' => $agent
	) );

	wp_enqueue_script('wood-main-js');

}
add_action( 'wp_enqueue_scripts', 'wood_scripts' );

// load more start...

function wood_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part('parts/items');
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'wood_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'wood_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}




// custom post types entry

require_once 'parts/custom_post_types.php';

$slider = new WP_Query( array( 'post_type' => 'slider' ));

