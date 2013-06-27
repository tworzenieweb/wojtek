<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
*/

add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	wp_enqueue_style( 'pytheas-style', get_stylesheet_uri() );
	wp_enqueue_style( 'prettyphoto', WPEX_CSS_DIR . '/prettyphoto.css', true) ;
	wp_enqueue_style( 'font-awesome', WPEX_CSS_DIR . '/font-awesome.min.css', true );
	
	

	/*******
	*** jQuery
	*******************/
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
	
	if ( wp_is_mobile() ) {
		wp_enqueue_script( 'mobile', WPEX_JS_DIR .'/mobile.js', array('jquery'), '1.0', true );
	}
	
	wp_enqueue_script( 'prettyphoto', WPEX_JS_DIR .'/prettyphoto.js', array('jquery'), '3.1.4', true );
	wp_enqueue_script('wpex-prettyphoto-init', WPEX_JS_DIR .'/prettyphoto-init.js', array('jquery','prettyphoto'), '1.0', true );
	
	$lightbox_params = array(
		'theme' => of_get_option('lightbox_theme')
	);
	wp_localize_script( 'prettyphoto', 'lightboxLocalize', $lightbox_params );
	
	wp_enqueue_script('wpex-global', WPEX_JS_DIR .'/global.js', false, '1.0', true);
	
}



/**
* Browser Specific CSS
* @Since 1.0
*/
if ( !function_exists('wpex_ie_css') ) {
	add_action('wp_head', 'wpex_ie_css');
	function wpex_ie_css() {
		echo '<!-- Custom CSS For IE -->';
		echo '<!--[if IE]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/ie.css" media="screen" /><![endif]-->';
		echo '<!--[if IE 8]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/ancient-ie.css" media="screen" /><![endif]-->';
		echo '<!--[if IE 7]><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/font-awesome-ie7.min.css" media="screen" /><link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() .'/css/antient-ie.css" media="screen" /><![endif]-->';
	}
}




/**
* HTML5 & CSS3 IE Dependencies
* @Since 1.0
*/
if ( !function_exists('wpex_ie_css') ) {
	function wpex_html_css_dependencies() {
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
		echo '<![endif]-->';
	}
	add_action('wp_head', 'wpex_html_css_dependencies');
}