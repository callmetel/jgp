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
  wp_register_script( 'toggle', get_template_directory_uri() . '/assets/js/_toggle.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'carousel', get_template_directory_uri() . '/assets/js/_carousel.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'map', get_template_directory_uri() . '/assets/js/map.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'studioMap', get_template_directory_uri() . '/assets/js/studio-map.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'global_script', get_template_directory_uri() . '/assets/js/_script.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'greensock', get_template_directory_uri() . '/assets/js/TweenLite.min.js', array('jquery'), '1.0.0', true );
  wp_register_script( 'start_animation', get_template_directory_uri() . '/assets/js/_startAnimation.js', array('jquery'), '1.0.0', true );


  if ( is_page( 'JGP Home' ) ) {
      wp_enqueue_script('sub_menus');
     wp_enqueue_script('global_script');
     wp_enqueue_script('greensock');
     
  }

  if ( is_page( 2 ) ) {
    wp_enqueue_script('global_script');
    wp_enqueue_script('store_nav', get_template_directory_uri() . '/assets/js/_store-nav.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'map' );
  }

  if ( is_page( 'Productions' ) ) {
    wp_enqueue_script('global_script');
    wp_enqueue_script('productions_nav');
    wp_enqueue_script('toggle');
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
  }

  if ( is_page( 'JGPStudio' ) ) {
    wp_enqueue_script('global_script');
    wp_enqueue_script('studio_nav');
    wp_enqueue_script('toggle');
    wp_enqueue_script('sub_menus', get_template_directory_uri() . '/assets/js/_sub-menus.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'studioMap', get_template_directory_uri() . '/assets/js/studio-map.js', array('jquery'), '1.0.0', true );
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
 * Remove Original Wysiwyg Editor from Backend pages
 */

add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}

/**
 * Remove Wyiswg Editor Toolbar
 */

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
  // Uncomment to view format of $toolbars
  /*
  echo '< pre >';
    print_r($toolbars);
  echo '< /pre >';
  die;
  */

  // Add a new toolbar called "Very Simple"
  // - this toolbar has only 1 row of buttons
  $toolbars['Very Simple' ] = array();
  $toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline' );

  // Edit the "Full" toolbar and remove 'code'
  // - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
  if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
  {
      unset( $toolbars['Full' ][2][$key] );
  }

  // remove the 'Basic' toolbar completely
  unset( $toolbars['Basic' ] );

  // return $toolbars - IMPORTANT!
  return $toolbars;
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
      'toolbar' => 'very_simple',
      'media_upload' => 0,
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
        'value' => '58',
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
  'key' => 'group_55dcd2b77bdc2',
  'title' => 'Audition Form Heading & Description',
  'fields' => array (
    array (
      'key' => 'field_55dcd2d112af8',
      'label' => 'Audition Form Heading',
      'name' => 'audition_form_heading',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit?</h1>',
      'tabs' => 'visual',
      'toolbar' => 'very_simple',
      'media_upload' => 0,
    ),
    array (
      'key' => 'field_55dcd3eb19600',
      'label' => 'Audition Form Description',
      'name' => 'audition_form_description',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam maxime, velit soluta atque saepe, libero voluptatem sequi expedita ea tenetur eaque.</p>',
      'tabs' => 'visual',
      'toolbar' => 'very_simple',
      'media_upload' => 0,
    ),
  ),
  'location' => array (
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
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55de3bf328762',
  'title' => 'Booking Form Heading & Description',
  'fields' => array (
    array (
      'key' => 'field_55de3bf32d644',
      'label' => 'Booking Form Heading',
      'name' => 'booking_form_heading',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit?</h1>',
      'tabs' => 'visual',
      'toolbar' => 'very_simple',
      'media_upload' => 0,
    ),
    array (
      'key' => 'field_55de3bf32d67f',
      'label' => 'Booking Form Description',
      'name' => 'booking_form_description',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam maxime, velit soluta atque saepe, libero voluptatem sequi expedita ea tenetur eaque.</p>',
      'tabs' => 'visual',
      'toolbar' => 'very_simple',
      'media_upload' => 0,
    ),
  ),
  'location' => array (
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
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55ddeb670112d',
  'title' => 'Classes List',
  'fields' => array (
    array (
      'key' => 'field_55ddeb670657f',
      'label' => 'Class',
      'name' => 'class_repeater',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'row',
      'button_label' => 'Add A Class',
      'sub_fields' => array (
        array (
          'key' => 'field_55ddeb6707ece',
          'label' => 'Class Name',
          'name' => 'class_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Class Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddeb6707ee7',
          'label' => 'Start Date',
          'name' => 'start_date',
          'type' => 'text',
          'instructions' => 'Month & Day ONLY',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Start Date',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddeb6707f25',
          'label' => 'End Date',
          'name' => 'end_date',
          'type' => 'text',
          'instructions' => 'Month & Day ONLY.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'End Date',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddeb6707f76',
          'label' => 'Age Range',
          'name' => 'age_range',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Age Range',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddeb6707f8b',
          'label' => 'Class Times',
          'name' => 'class_times',
          'type' => 'text',
          'instructions' => 'Replace bracketed text ONLY. 
"and" should be removed if class is only one day a week.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '[DAY] [TIME] and [DAY] [TIME]',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddf2e9012b9',
          'label' => 'Total Price',
          'name' => 'total_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Total Class Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55ddf3a27695b',
          'label' => 'Weekly Price',
          'name' => 'weekly_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Weekly Class Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_5672f75d158ee',
          'label' => 'Register Url',
          'name' => 'register_url',
          'type' => 'url',
          'instructions' => 'Enter the Link to Register for the Specific Class.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
        ),
        array (
          'key' => 'field_5672f79e158ef',
          'label' => 'Class Overview',
          'name' => 'class_overview',
          'type' => 'wysiwyg',
          'instructions' => 'Add A Short Description/Overview of the Class. 
***PLEASE DO NOT USE ANY OF THE FORMATTING TOOLS*** ',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'very_simple',
          'media_upload' => 0,
        ),
      ),
    ),
  ),
  'location' => array (
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
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_55de4c860092f',
  'title' => 'Events Repeater',
  'fields' => array (
    array (
      'key' => 'field_55de4c8603cfb',
      'label' => 'Events',
      'name' => 'events_repeater',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'row',
      'button_label' => 'Add An Event',
      'sub_fields' => array (
        array (
          'key' => 'field_567305dcaae35',
          'label' => 'Event Name',
          'name' => 'event_name',
          'type' => 'text',
          'instructions' => 'Enter the Name of the Event Here.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_567305faaae36',
          'label' => 'Event Image',
          'name' => 'event_image',
          'type' => 'image',
          'instructions' => 'Enter the Event Image Here.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
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
        array (
          'key' => 'field_5673063faae37',
          'label' => 'Event Description',
          'name' => 'event_description',
          'type' => 'wysiwyg',
          'instructions' => 'Enter the Description of the Event Here. Just a Couple of Sentences Describing the Event.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'very_simple',
          'media_upload' => 0,
        ),
        array (
          'key' => 'field_56730f261fa49',
          'label' => 'Event Ticket Link',
          'name' => 'event_url',
          'type' => 'url',
          'instructions' => 'Add a Link For the Event',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'http://jgp.tickeleap.com',
          'placeholder' => '',
        ),
      ),
    ),
  ),
  'location' => array (
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
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
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
  'key' => 'group_55dde37f48b80',
  'title' => 'Past Shows',
  'fields' => array (
    array (
      'key' => 'field_55dde37f4de72',
      'label' => 'Past Show',
      'name' => 'past_show',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'row',
      'button_label' => 'Add Past Show',
      'sub_fields' => array (
        array (
          'key' => 'field_55dde37f4f91b',
          'label' => 'Past Play Name',
          'name' => 'past_play_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Past Play Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f933',
          'label' => 'Location Name',
          'name' => 'location_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Location Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f946',
          'label' => 'Location Address',
          'name' => 'location_address',
          'type' => 'text',
          'instructions' => 'Street Address + City and State(abbrv) ONLY.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Location Address',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f958',
          'label' => 'Past Show Dates',
          'name' => 'past_show_dates',
          'type' => 'text',
          'instructions' => 'You will ONLY input the Month & Day of the first and last show. Make sure to keep the hyphen and space between the First and Last date.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Start Date - End Date',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f96a',
          'label' => 'Regular Admission Price',
          'name' => 'regular_admission_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Regular Admission Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f97d',
          'label' => 'Preferred Seating Price',
          'name' => 'preferred_seating_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Preferred Seating Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dde37f4f98f',
          'label' => 'Buy Ticket Link',
          'name' => 'buy_ticket_link',
          'type' => 'url',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Link to buy tickets for specific show',
          'placeholder' => '',
        ),
      ),
    ),
  ),
  'location' => array (
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
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_567111a2a4250',
  'title' => 'Plays Descriptions Repeater',
  'fields' => array (
    array (
      'key' => 'field_567111a2a95f4',
      'label' => 'Play Descriptions',
      'name' => 'new_play',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'block',
      'button_label' => 'Add A Play',
      'sub_fields' => array (
        array (
          'key' => 'field_567111a2aae36',
          'label' => 'Play Image',
          'name' => 'play_image',
          'type' => 'image',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'array',
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
        array (
          'key' => 'field_567111a2aae1d',
          'label' => 'Play Name',
          'name' => 'play_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Play Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_567111a2aae73',
          'label' => 'Cast',
          'name' => 'cast',
          'type' => 'repeater',
          'instructions' => 'Each Cast Member has an Image, Character Name, and Actor/Actress Name.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'min' => '',
          'max' => '',
          'layout' => 'table',
          'button_label' => 'Add A Cast Member',
          'sub_fields' => array (
            array (
              'key' => 'field_567112d3147cf',
              'label' => 'Actor/Actress Image',
              'name' => 'actoractress_image',
              'type' => 'image',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
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
            array (
              'key' => 'field_5671130a147d0',
              'label' => 'Actor/Actress Name',
              'name' => 'actoractress_name',
              'type' => 'text',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
              'readonly' => 0,
              'disabled' => 0,
            ),
            array (
              'key' => 'field_5671132f147d1',
              'label' => 'Character Name',
              'name' => 'character_name',
              'type' => 'text',
              'instructions' => '',
              'required' => 1,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
              'readonly' => 0,
              'disabled' => 0,
            ),
          ),
        ),
        array (
          'key' => 'field_567111a2aae89',
          'label' => 'Play Synopsis',
          'name' => 'play_synopsis',
          'type' => 'wysiwyg',
          'instructions' => 'Write a Synopsis (small paragraph) About the Play Here.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'visual',
          'toolbar' => 'very_simple',
          'media_upload' => 0,
        ),
        array (
          'key' => 'field_567111a2aaec5',
          'label' => 'Video Snippet Gallery',
          'name' => 'video_gallery',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'min' => '',
          'max' => '',
          'layout' => 'table',
          'button_label' => 'Add A Video',
          'sub_fields' => array (
            array (
              'key' => 'field_56711535147d2',
              'label' => 'Play Video',
              'name' => 'play_video',
              'type' => 'oembed',
              'instructions' => 'Add All the Videos Related to the Play by entering the Url for Each Here.',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'width' => '',
              'height' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'location' => array (
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
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_5671a4ba00f35',
  'title' => 'Social Media URLs',
  'fields' => array (
    array (
      'key' => 'field_5671a4d718418',
      'label' => 'Instagram',
      'name' => 'instagram',
      'type' => 'url',
      'instructions' => 'Paste Instagram Link Here',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'http://instagram.com',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_5671a50418419',
      'label' => 'Twitter',
      'name' => 'twitter',
      'type' => 'url',
      'instructions' => 'Paste Twitter Link Here',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'http://twitter.com',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_5671a5401841a',
      'label' => 'Facebook',
      'name' => 'facebook',
      'type' => 'url',
      'instructions' => 'Paste Facebook Link Here',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'http://facebook.com',
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
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
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
  'key' => 'group_55dce3e353a3e',
  'title' => 'Upcoming Shows',
  'fields' => array (
    array (
      'key' => 'field_55dce42fdd1af',
      'label' => 'Upcoming Show',
      'name' => 'upcoming_show',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'row',
      'button_label' => 'Add Upcoming Show',
      'sub_fields' => array (
        array (
          'key' => 'field_55dce465dd1b0',
          'label' => 'Upcoming Play Name',
          'name' => 'upcoming_play_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Upcoming Play Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dce607dd1b1',
          'label' => 'Location Name',
          'name' => 'location_name',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Location Name',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dce71cdd1b2',
          'label' => 'Location Address',
          'name' => 'location_address',
          'type' => 'text',
          'instructions' => 'Street Address + City and State(abbrv) ONLY.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Location Address',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dce7b0dd1b3',
          'label' => 'Upcoming Show Dates',
          'name' => 'upcoming_show_dates',
          'type' => 'text',
          'instructions' => 'You will ONLY input the Month & Day of the first and last show. Make sure to keep the hyphen and space between the First and Last date.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Start Date - End Date',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dce9d2dd1b5',
          'label' => 'Regular Admission Price',
          'name' => 'regular_admission_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Regular Admission Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dcecb2dd1b7',
          'label' => 'Preferred Seating Price',
          'name' => 'preferred_seating_price',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Preferred Seating Price',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => 2,
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55dce944dd1b4',
          'label' => 'Buy Ticket Link',
          'name' => 'buy_ticket_link',
          'type' => 'url',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Link to buy tickets for specific show',
          'placeholder' => '',
        ),
      ),
    ),
  ),
  'location' => array (
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
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_56710a963a0a6',
  'title' => 'JGP Location Info',
  'fields' => array (
    array (
      'key' => 'field_56710a963e9e5',
      'label' => 'Map',
      'name' => 'studio_map',
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
      'key' => 'field_56710a963e9fc',
      'label' => 'Street Address',
      'name' => 'studio_street_address',
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
      'key' => 'field_56710a963ea0e',
      'label' => 'City State Zip',
      'name' => 'studio_city_state_zip',
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
  ),
  'location' => array (
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '88',
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
  'key' => 'group_55de3df63994b',
  'title' => 'Contact JGP Studio',
  'fields' => array (
    array (
      'key' => 'field_55de3df63ca40',
      'label' => 'Contact Message',
      'name' => 'contact_message',
      'type' => 'wysiwyg',
      'instructions' => 'Write a message to potiential booking clients.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt nobis repudiandae error distinctio dolorum nisi magni voluptas, voluptate quidem eos quasi, corporis vitae deleniti architecto sed nesciunt consectetur.</h2>',
      'tabs' => 'visual',
      'toolbar' => 'very_simple',
      'media_upload' => 0,
    ),
    array (
      'key' => 'field_55de3df63ca59',
      'label' => 'Email link',
      'name' => 'email_link',
      'type' => 'email',
      'instructions' => 'Enter Email Address',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => 'example@example.com',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '88',
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
