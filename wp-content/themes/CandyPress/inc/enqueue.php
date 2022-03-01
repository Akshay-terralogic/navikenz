<?php

/**
 * Enqueue Styles.
 */
function enqueue_style(){
  // wp_enqueue_style('rangeslider-css', '');
  wp_enqueue_style('vendor-css', get_stylesheet_directory_uri() . '/dist/css/vendor.css');
  wp_enqueue_style('fonts-css', get_stylesheet_directory_uri() . '/dist/css/gfont.css');
  wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/dist/css/main.css');
  wp_enqueue_style('wp-customs', get_stylesheet_directory_uri() . '/dist/css/custom.css');
}
add_action('wp_enqueue_scripts', 'enqueue_style');

/**
 * Enqueue Scripts.
 */
function enqueue_js(){
	wp_enqueue_script( 'plugins-js', get_stylesheet_directory_uri() . '/dist/js/vendor.js', array(), false, true );
  wp_enqueue_script( 'drodown-js-defer', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.js', array(), false, true );
  wp_enqueue_script( 'transition-js-defer', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.js', array(), false, true );
  if (is_front_page()) {
    wp_enqueue_script( 'home-js', get_stylesheet_directory_uri() . '/dist/js/home.js', array(), false, true );
    wp_enqueue_script( 'mobileSwiper-js', get_stylesheet_directory_uri() . '/dist/js/mobileSwiper.js', array(), false, true );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/dist/js/main.js', array(), false, true );
  }
  if ( is_404() ) {
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/dist/js/main.js', array(), false, true );
    wp_enqueue_script( 'about-js', get_stylesheet_directory_uri() . '/dist/js/about.js', array(), false, true );
  }   

  // if ( is_page_template( '' ) ) {
  //   wp_enqueue_script( '', get_stylesheet_directory_uri() . '', array(), false, true );
  // } 
}
add_action('wp_enqueue_scripts', 'enqueue_js');



// script to load asynchronously
// wp_register_script('firstscript-async', '//www.domain.com/somescript.js', '', 2, false);
// wp_enqueue_script('firstscript-async');

// // script to be deferred
// wp_register_script('secondscript-defer', '//www.domain.com/otherscript.js', '', 2, false);
// wp_enqueue_script('secondscript-defer');

// // standard script embed
// wp_register_script('thirdscript', '//www.domain.com/anotherscript.js', '', 2, false);
// wp_enqueue_script('thirdscript');