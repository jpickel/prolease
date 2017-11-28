<?php

// Replace Posts label as Blog in Admin Panel 

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blogs';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Blogs';
        $labels->singular_name = 'Blog';
        $labels->add_new = 'Add Blog Post';
        $labels->add_new_item = 'Add Blog Post';
        $labels->edit_item = 'Edit Blog Post';
        $labels->new_item = 'Blog';
        $labels->view_item = 'View Blog Post';
        $labels->search_items = 'Search Blog Posts';
        $labels->not_found = 'No Blog Posts found';
        $labels->not_found_in_trash = 'No Blog Posts found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

add_action( 'admin_menu', 'gowp_admin_menu' );
function gowp_admin_menu() {
  global $menu;
  foreach ( $menu as $key => $val ) {
    if ( 'Blog' == $val[0] ) {
      $menu[$key][6] = 'dashicons-welcome-add-page';
    }
  }
}



// Changing the Admin Menu

require_once('wp-admin-menu-classes.php');
add_action('admin_menu','my_admin_menu');
function my_admin_menu() {

    // Removes Sections
    remove_admin_menu_section('Links');
    //remove_admin_menu_section('Appearance');
    //remove_admin_menu_section('Tools');
    remove_admin_menu_section('Media');
    remove_admin_menu_section('edit-comments.php');
    //remove_admin_menu_section('plugins.php');
    remove_admin_menu_section('themes.php');
    remove_admin_menu_section('options-writing.php');
    remove_admin_menu_section('Profile');
    //remove_admin_menu_section('database-manager.php');
    
    // Adds Sections
      add_menu_page(
        __( 'Site Menu', 'textdomain' ),
            'Navigation',
            'manage_options',
            'nav-menus.php',
            '',
            'dashicons-menu',
            '40'
        );
      add_menu_page(
        __( 'Customize Site', 'textdomain' ),
            'Customize Site',
            'read',
            'customize.php',
            '',
            'dashicons-editor-table',
            '60'
        );
      add_menu_page(
        __( 'Sidebar Widgets', 'textdomain' ),
            'Sidebar Widgets',
            'read',
            'widgets.php',
            '',
            'dashicons-exerpt-view',
            '60'
        );
      add_menu_page(
        __( 'Profile', 'textdomain' ),
            'My Account',
            'read',
            'profile.php',
            '',
            'dashicons-admin-users',
            '100'
        );
    
}


// Changes Footer Text

function remove_footer_admin () {
    echo "ProLease";
    echo " | Designed and Managed by <a href=\"http://www.thinkfvm.com\">FVM</a>";
    echo '<meta name="viewport" content="width=768, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">';
} 

add_filter('admin_footer_text', 'remove_footer_admin'); 
		

// Modifies Admin Bar

	// Adds Additional Menus on Admin Bar 
	
	function add_sumtips_admin_bar_link() {
		global $wp_admin_bar;
		
			if ( ! is_admin() ) {
				$wp_admin_bar->add_menu( array(
				'id' => 'admin_bar_switch_view',
				'title' => __( 'Go to Dashboard'),
				'href' => __('/wp-admin/'),
				) );
			} else  {
				$wp_admin_bar->add_menu( array(
				'id' => 'admin_bar_switch_view',
				'title' => __( 'Go to Website'),
				'href' => __('/'),
				) );
			}
	
	}
	add_action('admin_bar_menu', 'add_sumtips_admin_bar_link',25);
	
	// Removes Some Default Links
	
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('site-name');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('search');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	
	// Modifies 'Howdy' Content
	
	add_filter( 'body_class', 'twentyeleven_body_classes' );
	add_filter('gettext', 'change_howdy', 10, 3);
	function change_howdy($translated, $text, $domain) {
	if (false !== strpos($translated, 'Howdy'))
	return str_replace('Howdy,', 'My Account:', $translated);
	return $translated;
	}
	
	// Hides Admin Bar for Everyone But Admins
	
	add_action('after_setup_theme', 'remove_admin_bar');
	
	function remove_admin_bar() {
		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}
	}
