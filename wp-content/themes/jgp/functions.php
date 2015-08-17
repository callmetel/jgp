<?php

function jgp_script_enqueue() {
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/css/style.css' , array(), '1.0.0', 'all' );
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js' , array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts' , 'jgp_script_enqueue');

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