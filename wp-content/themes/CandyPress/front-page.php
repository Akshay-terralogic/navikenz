<?php
	/**
	 * The template for displaying Home Page
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

	<?php while ( have_posts() ) : the_post(); ?>
	<?php
	$sections = carbon_get_the_post_meta( 'crb_sections' );
	  foreach ( $sections as $section ) {
	  switch ( $section['_type'] ) {
	  case 'banner':
	?>
	<!--banner-->
	<section class="Nk-vh Nh-banner gsap-home-banner v-scrolling">
	  <div class="Nh-banner__img">
	    <div class="Nh-banner__overlay"></div>
	    <img class="img-fluid" src="<?php echo $section['crb_bimg']; ?>" alt="" />
	  </div>
	  <div class="Nh-banner__content">
	    <div class="container mp-home">
	      <div class="row">
	        <div class="col-lg-10">
	          <div class="overflow-hidden">
	            <h1 class="gsap-upDown Nk-h1 mb-2 mb-lg-4 mb-xxl-5" data-aos="fade-up"><?php echo $section['crb_btxt']; ?></h1>
	          </div>
	          <div class="btn-group">
	            <a class="gsap-upDown btn-saq btn btn--w me-lg-2" href="<?php echo $section['crb_btnurl1']; ?>" data-text="Know our services" data-aos="fade-up" data-aos-delay="50"><?php echo $section['crb_btntxt1']; ?></a>
	            <a class="gsap-upDown btn-saq btn btn--trans ms-lg-2" href="<?php echo $section['crb_btnurl2']; ?>" data-text="Know more about us" data-aos="fade-up"><?php echo $section['crb_btntxt2']; ?></a>
	          </div>
	          <div class="Nk-scroll gsap-upDown" data-aos="fade-up" data-aos-delay="100">
	            <svg width="26" height="36" fill="none" xmlns="http://www.w3.org/2000/svg">
	              <path
	                d="M13 36c3.447 0 6.754-1.328 9.192-3.69C24.631 29.947 26 26.742 26 23.4V12.6c0-4.502-2.478-8.662-6.5-10.912a13.357 13.357 0 00-13 0C2.478 3.938 0 8.098 0 12.6v10.8c0 3.341 1.37 6.546 3.808 8.91C6.246 34.673 9.552 36 13 36zM1.857 12.6c0-3.858 2.123-7.424 5.571-9.352a11.45 11.45 0 0111.143 0c3.448 1.929 5.571 5.494 5.571 9.352v10.8c0 3.859-2.123 7.424-5.571 9.353a11.45 11.45 0 01-11.143 0c-3.448-1.93-5.571-5.495-5.571-9.353V12.6z"
	                fill="#fff"
	              />
	              <path class="js-scroll-arrow" d="M12.106 17.53h.08l.179.195A.88.88 0 0013 18a.88.88 0 00.635-.274l.178-.195h.081v-.084L19 12.157l-1.27-1.319-3.836 3.992V5h-1.788v9.83L8.27 10.837 7 12.156l5.106 5.29v.084z" fill="#fff" />
	            </svg>
	            <span>SCROLL</span>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="Nk-notification gsap-upDown" data-aos="fade-right">
	      <div class="container">
	        <div class="row">
	          <div class="col-11">
	            <div class="Nk-notification__wrp">
	              <img src="<?php echo $tempDir;?>/img/icons/bell.svg" alt="" />
	              	<?php $notification = carbon_get_theme_option('crb_notification_slider'); ?>
		              <div class="js-text-slider swiper-container">
		                <div class="swiper-wrapper">
		                	<?php foreach ($notification as $noti) : ?>
			                  <div class="swiper-slide">
			                    <p class="Nk-notification__text"><?php echo $noti['notify']; ?></p>
			                  </div>
		               	  <?php endforeach; ?>
		                </div>
		              </div>
	            </div>
	          </div>
	          <div class="col-1">
	            <div class="d-none d-lg-flex text-arrows">
	              <div class="js-arrow-right"><img src="<?php echo $tempDir;?>/img/icons/chevron-down-small.svg" alt="" /></div>
	              <div class="js-arrow-left"><img src="<?php echo $tempDir;?>/img/icons/chevron-down-small.svg" alt="" /></div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
<?php break;  ?>
<?php case 'home_services': ?>
	<!--Engage-->
	<section class="sec-p Nk-engage v-scrolling gsap-engage">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-8 col-xxl-6 gsap-enage-h" data-aos="fade-down">
	        <h2 class="Nk-h2 mb-3 mb-lg-5 mb-xxl-5"><?php echo $section['crb_serv_title']; ?></h2>
	      </div>
	    </div>
	    <div class="row gutter-40">
				<?php foreach ( $section['posts'] as $post_item ) : ?>
	      <div class="col-md-6 gsap-card" data-aos="fade-right">
	        <div class="flip Nk-engage__card">
	          <div class="front">
	            <img class="img-fluid Nk-engage__card__img" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_item['id'])); echo($thumb[0]); ?>" alt="" />

	            <div class="info">
	              <span class="clr-w"><?php $tag = wp_get_object_terms( $post_item['id'],  'service-tags' , array( 'fields' => 'names' ) ); print_r($tag[0]);?></span>
	              <h5 class="fnt-600"><?php echo get_the_title( $post_item['id'] ); ?></h5>
	            </div>
	          </div>
	          <div class="back">
	            <span class="clr-b"><?php $tag = wp_get_object_terms( $post_item['id'],  'service-tags' , array( 'fields' => 'names' ) ); print_r($tag[0]);?></span>
	            <h5 class="clr-0d fnt-600"><?php echo get_the_title( $post_item['id'] ); ?></h5>
	            <p class="fnt-20 fnt-600 clr-b"><?php echo carbon_get_post_meta( $post_item['id'], 'crb_phone' );?></p>
	            <div class="btn-wrp mt-3 mt-lg-2 mt-xxl-5"><a class="btn btn--blue btn-saq" href="<?php echo get_the_permalink( $post_item['id'] ); ?>" data-text=" Know more">Know more</a></div>
	          </div>
	        </div>
	      </div>
				<?php endforeach; ?>
	      <div class="row">
	        <div class="col-12 d-flex justify-content-center mt-50 gsap-btn" data-aos="fade-up"><a class="btn btn--w btn-saq" href="<?php echo $siteUrl; ?>/services/" data-text=" Know more">Know more </a></div>
	      </div>
	    </div>
	  </div>
	</section>
<?php break; ?>
<?php case 'home_case_study': ?>
	<!--Learning-->
	<section class="sec-p v-scrolling gsap-sm-cards">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-5 col-xxl-8">
	        <h2 class="Nk-h2 clr-05 gsap-h2" data-aos="fade-down">We are happy to share our learnings with you …</h2>
	      </div>
	    </div>
	    <div class="mt-3 mt-lg-4">
	      <div class="row">
	        <div class="d-none d-xxl-block col-xxl-5">

	        	<?php foreach ( $section['posts'] as $post_item ) : ?>
		          <div class="Nk-card Nk-card--lg">
		            <img class="Nk-card--lg__img img-fluid gsap-card-img" data-aos="zoom-in" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_item['id'])); echo($thumb[0]); ?>" alt="" />
		            <div class="Nk-card--lg__body">
		              <div class="gsap-card-text" data-aos="fade-right"><span class="Nk-card--lg__body__date"> Nov 12, 2021 </span><span>/ </span><span class="Nk-card--lg__body__tag">case studies</span></div>
		              <h2 class="Nk-h3 gsap-card-text" data-aos="fade-right" data-aos-delay="150"><?php echo get_the_title( $post_item['id'] ); ?></h2>
		            </div>
		          </div>
	          <?php break; endforeach; ?>
	          
	        </div>
	        <div class="col-12 col-xxl-5">
	          <ul class="Nk-card--sm gsap-card-wrp">

							<?php $cardsCount = 0; foreach ( $section['posts'] as $post_item ) : ?>
	            <li class="Nk-card--sm__card gsap-sm-card <?php if($cardsCount == 0): echo"d-none"; endif; ?>">
	              <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_item['id'])); echo($thumb[0]); ?>" alt="" />
	              <div class="Nk-card--sm__card__body">
	                <div class="Nk-card--sm__card__body__tag">
	                  <div class="gsap-card-text" data-aos="fade-left">
	                  	<span class="Nk-card--sm__card__body__date">Nov 12, 2021 </span>
	                  	<span>/</span>
	                  	<span> case studies</span>
	                  </div>
	                  <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left" data-aos-delay="150"><?php echo get_the_title( $post_item['id'] ); ?></p>
	                </div>
	              </div>
	            </li>
							<?php $cardsCount++; endforeach;  ?>

	          </ul>
	        </div>
	      </div>
	      <div class="col-12 d-flex justify-content-center gsap-btn-smcard-d"><a class="btn btn--blue btn-saq gsap-l-btn btn--eq-width" href="" data-aos="fade-up" data-text="View all">View all</a></div>
	    </div>
	  </div>
	</section>
<?php break; ?>
<?php } } endwhile; ?>



<!--plan-->
<section class="sec-p Nk-plan v-scrolling">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 overflow-hidden">
        <h2 class="Nk-h2 clr-05 mb-3 mb-xxlg-5 gsap-plan-h2" data-aos="fade-up">Plan your life, your career,and your future</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 d-flex overflow-hidden">
        <ul class="post" data-aos="fade-right">
          <li class="post__item" data-aos="fade-down" data-aos-delay="450">
            <span class="date"> POSTED on Nov 12, 2021</span>
            <h3 class="Nk-h3 clr-w">React Front End Architect</h3>
            <p class="location">Internship / Bangalore</p>
          </li>
          <li class="post__item" data-aos="fade-down" data-aos-delay="450">
            <span class="date"> POSTED on Nov 12, 2021</span>
            <h3 class="Nk-h3 clr-w">React Front End Architect</h3>
            <p class="location">Internship / Bangalore</p>
          </li>
        </ul>
      </div>
      <div class="col-md-4 d-flex">
        <div class="Nk-plan__card dfc">
          <img class="img-fluid Nk-plan__card__img" data-aos="fade-left" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 570.png" alt="" />
          <div class="Nk-plan__card__body dfc">
            <h3 class="Nk-h3 gsap-upDown-p" data-aos="fade-up">Internship and Student Opportunities</h3>
            <p class="Nk-plan__card__body__text gsap-upDown-p" data-aos="fade-up">Discover how you can apply your talent and skills to harness powerful</p>
            <div class="btn-wrp gsap-upDown-p" data-aos="fade-up"><a class="btn btn--blue btn-saq" href="opportunity.html" data-text="View open roles">View open roles</a></div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-none d-md-flex">
        <div class="Nk-plan__card dfc">
          <img class="img-fluid Nk-plan__card__img" data-aos="fade-left" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 573.png" alt="" />
          <div class="Nk-plan__card__body dfc">
            <h3 class="Nk-h3 gsap-upDown-p" data-aos="fade-up">Careers for Experienced Professionals</h3>
            <p class="Nk-plan__card__body__text gsap-upDown-p" data-aos="fade-up">Discover how you can apply your talent and skills to harness powerful</p>
            <div class="btn-wrp gsap-upDown-p" data-aos="fade-up"><a class="btn btn--blue btn-saq" href="opportunity.html" data-text="View open roles">View open roles</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sec-p Nk-partner v-scrolling">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 overflow-hidden">
        <h2 class="Nk-h2 clr-05 gsap-left" data-aos="fade-right">We partner with global technology leaders to bring you the best solutions</h2>
      </div>
      <div class="col-lg-12 overflow-hidden mt-3 mt-lg-5">
        <div class="Nk-partner__logoWrp gsap-right" data-aos="fade-left">
          <div class="Nk-partner__container"><img src="<?php echo $tempDir;?>/img/home/image 51.png" alt="" /></div>
          <div class="Nk-partner__container"><img src="<?php echo $tempDir;?>/img/home/image 52.png" alt="" /></div>
          <div class="Nk-partner__container"><img src="<?php echo $tempDir;?>/img/home/Group 307.png" alt="" /></div>
          <div class="Nk-partner__container"><img src="<?php echo $tempDir;?>/img/home/image 56.png" alt="" /></div>
        </div>
      </div>
      <!--if there is only two logos-->
    </div>
  </div>
</section>
<!--delivary-->
<section class="bg-0d sec-p delivary v-scrolling">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-xxl-10">
        <h2 class="Nk-h2 gsap-delivary-h2" data-aos="fade-down">We are delivering high-performance business solutions for our customers…</h2>
      </div>
    </div>
  </div>
  <div class="left-container mt-42 pe-xxlg-0">
    <div class="row">
      <div class="col-md-5 col-xxl-4 d-flex align-items-center overflow-hidden">
        <div class="delivary__wrp">
          <h3 class="Nk-h3 clr-w gsap-upDown" data-aos="fade-up">Collaborate to automate, how siemens healthineers is traversing its automation journey</h3>
          <a class="btn btn--w mt-lg-5 d-none d-md-inline-block btn-saq gsap-upDown btn--eq-width" href="" data-aos="fade-up" data-text=" See how">See how</a>
        </div>
      </div>
      <div class="col-md-7 offset-xxl-2 col-xxl-6 mbl-right-p overflow-hidden">
        <div class="delivaryImg__wrp"><img class="delivary__img" src="<?php echo $tempDir;?>/img/home/Rectangle 554.png" alt="" data-aos="overlay" /></div>
        <div class="d-md-none mt-4 mt-lg-5"><a class="btn btn--w btn-saq" href="" data-aos="fade-up" data-text=" See how">See how</a></div>
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
              <!-- Slides-->
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"><img class="img-fit m3" src="<?php echo $tempDir;?>/img/home/delivary/3mg.png" alt="" /></div>
              </div>
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"><img class="img-fit semens" src="<?php echo $tempDir;?>/img/home/delivary/image 58.png" alt="" /></div>
              </div>
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"><img class="img-fit ray" src="<?php echo $tempDir;?>/img/home/delivary/image 59.png" alt="" /></div>
              </div>
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"><img class="img-fit backer" src="<?php echo $tempDir;?>/img/home/delivary/Group 308.png" alt="" /></div>
              </div>
              <div class="swiper-slide" data-aos="fade-right">
                <div class="logoWrp"><img class="img-fit potent" src="<?php echo $tempDir;?>/img/home/delivary/image 68.png" alt="" /></div>
              </div>
            </div>
          </div>
          <div class="js-arrow-left"><img src="<?php echo $tempDir;?>/img/icons/chevron-down-small.svg" alt="" /></div>
          <div class="js-arrow-right"><img src="<?php echo $tempDir;?>/img/icons/chevron-down-small.svg" alt="" /></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Learning-->
<section class="sec-p v-scrolling gsap-sm-cards">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-xxl-8">
        <h2 class="Nk-h2 clr-05 gsap-h2" data-aos="fade-down">We are happy to share our learnings with you …</h2>
      </div>
    </div>
    <div class="mt-3 mt-lg-4">
      <div class="row">
        <div class="d-none d-xxl-block col-xxl-5">
          <div class="Nk-card Nk-card--lg">
            <img class="Nk-card--lg__img img-fluid gsap-card-img" data-aos="zoom-in" src="<?php echo $tempDir;?>/img/home/banners/blog.png" alt="" />
            <div class="Nk-card--lg__body">
              <div class="gsap-card-text" data-aos="fade-right"><span class="Nk-card--lg__body__date"> Nov 12, 2021 </span><span>/ </span><span class="Nk-card--lg__body__tag">case studies</span></div>
              <h2 class="Nk-h3 gsap-card-text" data-aos="fade-right" data-aos-delay="150">Large enterprises have customers and data, but lack an engagement plus monetization platform</h2>
            </div>
          </div>
        </div>
        <div class="col-12 col-xxl-5">
          <ul class="Nk-card--sm gsap-card-wrp">
            <li class="Nk-card--sm__card gsap-sm-card">
              <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 599.png" alt="" />
              <div class="Nk-card--sm__card__body">
                <div class="Nk-card--sm__card__body__tag">
                  <div class="gsap-card-text" data-aos="fade-left"><span class="Nk-card--sm__card__body__date">Nov 12, 2021 </span><span>/</span><span> case studies</span></div>
                  <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left" data-aos-delay="150">Large enterprises have customers and data, but lack an engagement plus monetization platform</p>
                </div>
              </div>
            </li>
            <li class="Nk-card--sm__card gsap-sm-card">
              <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 570.png" alt="" />
              <div class="Nk-card--sm__card__body">
                <div class="Nk-card--sm__card__body__tag">
                  <div class="gsap-card-text" data-aos="fade-left"><span class="Nk-card--sm__card__body__date">Nov 12, 2021 </span><span>/</span><span> case studies</span></div>
                  <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left" data-aos-delay="150">Large enterprises have customers and data, but lack an engagement plus monetization platform</p>
                </div>
              </div>
            </li>
            <li class="Nk-card--sm__card gsap-sm-card">
              <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 601.png" alt="" />
              <div class="Nk-card--sm__card__body">
                <div class="Nk-card--sm__card__body__tag">
                  <div class="gsap-card-text" data-aos="fade-left"><span class="Nk-card--sm__card__body__date">Nov 12, 2021 </span><span>/</span><span> case studies</span></div>
                  <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left" data-aos-delay="150">Large enterprises have customers and data, but lack an engagement plus monetization platform</p>
                </div>
              </div>
            </li>
            <li class="Nk-card--sm__card gsap-sm-card">
              <img class="Nk-card--sm__card__img gsap-card-img" data-aos="zoom-in" src="<?php echo $tempDir;?>/img/home/learning/Rectangle 602.png" alt="" />
              <div class="Nk-card--sm__card__body">
                <div class="Nk-card--sm__card__body__tag">
                  <div class="gsap-card-text" data-aos="fade-left"><span class="Nk-card--sm__card__body__date">Nov 12, 2021 </span><span>/</span><span> case studies</span></div>
                  <p class="gsap-card-text Nk-card--sm__card__body__desc" data-aos="fade-left">Large enterprises have customers and data, but lack an engagement plus monetization platform</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12 d-flex justify-content-center gsap-btn-smcard-d"><a class="btn btn--blue btn-saq gsap-l-btn btn--eq-width" href="" data-aos="fade-up" data-text="View all">View all</a></div>
    </div>
  </div>
</section>



<?php
	get_footer();
