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
                <img src="<?php echo $tempDir; ?>/img/icons/white/mail.svg" alt="">
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
          <h2 class="Nk-h2 clr-05">Our locations</h2>
        </div>
      </div>
      <div class="row"> 
        <div class="col-12"> 
          <div id="map"></div>
        </div>
      </div>
      <div class="row mt-42 Nk-locatins">
        <?php $jsonFile = 1; foreach ( $contact['meta_contact_locations_list'] as $locList): ?>
          <div class="col-md-4">
            <div class="our-location__card"> 
              <div class="lottie our-location__card__img" id="svg__0<?php echo $jsonFile; ?>" data-animation-path="<?php echo $locList['meta_contact_location_json']; ?>" data-autoplay="true" data-rederer="svg" data-anim-loop="true" data-name="Lottie Animation"></div>
              <div class="our-location__card__body"> 
                <div class="our-location__card__body__list mb-4">
                  <h3 class="Nk-h3 mb-2 mb-lg-4"><?php echo $locList['meta_contact_country_heading']; ?></h3>
                  <?php foreach ($locList['meta_contact_country_list'] as $countryName): ?>
                    <p class="fnt-20 clr-0d"><?php echo $countryName['meta_contact_country_txt'] ?></p>
                  <?php endforeach ?>
                </div>
                <span class="fnt-14 clr-b fnt-600 o-6"><?php echo $locList['meta_contact_location_heading']; ?></span>
                <p class="fnt-20 clr-0d mt-3"><?php echo $locList['meta_contact_location_address']; ?></p>
              </div>
            </div>
          </div>
        <?php $jsonFile++; endforeach ?>
      </div>
    </div>
  </section>
  <?php break; } endforeach; ?>

<?php
get_footer();
