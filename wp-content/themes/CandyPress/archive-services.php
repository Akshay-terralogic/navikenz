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

<?php if (carbon_get_theme_option( 'crb_banner_services_img' )): ?>
  <section class="kn-details">
    <div class="kn-details__img">
      <img src="<?php echo carbon_get_theme_option( 'crb_banner_services_img' ); ?>" alt="">
    </div>
    <div class="container"> 
      <div class="kn-details__container">
        <div class="row"> 
          <div class="col-md-8">
            <h1 class="Nk-h1 clr-w fnt-700"><?php echo carbon_get_theme_option( 'crb_banner_services_title' ); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>

<section class="service service-v2"> 
  <div class="service__lookFor">
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-3"> 
          <p class="fnt-20 clr-b">You are looking for : </p>
        </div>
        <div class="offset-md-2 col-md-7"> 
          <ul class="service__lookFor__list"> 
            <li class="service__lookFor__item"> <a class="fnt-20 clr-05 fnt-600 js-lookfor active" href="#plan">Plan</a></li>
            <li class="service__lookFor__item"> <a class="fnt-20 clr-05 fnt-600 js-lookfor" href="#design">Design</a></li>
            <li class="service__lookFor__item"> <a class="fnt-20 clr-05 fnt-600 js-lookfor" href="#develop">Develop</a></li>
            <li class="service__lookFor__item"> <a class="fnt-20 clr-05 fnt-600 js-lookfor" href="#operate">Operate</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--use this if card are 6-->
  <div class="container">
    <?php 
      $service_cards = carbon_get_theme_option( 'crb_sections' );
      foreach ( $service_cards as $card ) :
      switch ( $card['_type'] ) :
      case 'meta_plan_block':
    ?>
    <div class="service-wrp-two service-container " id="plan">
      <div class="service__content"> <span class="fnt-12 fnt-600 clr-b text-uppercase">PLAN</span>
        <h2 class="Nk-h2 clr-05 mt-2 mb-3 mt--lg-3 mb-lg-4"><?php echo $card['crb_plan_block_title']; ?></h2>
        <p class="fnt-20 fnt-600"><?php echo $card['crb_plan_block_sub_text']; ?></p>
      </div>
      <div class="service-item-two">
        <?php foreach ( $card['crb_plan_post'] as $detail ): ?>
          <div class="service__item__wrp">
            <div class="flip-box">
              <div class="flip-box-inner">
                <a class="flip-box-front" href="<?php echo get_the_permalink( $detail['id'] ); ?>">
                  <div class="flip-box-front__wrp">
                    <p class="d-md-none">
                      <?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?>
                    </p>
                    <h6 class="fnt-20 clr-b fnt-700"><?php echo get_the_title( $detail['id'] ); ?></h6>
                    <p class="card-content"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>      
      </div>
    </div>
    <?php break; ?>
    <?php case 'meta_design_block': ?>
    <div class="service-wrp-one service-container " id="design">
      <div class="service__content"> <span class="fnt-12 fnt-600 clr-b text-uppercase">Design</span>
        <h2 class="Nk-h2 clr-05 mt-2 mb-3 mt--lg-3 mb-lg-4"><?php echo $card['crb_design_block_title']; ?></h2>
        <p class="fnt-20 fnt-600"><?php echo $card['crb_design_block_sub_text']; ?></p>
      </div>
      <div class="service-item-one">
      <?php foreach ( $card['crb_design_post'] as $detail ): ?>
        <div class="service__item__wrp">
          <div class="flip-box">
            <div class="flip-box-inner">
              <a class="flip-box-front" href="<?php echo get_the_permalink( $detail['id'] ); ?>">
                <div class="flip-box-front__wrp">
                  <p class="d-md-none"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                  <h6 class="fnt-20 clr-b fnt-700"><?php echo get_the_title( $detail['id'] ); ?></h6>
                  <p class="card-content"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>   
      </div>
    </div>
    <?php break; ?>
    <?php case 'meta_develop_block' : ?>
    <div class="service-wrp-five service-container" id="develop">
      <div class="service__content"> <span class="fnt-12 fnt-600 clr-b text-uppercase">Develop</span>
        <h2 class="Nk-h2 clr-05 mt-2 mb-3 mt--lg-3 mb-lg-4"><?php echo $card['crb_develop_block_title']; ?></h2>
        <p class="fnt-20 fnt-600"><?php echo $card['crb_develop_block_sub_text']; ?></p>
      </div>
      <div class="service-item-five">
        <?php foreach ( $card['crb_develop_post'] as $detail ): ?>
        <div class="service__item__wrp">
          <div class="flip-box">
            <div class="flip-box-inner">
              <a class="flip-box-front" href="<?php echo get_the_permalink( $detail['id'] ); ?>">
                <div class="flip-box-front__wrp">
                  <p class="d-md-none"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                  <h6 class="fnt-20 clr-b fnt-700"><?php echo get_the_title( $detail['id'] ); ?></h6>
                  <p class="card-content"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>  
      </div>
    </div>
    <?php break; ?>
    <?php case 'meta_operate_block' : ?>
      <div class="service-wrp-three service-container" id="operate">
        <div class="service__content"> <span class="fnt-12 fnt-600 clr-b text-uppercase">Operate</span>
          <h2 class="Nk-h2 clr-05 mt-2 mb-3 mt--lg-3 mb-lg-4"><?php echo $card['crb_operate_block_title']; ?></h2>
          <p class="fnt-20 fnt-600"><?php echo $card['crb_operate_block_sub_text']; ?></p>
        </div>
        <div class="service-item-three">
          <?php foreach ( $card['crb_operate_post'] as $detail ): ?>
          <div class="service__item__wrp">
            <div class="flip-box">
              <div class="flip-box-inner">
                <a class="flip-box-front" href="<?php echo get_the_permalink( $detail['id'] ); ?>">
                  <div class="flip-box-front__wrp">
                    <p class="d-md-none"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                    <h6 class="fnt-20 clr-b fnt-700"><?php echo get_the_title( $detail['id'] ); ?></h6>
                    <p class="card-content"><?php echo carbon_get_post_meta( $detail['id'], 'crb_single_service_card_content' );?></p>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>  
        </div>
      </div>
    <?php break; endswitch; endforeach; ?> 
  </div>
</section>
<?php 
  $service_cards = carbon_get_theme_option( 'crb_sections' );
  foreach ( $service_cards as $card ) :
  switch ( $card['_type'] ) :
  case 'meta_hero_block':
?>
<section class="bg-0d sec-p delivary">
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-8 col-xxl-10"> 
        <h2 class="Nk-h2 gsap-delivary-h2" data-aos="fade-down"><?php echo $card['crb_servhero_block_title']; ?></h2>
      </div>
    </div>
  </div>
  <div class="container mt-42">
    <div class="js-customer-slider swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ($card['crb_servhero_main_slider'] as $hero) : ?>
        <div class="swiper-slide">
          <div class="row">
            <div class="col-md-5 col-xxl-4 d-flex align-items-center overflow-hidden"> 
              <div class="delivary__wrp">
                <h3 class="Nk-h3 clr-w gsap-upDown" data-aos="fade-up"><?php echo $hero['crb_servhero_block_sub_text']; ?></h3><a class="btn btn--w mt-lg-5 d-none d-md-inline-block btn-saq gsap-upDown btn--eq-width" href="<?php echo $hero['crb_servhero_block_cta']; ?>" data-aos="fade-up" data-text=" See how">See how</a>
              </div>
            </div>
            <div class="col-md-7 offset-xxl-2 col-xxl-6 mbl-right-p overflow-hidden">
              <div class="delivaryImg__wrp"><img class="delivary__img" src="<?php echo $hero['crb_servhero_block_img']; ?>" alt="" data-aos="overlay"></div>
              <div class="d-md-none mt-4 mt-lg-5"><a class="btn btn--w btn-saq" href="<?php echo $hero['crb_servhero_block_cta']; ?>" data-aos="fade-up" data-text=" See how">See how</a></div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
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
              <?php foreach ($card['crb_servhero_block_slider'] as $logoSlider) : ?>
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"> <img class="img-fit m3" src="<?php echo $logoSlider['crb_servhero_block_logo'] ?>" alt=""></div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="js-arrow-left"><img src="<?php echo $tempDir; ?>/img/icons/chevron-down-small.svg" alt=""></div>
          <div class="js-arrow-right"><img src="<?php echo $tempDir; ?>/img/icons/chevron-down-small.svg" alt=""></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php break; ?>
<?php case 'meta_servclient_block' : ?>
  <section class="sec-p Nk-partner"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-lg-5"> 
          <h2 class="Nk-h2 clr-05"><?php echo $card['meta_servclient_block_title']; ?></h2>
        </div>
        <div class="col-lg-7"> 
          <div class="Nk-partner__logoWrp">
            <?php foreach ($card['crb_servclient_logos'] as $cLogo) : ?>
            <div class="Nk-partner__container"><img src="<?php echo $cLogo['crb_servclient_logo'] ?>" alt=""></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php break; endswitch; endforeach; ?>



<?php
get_footer();
