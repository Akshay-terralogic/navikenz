<?php
  /**
  * The template for displaying archive pages
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package CandyPress
  */

  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>

<section class="bg-0d sec-p delivary customer-delivary"> 
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-8 col-xxl-10"> 
        <h2 class="Nk-h2"><?php echo carbon_get_theme_option( 'crb_banner_customer_title' ); ?></h2>
      </div>
    </div>
  </div>
  <div class="left-container mt-42">
    <div class="row"> 
      <div class="col-md-5 col-xxl-4 d-flex align-items-center"> 
        <div class="delivary__wrp">
          <h3 class="Nk-h3 clr-w"><?php echo carbon_get_theme_option( 'crb_banner_customer_sub_text' ); ?></h3><a class="btn btn--w mt-lg-5 d-none d-md-inline-block btn-saq" href="<?php echo carbon_get_theme_option( 'crb_banner_customer_banner_image' ); ?>" data-text="See how">See how</a>
        </div>
      </div>
      <div class="col-md-7 offset-xxl-2 col-xxl-6 mbl-right-p pe-xxl-0"><img class="delivary__img" src="<?php echo carbon_get_theme_option( 'crb_banner_customer_banner_image' ); ?>" alt="">
        <div class="d-md-none mt-4 mt-lg-5"><a class="btn btn--w btn-saq btn--eq-width" href="" data-text="See how">See how</a></div>
      </div>
    </div>
  </div>
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-lg-10">
        <div class="slider-logo">
          <!-- Slider main container-->
          <div class="swiper-container js-logo-progressSLider">
            <!-- Additional required wrapper-->
            <div class="swiper-wrapper">
              <?php foreach ( carbon_get_theme_option( 'crb_customer_logo_list' ) as $cSliderImg): ?>
                <div class="swiper-slide">
                  <div class="logoWrp"> 
                    <img class="img-fit m3" src="<?php echo $cSliderImg['crb_customer_logo_item']; ?>" alt="">
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <div class="js-arrow-right"><img src="<?php echo $tempDir; ?>/img/icons/chevron-down-small.svg" alt=""></div>
          <div class="js-arrow-left"><img src="<?php echo $tempDir; ?>/img/icons/chevron-down-small.svg" alt=""></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  $args = array(
    'post_type' => 'customers',
    'posts_per_page' => -1,
    'order' => 'ASC',
  );
  $team = new WP_Query($args);
?>
<section class="nk-tabs sec-p"> 
  <div class="container"> 
    <div class="row mb-3 mb-lg-5"> 
      <div class="col-12"> 
        <div class="filter-sort"> 
          <div class="filter-sort__wrp d-flex align-items-center">
            <img class="me-1" src="<?php echo $tempDir; ?>/img/icons/sort.svg" alt=""><span class="d-none d-md-block fnt-20">Filter by</span>
          </div>
          <select class="js-niceSelect">
            <option value="1">All industries</option>
            <option value="2">Another option</option>
            <option value="3">Potato</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row kn-cards-wrp customer-card"> 
    <?php if($team->have_posts()) : ?>
      <?php while($team->have_posts()) : $team->the_post();?>
        <div class="col-lg-4 Nk-card Nk-card--sm"> 
          <div class="kn-cards"> 
            <div class="position-relative">
              <div class="kn-cards__imgWrp">
                <img class="kn-cards__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
              </div>
              <div class="logo-stamp">
                <img src="./img/icons/potentia.svg" alt="">
              </div>
            </div>
            <div class="Nk-card--sm__body mt-50">
              <span class="fnt-12 fnt-600 fnt-05">GOVERNMENT</span>
              <h3 class="Nk-h3 mt-2 mt-lg-3"><?php echo get_the_title(); ?></h3>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_query(); ?>
    <?php endif ?>
    </div>
  </div>
</section>
<?php
get_footer();
