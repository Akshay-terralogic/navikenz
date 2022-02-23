<?php
	/**
	**********************
	*
	  =Custom Fields
	*
	**********************
	*/
		use Carbon_Fields\Container;
		use Carbon_Fields\Field;
		add_action( 'after_setup_theme', 'crb_load' );
		function crb_load() {
		  require_once( 'vendor/autoload.php' );
		  \Carbon_Fields\Carbon_Fields::boot();
		}
	/**
	**********************
	*
	  =Theme Support
	*
	**********************
	*/
		function them_support(){
		  add_theme_support('title-tag');
		  add_theme_support('post-thumbnails', array('post', 'page','services','case-studies'));
		  add_theme_support('html5');
		  add_theme_support('search-form');
		  add_theme_support('woocommerce');
		}
		add_action('after_setup_theme', 'them_support');

	/**
	**********************
	*
	  =JQuery In Footer
	*
	**********************
	*/
		function starter_scripts(){
		  wp_deregister_script( 'jquery'); //Removes the Script
		  wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true ); //Include Jquery
		  //wp_enqueue_script( 'jquery' ); //Adds the Scripts
		}
		add_action( 'wp_enqueue_scripts', 'starter_scripts' );

	/**
	********************************************
	*
	  =Tweaks, Enqueue Script & Styles
	*
	********************************************
	*/
		require_once 'inc/enqueue.php';
		require_once 'inc/junk_remove.php';
		require_once 'inc/bfi_thumb.php';
		require_once 'inc/post-type.php';
		require_once 'inc/custom-admin-welcome.php';
		require_once 'inc/custom-admin-page.php';
		require_once 'inc/admin/codestar-framework.php';
		require_once 'inc/admin-options.php';
		require_once 'inc/roles.php';

	/************************************
	*
	  Removes Update Notices
	*
	*************************************/
	function remove_core_updates(){
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');

	/**
	***********************************
	*
	  =Menu / Nav Walkers
	*
	***********************************
	*/
		require_once 'inc/menu.php';

	/**
	********************************************
	*
	  =Add post thumbnails into RSS feed
	*
	********************************************
	*/
		function add_feed_post_thumbnail($content){
		  global $post;
		  if (has_post_thumbnail($post->ID)) {
		    $content = get_the_post_thumbnail($post->ID, 'thumbnail') . $content;
		  }
		  return $content;
		}
		add_filter('the_excerpt_rss', 'add_feed_post_thumbnail');
		add_filter('the_content_feed', 'add_feed_post_thumbnail');

	/**
	********************************************************
	*
	  =Remove width/height HTML attributes from images
	*
	********************************************************
	*/
		function remove_image_size_atts($html){
		  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		  return $html;
		}
		add_filter('post_thumbnail_html', 'remove_image_size_atts', 10);
		add_filter('image_send_to_editor', 'remove_image_size_atts', 10);

	/**
	********************************************
	*
	  =Custom admin footer text
	*
	********************************************
	*/
		function custom_admin_footer(){}
		add_filter('admin_footer_text', 'custom_admin_footer');

	/**
	*****************************************************************************
	*
	  =Add support for uploading SVG inside Wordpress Media Uploader
	*
	*****************************************************************************
	*/
		function svg_mime_types($mimes){
		  $mimes['svg'] = 'image/svg+xml';
		  return $mimes;
		}
		add_filter('upload_mimes', 'svg_mime_types');

	/**
	********************************************
	*
	  =Slice Crazy Long div Outputs
	*
	********************************************
	*/
		function category_id_class($classes){
		  global $post;
		  foreach ((get_the_category($post->ID)) as $category) {
		    $classes[] = $category->category_nicename;
		  }
		  return array_slice($classes, 0, 5);
		}
		add_filter('post_class', 'category_id_class');

	/**
	********************************************
	*
		=Remove unwated br tag
	*
	********************************************
	*/
		remove_filter( 'the_content', 'wpautop' );
		$br = false;
		add_filter( 'the_content', function( $content ) use ( $br ) { return wpautop( $content, $br ); }, 10 );

	/**
	*********************************
	*
		=Remove unwated p tag
	*
	*********************************
	*/
		remove_filter('term_description','wpautop');
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
		add_filter('the_content', 'remove_empty_p', 11);
		function remove_empty_p($content){
		  $content = force_balance_tags($content);
		  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
		  return preg_replace('#<p></p>#i', '', $content);
		}

	/**
	*********************************
	*
		=Custom Body Class
	*
	*********************************
	*/
		function pine_add_page_slug_body_class( $classes ){
		  global $post;
		  if ( isset( $post ) ) {
		    $classes[] = 'page-' . $post->post_name;
		  }
		  return $classes;
		}
		add_filter( 'body_class', 'pine_add_page_slug_body_class' );

	/**
	*********************************
	*
	  =Global template dir vars 
	*
	*********************************
	*/
		function tempDirFun(){
		  global $tempDir;
		  $tempDir = get_template_directory_uri()."/dist";
		}
		// Define it immediately after `init` in a high priority.
		add_action('init', 'tempDirFun', 1, 1);

	/**
	*********************************
	*
	  =Global Site url
	*
	*********************************
	*/
		function siteurlfun(){
		  global $siteUrl;
		  $siteUrl = get_site_url();
		}
		// Define it immediately after `init` in a high priority.
		add_action('init', 'siteurlfun', 1, 1);

	/************************************
	*
	  Add Async or Defer for js
	*
	*************************************/
		if(!is_admin()) {
		  function add_async_defer_attribute($tag, $handle) {
		    // if the unique handle/name of the registered script has 'async' in it
		    if (str_contains($handle, 'async')) {
		      // return the tag with the async attribute
		      return str_replace( '<script ', '<script async ', $tag );
		    }
		    // if the unique handle/name of the registered script has 'defer' in it
		    else if (str_contains($handle, 'defer')) {
		      // return the tag with the defer attribute
		      return str_replace( '<script ', '<script defer ', $tag );
		    }
		    // otherwise skip
		    else {
		      return $tag;
		    }
		  }
		  add_filter('script_loader_tag', 'add_async_defer_attribute', 10, 2);
		}


	/**
 *********************************
 *
	=Meta Boxs
	 * https://gist.github.com/xlawok/859c8e0432d417da4920bbc3ec7ad633 // for contactform 7
 *
 *********************************
 */
	add_action( 'carbon_fields_register_fields', 'cpt_meta' );
	function cpt_meta() {
	  Container::make( 'post_meta', __( 'Add Sections To Home Page' ) )
		->where( 'post_id', '=', get_option( 'page_on_front' ) )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_sections', 'Sections' )
	    	// Banner Section
		    ->add_fields( 'banner', 'Add Banner', array(
		    	/*=Banner Text*/ 
					Field::make( 'text', 'crb_btxt', __('Banner Text')),
					/*=Banner Image*/ 
					Field::make( 'image', 'crb_bimg', __('Banner Image'))
					->set_value_type( 'url' ),  	
					/*=Banner Button number 1*/ 
					Field::make( 'text', 'crb_btnurl1', __('CTA URL')),
					Field::make( 'text', 'crb_btntxt1', __('CTA Text')),  			
					/*=Banner Button number 2*/ 
					Field::make( 'text', 'crb_btnurl2', __('CTA 2 URL')),
					Field::make( 'text', 'crb_btntxt2', __('CTA 2 Text')),
		    ))

		    // Service Section
		    ->add_fields( 'home_services', 'Services List', array(

		    	Field::make( 'text', 'crb_serv_title', __('Section Heading')),
	        Field::make( 'association', 'posts', 'Add Services' )
	        ->set_max(4)
	        ->set_types( array(
	          array(
	            'type' => 'post',
	            'post_type' => 'services',
	          ),
		        array(
	            'type' => 'term',
	            'taxonomy' => 'post_tag',
		        ),
	        )),

		    ))//end of Service List

	    ->add_fields( 'home_case_study', 'Case Studies', array(

	    	Field::make( 'text', 'crb_casestudy_title', __('Section Heading')),

				Field::make( 'association', 'posts', 'Add Services' )
	        ->set_max(5)
	        ->set_types( array(
	          array(
	            'type' => 'post',
	            'post_type' => 'case-studies',
	          ),
		        array(
	            'type' => 'term',
	            'taxonomy' => 'post_tag',
		        ),
	        )),

	    )),//end of Case Studies
	  ));
	}
	

	/*Theme Options Pages*/
	add_action( 'carbon_fields_register_fields', 'notifications' );
	function notifications() {
		/*Home Banner Notifications*/ 
	  Container::make( 'theme_options', __( 'Home Notification' ))
	  ->set_icon( 'dashicons-bell' )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_notification_slider', __( 'Banner Notifications' ))
	    ->add_fields( array(
	      Field::make( 'text', 'notify', __( 'Slide Title' )),
	    ))
	  ));

	  /*Service Archive Page*/ 
	  Container::make( 'theme_options', __( 'Landing Services' ) )
    ->set_page_parent( 'edit.php?post_type=services' ) // identificator of the "Appearance" admin section
    ->add_fields( array(
      Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
      Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
    ));

	}

	/*=CPT Services*/
	add_action( 'carbon_fields_register_fields', 'cpt_meta_service' );
	function cpt_meta_service() {
	  Container::make( 'post_meta', 'Custom Data' )
	  ->where( 'post_type', '=', 'services' )
	  ->add_fields( array(
	    Field::make( 'text', 'crb_phone', 'Phone' )
	    ->set_attribute( 'placeholder', '(***) ***-****' )
	  ));
	}
