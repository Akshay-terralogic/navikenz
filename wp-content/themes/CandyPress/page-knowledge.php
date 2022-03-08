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

          <div class="row swiper-slide"> 
            <div class="col-md-6">
            	<img class="kn-banner__img img-fit" src="<?php echo $tempDir; ?>/img/knowledge/banner.png" alt="">
          	</div>
            <div class="col-md-6 d-flex align-items-center"> 
              <div class="kn-banner__wrp"><span class="tags">Casestudy / #ai</span>
                <h1 class="Nk-h2 mb-md-3 mt-2 mt-md-4">Strategic Direction-Setting For A US-Based Manufacturer</h1>
                <p class="fnt-20 clr-w d-none d-lg-block">A US-based manufacturer, established in the mid-20th century was at crossroads. Like David in an industry of global Goliaths, it found itself being buffeted .</p><a class="btn btn--w mt-42 btn-saq" href="" data-text="Read Now">Read Now</a>
              </div>
            </div>
          </div>

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

<?php get_footer(); ?>
