<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



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



add_action('wp_ajax_my_ajax_filter_search', 'my_ajax_filter_search_callback');
add_action('wp_ajax_nopriv_my_ajax_filter_search', 'my_ajax_filter_search_callback');
 
function my_ajax_filter_search_callback() {
 
  header("Content-Type: application/json"); 

  if(isset($_POST['experiance'])) {
    $year = sanitize_text_field( $_POST['experiance'] );
    $meta_query = array(
    	'relation' => 'OR',
    	array(
	      'key' => 'opp_experience',
	      'value' => $year,
	      'compare' => '=',
  		));
    // echo $year;
  }    

	if(isset($_POST['jobType'])) {
    $jobType = $_POST['jobType'];
	  $jobType_tax_query = array(
      'taxonomy' => 'opportunity-type',
      'field' => 'slug',
      'terms' => $jobType,
      'compare' => '=',
    );
	} else{
		unset($jobType_tax_query);
	}

	if(isset($_POST['location'])) {
    $location = $_POST['location'];
    $location_tax_query = array(
      'taxonomy' => 'opportunity-locations',
      'field' => 'slug',
      'terms' => $location,
      'compare' => '=',
    );
	} else{
		unset($location_tax_query);
	}
  
	if(isset($_POST['department'])) {
    $department = $_POST['department'];
    $department_tax_query = array(
      'taxonomy' => 'opportunity-department',
      'field' => 'slug',
      'terms' => $department,
      'compare' => '=',
    );
	} else{
		unset($department_tax_query);
	}
 
 
  $args = array(
    'post_type' => 'opportunities',
    'posts_per_page' => -1,
    'meta_query' => $meta_query,
    'tax_query' => array( $jobType_tax_query , $location_tax_query , $department_tax_query )
  );

  $filter_results = new WP_Query( $args );
	if($filter_results->have_posts()) : 
		$result = array();
		while($filter_results->have_posts()) : $filter_results->the_post();
		$locations_term = wp_get_post_terms( get_the_ID(), array('opportunity-locations'));  foreach ($locations_term as $locations) : endforeach;
		$department_term = wp_get_post_terms( get_the_ID(), array('opportunity-department')); ?> <?php foreach ($department_term as $department) : ?><?php endforeach; 
		$result[] = array(
	    "postid" => get_the_ID(),
	    "title" => get_the_title(),
	    "jobmetatype" => carbon_get_the_post_meta('opp_full_or_part_job'),
	    "salary" => carbon_get_the_post_meta('opp_salary'),
	    "location" => $locations->name,
	    "department" => $department->name,
	    "jobdescp"=> carbon_get_the_post_meta('opp_job_descp'),
	    "content" => get_the_content(),
	    "lastdate" => carbon_get_the_post_meta('opp_last_date'),
	  );		
		endwhile; wp_reset_query();
		echo json_encode($result);
	endif;
	wp_die();

}