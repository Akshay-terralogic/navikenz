<?php
  /**
  * Template Name: Contact us
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

  <?php 
  
    $contact_blocks = carbon_get_the_post_meta( 'crb_contact' );
    foreach ( $contact_blocks as $contact ) :
    switch ( $contact['_type'] ) { 
    case 'meta_contact_banner' :
  ?>
  <section class="kn-banner contact-banner"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-6">
          <img class="kn-banner__img img-fit" src="<?php echo $contact['meta_contact_banner_img']; ?>" alt="">
        </div>
        <div class="col-md-6 d-flex align-items-center"> 
          <div class="kn-banner__wrp">
            <h1 class="Nk-h2 mt-2"><?php echo $contact['meta_contact_banner_heading']; ?></h1>
            <p class="fnt-20 clr-w mt-32"><?php echo $contact['meta_contact_banner_sub_text']; ?></p>
            <a class="getInTouch" href="tel:<?php echo $contact['meta_contact_banner_contact_num']; ?>">
              <div class="getInTouch__wrp">
                <img src="<?php echo $tempDir; ?>/img/icons/ind.svg" alt="">
                <span class="fnt-16 clr-w"><?php echo $contact['meta_contact_banner_contact_num']; ?></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php break; ?>
  <?php case 'meta_form_list' : ?>
  <section class="sec-p contact-form"> 
    <div class="container"> 
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-form__wrp">
            <div class="row justify-content-center"> 
              <div class="col-lg-10">
                <div class="row justify-content-center"> 
                  <div class="col-md-6">
                    <h3 class="Nk-h3 text-center"><?php echo $contact['meta_contact_form_heading']; ?></h3>
                  </div>
                </div>
                <?php echo do_shortcode($contact['meta_contact_shortcode']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php break; ?>
  <?php case 'meta_contact_locations' : ?>

  <section class="our-location sec-p pt-0"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-12"> 
          <h2 class="Nk-h2 clr-05"><?php echo $contact['meta_contact_heading']; ?></h2>
        </div>
      </div>
      <div class="row"> 
        <div class="col-12"> 
          <div id="map"></div>
        </div>
      </div>
      <div class="row mt-42 Nk-locatins"> 
        <?php foreach ( $contact['meta_contact_locations_list'] as $location) : ?>
        <div class="col-md-6"> 
          <div class="our-location__card"> 
            <div class="lottie our-location__card__img" id="svg__01" data-animation-path="<?php echo $tempDir; ?>/js/data.json" data-autoplay="true" data-rederer="svg" data-anim-loop="true" data-name="Lottie Animation"></div>
            <div class="our-location__card__body"> 
              <h3 class="Nk-h3 mb-2 mb-lg-4"><?php echo $location['meta_contact_location_heading']; ?></h3>
              <p class="fnt-20 clr-0d mb-4"><?php echo $location['meta_contact_location_address']; ?></p>
              <div>
                <a class="btn btn--blue-trans btn--sm btn-saq" href="" data-text="Get direction">Get direction<img src="<?php echo $tempDir; ?>/img/icons/chevron-right-small-blue.svg" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php break; } endforeach; ?>

<?php
get_footer();
