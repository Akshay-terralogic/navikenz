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
		  add_theme_support('post-thumbnails', array('post', 'page','services','case-studies','newsroom','our-team','customers','whitepaper'));
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
		require_once 'inc/filter.php';

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
		=Read Time
	*
	*********************************
	*/	

	add_filter( 'upload_mimes', 'bbloomer_custom_mime_types' );
	function bbloomer_custom_mime_types( $mimes ) {
	   if ( current_user_can( 'manage_woocommerce' ) ) {
      $mimes['txt'] = 'text/plain';
      $mimes['json'] = 'text/plain';
	   }
	   return $mimes;
	}
	 
	add_filter( 'wp_check_filetype_and_ext', 'bbloomer_correct_filetypes', 10, 5 );
	 
	function bbloomer_correct_filetypes( $data, $file, $filename, $mimes, $real_mime ) {
	    if ( ! empty( $data['ext'] ) && ! empty( $data['type'] ) ) {
	      return $data;
	    }
	    $wp_file_type = wp_check_filetype( $filename, $mimes );
	    if ( 'json' === $wp_file_type['ext'] ) {
	      $data['ext']  = 'json';
	      $data['type'] = 'text/plain';
	    } elseif ( 'txt' === $wp_file_type['ext'] ) {
	      $data['ext']  = 'txt';
	      $data['type'] = 'text/plain';
	    }
	    return $data;
	}
	/**
	*********************************
	*
		=Read Time
	*
	*********************************
	*/
	function reading_time() {
		global $post;
		$content = get_post_field( 'post_content', $post->ID );
		$word_count = str_word_count( strip_tags( $content ) );
		$readingtime = ceil($word_count / 200);
		if ($readingtime == 1) {
			$timer = " minute";
		} else {
			$timer = " minutes";
		}
		$totalreadingtime = $readingtime . $timer;
		return $totalreadingtime;
	}

	/**
	*********************************
	*
		=Image Resize Removeing
	*
	*********************************
	*/
	function remove_all_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
			remove_image_size( $size );
	  }
	}
	add_action('init', 'remove_all_image_sizes');
	/**
 *********************************
 *
	=Meta Boxs
 *
 *********************************
 */
	function get_contact_forms7(){
    $posts = get_posts(array(
      'post_type'     => 'wpcf7_contact_form',
      'numberposts'   => -1
    ));
    $listing_forms=[];
    foreach ( $posts as $id => $p ) {
      $listing_forms[ $id ] = $p->post_title;
      // var_dump($listing_forms[ $id ] = $p);
    } 
    return $listing_forms;
	}
	//end contact form function 
	add_action( 'carbon_fields_register_fields', 'cpt_meta' );
	function cpt_meta() {
	  Container::make( 'post_meta', __( 'Add Sections To Home Page' ) )
		->where( 'post_id', '=', get_option( 'page_on_front' ) )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_sections', 'Sections' )
	    	// Banner Section
		    ->add_fields( 'banner', 'Banner', array(
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
	    	Field::make( 'html', 'crb_information_text' )
    		->set_html( '<h2>Case Studies Post will automatically come here</p>' )

	    ))//end of Case Studies	    

	    ->add_fields( 'home_opportunities', 'Opportunities', array(

	    	Field::make( 'text', 'crb_opportunities_title', __('Section Heading')),
	    	Field::make( 'complex', 'crb_opportunities_card', __( 'Opportunities Cards' ) )
		    ->add_fields( array(
		        Field::make( 'text', 'opt_card_title', __( 'Card Title' ) ),
		        Field::make( 'text', 'opt_card_sub_text', __( 'Card Details' ) ),
		        Field::make( 'image', 'opt_card_img', __( 'Card Image' ) )
		        ->set_value_type('url'),
		        Field::make( 'text', 'opt_card_cta_txt', __( 'CTA Text' )),
		        Field::make( 'text', 'opt_card_cta_link', __( 'CTA Link' )),
		    ) )

	    ))//end of Opportunities

	    ->add_fields( 'home_partner', 'Partners', array(

	    	Field::make( 'text', 'crb_partner_title', __('Section Heading')),
	    	Field::make( 'complex', 'crb_partner_logos', __( 'Partners List' ) )
		    ->add_fields( array(
	        Field::make( 'image', 'opt_partner_logo', __( 'Partners Logo' ) )
	        ->set_value_type('url'),
		    ))

	    ))//end of Partners	

	    ->add_fields( 'home_bussolutions', 'Business Solutions', array(

	    	Field::make( 'text', 'crb_bussolutions_title', __('Section Heading')),
	    	Field::make( 'text', 'crb_bussolutions_subtext', __('Section Details')),
	    	Field::make( 'text', 'crb_bussolutions_cta_link', __('CTA Link')),
				Field::make( 'image', 'crb_bussolutions_img', __( 'Partners Logo' ) )
	      ->set_value_type('url'),	    	
	    	Field::make( 'complex', 'crb_bussolutions_logos', __( 'Partners List' ) )
		    ->add_fields( array(
	        Field::make( 'image', 'crb_bussolutions_logo', __( 'Partners Logo' ) )
	        ->set_value_type('url'),
		    ))

	    ))//end of Partners	    

			->add_fields( 'home_newroom', 'Newsroom', array(

	    	Field::make( 'text', 'crb_newsroom_title', __('Section Heading')),
				Field::make( 'html', 'crb_information_text' )
    		->set_html( '<h2>Newsroom Post will automatically come here</p>' )	    	
	    )),//end of Newsroom

	  ));
	}
	
	/*About Page*/
	add_action( 'carbon_fields_register_fields', 'crb_page_about' );
	function crb_page_about() {
	  Container::make( 'post_meta', __( 'Section Options', 'crb' ) )
	  ->where( 'post_template', '=', 'page-about.php' )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_about_sections', 'About Page Banner' )
	    // Banner Text
	    ->add_fields( 'meta_about_banner', 'Banner Text', array(
	      Field::make( 'text', 'crb_about_banner_text', 'Text' ),
				Field::make( 'image', 'crb_about_image', __( 'Banner Image' ) )
				->set_value_type('url'),
	    ))
			->add_fields( 'meta_img_and_txt_banner', 'Image & Text', array(
	      Field::make( 'text', 'crb_int_banner_text', 'Heading' ),
	      Field::make( 'text', 'crb_int_para_text', 'Sub text' ),
				Field::make( 'image', 'crb_int_image', __( 'Banner Image' ) )
				->set_value_type('url'),
	    ))
	    ->add_fields( 'meta_img_and_txt_two', 'Left Image & Text', array(
	      Field::make( 'text', 'crb_int_banner_text_two', 'Heading' ),
	      Field::make( 'text', 'crb_int_para_text_two', 'Sub text' ),
				Field::make( 'image', 'crb_int_image_two', __( 'Banner Image' ) )
				->set_value_type('url'),
	    ))
	    ->add_fields( 'meta_client_logos', 'Client Logos', array(
	      Field::make( 'text', 'crb_client_logo_heading', 'Heading' ),
				Field::make( 'complex', 'crb_client_logos', __( 'Logos List' ) )
		    ->add_fields( array(
					Field::make( 'image', 'crb_client_logo_img', __( 'Logos' ) )
					->set_value_type('url'),
		    ))
	    ))
	    ->add_fields( 'meta_core_value', 'Core Value', array(
	      Field::make( 'text', 'crb_core_value_heading', 'Heading' ),
				Field::make( 'complex', 'crb_core_value_logos', __( 'Logos List' ) )
		    ->add_fields( array(
					Field::make( 'image', 'crb_core_value_logo_img', __( 'Card Logo Image' ) )
					->set_value_type('url'),
					Field::make( 'text', 'crb_core_value_heading', 'Card Heading' ),
					Field::make( 'text', 'crb_core_value_sub_text', 'Card sub text' ),
		    ))
	    ))
	    ->add_fields( 'meta_advisory', 'Advisory', array(
	      Field::make( 'text', 'crb_advisory_heading', 'Heading' ),
	      Field::make( 'text', 'crb_advisory_sub_text', 'Sub Text' ),
	      Field::make( 'checkbox', 'crb_advisory_show_board', 'Show Advisory Board' )
    		->set_option_value( 'yes' ),
	    ))
	    ->add_fields( 'meta_our_team', 'Our team', array(
	      Field::make( 'text', 'crb_our_team_heading', 'Heading' ),
	      Field::make( 'checkbox', 'crb_our_team_show_board', 'Show Our Teams' )
    		->set_option_value( 'yes' ),
	    ))
	    ->add_fields( 'meta_announcements', 'Announcements', array(
	    	Field::make( 'text', 'crb_announcements_heading', 'Heading' ),
				Field::make( 'association', 'posts', 'Add Services' )
        ->set_max(5)
        ->set_types( array(
          array(
            'type' => 'post',
            'post_type' => 'case-studies',
          ),
        )),

	    )),
	  ));
	}
	/*About Page End*/

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
    	Field::make( 'text', 'crb_banner_services_title', __( 'Banner Title' )),
			Field::make( 'image', 'crb_banner_services_img', __( 'Banner image' ))
			->set_value_type('url'),
			Field::make( 'complex', 'crb_sections', 'Sections' )
	    
	    ->add_fields( 'meta_plan_block', 'Plan Block', array(
	    	Field::make( 'text', 'crb_plan_block_title', __( 'Block Title' )),
	    	Field::make( 'text', 'crb_plan_block_sub_text', __( 'Sub text' )),
	      Field::make( 'association', 'crb_plan_post' )
		    ->set_types( array(
	        array(
            'type'      => 'post',
            'post_type' => 'services',
	        ),
		    ))
	    ))

	    ->add_fields( 'meta_design_block', 'Design Block', array(
	    	Field::make( 'text', 'crb_design_block_title', __( 'Block Title' )),
	    	Field::make( 'text', 'crb_design_block_sub_text', __( 'Sub text' )), 
				Field::make( 'association', 'crb_design_post' )
		    ->set_types( array(
	        array(
            'type'      => 'post',
            'post_type' => 'services',
	        ),
		    )),
	    ))

	    ->add_fields( 'meta_develop_block', 'Develop Block', array(
	    	Field::make( 'text', 'crb_develop_block_title', __( 'Block Title' )),
	    	Field::make( 'text', 'crb_develop_block_sub_text', __( 'Sub text' )), 
				Field::make( 'association', 'crb_develop_post' )
		    ->set_types( array(
	        array(
            'type'      => 'post',
            'post_type' => 'services',
	        ),
		    )),
	    ))

	    ->add_fields( 'meta_operate_block', 'Operate Block', array(
				Field::make( 'text', 'crb_operate_block_title', __( 'Block Title' )),
	    	Field::make( 'text', 'crb_operate_block_sub_text', __( 'Sub text' )), 
				Field::make( 'association', 'crb_operate_post' )
		    ->set_types( array(
	        array(
            'type'      => 'post',
            'post_type' => 'services',
	        ),
		    )),
	    ))

	    ->add_fields( 'meta_hero_block', 'Hero Block', array(
				Field::make( 'text', 'crb_servhero_block_title', __( 'Block Title' )),
				Field::make( 'complex', 'crb_servhero_main_slider', __( 'Banner' ))
		    ->add_fields( array(	    	
				Field::make( 'text', 'crb_servhero_block_sub_text', __( 'Slider Text' )),
				Field::make( 'text', 'crb_servhero_block_cta', __( 'CTA Link' )),
				Field::make( 'image', 'crb_servhero_block_img', __( 'Banner image' ))
				->set_value_type('url'),				
	    )),
			Field::make( 'complex', 'crb_servhero_block_slider', __( 'Banner Logo Slider' ))
		    ->add_fields( array(
		    Field::make( 'image', 'crb_servhero_block_logo', __( 'Logo image' ))
				->set_value_type('url'),
		    )),
			))

			->add_fields( 'meta_servclient_block', 'Our Partners', array(
				Field::make( 'text', 'meta_servclient_block_title', __( 'Block Title' )),
				Field::make( 'complex', 'crb_servclient_logos', __( 'Partners Logos' ))
		    ->add_fields( array(
					Field::make( 'image', 'crb_servclient_logo', __( 'Logo image' ))
					->set_value_type('url'),		      
		    )),   
			)),


    ));

		/*Service Archive Page*/  

    /*Customer Archive Page*/ 
	  Container::make( 'theme_options', __( 'Landing Customers' ) )
    ->set_page_parent( 'edit.php?post_type=customers' ) // identificator of the "Appearance" admin section
    ->add_fields( array(
      Field::make( 'text', 'crb_banner_customer_title', __( 'Banner Title' )),
      Field::make( 'text', 'crb_banner_customer_sub_text', __( 'Banner Sub text' )),
      Field::make( 'text', 'crb_banner_customer_cta_link', __( 'Banner CTA Link' )),
			Field::make( 'image', 'crb_banner_customer_banner_image', __( 'Logo image' ))
			->set_value_type('url'),
			Field::make( 'complex', 'crb_banner_customer_logo_slider', __( 'Banner Logo Slider' ))
	    ->add_fields( array(
	      Field::make( 'image', 'crb_banner_customer_logo', __( 'Logo image' ))
				->set_value_type('url'),
	    )),
	    Field::make( 'separator', 'crb_separator', __( 'Our Customers Logo' )),
	    Field::make( 'text', 'crb_customer_logo_heading', __( 'Section Heading' )),
			Field::make( 'complex', 'crb_customer_logo_list', __( 'Customers Logo List' ))
	    ->add_fields( array(
	      Field::make( 'image', 'crb_customer_logo_item', __( 'Logo image' ))
				->set_value_type('url'),
	    )),
    ));

	}
	/*END Theme Options Pages*/

	/*=CPT Single-Services*/
	add_action( 'carbon_fields_register_fields', 'cpt_meta_service' );
	function cpt_meta_service() {
	  Container::make( 'post_meta', 'Services' )
	  ->where( 'post_type', '=', 'services' )
	  ->add_fields( array(
	  		Field::make( 'text', 'crb_single_service_card_content', 'Card Content' ),
		    Field::make( 'text', 'crb_single_service_banner_sub_text', 'Banner Bottom text' ),
		    Field::make( 'html', 'crb_information_text' )
	    	->set_html( '<h2>Methodology Card</p>' ),
	    	Field::make( 'text', 'crb_single_service_block_title', 'Service Block' ),
				Field::make( 'complex', 'crb_single_service_block_list', __( 'Customers Logo List' ))
		    ->add_fields( array(
	      Field::make( 'image', 'crb_single_service_block_logo', __( 'Icon' ))
				->set_value_type('url'),
				Field::make( 'text', 'crb_single_service_block_block_title', 'Title' ),
				Field::make( 'text', 'crb_single_service_block_block_sub_text', 'Sub text' ),
	    )),
	  ));
	}
	/*=END CPT Single-Services*/
	

	/*=CPT Partners*/
	add_action( 'carbon_fields_register_fields', 'crb_page_partner' );
	function crb_page_partner() {
	  Container::make( 'post_meta', 'Partners' )
    ->where( 'post_template', '=', 'page-partners.php' )
    ->add_fields( array(
    	Field::make( 'text', 'crb_page_title', 'Page Title' ),
	    Field::make( 'complex', 'crb_page_partnets_logos', __( 'Partners Logos' ))
	    ->add_fields( array(
	      Field::make( 'image', 'partners_page_logo', __( 'Logo image' ))
	      ->set_value_type('url'),
	    ))
    ));
	}
	/*=END CPT Partners*/

	/*=CPT Our Team*/
	add_action( 'carbon_fields_register_fields', 'crb_cpt_advisory' );
	function crb_cpt_advisory() {
	  Container::make( 'post_meta', 'Advisory' )
    ->where( 'post_type', '=', 'our-team' )
    ->add_fields( array(
			Field::make( 'text', 'quotes', 'Quotes' ),
    	Field::make( 'text', 'designation', 'Designation' ),
    	Field::make( 'text', 'linkedin', 'LinkedIn Link' ),
    ));
	}
	/*=END CPT Case Study*/

	/*=Page Careers*/
	add_action( 'carbon_fields_register_fields', 'crb_careers' );
	function crb_careers() {
	  Container::make( 'post_meta', __( 'Careers Block', 'crb' ) )
	  ->where( 'post_template', '=', 'page-careers.php' )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_careers', 'Add Careers Block' )
	    // Banner
	    ->add_fields( 'crb_careers_banner', 'Banner', array(
	      Field::make( 'text', 'meta_careers_banner_text', 'Banner Text' ),
				Field::make( 'image', 'meta_careers_banner_img', __( 'Banner image' ))
				->set_value_type('url'),
	    ))

	    // Status Block
	    ->add_fields( 'crb_careers_status', 'Status Block', array(
	    	Field::make( 'text', 'meta_careers_title', 'Status Text' ),
	    	Field::make( 'text', 'meta_careers_sub_text', 'Status Sub Text' ),
	    ))

	    // Image & Text Block
			->add_fields( 'crb_careers_right_imgntxt', 'Right Image & text Block', array(
	      Field::make( 'text', 'crb_careers_right_txt', 'Text Content' ),
	      Field::make( 'text', 'crb_careers_right_sub_txt', 'Text Sub Content' ),
				Field::make( 'image', 'crb_careers_right_img', __( 'Block Image' ))
				->set_value_type('url'),      
	    ))

	    ->add_fields( 'crb_careers_left_imgntxt', 'Left Image & text Block', array(
	      Field::make( 'text', 'crb_careers_left_txt', 'Text Content' ),
	      Field::make( 'text', 'crb_careers_left_sub_txt', 'Text Sub Content' ),
				Field::make( 'image', 'crb_careers_left_img', __( 'Block Image' ))
				->set_value_type('url'),      
	    ))

	    ->add_fields( 'crb_careers_hero_banner', 'Hero Block', array(
				Field::make( 'complex', 'meta_careers_list', 'Add Video' )
	      ->add_fields( array(
					Field::make( 'text', 'crb_hero_video', 'Video URL' ),
					Field::make( 'image', 'crb_hero_img', __( 'Video Thumbnail' ))
					->set_value_type('url'),
	      )) 
	    ))	    

	    ->add_fields( 'crb_careers_cultur_assets', 'Assets Block', array(
	    	Field::make( 'text', 'crb_careers_cultur_heading', 'Section title' ),
	    	Field::make( 'text', 'crb_careers_cultur_assets', 'Section Sub text' ),

	    	Field::make( 'html', 'crb_careers_cultur_section_heading' )
    		->set_html( '<h2>Content Row 1</h2>' ),

				Field::make( 'complex', 'crb_careers_cultur_section_boxs', 'Box Content' )
	      ->add_fields( array(
	        Field::make( 'rich_text', 'meta_careers_cultur_section_item', 'Content' ),
	      )),

	      Field::make( 'html', 'crb_careers_cultur_section_heading_2' )
    		->set_html( '<h2>Content Row 2</h2>' ),

				Field::make( 'complex', 'crb_careers_cultur_section_boxs_2', 'Box Content 2' )
	      ->add_fields( array(
	        Field::make( 'rich_text', 'meta_careers_cultur_section_item_2', 'Content' ),
	      )),    		
	    ))

	    ->add_fields( 'crb_careers_gallery', 'Gallery', array(
				Field::make( 'text', 'crb_gallery_heading', 'Heading' ), 
				Field::make( 'complex', 'meta_gallery_list', 'Gallery' )
	      ->add_fields( array(
	      	Field::make( 'radio', 'crb_layout', __( 'Choose Option' ) )
					->set_options( array(
						1 => 'Large',
						2 => 'Medium',
						3 => 'Small',
					)),
					Field::make( 'image', 'crb_gallery_item', __( 'Gallery Image' ))
					->set_value_type('url'),
	      )),
	      Field::make( 'rich_text', 'crb_gallery_bottom_sub_text', 'Gallery Bottom Content' ), 		     
	    ))

			->add_fields( 'crb_careers_cta', 'CTA', array(
				Field::make( 'text', 'crb_careers_cta_heading', 'Heading' ),
				Field::make( 'text', 'crb_careers_cta_sub_text', 'Sub Text' ),   
				Field::make( 'text', 'crb_careers_cta_link', 'Link' ),
	    )),

	  ));
	}
	/*=END Page Careers*/

	/*=Page Contact us*/
	add_action( 'carbon_fields_register_fields', 'crb_contact_us' );
	function crb_contact_us() {
	  Container::make( 'post_meta', __( 'Section Options', 'crb' ) )
	  ->where( 'post_template', '=', 'page-contact.php' )
	  ->add_fields( array(
	    Field::make( 'complex', 'crb_contact', 'Contact Blocks' )

	    ->add_fields( 'meta_contact_banner', 'Contact Banner', array(
	      Field::make( 'text', 'meta_contact_banner_heading', 'Banner Title' ),
	      Field::make( 'text', 'meta_contact_banner_sub_text', 'Banner Sub text' ),
	      Field::make( 'text', 'meta_contact_banner_contact_num', 'Banner Contact CTA' ),
				Field::make( 'image', 'meta_contact_banner_img', __( 'Banner Image' ))
				->set_value_type('url'),
	    ))

	    // Select Forms
	    ->add_fields( 'meta_form_list', 'Form Lists', array(
	    	Field::make( 'text', 'meta_contact_form_heading', 'Section Title' ),
	    	Field::make( 'text', 'meta_contact_shortcode', 'Add Shortcode' ),
	    ))

	    // Third group will be a list of manually selected posts
	    ->add_fields( 'meta_contact_locations', 'Locations', array(
	    	Field::make( 'text', 'meta_contact_heading', 'Section Heading' ),

				
				Field::make( 'complex', 'meta_contact_locations_list', 'Add Locations' )
	      ->add_fields( array(
	      	Field::make( 'text', 'meta_contact_country_heading', 'Heading' ),
					Field::make( 'complex', 'meta_contact_country_list', 'Add Country' )
					->add_fields( array(
	      		Field::make( 'text', 'meta_contact_country_txt', 'Country' ),
	      	)),	      	
	      	Field::make( 'text', 'meta_contact_location_heading', 'Location Title' ),
	      	Field::make( 'text', 'meta_contact_location_address', 'Location Address' ),
	      	Field::make( 'file', 'meta_contact_location_json', 'Lotty file' )
	      	->set_value_type( 'url' ),
					 	      	
	      ))

	    )),
	  ));
	}
	/*=END Contact us*/

	/*=CPT Customer*/
	add_action( 'carbon_fields_register_fields', 'crb_customers' );
	function crb_customers() {
	  Container::make( 'post_meta', 'Custom Data' )
	  ->where( 'post_type', '=', 'customers' )
	  ->add_fields( array(
			Field::make( 'image', 'meta_customers_logo', __( 'Logos' ))
			->set_value_type('url'),
	  ));
	}
	/*=END Customer*/

	/*=CPT Opportunities*/
	add_action( 'carbon_fields_register_fields', 'crb_opportunities' );
	function crb_opportunities() {
	  Container::make( 'post_meta', 'Opportunities' )
	  ->where( 'post_type', '=', 'opportunities' )
	  ->add_fields( array(
	  	Field::make( 'text', 'opp_experience', __( 'Experience' )),
	  	Field::make( 'select', 'opp_full_or_part_job', __( 'Job Option' ) )
			->set_options( array(
				'Full-Time' => 'Full-Time',
				'Part-Time' => 'Part-Time',
				'Full-Time / Part-Time' => 'Full-Time / Part-Time',
			)),
			Field::make( 'text', 'opp_salary', __( 'Salary' )),
			Field::make( 'text', 'opp_job_descp', __( 'Job Description' )),
			Field::make( 'date', 'opp_last_date', __( 'Last Date to Apply' )),
	  ));
	}
	/*=CPT Opportunities*/
	/*=Page Knowledge*/
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
		function crb_attach_theme_options() {
		  Container::make( 'post_meta', 'Custom Data' )
		  ->where( 'post_template', '=', 'page-knowledge.php' )
		  ->add_fields( array(
		  	Field::make( 'association', 'crb_knowledge', __( 'Banner Post' ) )
		    ->set_types( array(
	        array(
            'type'      => 'post',
            'post_type' => 'post',
	        ), 
	        array(
            'type'      => 'post',
            'post_type' => 'case-studies',
	        )
		    ))
		  ));
		}
	/*=END Knowledge*/

	/*=CPT Case Study*/
	add_action( 'carbon_fields_register_fields', 'cpt_meta_casestudy' );
	function cpt_meta_casestudy() {
	  Container::make( 'post_meta', 'Custom Data' )
	  ->show_on_post_type(array('case-studies', 'post'))
	  ->add_fields( array(

			Field::make( 'complex', 'crb_casestudy_block', 'Case Study Blocks' )
	    // Our first group will be a simple rich text field
	    ->add_fields( 'meta_casestudy_right_content', 'Right Content', array(
	      Field::make( 'rich_text', 'crb_customer_right_text', 'Text' ),
				Field::make( 'image', 'crb_customer_image_item', __( 'Image' ))
				->set_value_type('url')
	    ))	    

	    // Second group will be a list of files for users to download
	    ->add_fields( 'cbr_casestudy_cta', 'CTA', array(
	    	Field::make( 'text', 'crb_customer_cta_title', 'Title' ),
	    	Field::make( 'text', 'crb_customer_cta_link', 'Link' ),
	    )),

	    Field::make( 'text', 'cbr_casestudy_author_name', __( 'Author Name' )),
	    Field::make( 'text', 'cbr_casestudy_author_designation', __( 'Author Designation' )),
			Field::make( 'image', 'cbr_casestudy_author_img', __( 'Author Image' ))
				->set_value_type('url')	    

	  ));
	}
	/*=END CPT Case Study*/

	/*=NewsRoom*/
	add_action( 'carbon_fields_register_fields', 'cpt_meta_newsroom' );
	function cpt_meta_newsroom() {
	  Container::make( 'post_meta', 'Custom Data' )
	  ->show_on_post_type(array('newsroom'))
	  ->add_fields( array(
	    Field::make( 'text', 'cbr_newsroom_link', __( 'News Article Link' )),
	  ));
	}
	/*=END NewsRoom*/