<?php
	/**
	* Template Name: Partners
	*
	* @package CandyPress
	*/
	get_header();
	$t_options = get_option('tp_opt');
	global $tempDir;
	global $siteUrl;
?>
<section class="partners"> 
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-8 col-xxl-9">
        <h1 class="Nk-h2 clr-05"><?php echo carbon_get_the_post_meta( 'crb_page_title' ); ?></h1>
      </div>
    </div>
    <div class="row gx-0 rec-card withBorder"> 
    	<?php 
    		$partLogos = carbon_get_the_post_meta( 'crb_page_partnets_logos' );
				foreach ( $partLogos as $logo ) {
    	?>
      <div class="col-6 col-md-3 rec-card__wrp d-flex align-items-center justify-content-center"> 
      	<img src="<?php echo $logo['partners_page_logo']; ?>" alt="">
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
