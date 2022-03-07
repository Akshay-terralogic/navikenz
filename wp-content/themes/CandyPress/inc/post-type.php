<?php
	/*=Services CPT*/
	function cpt_services() {
		$labels = array(
			'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Services', 'text_domain' ),
			'name_admin_bar'        => __( 'Service', 'text_domain' ),
			'archives'              => __( 'Service Archives', 'text_domain' ),
			'attributes'            => __( 'Service Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Service:', 'text_domain' ),
			'all_items'             => __( 'All Services', 'text_domain' ),
			'add_new_item'          => __( 'Add New Service', 'text_domain' ),
			'add_new'               => __( 'Add New Service', 'text_domain' ),
			'new_item'              => __( 'New Service', 'text_domain' ),
			'edit_item'             => __( 'Edit Service', 'text_domain' ),
			'update_item'           => __( 'Update Service', 'text_domain' ),
			'view_item'             => __( 'View Service', 'text_domain' ),
			'view_items'            => __( 'View Service', 'text_domain' ),
			'search_items'          => __( 'Search Service', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Service', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Service', 'text_domain' ),
			'items_list'            => __( 'Services list', 'text_domain' ),
			'items_list_navigation' => __( 'Services list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Services list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Service', 'text_domain' ),
			'description'           => __( 'Services', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( 'service-tags' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-admin-tools',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'services', $args );
	}
	add_action( 'init', 'cpt_services', 0 );

	/*=Service Tags*/ 
	function service_tags() {
		$labels = array(
			'name'                       => _x( 'tags', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'tag', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Service Tags', 'text_domain' ),
			'all_items'                  => __( 'All Tags', 'text_domain' ),
			'parent_item'                => __( 'Parent Tag', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
			'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
			'update_item'                => __( 'Update Tag', 'text_domain' ),
			'view_item'                  => __( 'View Tag', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate Tags with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Tags', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Tags', 'text_domain' ),
			'search_items'               => __( 'Search Tags', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No Tags', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => false,
		);
		register_taxonomy( 'service-tags', array( 'services' ), $args );
	}
	add_action( 'init', 'service_tags', 0 );

	/*=CPT Case Studies*/ 
	function cpt_case_studies() {
		$labels = array(
			'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Case Study', 'text_domain' ),
			'name_admin_bar'        => __( 'Case Study', 'text_domain' ),
			'archives'              => __( 'Case Study Archives', 'text_domain' ),
			'attributes'            => __( 'Case Study Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Case Study:', 'text_domain' ),
			'all_items'             => __( 'All Case Studies', 'text_domain' ),
			'add_new_item'          => __( 'Add New Case Study', 'text_domain' ),
			'add_new'               => __( 'Add Case Study', 'text_domain' ),
			'new_item'              => __( 'New Case Study', 'text_domain' ),
			'edit_item'             => __( 'Edit Case Study', 'text_domain' ),
			'update_item'           => __( 'Update Case Study', 'text_domain' ),
			'view_item'             => __( 'View Case Study', 'text_domain' ),
			'view_items'            => __( 'View Case Studies', 'text_domain' ),
			'search_items'          => __( 'Search Case Study', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Case Study', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Case Study', 'text_domain' ),
			'items_list'            => __( 'Case Studies list', 'text_domain' ),
			'items_list_navigation' => __( 'Case Studies list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Case Studies list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Case Study', 'text_domain' ),
			'description'           => __( 'Case Study', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'taxonomies'            => array( '' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'case-studies', $args );
	}
	add_action( 'init', 'cpt_case_studies', 0 );

	/*=CPT opportunities*/
	function cpt_opportunities() {
		$labels = array(
			'name'                  => _x( 'Opportunities', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Opportunity', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Opportunities', 'text_domain' ),
			'name_admin_bar'        => __( 'Opportunity', 'text_domain' ),
			'archives'              => __( 'Opportunity Archives', 'text_domain' ),
			'attributes'            => __( 'Opportunity Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Opportunity:', 'text_domain' ),
			'all_items'             => __( 'All Opportunities', 'text_domain' ),
			'add_new_item'          => __( 'Add New Opportunity', 'text_domain' ),
			'add_new'               => __( 'Add New Opportunity', 'text_domain' ),
			'new_item'              => __( 'New Opportunity', 'text_domain' ),
			'edit_item'             => __( 'Edit Opportunity', 'text_domain' ),
			'update_item'           => __( 'Update Opportunity', 'text_domain' ),
			'view_item'             => __( 'View Opportunity', 'text_domain' ),
			'view_items'            => __( 'View Opportunities', 'text_domain' ),
			'search_items'          => __( 'Search Opportunity', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Opportunity', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Opportunity', 'text_domain' ),
			'items_list'            => __( 'Opportunities list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Opportunity', 'text_domain' ),
			'description'           => __( 'Opportunities Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'revisions' ),
			'taxonomies'            => array( 'opportunity-type','opportunity-locations' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-smiley',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'opportunities', $args );
	}
	add_action( 'init', 'cpt_opportunities', 0 );

	/*=opportunities Tax*/
	function opportunity_tax() {
		$labels = array(
			'name'                       => _x( 'Opportunity types', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Opportunity type', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Opportunity type', 'text_domain' ),
			'all_items'                  => __( 'All Opportunity types', 'text_domain' ),
			'parent_item'                => __( 'Parent Opportunity type', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Opportunity type:', 'text_domain' ),
			'new_item_name'              => __( 'New Opportunity type', 'text_domain' ),
			'add_new_item'               => __( 'Add Opportunity type', 'text_domain' ),
			'edit_item'                  => __( 'Edit Opportunity type', 'text_domain' ),
			'update_item'                => __( 'Update Opportunity type', 'text_domain' ),
			'view_item'                  => __( 'View Opportunity type', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate Opportunity typies with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Opportunity typies', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'opportunity-type', array( 'opportunities' ), $args );
	}
	add_action( 'init', 'opportunity_tax', 0 );

	/*=TAX opportunity locations*/
	function tax_opportunity_locations() {
		$labels = array(
			'name'                       => _x( 'Opportunity Locations', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Opportunity Locations', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Opportunity Locations', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'opportunity-locations', array( 'opportunities' ), $args );
	}
	add_action( 'init', 'tax_opportunity_locations', 0 );

	/*Newsroom*/
	function cpt_newsroom() {
		$labels = array(
			'name'                  => _x( 'Newsroom', 'Newsroom General Name', 'text_domain' ),
			'singular_name'         => _x( 'Newsroom', 'Newsroom Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Newsroom', 'text_domain' ),
			'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
			'archives'              => __( 'News Archives', 'text_domain' ),
			'attributes'            => __( 'News Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent News:', 'text_domain' ),
			'all_items'             => __( 'All News', 'text_domain' ),
			'add_new_item'          => __( 'Add New News', 'text_domain' ),
			'add_new'               => __( 'Add New News', 'text_domain' ),
			'new_item'              => __( 'New News', 'text_domain' ),
			'edit_item'             => __( 'Edit News', 'text_domain' ),
			'update_item'           => __( 'Update News', 'text_domain' ),
			'view_item'             => __( 'View News', 'text_domain' ),
			'view_items'            => __( 'View News', 'text_domain' ),
			'search_items'          => __( 'Search News', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into News', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this News', 'text_domain' ),
			'items_list'            => __( 'News list', 'text_domain' ),
			'items_list_navigation' => __( 'News list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter News list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Newsroom', 'text_domain' ),
			'description'           => __( 'Newsroom', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'news-tags' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-paperclip',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'newsroom', $args );
	}
	add_action( 'init', 'cpt_newsroom', 0 );

	/*News Tags*/
	function fun_newstags() {
		$labels = array(
			'name'                       => _x( 'Tags', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Tags', 'text_domain' ),
			'all_items'                  => __( 'All Tags', 'text_domain' ),
			'parent_item'                => __( 'Parent Tags', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Tags:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
			'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
			'update_item'                => __( 'Update Tag', 'text_domain' ),
			'view_item'                  => __( 'View Tag', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate Tags with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Tags', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Tags', 'text_domain' ),
			'search_items'               => __( 'Search Tags', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No Tags', 'text_domain' ),
			'items_list'                 => __( 'Tags list', 'text_domain' ),
			'items_list_navigation'      => __( 'Tags list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'news-tags', array( 'newsroom' ), $args );
	}
	add_action( 'init', 'fun_newstags', 0 );

	// CPT Teams 
	function cpt_team() {
		$labels = array(
			'name'                  => _x( 'Team Members', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Team Members', 'text_domain' ),
			'name_admin_bar'        => __( 'Team Member', 'text_domain' ),
			'archives'              => __( 'Item Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New Member', 'text_domain' ),
			'new_item'              => __( 'New Member', 'text_domain' ),
			'edit_item'             => __( 'Edit Team Member', 'text_domain' ),
			'update_item'           => __( 'Update Team Member', 'text_domain' ),
			'view_item'             => __( 'View Team Member', 'text_domain' ),
			'view_items'            => __( 'View Team Member', 'text_domain' ),
			'search_items'          => __( 'Search Team Member', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Team Member', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Team', 'text_domain' ),
			'description'           => __( 'Team Members', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'team-advisory' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'our-team', $args );
	}
	add_action( 'init', 'cpt_team', 0 );

	// Team Tax
	function fun_advisory() {
		$labels = array(
			'name'                       => _x( 'Advisory', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Advisory', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Advisory', 'text_domain' ),
			'all_items'                  => __( 'All Advisories', 'text_domain' ),
			'parent_item'                => __( 'Parent Advisory', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Advisory:', 'text_domain' ),
			'new_item_name'              => __( 'New Advisory', 'text_domain' ),
			'add_new_item'               => __( 'Add New Advisory', 'text_domain' ),
			'edit_item'                  => __( 'Edit Advisory', 'text_domain' ),
			'update_item'                => __( 'Update Advisory', 'text_domain' ),
			'view_item'                  => __( 'View Advisory', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate Advisories with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Advisories', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Advisories', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No Advisories', 'text_domain' ),
			'items_list'                 => __( 'Advisories list', 'text_domain' ),
			'items_list_navigation'      => __( 'Advisories list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'team-advisory', array( 'our-team' ), $args );
	}
	add_action( 'init', 'fun_advisory', 0 );

	// Customer CPT
	function customer_fun() {
		$labels = array(
			'name'                  => _x( 'Customers', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Customer', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Customers', 'text_domain' ),
			'name_admin_bar'        => __( 'Customer', 'text_domain' ),
			'archives'              => __( 'Customer Archives', 'text_domain' ),
			'attributes'            => __( 'Customer Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Customer:', 'text_domain' ),
			'all_items'             => __( 'All Customers', 'text_domain' ),
			'add_new_item'          => __( 'Add New Customer', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Customer', 'text_domain' ),
			'edit_item'             => __( 'Edit Customer', 'text_domain' ),
			'update_item'           => __( 'Update Customer', 'text_domain' ),
			'view_item'             => __( 'View Customer', 'text_domain' ),
			'view_items'            => __( 'View Customers', 'text_domain' ),
			'search_items'          => __( 'Search Customer', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Customer', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Customer', 'text_domain' ),
			'items_list'            => __( 'Customers list', 'text_domain' ),
			'items_list_navigation' => __( 'Customers list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Customers list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Customer', 'text_domain' ),
			'description'           => __( 'Customer Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'customers-type' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'customers', $args );
	}
	add_action( 'init', 'customer_fun', 0 );
	// Customer Tax
	function customers_tax() {
		$labels = array(
			'name'                       => _x( 'Customers Types', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Customers Type', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Customers Type', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Customers Type Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'customers-type', array( 'customers' ), $args );
	}
	add_action( 'init', 'customers_tax', 0 );
