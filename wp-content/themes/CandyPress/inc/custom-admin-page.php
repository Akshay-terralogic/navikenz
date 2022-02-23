<?php
	//https://wordpress.stackexchange.com/questions/91693/adding-a-custom-admin-page

	function customAdminPageFun(){
		add_menu_page(
			'Documentation',     // page title
			'Documentation',     // menu title can add htmls for style
			'manage_options',   // capability
			'include-text',     // menu slug
			'custom_admin_page' // callback function
		);
	}
	function custom_admin_page(){
		global $title;
		print '<h2>'.$title.'</h2>';
		print '<iframe src="'.get_site_url().'/documentation" height="100%" width="100%"></iframe>';
	}
	add_action( 'admin_menu', 'customAdminPageFun' );

