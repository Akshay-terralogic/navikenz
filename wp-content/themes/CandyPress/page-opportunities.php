<?php
  /**
  * Template Name: opportunities
  *
  * @package CandyPress
  */
  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>
<section class="op-banner">
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-6"> 
        <h1 class="Nk-h1">Find the perfect job for you</h1>
      </div>
      <div class="col-12"> 
        <div class="op-banner__search">
          <input type="text" name="" placeholder="Search by job tiltle, industry or keywords...">
          <button class="op-banner__search__btn" type="submit"> <img src="<?php echo $tempDir; ?>/img/icons/white/search-w.svg" alt=""></button>
        </div>
      </div>
    </div>
  </div>
</section>
<!--fitler-->
<section class="Nk-filter sec-p">
  <div class="container"> 
    <div class="row"> 
      <div class="col-md-5 col-xl-4 col-xxl-3">
        <form class="js-filter-content modal" id="my-ajax-filter-search" method="post">
          <div class="js-filter-content__header">
            <h3 class="mb-0 Nk-h3 fnt-18 clr-05 fnt-700">FILTER </h3>
            <div class="js-filter-close"><img src="<?php echo $tempDir; ?>/img/icons/close-icon.svg" alt=""></div>
          </div>
          <div class="row mb-40 d-none d-md-flex justify-content-between"> 
            <div class="col-6">
              <div class="d-flex align-items-center"> <img src="<?php echo $tempDir; ?>/img/icons/filter.svg" alt=""><span class="ms-2 fnt-16 clr-b fnt-700">FILTER BY</span></div>
            </div>
            <div class="offset-1 col-5 text-end"> <a class="fnt-16 clear-btn fnt-700 clr-b o-8" href="">Clear all</a></div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="job-type-contain">
                <h6 class="fnt-16 clr-b fnt-600">Job type</h6>
                <div class="job-type-wrp">

                  <?php $terms = get_terms(array('opportunity-type'));
                  if (is_array($terms)) : ?>
                    <?php foreach ($terms as $term) : ?>
                      <label>      
                        <input type="radio" value="<?php echo $term->slug; ?>" name="jobType" id="jobType">
                        <p class="job-type-wrp__btn"><?php echo $term->name; ?> <span>(<?php echo $term->count; ?>)</span></p>
                      </label>
                    <?php endforeach; ?>
                  <?php endif; ?>
              
                </div>
              </div>
              <div class="experiance-container"> 
                <h6 class="fnt-16 clr-b fnt-600">Experience</h6>
                <div class="experiance__btnWrp"> 
                  <input class="experiance-slider" type="range" value="0" min="0" max="30" step="1" name="experiance" id="experiance">
                  <div class="experiance__label-wrp">
                    <p class="fnt-16 clr-84">0 Yrs</p>
                    <p class="fnt-16 clr-84">30 Yrs</p>
                  </div>
                </div>
              </div>
              <div class="location"> 
                <h6 class="fnt-16 clr-b fnt-600">Location</h6>
                <?php $location_term = get_terms(array('opportunity-locations')); if (is_array($location_term)) : ?>
                  <?php foreach ($location_term as $location) : ?>
                    <div class="form-group">
                      <input id="location-<?php echo $location->term_taxonomy_id; ?>" type="checkbox" name="location" value="<?php echo $location->slug ?>">
                      <label for="location-<?php echo $location->term_taxonomy_id; ?>"><?php echo $location->name ?> (<?php echo $location->count ?>)</label>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>


              </div>
              <div class="location border-bottom-0"> 
                <h6 class="fnt-16 clr-b fnt-600">Department</h6>
                <?php $department_term = get_terms(array('opportunity-department')); if (is_array($department_term)) : ?>
                  <?php foreach ($department_term as $department) : ?>
                  <div class="form-group">
                    <input id="depart-<?php echo $department->term_taxonomy_id; ?>" type="checkbox" name="department" value="<?php echo $department->slug ?>">
                    <label for="depart-<?php echo $department->term_taxonomy_id; ?>"><?php echo $department->name ?> (<?php echo $department->count ?>)</label>
                  </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="offset-xxl-1 col-md-7 col-xl-8 col-xxl-8">
        <div class="jobs-head">
          <p class="fnt-16 clr-b o-8 italic"><?php $count_posts = wp_count_posts( 'opportunities' )->publish; echo $count_posts; ?> jobs displayed.</p>
        </div>
        <ul class="job-card active" id="jobs-render-all">
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'opportunities',
              'posts_per_page' => 10,
              'order' => 'ASC',
              'paged' => $paged,
            );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          <li class="job-card__item">
            <div class="job-card__item__header"> 
              <div class="head-wrp">
                <h4><?php the_title(); ?></h4>
                <p class="s-text"><?php echo carbon_get_the_post_meta('opp_full_or_part_job'); ?> / <?php $locations_term = wp_get_post_terms( get_the_ID(), array('opportunity-locations')); ?> <?php foreach ($locations_term as $locations) : ?> <?php print_r($locations->name); ?> <?php endforeach; ?>  / <?php echo carbon_get_the_post_meta('opp_salary'); ?> / <?php $department_term = wp_get_post_terms( get_the_ID(), array('opportunity-department')); ?> <?php foreach ($department_term as $department) : ?> <?php print_r($department->name); ?> <?php endforeach; ?></p>
              </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
            </div>
            <div class="job-card__item__body"> 
              <p class="fnt-16 clr-0d o-8"><?php echo carbon_get_the_post_meta('opp_job_descp'); ?></p>
            </div>
            <div class="job-card__item__footer">
              <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#opportunityModal-<?php echo get_the_ID(); ?>">More Details<i class="fa fa-angle-right"></i></a></div>
            </div>
          </li>
          <div class="modal fade" id="opportunityModal-<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog job-modal">
              <div class="modal-content modal-dialog-scrollable job-modal">
                <div class="modal-header">
                  <div class="row"> 
                    <div class="col-12 mb-2"> <a class="back-btn_link back-btn-arrow mt-0" href="customer.html"> <img src="<?php echo $tempDir; ?>/img/icons/back-btn-b.svg" alt=""><span class="fnt-16 clr-w fnt-700 clr-05">Back</span></a></div>
                    <div class="col-lg-11 col-xxl-8">
                      <h3 class="Nk-h3 clr-05 fnt-700 mb-xxl-4"><?php echo the_title(); ?></h3>
                      <p class="fnt-20 clr-84"><?php echo carbon_get_the_post_meta('opp_full_or_part_job'); ?> / <?php $locations_term = wp_get_post_terms( get_the_ID(), array('opportunity-locations')); ?> <?php foreach ($locations_term as $locations) : ?> <?php print_r($locations->name); ?> <?php endforeach; ?>  / <?php echo carbon_get_the_post_meta('opp_salary'); ?> / <?php $department_term = wp_get_post_terms( get_the_ID(), array('opportunity-department')); ?> <?php foreach ($department_term as $department) : ?> <?php echo $department->name; ?> <?php endforeach; ?></p>
                    </div>
                  </div>
                  <button class="close-btn" type="button" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo $tempDir; ?>/img/icons/close-icon.svg" alt=""></button>
                </div>
                <div class="modal-body">
                  <div class="js-scroll-container">
                    <div class="js-scroll-container__wrp">
                      <div class="job-content">
                        <?php the_content(); ?>
                      </div>
                      <div class="job-form">
                        <h6 class="mb-xxl-3">To Apply Fill Your Details Here</h6>
                        <form class="row l-gry-from mt-4" id="zdrop-module"> 
                          <div class="col-md-6 mb-3 mb-md-4"> 
                            <div class="grp-input">
                              <input class="input-field" type="text" placeholder="First Name">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3 mb-md-4"> 
                            <div class="grp-input">
                              <input class="input-field" type="text" placeholder="Last Name">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3 mb-md-4"> 
                            <div class="grp-input">
                              <input class="input-field input-number" type="number" placeholder="Mobile Number">
                              <select class="phonedrop js-niceSelect">
                                <option value="1">+91</option>
                                <option value="2">+92</option>
                                <option value="3">+93</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3 mb-md-4"> 
                            <div class="grp-input">
                              <input class="input-field" type="email" placeholder="Email ID">
                            </div>
                          </div>
                          <div class="col-12"> 
                            <textarea class="input-msg" placeholder="Description"></textarea>
                          </div>
                          <div class="col-12">
                            <div class="dropzone dropzone-custome-model" id="upload-label-model">
                              <label class="dropzone-container" for="files">
                                <div class="dropzone-title">
                                  <p class="fnt-24 clr-0 o-8">Drag and drop your files </p>
                                  <p class="fnt-24 clr-0 o-8 or-ele">or </p>
                                </div>
                                <div class="btn-drp-wrp">
                                  <div class="drop-btn mt-4"><img class="me-2" src="<?php echo $tempDir; ?>/img/icons/file.svg" alt="">
                                    <p>Upload your resume</p>
                                  </div>
                                </div>
                                <div class="drop-formate"> 
                                  <p class="fnt-12 clr-0d o-8 mt-3 mt-md-4">Only DOC, DOCX, PDF supported. max file size 5MB.</p>
                                </div>
                              </label>
                            </div>
                            <!-- Preview collection of uploaded documents-->
                            <div class="preview-container">
                              <div class="collection card" id="previews-model">
                                <div class="collection-item clearhack valign-wrapper item-template" id="zdrop-template-model">
                                  <div class="left pv zdrop-info" data-dz-thumbnail="">
                                    <div><img class="me-2" src="<?php echo $tempDir; ?>/img/icons/file-icon.svg" alt=""><span data-dz-name=""></span></div>
                                  </div>
                                  <div class="secondary-content actions"><a class="btn-floating ph red white-text waves-effect waves-light" href="#!" data-dz-remove=""><img src="<?php echo $tempDir; ?>/img/icons/file-close.svg" alt=""></a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mt-5 d-flex justify-content-end">
                            <button class="btn btn--blue btn--eq-width" type="submit">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="job-modal-footer">
                  <div class="d-md-flex align-items-md-center justify-content-md-between"> 
                    <div class="job-modal-footer__Content">
                      <p class="fnt-16 fnt-600 clr-b">Please apply before <?php echo carbon_get_the_post_meta('opp_last_date'); ?></p>
                    </div>
                    <div class="job-modal-footer__btn-group d-flex">
                      <button class="btn btn--blue-trans btn--eq-width" type="button">
                         Apply with Linkedin</button>
                      <button class="ms-2 ms-lg-4 btn btn--blue btn--eq-width js-apply-btn" type="button">Apply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            endwhile;
          ?>
        </ul>
        <nav class="justify-content-center p-0" aria-label="Page navigation example">
          <ul class="pagination align-items-center">
            <?php 
              $total_pages = $loop->max_num_pages;
              if ($total_pages > 1){
                $current_page = max(1, get_query_var('paged'));
                  $pagearray =  paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '?paged=%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text'    => __($tempDir.'/img/icons/paggination-right.svg'),
                    'next_text'    => __($tempDir.'/img/icons/paggination-left.svg'),
                    'type' => 'array',
                  ));
                  if (is_array($pagearray)) {
                    foreach ($pagearray as $pagelist) {
                      echo '<li class="page-item">'. $pagelist .'</li>';
                    }
                  }
                }
              } 
              wp_reset_postdata();
            ?>
          </ul>
        </nav>
      </div>
    </div>
    <div class="mobile-filter-btns">
      <div class="row">
        <div class="col-6">
          <div class="d-flex align-items-center js-filter"> <img src="<?php echo $tempDir; ?>/img/icons/filter.svg" alt=""><span class="ms-2 fnt-16 clr-b">FILTER BY</span></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--skills-->
<section class="skills sec-p"> 
  <div class="container"> 
    <div class="row justify-content-center"> 
      <div class="col-lg-10">
        <div class="row"> 
          <div class="col-md-6">
            <h2 class="Nk-h2 clr-05 mb-40">Didn’t find a position suit your skills?</h2>
            <p class="fnt-20 clr-0d">Upload your resume and we’ll get back to you a right job for you!</p>
          </div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="475" title="drop-resume"]'); ?>
      </div>
    </div>
  </div>
</section>
<!--modal-->
<!-- Modal-->


<?php
get_footer();
