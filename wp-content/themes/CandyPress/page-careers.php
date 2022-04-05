<?php
  /**
  * Template Name: Careers
  *
  * @package CandyPress
  */
  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>
<!--banner-->
<?php 
  $careersBlocks = carbon_get_the_post_meta( 'crb_careers' );
  foreach ( $careersBlocks as $cBlock ) :
    switch ( $cBlock['_type'] ) { 
      case 'crb_careers_banner':
      ?>
      <section class="kn-details">
        <div class="kn-details__img">
          <img src="<?php echo $cBlock['meta_careers_banner_img']; ?>" alt="" />
        </div>
        <div class="container">
          <div class="kn-details__container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="Nk-h1 clr-w fnt-700"><?php echo $cBlock['meta_careers_banner_text']; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php break; ?>
      <?php case 'crb_careers_status' : ?>
        <section class="Nk-fun sec-p pb-0">
          <div class="container"> 
            <div class="row justify-content-center"> 
              <div class="col-md-12 text-center"> 
                <p class="clr-0d fnt-20 fnt-700"><?php echo $cBlock['meta_careers_sub_text']; ?></p>
                <h2 class="Nk-h2 mb-40 clr-0d mt-3 mt-lg-5"><?php echo $cBlock['meta_careers_title']; ?></h2>
              </div>
            </div>
          </div>
        </section>
      <?php break; ?>
      <?php case 'crb_careers_right_imgntxt' :  ?>
        <section class="Nk-fun pb-0">
          <div class="left-container">
            <div class="row gx-lg-5 flex-column-reverse flex-lg-row">
              <div class="col-lg-4 mt-8rem">
                <h4 class="fnt-32 clr-0e mb-3 mb-lg-4"><?php echo $cBlock['crb_careers_right_txt']; ?></h4>
                <p class="fnt-20"><?php echo $cBlock['crb_careers_right_sub_txt']; ?></p>
              </div>
              <div class="col-lg-8 pe-0"><img class="Nk-fun__banner" src="<?php echo $cBlock['crb_careers_right_img']; ?>" alt="" /></div>
            </div>
          </div>
        </section>
      <?php break; ?>
      <?php case 'crb_careers_left_imgntxt' : ?>
        <section class="Nk-fun sec-p">
          <div class="right-container mt-10rem">
            <div class="row gx-lg-5 flex-column-reverse flex-lg-row-reverse">
              <div class="col-lg-4 mt-8rem">
                <h4 class="fnt-32 clr-0e mb-3 mb-lg-4"><?php echo $cBlock['crb_careers_left_txt']; ?></h4>
                <p class="fnt-20"><?php echo $cBlock['crb_careers_left_sub_txt']; ?></p>
              </div>
              <div class="col-lg-8 ps-0"><img class="Nk-fun__banner" src="<?php echo $cBlock['crb_careers_left_img']; ?>" alt="" /></div>
            </div>
          </div>
        </section>
      <?php break; ?>
      <?php case 'crb_careers_hero_banner' : ?>
        <!--vedio banner-->
        <section class="vedio-banner">
          <div class="js-vedio-slider swiper-container h-100">
            <div class="swiper-wrapper">
              <?php foreach ( $cBlock['meta_careers_list'] as $vData): ?>
              <div class="swiper-slide">
                <div class="videoCoverImage">
                  <div class="img-wrp"><img src="<?php echo $vData['crb_hero_img']; ?>" alt="">
                    <div class="vedio-play-button"><img src="<?php echo $tempDir; ?>/img/icons/play.svg" alt=""></div>
                  </div>
                  <div class="theVedio" style="display: none;">
                    <iframe class="player-fram" src="<?php echo $vData['crb_hero_video']; ?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </section>
        <section class="vedio-thumbnail-sec"> 
          <div class="container"> 
            <div class="row justify-content-center"> 
              <div class="col-10">
                <div class="vedio-thumbnail-sec__wrp">
                  <div class="js-vedio-thumbnail swiper-container">
                    <div class="swiper-wrapper">
                      <?php foreach ($cBlock['meta_careers_list'] as $vData): ?>
                        <div class="swiper-slide">  <img src="<?php echo $vData['crb_hero_img']; ?>" alt=""></div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="vedio-button-next"><span> </span></div>
                  <div class="vedio-button-prev"><span></span></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php break; ?>
      
      <?php case 'crb_careers_cultur_assets' : ?>
        <section class="culturAssets sec-p pb-0">
          <div class="container"> 
            <div class="row"> 
              <div class="col-lg-10"> 
                <h2 class="Nk-h2 mb-40 clr-05"><?php echo $cBlock['crb_careers_cultur_heading']; ?></h2>
                <p class="fnt-32 clr-0e"><?php echo $cBlock['crb_careers_cultur_assets']; ?></p>
              </div>
              <div class="col-12"> 
                <ul class="culturAssets__cards row"> 
                  <div class="col-lg-6">
                    <?php foreach ($cBlock['crb_careers_cultur_section_boxs'] as $ccs_box): ?>
                    <li class="culturAssets__cards__item">
                      <?php echo $ccs_box['meta_careers_cultur_section_item']; ?>
                    </li>                      
                    <?php endforeach; ?>
                  </div>
                  <div class="col-lg-6">
                    <?php foreach ($cBlock['crb_careers_cultur_section_boxs_2'] as $ccs_box): ?>
                    <li class="culturAssets__cards__item">
                      <?php echo $ccs_box['meta_careers_cultur_section_item_2']; ?>
                    </li>                      
                    <?php endforeach; ?>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </section>           
      <?php break; ?>

      <?php case 'crb_careers_gallery' : ?>
        <!--gallary-->
        <section class="Nk-gallary sec-p">
          <div class="container">
            <h2 class="Nk-h2 mb-40 clr-05"><?php echo $cBlock['crb_gallery_heading']; ?></h2>
            <div class="row gutter-40 gutter-sm-8">
              <?php foreach ( $cBlock['meta_gallery_list'] as $galleryImg) : ?>
                <div class="<?php if ( $galleryImg['crb_layout'] == 1) : ?>col-8 Nk-gallary__img--lg<?php endif ?><?php if ( $galleryImg['crb_layout'] == 2): ?>col-4 Nk-gallary__img--lg<?php endif ?><?php if ( $galleryImg['crb_layout'] == 3): ?>col-6 Nk-gallary__img--sm<?php endif ?>">
                  <img class="Nk-gallary__img" src="<?php echo $galleryImg['crb_gallery_item']; ?>" alt="" />
                </div>
              <?php endforeach; ?>
            </div>
            <div class="row"> 
              <div class="col-lg-10"> 
                <ul class="Nk-gallary__Content">
                  <?php echo $cBlock['crb_gallery_bottom_sub_text']; ?>
                </ul>
              </div>
            </div>
          </div>
        </section>
      <?php break; ?>



      <?php case 'crb_careers_cta' : ?>
        <!--part-->
        <section class="interested sec-p">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 class="Nk-h2 clr-0d mb-3 mb-lg-4"><?php echo $cBlock['crb_careers_cta_heading']; ?></h2>
                <p class="fnt-16 clr-0e mb-4"><?php echo $cBlock['crb_careers_cta_sub_text']; ?></p>
                <a class="btn btn--b-trans mt-1 btn-saq" href="<?php echo $cBlock['crb_careers_cta_link']; ?>" data-text="Join our team">Join our team</a>
              </div>
            </div>
          </div>
        </section>
      <?php break; ?>
    <?php } endforeach; ?>

<!--fun-->

<?php
get_footer();
