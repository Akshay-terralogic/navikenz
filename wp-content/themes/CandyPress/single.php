<?php
  /**
  * The template for displaying all single posts
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
  *
  * @package CandyPress
  */

  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>

<section class="kn-details back-btn">
  <?php if (get_the_post_thumbnail_url()): ?>
  <div class="kn-details__img">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
  </div>
  <div class="container"> 
    <div class="row"> 
      <div class="col-12"> <a class="back-btn_link" href="<?php echo $siteUrl; ?>/knowledge/"> <img src="<?php echo $tempDir; ?>/img/icons/back-btn.svg" alt=""><span class="fnt-16 clr-w fnt-700">Back</span></a></div>
    </div>
  </div>
  <?php endif ?>
  <?php if (get_the_title()): ?>
  <div class="container"> 
    <div class="kn-details__container">
      <div class="row"> 
        <div class="col-xl-10"> 
          <div class="sub-text"><span class="sub-text"><?php echo get_the_date(); ?> </span><span class="sub-text"> | </span><span class="sub-text">Blog</span><span class="sub-text"> | </span><span class="sub-text"><?php  echo reading_time(); ?></span></div>
          <h1 class="Nk-h1 clr-w fnt-700"><?php echo get_the_title(); ?></h1>

          <div class="profile"> 
            <img src="<?php echo carbon_get_the_post_meta( 'cbr_casestudy_author_img' ); ?>" alt="">
            <div class="profile__body"> 
              <h4><?php echo carbon_get_the_post_meta( 'cbr_casestudy_author_name' ); ?></h4>
              <p><?php echo carbon_get_the_post_meta( 'cbr_casestudy_author_designation' ); ?></p>
            </div>
          </div>
        </div>
        <div class="col-xl-2 d-flex align-items-md-end"> 
          <div class="logo-wrp"> 
            <a href="https://twitter.com/navikenzai"> 
              <img src="<?php echo $tempDir; ?>/img/icons/white/twitter.svg" alt="">
            </a>
            <a href="https://www.linkedin.com/company/navikenz"> 
              <img src="<?php echo $tempDir; ?>/img/icons/white/linkedin.svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>
</section>
<section class="kn-info sec-p"> 
  <div class="container">
    <div class="row justify-content-center"> 
      <div class="col-lg-10"> 
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php 
  $rightBlocks = carbon_get_the_post_meta( 'crb_casestudy_block' );
  $count = 0;
  foreach ( $rightBlocks as $block ) {
  switch ( $block['_type'] ) { 
  case 'meta_casestudy_right_content':
?>
<section class="kn-info"> 
  <div class="right-container"> 
    <div class="row"> 
      <div class="col-lg-7 ps-0 ps-lg-3">
        <img class="kn-info__img" src="<?php echo $block['crb_customer_image_item']; ?>" alt="">
      </div>
      <div class="col-lg-5">
        <p class="fnt-20 clr-0d <?php if ($count == 0): ?> mb-40 mt-4 mt-md-0 <?php endif ?>"><?php echo $block['crb_customer_right_text']; ?></p>
        <?php $terms = get_the_terms( $post->ID, 'post_tag' );
        if (is_array($terms)) : ?>
          <ul class="tags-wrap">
          <?php foreach ($terms as $term) : ?>
          <li><span class="tags"><?php echo $term->name ?></span></li>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php break; ?>
<?php case 'cbr_casestudy_cta': ?>
<?php if ($block['crb_customer_cta_title']) {?>
<section class="interested sec-p"> 
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-lg-6 text-center">  
        <h2 class="Nk-h2 clr-0d mb-4 mb-lg-5"><?php echo $block['crb_customer_cta_title']; ?></h2><? if ($block['crb_customer_cta_link']) { ?><a class="btn btn--b-trans btn-saq" href="<?php echo $block['crb_customer_cta_link']; ?>" data-text="Request for more information">Request for more information</a><?php } ?>
      </div>
    </div>
  </div>
</section>
<?php break; }} ?>


<?php
get_footer();
