<?php

add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );
}

function jgp_script_enqueue() {
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/style.css' , array(), '1.0.0', 'all' );
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js' , array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts' , 'jgp_script_enqueue');

// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
function jgp_load_javascript_files() {
  wp_register_script( 'store_nav', get_template_directory_uri() . '/assets/js/_store-nav.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'productions_nav', get_template_directory_uri() . '/assets/js/_productions-nav.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'studio_nav', get_template_directory_uri() . '/assets/js/_studio-nav.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'lightbox', get_template_directory_uri() . '/assets/js/_lightbox.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'carousel', get_template_directory_uri() . '/assets/js/_carousel.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'map', get_template_directory_uri() . '/assets/js/map.js', array('jquery'), '1.0.0', true );


  if ( is_page( 2 ) ) {
    wp_enqueue_script('store_nav', get_template_directory_uri() . '/assets/js/_store-nav.js', array('jquery'), '1.0.0', true );
  }

  if ( is_page( 'Productions' ) ) {
    wp_enqueue_script('productions_nav');
    wp_enqueue_script('lightbox');
  }

  if ( is_page( 'JGPStudio' ) ) {
    wp_enqueue_script('studio_nav');
    wp_enqueue_script('carousel');
  }
}
add_action( 'wp_enqueue_scripts', 'jgp_load_javascript_files' );

function jgp_theme_setup(){

	add_theme_support('menus');

	register_nav_menu( 'primary', 'Fixed Nav' );
	register_nav_menu( 'secondary', 'Subpage Nav' );
}

add_action( 'init', 'jgp_theme_setup' );

/**
 * Custom wrapper to load the partials files enabling the pass of parameters
 * to the partial as local variables.
 * @param   String  $file_name  The name of the file to load
 * @param   Array   $vars       Extra variables to pass to the partial
 */
if ( ! function_exists( 'load_partial' ) ) :
	function load_partial( $file_name = '', $args = array() ) {
		$path = 'page-templates/partials/' . $file_name;
		load_template_part( $path, $args );
	}
endif;