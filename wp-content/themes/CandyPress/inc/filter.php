<?php 

add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
	if(isset($_POST['categoryfilter']))
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'customers-type',
			'field' 	 => 'id',
			'terms' 	 => $_POST['categoryfilter'],
		)
	);
	$query = new WP_Query($args);
	if($query->have_posts()) :
	while($query->have_posts()) : $query->the_post(); ?>
		<div class="col-lg-4 Nk-card Nk-card--sm"> 
	    <div class="kn-cards"> 
	      <div class="position-relative">
	        <div class="kn-cards__imgWrp">
	          <img class="kn-cards__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
	        </div>
	        <div class="logo-stamp">
	          <img src="<?php echo carbon_get_the_post_meta( 'meta_customers_logo' ); ?>" alt="">
	        </div>
	      </div>
	      <div class="Nk-card--sm__body mt-50">
	        <span class="fnt-12 fnt-600 fnt-05"><?php $terms = get_terms( array( 'taxonomy' => 'customers-type', 'orderby' => 'name'));  foreach ($terms as $term) { echo $term->name; } ?></span>
	        <h3 class="Nk-h3 mt-2 mt-lg-3"><?php echo get_the_title(); ?></h3>
	      </div>
	    </div>
	  </div>
	<?php
		endwhile;
		wp_reset_postdata();
		else :
			echo 'No posts found';
	endif;
	die();
}