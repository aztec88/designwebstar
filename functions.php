<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function site_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1', 'all');
	wp_enqueue_style('fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/public/dist/css/app.css', array(), '1.0.0', 'all');
//	wp_enqueue_style('swiper_css', get_template_directory_uri() . '/public/dist/css/swiper.min.css', array(), '3.4.2', 'all');


	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '4.3.1', true);
//	wp_enqueue_script('swiperjs', get_template_directory_uri() . '/public/dist/js/swiper.min.js', array(), '3.4.2', true);
	wp_enqueue_script('globaljs', get_template_directory_uri() . '/public/dist/js/global.js', array(), '1.0.0', true);



}

add_action( 'wp_enqueue_scripts', 'site_script_enqueue');

/*
	==========================================
	 Activate menus
	==========================================
*/
function site_theme_setup() {

	add_theme_support('menus');

	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');

}

add_action('init', 'site_theme_setup');


/*
	==========================================
	 Post type
	==========================================
*/
 function create_post_type() {
 	register_post_type( 'services',
 	array(
 	  'labels' => array(
 		'name' => __( 'Services' ),
 		'singular_name' => __( 'Service' )
 	  ),
 	  'public' => true,
 	  'has_archive' => true,
 	  'menu_icon' => 'dashicons-products',
 	  'rewrite' => array('slug' => 'service'),
 	  'supports' => array('title', 'editor', 'thumbnail', 'author')
 	)
   );
 }
 add_action( 'init', 'create_post_type' );


/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5', array('search-form'));


/*
	==========================================
	 Include Walker file for custom menu
	==========================================
*/
require get_template_directory() . '/inc/walker.php';


# ---------------------------------------------------
# REMOVE SCREEN READER TEXT FROM POST PAGINATION
# ---------------------------------------------------
function sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}

add_action('navigation_markup_template', 'sanitize_pagination');


# ---------------------------------------------------
# UPLOAD LIMIT
# ---------------------------------------------------

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
