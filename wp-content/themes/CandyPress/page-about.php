<?php
	/**
	* Template Name: About us
	*
	* @package CandyPress
	*/
	get_header();
	$t_options = get_option('tp_opt');
	global $tempDir;
	global $siteUrl;
?>
<!--banner-->
<?php while ( have_posts() ) : the_post(); ?>
  <?php 
    $about_section = carbon_get_the_post_meta( 'crb_about_sections' );
    foreach ( $about_section as $about ) {
    switch ( $about['_type'] ) { 
    case 'meta_about_banner':
  ?>
  <section class="kn-details">
    <div class="kn-details__img">
      <img src="<?php echo $about['crb_about_image']; ?>" alt="">
    </div>
    <div class="container"> 
      <div class="kn-details__container">
        <div class="row"> 
          <div class="col-md-9">
            <h1 class="Nk-h1 clr-w fnt-700" data-aos="fade-left"><?php echo $about['crb_about_banner_text']; ?> </h1>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php break; ?>
<?php case 'meta_img_and_txt_banner': ?>
  <section class="help sec-p"> 
    <div class="container"> 
      <div class="row flex-column-reverse flex-lg-row"> 
        <div class="col-lg-5 d-flex align-items-lg-center"> 
          <div class="help__wrp help__wrp__left"> 
            <h3 class="mb-40"><?php echo $about['crb_int_banner_text']; ?></h3>
            <p class="fnt-20 clr-0d fnt-700 js-scroll-container"><?php echo $about['crb_int_para_text']; ?></p>
          </div>
        </div>
        <div class="col-lg-7"><img class="help__img" src="<?php echo $about['crb_int_image']; ?>"></div>
      </div>
    </div>
  </section>
<?php break; ?>
<?php case 'meta_img_and_txt_two': ?>
  <section class="help sec-p">
    <div class="container">
      <div class="row"> 
        <div class="col-lg-7"><img class="help__img" src="<?php echo $tempDir; ?>/img/about-us/help2.png"></div>
        <div class="col-lg-5 d-flex align-items-lg-center"> 
          <div class="help__wrp help__wrp__right"> 
            <h3 class="mb-40"><?php echo $about['crb_int_banner_text_two']; ?></h3>
            <p class="fnt-20 clr-0d fnt-700 js-scroll-container"><?php echo $about['crb_int_para_text_two']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php break; ?>
<?php case 'meta_client_logos' : ?>
  <section class="help sec-p">
    <div class="container"> 
      <h2 class="Nk-h2 clr-05"><?php echo $about['crb_client_logo_heading']; ?></h2>
      <div class="row gx-0 rec-card">
        <?php foreach ( $about['crb_client_logos'] as $logo) : ?>
        <div class="col-6 col-md-3 rec-card__wrp d-flex align-items-center justify-content-center"> 
          <img src="<?php echo $logo['crb_client_logo_img']; ?>" alt="">
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php break; ?>
<?php case 'meta_core_value': ?>
  <!--core value-->
  <section class="core-value"> 
    <div class="container"> 
      <h2 class="Nk-h2 clr-05"><?php echo $about['crb_core_value_heading']; ?></h2>
      <ul class="core-value__list">
        <?php foreach ($about['crb_core_value_logos'] as $plogo): ?>
          <li class="core-value__list__item"> 
            <div class="core-value__list__item__wrp"> 
              <img class="core-value__list__item__logo" src="<?php echo $plogo['crb_core_value_logo_img']; ?>" alt="">
              <h3 class="Nk-h3"><?php echo $plogo['crb_core_value_heading']; ?></h3>
              <p class="fnt-20 clr-b fnt-600"><?php echo $plogo['crb_core_value_sub_text']; ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
  <?php break; ?>
  <?php case 'meta_advisory' : ?>
    <!--advisory-->
    <section class="advisory sec-p">
      <div class="container"> 
        <div class="row"> 
          <div class="col-lg-7"> 
            <h3 class="Nk-h2 clr-05 mb-3"><?php echo $about['crb_advisory_heading']; ?></h3>
            <p class="fnt-20 clr-0d fnt-700"><?php echo $about['crb_advisory_sub_text']; ?></p>
          </div>
        </div>

        <div class="row advisory__imgwrp gx-lg-5"> 
          <?php if ( $about['crb_advisory_show_board'] == true ): ?>
            <?php
              $args = array(
                'post_type' => 'our-team',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'team-advisory',
                    'terms' => 'advisory-board',
                    'field' => 'slug',
                    'operator' => 'IN',
                  ),
                )
              );
              $team = new WP_Query($args);
            ?>
            <?php if($team->have_posts()) : ?>
              <?php while($team->have_posts()) : $team->the_post(); ?>
                <div class="col-md-6 col-lg-4 advisory__card">
                  <div class="advisory__card__img">
                    <img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    <div class="advisory__card__body">
                      <h5 class="name"><?php the_title(); ?></h5>
                      <p class="position"><?php echo carbon_get_the_post_meta( 'designation' ); ?></p>
                      <div class="gsap-cardFooter">
                        <div class="advisory__card__body__footer"> 
                          <a class="btn btn--sm btn--w js-model-btn" href="" data-bs-toggle="modal" data-bs-target="#model-<?php echo get_the_ID(); ?>"> <span>More info</span><i class="fa fa-angle-right"></i></a>
                          <div class="wrp">
                            <a href="<?php echo carbon_get_the_post_meta( 'linkedin' ); ?>" target="_blank"> 
                              <img src="<?php echo $tempDir; ?>/img/icons/W-in.svg" alt="">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            <?php endif ?>
            
            <?php
              $args = array(
                'post_type' => 'our-team',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'team-advisory',
                    'terms' => 'advisory-board',
                    'field' => 'slug',
                    'operator' => 'IN',
                  ),
                )
              );
              $team = new WP_Query($args);
            ?>
            <?php if($team->have_posts()) : ?>
              <?php while($team->have_posts()) : $team->the_post(); ?>
              <div class="aboutModel modal fade" id="model-<?php echo get_the_ID();  ?>" tabindex="-1" aria-labelledby="aboutModelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                      <img src="<?php echo $tempDir; ?>/img/icons/white/w-close-icon.svg" alt="" />
                    </button>
                    <div class="modal-body">
                      <div class="">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="aboutModel__wrp">
                              <div class="aboutModel__img">
                                <div class="position-relative">
                                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                              </div>
                              <div class="aboutModel__body">
                                <div class="aboutModel__body__head">
                                  <div class="wrp">
                                    <h3 class="pb-lg-3"><?php the_title(); ?></h3>
                                    <p class="fnt-24 clr-w o-8"><?php echo carbon_get_the_post_meta( 'designation' ); ?></p>
                                  </div>
                                  <div class="logoWro">
                                    <a class="logoWro__wrp" href="<?php echo carbon_get_the_post_meta( 'linkedin' ); ?>">
                                      <img class="ms-2" src="<?php echo $tempDir; ?>/img/icons/W-in.svg" alt="" />
                                    </a>
                                  </div>
                                </div>
                                <div class="aboutModel__body__info js-scroll-container">
                                  <div class="aboutModel__body__info__wrp me-4">
                                    <p class="fnt-20 clr-w">
                                      <?php echo get_the_content(); ?>
                                    </p>
                                  </div>
                                </div>
                                <div class="aboutModel__body__info__foot">
                                  <div class="aboutModel__body__info__foot__img"><img src="<?php echo $tempDir; ?>/img/icons/back-quote.svg" alt="" /></div>
                                  <p class="ps-md-4 mt-3 mt-md-0 fnt-20 clr-w italic"><?php echo carbon_get_the_post_meta( 'quotes' ); ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>   
            <?php endwhile; wp_reset_query(); ?>  
            <?php endif ?>                  

          <?php endif ?> <!-- show hide -->
        </div>
                    
      </div>
    </section>
  <?php break; ?>
  <?php case 'meta_our_team' :  ?>
    
    <section class="ourTeam sec-p pb-0">
      <div class="container"> 
        <div class="row"> 
          <div class="col-12">    
            <h2 class="Nk-h2 text-center mb-5"><?php echo carbon_get_the_post_meta( 'crb_our_team_heading' ); ?></h2>
          </div>
        </div>
        <div class="row gx-lg-5"> 
          <?php if ( $about['crb_our_team_show_board'] == true ) : ?>
          <?php
            $args = array(
              'post_type' => 'our-team',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team-advisory',
                  'terms' => 'advisory-board',
                  'field' => 'slug',
                  'operator' => 'NOT IN',
                ),
              )
            );
            $team = new WP_Query($args);
          ?>
          <?php if($team->have_posts()) : ?>
            <?php while($team->have_posts()) : $team->the_post(); ?>
              <div class="col-6 col-md-4 col-lg-3 ourTeam__card"> 
                <a class="js-model-btn ourTeam__card__img" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#team-Model-<?php echo get_the_ID(); ?>"> 
                  <img class="img-fit" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </a>
                <div class="fnt-24 clr-w text-uppercase mt-4"><?php the_title(); ?></div>
                <p class="position mt-2"><?php echo carbon_get_the_post_meta( 'designation' ); ?></p>
                <div class="ourTeam__card__footer">
                  <div class="wrp">
                    <a href="<?php echo carbon_get_the_post_meta( 'linkedin' ); ?>">
                      <img src="<?php echo $tempDir; ?>/img/icons/W-in.svg" alt="">
                    </a>
                  </div>
                  <a class="js-model-btn" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#team-Model-<?php echo get_the_ID(); ?>">
                    More info<i class="ms-1 fa fa-angle-right"></i>
                  </a>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>  
          <?php endif ?>   
        </div>
          <?php
            $args = array(
              'post_type' => 'our-team',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team-advisory',
                  'terms' => 'advisory-board',
                  'field' => 'slug',
                  'operator' => 'NOT IN',
                ),
              )
            );
            $team = new WP_Query($args);
          ?>
            <?php if($team->have_posts()) : ?>
              <?php while($team->have_posts()) : $team->the_post(); ?>
              <div class="aboutModel modal fade" id="team-Model-<?php echo get_the_ID();  ?>" tabindex="-1" aria-labelledby="aboutModelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                      <img src="<?php echo $tempDir; ?>/img/icons/white/w-close-icon.svg" alt="" />
                    </button>
                    <div class="modal-body">
                      <div class="">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="aboutModel__wrp">
                              <div class="aboutModel__img">
                                <div class="position-relative">
                                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                              </div>
                              <div class="aboutModel__body">
                                <div class="aboutModel__body__head">
                                  <div class="wrp">
                                    <h3 class="pb-lg-3"><?php the_title(); ?></h3>
                                    <p class="fnt-24 clr-w o-8"><?php echo carbon_get_the_post_meta( 'designation' ); ?></p>
                                  </div>
                                  <div class="logoWro">
                                    <a class="logoWro__wrp" href="<?php echo carbon_get_the_post_meta( 'linkedin' ); ?>">
                                      <img class="ms-2" src="<?php echo $tempDir; ?>/img/icons/W-in.svg" alt="" />
                                    </a>
                                  </div>
                                </div>
                                <div class="aboutModel__body__info js-scroll-container">
                                  <div class="aboutModel__body__info__wrp me-4">
                                    <p class="fnt-20 clr-w">
                                      <?php echo get_the_content(); ?>
                                    </p>
                                  </div>
                                </div>
                                <div class="aboutModel__body__info__foot">
                                  <div class="aboutModel__body__info__foot__img"><img src="<?php echo $tempDir; ?>/img/icons/back-quote.svg" alt="" /></div>
                                  <p class="ps-md-4 mt-3 mt-md-0 fnt-20 clr-w italic"><?php echo carbon_get_the_post_meta( 'quotes' ); ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>   
            <?php endwhile; wp_reset_query(); ?>  
          <?php endif; ?>

        <?php endif; ?>
      </div>
    </section>

  <?php break; ?>

  <?php case 'meta_announcements' :  ?>
    <section class="sec-p v-scrolling gsap-sm-cards">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-xxl-8">
          <h2 class="Nk-h2 clr-05 gsap-h2" data-aos="fade-down"><?php echo $about['crb_announcements_heading']; ?></h2>
        </div>
      </div>
      <div class="mt-3 mt-lg-4">
        <div class="row">
          <div class="d-none d-xxl-block col-xxl-5">
            <?php
              $args = array(
                'post_type' => 'newsroom',
                'posts_per_page' => 1,
                'order' => 'ASC',
              );
              $team = new WP_Query($args);
            ?>

            <?php if($team->have_posts()) : ?>
              <?php while($team->have_posts()) : $team->the_post();?>
                <div class="Nk-card Nk-card--lg">
                  <img class="Nk-card--lg__img img-fluid gsap-card-img" data-aos="zoom-in" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                  <div class="Nk-card--newsroomlg__body">
                    <div class="gsap-card-text" data-aos="fade-right"><span class="Nk-card--lg__body__date"><?php echo get_the_time('M j, Y'); ?></span><span> / </span><span class="Nk-card--lg__body__tag"><?php $tag_list = wp_get_post_terms(get_the_ID() , 'news-tags', array("fields" => "names")); echo $tag_list[0]; ?></span></div>
                    <h2 class="Nk-h3 gsap-card-text" data-aos="fade-right" data-aos-delay="150"><?php echo get_the_title(); ?></h2>
                  </div>
                </div>
                <?php $newsId = get_the_ID(); ?>

              <?php endwhile; wp_reset_query(); ?>
            <?php endif ?>
          </div>
          <div class="col-12 col-xxl-5">
            <ul class="Nk-card--sm gsap-card-wrp">
            <?php
              $args = array(
                'post_type' => 'newsroom',
                'posts_per_page' => 1,
                'order' => 'ASC',
                'post__not_in' => array ($newsId),
              );
              $team = new WP_Query($args);
            ?>
            <?php if($team->have_posts()) : ?>
              <?php while($team->have_posts()) : $team->the_post();?>
              <li class="Nk-card--sm__card gsap-sm-card">
                <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                <div class="Nk-card--sm__card__body">
                  <div class="Nk-card--sm__card__body__tag">
                    <div class="gsap-card-text" data-aos="fade-left"><span class="Nk-card--sm__card__body__date"><?php echo get_the_time('M j, Y'); ?> </span><span> / </span><span><?php $tag_list = wp_get_post_terms(get_the_ID(), 'news-tags', array("fields" => "names")); echo $tag_list[0]; ?></span></div>
                    <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left" data-aos-delay="150"><?php echo get_the_title(); ?></p>
                  </div>
                </div>
              </li>
              <?php endwhile; wp_reset_query(); ?>
            <?php endif ?>
            </ul>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center gsap-btn-smcard-d"><a class="btn btn--blue btn-saq gsap-l-btn btn--eq-width" href="<?php echo $siteUrl; ?>/newsroom/" data-aos="fade-up" data-text="View all">View all</a></div>
      </div>
    </div>
  </section>    
  <?php break; ?>
  <?php default : ?>
  <p>Add Blocks in page template to show content</p>
  <?php break; ?>
  <?php }} endwhile;  ?>

<?php get_footer(); ?>
