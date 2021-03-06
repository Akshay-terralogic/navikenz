<?php 
/**
**********************
*
  =Menu
*
**********************
*/
function menu_reg() {
  register_nav_menus(
    array(
      'head_menu' => __( 'Header Menu' ),
      'footer_quick_links' => __( 'Footer Quick Links' ),
      'footer_careers_links' => __( 'Footer Careers' ),
      'footer_services_links' => __( 'Footer Services' ),
      'footer_support_links' => __( 'Footer Support' ),

      // 'social_media' => __( 'Social Media Menu' ),
    )
  );
}
add_action( 'init', 'menu_reg' );
/**
****************************
*
  =Add-class-to-menu-link-Main Menu
*
****************************
*/
function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'main-menu__link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/**
*********************************
*
  =Add Class to-<li>-Main Menu
*
*********************************
*/
function head_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'head_menu') {
    $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'head_menu_classes', 1, 3);

/**
****************************************
*
  =Adds Active Class For Main Menu
*
****************************************
*/

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active';
  }
  return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

/**
**********************
*
  =WPNav Walker
  =Used for footer(Only)
*
**********************
*/
class Custom_Walker_Nav_Menu_top extends Walker_Nav_Menu
{
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $is_current_item = '';
      if(array_search('current-menu-item', $item->classes) != 0)
      {
          $is_current_item = 'footer-menu__item--active';
      }
      echo '<li class="'.$is_current_item.' footer-menu__item"><a href="'.$item->url.'" class="footer-menu__link">'.$item->title;
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
      echo '</a></li>';
  }
}

/**
**********************************
*
  =Add-Class-to-<li>-Footer Menu
*
**********************************
*/
function footer_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'footer_menu') {
    $classes[] = 'gsap-upDown-footer';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'footer_menu_classes', 1, 3);

/**
**********************************
*
  =Add-Class-to-<a>-with a php tag
  'add_a_class' => 'box-link text-dark',
*
**********************************
*/

function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_a_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="menu careers-drop-menu" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 

function add_has_children_class( $items ) {
  $parents = array();
  // Collect menu items with parents.
  foreach ( $items as $item ) {
    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
      $parents[] = $item->menu_item_parent;
    }
  }
  // Add class.
  foreach ( $items as $item ) {
    if ( in_array( $item->ID, $parents ) ) {
      $item->classes[] = 'dropdown-c js-careers-drop'; //here attach the class
    }
  }
  return $items;
}
add_filter( 'wp_nav_menu_objects', 'add_has_children_class' );


function nav_menu_link_class( $atts, $item ) {
  if( !$item->has_children && $item->menu_item_parent > 0 ) {
    $class         = '';
    $atts['class'] = $class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'nav_menu_link_class', 10, 2 );


function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'secondary') {
    $classes[] = 'list-inline-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
?>