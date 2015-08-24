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


  if ( is_page( 'JGP Home' ) ) {
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
  }

  if ( is_page( 2 ) ) {
    wp_enqueue_script('store_nav', get_template_directory_uri() . '/assets/js/_store-nav.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
  }

  if ( is_page( 'Productions' ) ) {
    wp_enqueue_script('productions_nav');
    wp_enqueue_script('lightbox');
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
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
 * Remove Original Wysmig Editor from Backend pages
 */

add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}

/**
 * Allow SVG files to be uploaded
 */

add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

  // add the file extension to the array

  $existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

  return $existing_mimes;

}

/**
 * Advanced Custom Fields
 * [add field groups to the site]
 */


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_55d7496e65d43',
  'title' => 'About Descriptions',
  'fields' => array (
    array (
      'key' => 'field_55d749990e65b',
      'label' => 'Description',
      'name' => 'description',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'visual',
      'toolbar' => 'basic',
      'media_upload' => 1,
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
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'comments',
    1 => 'author',
  ),
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55d61de38ec62',
  'title' => 'Home Layout',
  'fields' => array (
    array (
      'key' => 'field_55d61dfdcd924',
      'label' => 'Fixed Navigation',
      'name' => 'fixed_nav',
      'type' => 'nav_menu',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'save_format' => 'menu',
      'container' => 'nav',
      'allow_null' => 0,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '58',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'field',
  'hide_on_screen' => array (
    0 => 'comments',
    1 => 'author',
  ),
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55d753d798e4c',
  'title' => 'Subpage Global Nav',
  'fields' => array (
    array (
      'key' => 'field_55d753d79d6df',
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

acf_add_local_field_group(array (
  'key' => 'group_55d75ad3c1539',
  'title' => 'Store Location Info',
  'fields' => array (
    array (
      'key' => 'field_55d75b374b7cf',
      'label' => 'Map',
      'name' => 'map',
      'type' => 'google_map',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'center_lat' => '39.943302',
      'center_lng' => '-75.162258',
      'zoom' => 14,
      'height' => '',
    ),
    array (
      'key' => 'field_55d774674cfeb',
      'label' => 'Street Address',
      'name' => 'street_address',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '1214 South St',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_55d774924cfec',
      'label' => 'City State Zip',
      'name' => 'city_state_zip',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'Philadelphia, Pa 19147',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_55d777157674a',
      'label' => 'Weekday Hours',
      'name' => 'weekday_hours',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'TUES-FRI 2PM-7PM',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_55d777c27674b',
      'label' => 'Weekend Hours',
      'name' => 'weekend_hours',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'SAT&SUN 12PM-7PM',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
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
  ),
  'menu_order' => 1,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'comments',
    1 => 'author',
    2 => 'featured_image',
  ),
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55d88e40194f0',
  'title' => 'Donate Section',
  'fields' => array (
    array (
      'key' => 'field_55d88e6204727',
      'label' => 'Description',
      'name' => 'donate_description',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'visual',
      'toolbar' => 'basic',
      'media_upload' => 1,
    ),
    array (
      'key' => 'field_55d8906b04728',
      'label' => 'Donate Button',
      'name' => 'donate_button',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'DONATE NOW',
      'placeholder' => '',
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
  ),
  'menu_order' => 2,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'comments',
    1 => 'author',
  ),
  'active' => 1,
  'description' => '',
));

endif;