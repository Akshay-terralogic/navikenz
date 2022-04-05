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
<section class="kn-banner service-banner back-btn"> 
  <div class="container"> 
    <div class="row"> 
      <div class="col-12"> <a class="back-btn_link mt-0 mb-md-5" href="<?php echo $siteUrl; ?>/services/"> <img src="<?php echo $tempDir; ?>/img/icons/back-btn.svg" alt=""><span class="fnt-16 clr-w fnt-700">Back</span></a></div>
    </div>
  </div>
  <div class="container"> 
    <div class="row"> 
      <div class="col-md-6"> <img class="kn-banner__img img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="kn-banner__wrp"><?php $terms = wp_get_post_terms( $post->ID, 'service-tags', array( 'fields' => 'all' ) ); if (is_array($terms)) : ?><span class="tags"><?php foreach ($terms as $term) : ?><?php echo $term->name ?><?php break; endforeach;  ?></span><?php endif; ?>
          <h1 class="Nk-h2 mt-2"><?php echo get_the_title(); ?></h1>
          <p class="fnt-20 clr-w mt-32"><?php echo carbon_get_the_post_meta( 'crb_single_service_banner_sub_text' ); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--details-->
<section class="service-details sec-p"> 
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-xxlg-10"> 
        <?php echo get_the_content(); ?>
      </div>
    </div>
  </div>
  <div class="container mt-8rem"> 
    <h2 class="Nk-h2 clr-05"><?php echo carbon_get_the_post_meta( 'crb_single_service_block_title' ); ?></h2>
    <div class="row methodology-card">
      <?php foreach(carbon_get_the_post_meta( 'crb_single_service_block_list' ) as $card) : ?>
      <div class="col-md-4 mb-3 mb-md-0"> 
        <div class="methodology-card__item">
          <img src="<?php echo $card['crb_single_service_block_logo']; ?>" alt="">
          <p class="fnt-32 clr-05 fnt-600 methodology-card__h"><?php echo $card['crb_single_service_block_block_title']; ?></p>
          <p class="fnt-18 clr-b fnt-600"><?php echo $card['crb_single_service_block_block_sub_text']; ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="container related-case-study"> 
    <h2 class="Nk-h2 clr-05 mb-3 mb-xl-5">Related Case Studies</h2>
    <div class="row kn-cards-wrp"> 
      <?php
        $args = array(
          'post_type' => 'case-studies',
          'posts_per_page' => 3,
          'order' => 'ASC',
        );
        $team = new WP_Query($args);
      ?>
      <?php if($team->have_posts()) : ?>
        <?php while($team->have_posts()) : $team->the_post();?>
          <div class="col-lg-4 Nk-card Nk-card--sm"> 
            <div class="kn-cards">
              <div class="kn-cards__imgWrp"> 
                <img class="kn-cards__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
              </div>
              <div class="Nk-card--sm__body mt-50">
                <span class="Nk-card--lg__body__date"><?php echo get_the_date('M, j Y') ?></span>
                <span>/ </span>
                <span class="Nk-card--lg__body__tag">case studies</span>
                <h3 class="Nk-h3 mt-2 mt-lg-3"><?php echo get_the_title(); ?></h3>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      <?php endif ?>

    </div>
  </div>
</section>
<!--intrested-->
<section class="interested sec-p"> 
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-lg-6 text-center">  
        <h2 class="Nk-h2 clr-0d mb-4 mb-lg-5">Interested to know more?</h2><a class="btn btn--b-trans btn-saq" href="<?php echo $siteUrl; ?>/contact-us/" data-text="Request for more information">Request for more information</a>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
