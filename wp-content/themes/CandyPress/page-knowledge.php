<?php
  /**
  * Template Name: Knowledge
  *
  * @package CandyPress
  */
  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>
<!--banner-->
<section class="kn-banner">
  <div class="container"> 
    <div class="knwld-banner">
      <div class="swiper-container js-knowledge-slider"> 
        <div class="swiper-wrapper">
          <?php 
            $banners = carbon_get_the_post_meta( 'crb_knowledge' );
            foreach ($banners as $banner) :
          ?>
          <div class="row swiper-slide"> 
            <div class="col-md-6">
              <img class="kn-banner__img img-fit" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($banner['id']), 'full'); echo($thumb[0]);?>" alt="">
            </div>
            <div class="col-md-6 d-flex align-items-center"> 
              <div class="kn-banner__wrp"><span class="tags"><?php $count = 0; $terms = get_terms(array('case-tag-cloud')); if (is_array($terms)) : ?><?php foreach ($terms as $term) : ?><?php echo $term->name ?> <?php if ($count == 1) : ?><?php break; ?><?php endif ?><?php $count++; endforeach; ?><?php endif; ?></span>
                <h1 class="Nk-h2 mb-md-3 mt-2 mt-md-4"><?php echo get_the_title( $banner['id'] ); ?></h1>
                <p class="fnt-20 clr-w d-none d-lg-block"><?php $post = get_post($banner['id']);  $content = apply_filters('the_content', $post->post_content); echo wp_trim_words($content , 24);   ?></p><a class="btn btn--w mt-42 btn-saq" href="<?php echo get_the_permalink( $banner['id'] ); ?>" data-text="Read Now">Read Now</a>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="js-arrow-right">
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 17l-5-5 5-5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
      <div class="js-arrow-left">
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 17l-5-5 5-5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
    </div>
  </div>
</section>

<section class="nk-tabs sec-p"> 
  <div class="container"> 
    <div class="row"> 
      <div class="col-12">
        <div class="filter-wrp"> 
          <div class="swiper-container js-only-mobile ms-0">
            <ul class="nav Nk-tabs swiper-wrapper" id="custom-filter" role="tablist">
              <li class="nav-item swiper-slide" role="presentation">
                <a data-filter="*" class="nav-link active">All</a>
              </li>
              <li class="nav-item swiper-slide" role="presentation">
                <a data-filter=".case-study" class="nav-link">Case Study</a>
              </li>
              <li class="nav-item swiper-slide" role="presentation">
                <a class="nav-link" data-filter=".blogs">Blog</a>
              </li>
              <li class="nav-item swiper-slide" role="presentation">
                <a class="nav-link" data-filter=".whitepaper">Whitepaper</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Isotope Gallery -->
        <div class="iso-container row kn-cards-wrp">

            <?php
              $args = array(
                'post_type' => 'case-studies',
                'posts_per_page' => -1,
                'order' => 'ASC',
              );
              $knowlege = new WP_Query($args);
            ?>

            <?php if($knowlege->have_posts()) : ?>
              <?php while($knowlege->have_posts()) : $knowlege->the_post(); $post_type = get_post_type( $post->ID );?>
              <div class="col-lg-4 Nk-card Nk-card--sm case-study">
                <a class="kn-cards" href="<?php the_permalink(); ?>"> 
                  <div class="kn-cards__imgWrp">
                    <img class="kn-cards__img" src="<?php the_post_thumbnail_url(); ?>">
                  </div>
                  <div class="Nk-card--sm__body mt-50">
                    <span class="Nk-card--lg__body__date"> <?php echo get_the_date(); ?> </span>
                    <span>/ </span>
                    <span class="Nk-card--lg__body__tag">Case Study</span>
                    <h3 class="Nk-h3 mt-2 mt-lg-3"><?php the_title(); ?></h3>
                  </div>
                </a>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php endif ?>

          <?php
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'ASC',
              );
              $knowlege = new WP_Query($args);
            ?>
            <?php if($knowlege->have_posts()) : ?>
              <?php while($knowlege->have_posts()) : $knowlege->the_post();?>
              <div class="col-lg-4 Nk-card Nk-card--sm blogs">
                <a class="kn-cards" href="<?php the_permalink(); ?>"> 
                  <div class="kn-cards__imgWrp">
                    <img class="kn-cards__img" src="<?php the_post_thumbnail_url(); ?>">
                  </div>
                  <div class="Nk-card--sm__body mt-50">
                    <span class="Nk-card--lg__body__date"> <?php echo get_the_date(); ?> </span>
                    <span>/ </span>
                    <span class="Nk-card--lg__body__tag">Blog</span>
                    <h3 class="Nk-h3 mt-2 mt-lg-3"><?php the_title(); ?></h3>
                  </div>
                </a>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php endif ?>

          <?php
            $args = array(
              'post_type' => 'whitepaper',
              'posts_per_page' => -1,
              'order' => 'ASC',
            );
            $knowlege = new WP_Query($args);
          ?>
            <?php if($knowlege->have_posts()) : ?>
              <?php while($knowlege->have_posts()) : $knowlege->the_post();?>
              <div class="col-lg-4 Nk-card Nk-card--sm whitepaper">
                <a class="kn-cards" href="<?php the_permalink(); ?>"> 
                  <div class="kn-cards__imgWrp">
                    <img class="kn-cards__img" src="<?php the_post_thumbnail_url(); ?>">
                  </div>
                  <div class="Nk-card--sm__body mt-50">
                    <span class="Nk-card--lg__body__date"> <?php echo get_the_date(); ?> </span>
                    <span>/ </span>
                    <span class="Nk-card--lg__body__tag">Blog</span>
                    <h3 class="Nk-h3 mt-2 mt-lg-3"><?php the_title(); ?></h3>
                  </div>
                </a>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php endif ?>          

        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>

<script>
  
  $(document).ready(function () {
    var customContainer = jQuery(".iso-container");
    customContainer.isotope({
      filter: "*",
      layoutMode: "fitRows",
      fitRows: {
        gutter: 0
      }
    });
    jQuery("#custom-filter li:first-child > a").addClass("active");
    jQuery("#custom-filter a").click(function () {
      jQuery("#custom-filter .active").removeClass("active");
      jQuery(this).addClass("active");
      var customSelector = jQuery(this).attr("data-filter");
      customContainer.isotope({
        filter: customSelector,
        transitionDuration: '0.8s',
          // only opacity for reveal/hide transition
        hiddenStyle: {
          opacity: 0
        },
        visibleStyle: {
          opacity: 1
        }
      });
      return false;
    });
  });


</script>

<?php get_footer(); ?>
