<?php 

add_action( 'init', 'create_post_type' );
	function create_post_type() {

	    // Adds Team Member

	    register_post_type( 'team_member',
	    array(
	        'labels' => array(
	            'name' => __( 'Team Members' ),
	            'singular_name' => __( 'Team Member' ),
	            'add_new' => __( 'Add New' ),
	            'add_new_item' => __( 'Add New' ),
	            'edit_item' => __( 'Edit' ),
	            'new_item' => __( 'New' ),
	            'view_item' => __( 'View' ),
	            'search_items' => __( 'Search Team Members' ),
	            'not_found' => __( 'None Found' ),
	            'not_found_in_trash' => __( 'None Found' ),
	            'all_items' => __( 'All Team Members' ),
	            ),
	        'public' => true,
	        'comments' => true,
	        'rewrite' => array('slug' => 'team_member'),
	        'supports' => array('title'),
	        'menu_icon' => 'dashicons-id-alt',
	        'menu_position' => 21,
	        'taxonomies' => array('post_tag'),
	        )
	    );

	    // Adds Client

	    register_post_type( 'client',
	    array(
	        'labels' => array(
	            'name' => __( 'Clients' ),
	            'singular_name' => __( 'Client' ),
	            'add_new' => __( 'Add New' ),
	            'add_new_item' => __( 'Add New' ),
	            'edit_item' => __( 'Edit' ),
	            'new_item' => __( 'New' ),
	            'view_item' => __( 'View' ),
	            'search_items' => __( 'Search Clients' ),
	            'not_found' => __( 'None Found' ),
	            'not_found_in_trash' => __( 'None Found' ),
	            'all_items' => __( 'All Clients' ),
	            ),
	        'public' => true,
	        'comments' => true,
	        'rewrite' => array('slug' => 'client'),
	        'supports' => array('title','thumbnail'),
	        'menu_icon' => 'dashicons-groups',
	        'menu_position' => 22,
	        'taxonomies' => array('post_tag'),
	        )
	    );

	    // Adds Resource

	    register_post_type( 'resource',
	    array(
	        'labels' => array(
	            'name' => __( 'Resources' ),
	            'singular_name' => __( 'Resource' ),
	            'add_new' => __( 'Add New' ),
	            'add_new_item' => __( 'Add New' ),
	            'edit_item' => __( 'Edit' ),
	            'new_item' => __( 'New' ),
	            'view_item' => __( 'View' ),
	            'search_items' => __( 'Search Resources' ),
	            'not_found' => __( 'None Found' ),
	            'not_found_in_trash' => __( 'None Found' ),
	            'all_items' => __( 'All Resources' ),
	            ),
	        'public' => true,
	        'has_archive' => true,
	        'comments' => true,
	        'rewrite' => array('slug' => 'resource'),
	        'supports' => array('title'),
	        'menu_icon' => 'dashicons-images-alt2',
	        'menu_position' => 22,
	        'taxonomies' => array('post_tag'),
	        )
	    );

	    // Adds case study - disabled 9/5/17

//	    register_post_type( 'case_study',
//	    array(
//	        'labels' => array(
//	            'name' => __( 'Case Studies' ),
//	            'singular_name' => __( 'Case Study' ),
//	            'add_new' => __( 'Add New' ),
//	            'add_new_item' => __( 'Add New' ),
//	            'edit_item' => __( 'Edit' ),
//	            'new_item' => __( 'New' ),
//	            'view_item' => __( 'View' ),
//	            'search_items' => __( 'Search Case Studies' ),
//	            'not_found' => __( 'None Found' ),
//	            'not_found_in_trash' => __( 'None Found' ),
//	            'all_items' => __( 'All Case Studies' ),
//	            ),
//	        'public' => true,
//	        'comments' => true,
//	        'rewrite' => array('slug' => 'case-study'),
//	        'supports' => array('title', 'editor'),
//	        'menu_icon' => 'dashicons-media-interactive',
//	        'menu_position' => 23,
//	        'taxonomies' => array('post_tag'),
//	        )
//	    );

	}

	// Adds Custom Taxonomies

function add_custom_taxonomies() {

    // Add Team or Board Member Categories.

    register_taxonomy('client_category', 'client', array(
        'hierarchical' => true,
        'sort' => true,
        'public' => true,
        'labels' => array(
            'name' => _x( 'Client Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Client Category', 'taxonomy singular name' ),
            'all_items' => __( 'All Client Categories' ),
            'edit_item' => __( 'Edit Client Category' ),
            'update_item' => __( 'Update Client Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Client Category' ),
            'menu_name' => __( 'Client Categories' ),
        ),
        'rewrite' => array(
            'slug' => 'clients', 
            'with_front' => false, 
            'hierarchical' => true,
        ),
    ));
	
}

add_action( 'init', 'add_custom_taxonomies', 0 );