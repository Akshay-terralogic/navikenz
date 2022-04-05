<?php
  /**
  * The header for theme
  *
  * @package CandyPress
  */
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>

<!DOCTYPE html>
<html data-page="home">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
  <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <!-- Desktop header-->
  <header class="nk-mainheader" id="header">
    <nav class="navbar navbar-overide navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand me-0 me-lg-3 me-xxl-5 order-2 order-lg-1 gsap-head-item" href="<?php echo $siteUrl; ?>">
          <img src="<?php echo $t_options['logo']['url']; ?>" alt="" />
        </a>
        <div class="col col-md-auto text-md-end navbar-collapse order-2">
          <?php
            wp_nav_menu( array(
            'theme_location' =>
          'head_menu', 'container' => 'ul', 'menu_class' => 'nav navbar-list d-md-flex mb-0', 'add_a_class' => 'nav-link', )); ?>
        </div>
        <!-- Hamber-menu mobile-->
        <a class="zw-mobile-hamberg Nk-only-mobile order-1">
          <span class="nav-toggle nav-toggle-bar"></span>
          <div class="zw-close-btn">
            <img src="<?php echo $tempDir; ?>/img/icons/white/close-icon.svg" alt="close-btn" />
          </div>
        </a>
        
        <form id="cptsearch" action="<?php echo home_url(); ?>" method="get" class="ms-lg-auto justify-content-lg-end order-3 gsap-head-item" id="navbarText">
          <a class="zw-nav-search em-nav-border em-nav-border--right js-search-btn">
            <img class="js-search-btn__icon" src="<?php echo $tempDir; ?>/img/icons/search.svg" alt="Search icon">
          </a>
          <div class="js-search__wrp">
            <img src="<?php echo $tempDir; ?>/img/icons/search-b.svg" alt="">
            <input type="search" name="s" placeholder="Search here....">
            <img class="js-search__close" src="<?php echo $tempDir; ?>/img/icons/serach-close.svg" alt="">
          </div>
        </form>

      </div>
    </nav>
  </header>
  <body <?php body_class(); ?>>
    <main <?php if (is_front_page()): ?>class="Nk-home" id="fullpage"<?php endif ?>>
