<?php

require_once('inc/wp-modifications.php');
require_once('inc/post-types.php');
require_once('inc/theme-options.php');

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

add_filter( 'nav_menu_link_attributes', 'filter_function_name', 10, 3 );

function filter_function_name( $atts, $item, $args ) {
    $atts['data-main-nav'] = 'mainNav';
    return $atts;
}

// Adds Sidebars

function magazino_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Sidebar', 'sidebar' ),
    'id' => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
  ) );

}
add_action( 'widgets_init', 'magazino_widgets_init' );


// Adds Support for Menus

add_theme_support( 'menus' );

register_nav_menus( array(  
    'primary' => __( 'Primary Navigation' ), 
    'mobile' => __( 'Mobile Navigation' ), 
    'toolbar' => __( 'Toolbar Navigation' ), 
    'footer' => __( 'Footer Navigation' ), 
) );

// Adds size options for the plugin "Menu Image"
add_filter( 'menu_image_default_sizes', function($sizes){
  // add a new size
  $sizes['menu-75x75'] = array(75,75);

  // return $sizes (required)
  return $sizes;
 
});


  
// Adds Style to Admin

add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
echo '
    <link href="'.get_bloginfo('template_directory').'/css/admin.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=1100, initial-scale=0.5">
';
}


// Changes Login Logo

function custom_login_logo() {
  echo '<style type="text/css">
  h1 a { background-image: url('.get_bloginfo('template_directory').'/images/login-logo.png) !important; width: 300px !important; height: 83px !important; background-size: 100% !important; }
  </style>';
}
add_action('login_head', 'custom_login_logo');

add_editor_style();

function wpdocs_theme_name_scripts() {
    wp_register_script( 'jq', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array( ), NULL, false );
    wp_enqueue_script( 'jq' );
    wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jq' ), NULL, false );
    wp_enqueue_script( 'isotope' );
    wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' , array( 'jq' ), NULL, false );
    wp_enqueue_script( 'bootstrap' );
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js' , array( 'jq' ), NULL, false );
    wp_enqueue_script( 'modernizr' );
    wp_register_script( 'float', get_template_directory_uri() . '/js/float.js' , array( 'jq' ), NULL, false );
    wp_enqueue_script( 'float' );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Adding the custom query variable "rsrc" to the query_vars filter. Used on template-resource-form.php
function add_query_vars_filter( $vars ){
  $vars[] = "rsrc";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

// Function to call the Emma API.
function add_user_to_emma( $data ) {

  // Emma Authentication Variables
  $account_id = "1781505"; // add your account id
  $public_api_key = "7e846f2c90dd32ea4721"; // add your public api key
  $private_api_key = "169721cecd9c70c11eed"; // add your private api key
  // Form variable(s)
  $form_fields = $data[ 'fields' ];
  $member_fields = array();
  $options_array = array();
  $groups = array();

  // Depending on the type of field, the data has to be prepared differently.
  foreach( $form_fields as $field ){

      // A Checkbox List can have multiple values so the value in the $member_fields array must be an array ($options_array).
      if ($field['settings']['type'] == 'listcheckbox') {

        $options_array = $field['settings']['value'];
        $key = $field[ 'key' ];
        $member_fields[$key] = $options_array;

      // A Checkbox is either 1 or 0. However on the Emma frontend the value is what appears to the user. For better readability it converts to "Checked" or "Unchecked".
      } elseif ($field['settings']['type'] == 'checkbox') {
          
          if ($field['value'] == 1) {
            $checkbox_value = "Checked";
            $member_fields[$field[ 'key' ]] = $checkbox_value;
          }

      // If a $field has a label of "group_id" it is added to the $groups array.
      } elseif ($field['settings']['label'] == 'group_id') {

        array_push($groups, $field['settings']['value']);

      // All other fields should be strings or numbers and they can be added directly into the $member_fields array.
      } else {
        if ($field[ 'value' ] != '') {
          
          $member_fields[$field[ 'key' ]] = $field[ 'value' ];
          
        }

      }
  };

  // Member data other than email should be passed in the array $member_fields.
  $member_data = array(
    "email" => $member_fields['email'],
    "fields" => $member_fields,
    "group_ids" => $groups
  );

  // API call to add member.

  // Set URL
  $url = "https://api.e2ma.net/".$account_id."/members/add";
  // setup and execute the cURL command
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_USERPWD, $public_api_key . ":" . $private_api_key);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($member_data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($member_data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $head = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  // API call to signup form.

  $member_data = array(
    "email" => $member_fields['email'],
    "signup_form_id" => $member_fields['signup_form_id'],
    "opt_in_confirmation" => false
  );

  // Set URL
  $url = "https://api.e2ma.net/".$account_id."/members/signup";
  // setup and execute the cURL command
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_USERPWD, $public_api_key . ":" . $private_api_key);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($member_data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($member_data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $head = curl_exec($ch);
  $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
}

// This action fires after a form submitted and makes a call to the Emma API.
add_action( 'ninja_forms_after_submission', 'my_ninja_forms_after_submission' );
function my_ninja_forms_after_submission( $form_data ){
  add_user_to_emma($form_data);
}

?>
