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

<!--banner-->
<section class="kn-details customer-details back-btn">
  <div class="kn-details__img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
  <div class="container"> 
    <div class="row"> 
      <div class="col-12"> 
        <a class="back-btn_link" href="<?php echo $siteUrl; ?>/customers/">
        <img src="<?php echo $tempDir; ?>/img/icons/back-btn.svg" alt="">
        <span class="fnt-16 clr-w fnt-700">Back</span></a>
      </div>
    </div>
  </div>
  <div class="container"> 
    <div class="kn-details__container pb-0">
      <div class="customer-details__patch d-inline-block">
        <img src="<?php echo carbon_get_the_post_meta( 'meta_customers_logo' ); ?>" alt="">
      </div>
    </div>
  </div>
</section>
<!--details-->
<section class="c-details sec-p">
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-xl-10 mb-3 mb-xl-5">
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
