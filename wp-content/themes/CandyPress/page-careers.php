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
            <div class="row">
              <div class="col-md-6">
                <h2 class="Nk-h2 mb-40 clr-0d"><?php echo $cBlock['meta_careers_title']; ?></h2>
                <p class="clr-0d fnt-20 fnt-700"><?php echo $cBlock['meta_careers_sub_text']; ?></p>
              </div>
              <div class="offset-xl-1 col-md-6 col-xl-5 col-xxlg-4">
                <ul class="countData">
                  <?php foreach ($cBlock['meta_careers_status_list'] as $statusList) : ?>
                    <li class="countData__item">
                      <div>
                        <p class="fnt-64"><?php echo $statusList['meta_careers_status_item']; ?></p>
                        <p class="fnt-24 clr-0d mt-1 mt-md-2"><?php echo $statusList['meta_careers_status_sub_text']; ?></p>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </section>
      <?php break; ?>
      <?php case 'crb_careers_right_imgntxt' :  ?>
        <section class="Nk-fun sec-p pb-0">
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
          <div class="videoCoverImage">
            <div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'">
              <img src="<?php echo $cBlock['crb_hero_img']; ?>" alt="" />
              <div class="vedio-play-button">
                <img src="<?php echo $tempDir; ?>/img/icons/play.svg" alt="" />
              </div>
            </div>
            <div id="thevideo" style="display: none;">
              <iframe src="<?php echo $cBlock['crb_hero_video']; ?>?rel=0;&amp;autoplay=1&amp;mute=1&amp;loop=1" frameborder="0" allowfullscreen="" include=""></iframe>
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
