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
  wp_register_script( 'sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );


  if ( is_page( 2 ) ) {
    wp_enqueue_script('store_nav', get_template_directory_uri() . '/assets/js/_store-nav.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
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

  register_nav_menus(array(
    'primary' => __('Fixed Nav', 'jgp'),
    'secondary' => __('Subpage Nav', 'jgp'),
    'store-menu' => __('Here2CoolStuff Menu', 'jgp'),
    'productions-menu' => __('John Graves Productions Menu', 'jgp'),
    'studio-menu' => __('JGP Studio Menu', 'jgp')
    ));
 
}

add_action( 'init', 'jgp_theme_setup' );


/**
 * Advanced Custom Fields
 * [add field groups to the site]
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_55d36a3b5be6e',
  'title' => 'Subpage Layout',
  'fields' => array (
    array (
      'key' => 'field_55d361fa7d981',
      'label' => 'Subpage Navigation',
      'name' => 'subpage-nav',
      'type' => 'nav_menu',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => 'nav-desktop',
        'id' => '',
      ),
      'save_format' => 'menu',
      'container' => 0,
      'allow_null' => 0,
    ),
    array (
      'key' => 'field_55d5dc921c370',
      'label' => 'Social Media Footer',
      'name' => 'social_media_footer',
      'type' => 'gallery',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => 'icons-wrap',
      ),
      'min' => 3,
      'max' => 3,
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '2',
      ),
    ),
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '77',
      ),
    ),
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '88',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'discussion',
    1 => 'comments',
  ),
  'active' => 1,
  'description' => '',
));

endif;