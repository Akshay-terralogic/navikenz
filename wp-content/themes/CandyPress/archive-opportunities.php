<?php
  /**
  * The template for displaying archive pages
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
              <div class="js-filter-content modal">
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
                      <div class="job-type-wrp">  <a class="job-type-wrp__btn active" href="students">
                           Students <span>(20)</span></a><a class="ms-2 job-type-wrp__btn" href="proffesinals">
                           Professionals <span>(40)</span></a></div>
                    </div>
                    <div class="experiance-container"> 
                      <h6 class="fnt-16 clr-b fnt-600">Experience</h6>
                      <div class="experiance__btnWrp"> 
                        <input class="experiance-slider" type="range" value="0" min="0" max="30" step="1">
                        <div class="experiance__label-wrp">
                          <p class="fnt-16 clr-84">    0 Yrs</p>
                          <p class="fnt-16 clr-84">    30 Yrs</p>
                        </div>
                      </div>
                    </div>
                    <div class="location"> 
                      <h6 class="fnt-16 clr-b fnt-600">Experience</h6>
                      <div class="form-group">
                        <input id="html" type="checkbox">
                        <label for="html">Bangalore (3)</label>
                      </div>
                      <div class="form-group">
                        <input id="css" type="checkbox">
                        <label for="css">US (3)</label>
                      </div>
                      <div class="form-group">
                        <input id="javascript" type="checkbox">
                        <label for="javascript">Remote (10)</label>
                      </div>
                    </div>
                    <div class="location border-bottom-0"> 
                      <h6 class="fnt-16 clr-b fnt-600">Department</h6>
                      <div class="form-group">
                        <input id="admin" type="checkbox">
                        <label for="admin">Admin (39)</label>
                      </div>
                      <div class="form-group">
                        <input id="technology" type="checkbox">
                        <label for="technology">Technology (20)</label>
                      </div>
                      <div class="form-group">
                        <input id="finance" type="checkbox">
                        <label for="finance">Finance (10)</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="offset-xxl-1 col-md-7 col-xl-8 col-xxl-8">
              <div class="jobs-head">
                <p class="fnt-16 clr-b o-8 italic">48 jobs displayed.</p>
                <div class="filter-sort"> 
                  <div class="filter-sort__wrp d-flex align-items-center"> <img class="me-1" src="<?php echo $tempDir; ?>/img/icons/sort.svg" alt=""><span class="d-none d-md-block fnt-20">Sort By:</span></div>
                  <select class="js-niceSelect">
                    <option value="1">case study</option>
                    <option value="2">Another option</option>
                    <option value="3">Potato</option>
                  </select>
                </div>
              </div>
              <ul class="job-card active" id="students">
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4> Data Scientist</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">Work closely with Navikenz clients to identify areas of exploration/insights from data and propose solutions for effective decision making</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Machine Learning Engineers   - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Machine Learning Engineers   - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Information Technology Apprenticeship, March 2022 Start</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>AI/ML Data Engineers  - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Full-stack Engineer</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Associate consultant or Analyst</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
              </ul>
              <ul class="job-card" id="proffesinals">
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4> Data Scientist</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">Work closely with Navikenz clients to identify areas of exploration/insights from data and propose solutions for effective decision making</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Machine Learning Engineers   - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Machine Learning Engineers   - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Information Technology Apprenticeship, March 2022 Start</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>AI/ML Data Engineers  - Responsibilities</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Full-stack Engineer</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
                <li class="job-card__item">
                  <div class="job-card__item__header"> 
                    <div class="head-wrp">
                      <h4>Associate consultant or Analyst</h4>
                      <p class="s-text">Fulltime / India / 120k-500K / Professionals</p>
                    </div><a href=""> <img src="<?php echo $tempDir; ?>/img/icons/share.svg" alt=""></a>
                  </div>
                  <div class="job-card__item__body"> 
                    <p class="fnt-16 clr-0d o-8">You will have the opportunity to work alongside a team of Navikenz teamto solve real life problems. You will learn how to apply problem solving skills to real life challenges, pick up new technical skills such as troubleshooting multiple computing platforms, data gathering and analysis, automating..</p>
                  </div>
                  <div class="job-card__item__footer">
                    <div class="btn-wrp"><a class="btn btn--blue btn--sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-opportunity">More Details<i class="fa fa-angle-right"></i></a></div>
                  </div>
                </li>
              </ul>
              <nav class="justify-content-center p-0" aria-label="Page navigation example">
                <ul class="pagination align-items-center">
                  <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><img src="<?php echo $tempDir; ?>/img/icons/paggination-right.svg" alt="" srcset=""></a></li>
                  <li class="page-item active-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">...</a></li>
                  <li class="page-item"><a class="page-link" href="#">8</a></li>
                  <li class="page-item"><a class="page-link" href="#" aria-label="Next"><img src="<?php echo $tempDir; ?>/img/icons/paggination-left.svg" alt=""></a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="mobile-filter-btns">
            <div class="row">
              <div class="col-6">
                <div class="d-flex align-items-center js-filter"> <img src="<?php echo $tempDir; ?>/img/icons/filter.svg" alt=""><span class="ms-2 fnt-16 clr-b">FILTER BY</span></div>
              </div>
              <div class="col-6"> 
                <div class="filter-sort"> 
                  <div class="filter-sort__wrp d-flex align-items-center"> <img class="me-1" src="<?php echo $tempDir; ?>/img/icons/sort.svg" alt=""><span class="fnt-20">Sort By:</span></div>
                </div>
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
              <form class="row l-gry-from js-drop-c" id="zdrop">
                <div class="col-md-6"> 
                  <input class="input-field" type="text" placeholder="Name">
                </div>
                <div class="col-md-6"> 
                  <input class="input-field" type="email" placeholder="Email ID">
                </div>
                <div class="col-12">
                  <div class="dropzone dropzone-custome" id="upload-label">
                    <label class="dropzone-container" for="files">
                      <div class="dropzone-title">
                        <p class="fnt-24 clr-0 o-8">Drag and drop your files </p>
                        <p class="fnt-24 or-ele clr-0 o-8">or </p>
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
                    <div class="collection card" id="previews">
                      <div class="collection-item clearhack valign-wrapper item-template" id="zdrop-template">
                        <div class="left pv zdrop-info" data-dz-thumbnail="">
                          <div><img class="me-2" src="<?php echo $tempDir; ?>/img/icons/file-icon.svg" alt=""><span data-dz-name=""></span></div>
                        </div>
                        <div class="secondary-content actions"><a class="btn-floating ph red white-text waves-effect waves-light" href="#!" data-dz-remove=""><img src="<?php echo $tempDir; ?>/img/icons/file-close.svg" alt=""></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4 mt-xxl d-flex justify-content-center"> 
                  <button class="btn btn--blue btn--eq-width btn-saq" type="submit" data-text="Submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!--modal-->
      <!-- Modal-->
      <div class="modal fade" id="exampleModal-opportunity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog job-modal">
          <div class="modal-content modal-dialog-scrollable job-modal">
            <div class="modal-header">
              <div class="row"> 
                <div class="col-12 mb-2"> <a class="back-btn_link back-btn-arrow mt-0" href="customer.html"> <img src="<?php echo $tempDir; ?>/img/icons/back-btn-b.svg" alt=""><span class="fnt-16 clr-w fnt-700 clr-05">Back</span></a></div>
                <div class="col-lg-11 col-xxl-8">
                  <h3 class="Nk-h3 clr-05 fnt-700 mb-xxl-4">Work closely with Navikenz clients to identify areas of exploration/insights from data and propose solutions for effective decision making</h3>
                  <p class="fnt-20 clr-84">Fulltime / India / 120k-500K / PROFESSIONAL</p>
                </div>
              </div>
              <button class="close-btn" type="button" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo $tempDir; ?>/img/icons/close-icon.svg" alt=""></button>
            </div>
            <div class="modal-body">
              <div class="js-scroll-container">
                <div class="js-scroll-container__wrp">
                  <div class="job-content">
                    <div class="mb-40"> 
                      <h6 class="mb-xxl-3">Responsibilities</h6>
                      <ul class="job-list">
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Work closely with Navikenz clients to identify areas of exploration/insights from data and propose solutions for effective decision making.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Work with the Navikenz Solution Architect, evaluate/select the most appropriate combination of algorithms/implementations/platforms to define solutions to the problem</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Build algorithms and design experiments to merge, manage, interrogate and extract data to supply tailored reports to colleagues, customers or the wider organisation</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Test data mining models to select the most appropriate ones for use on a project</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Assess the effectiveness of data sources and data-gathering techniques and improve data collection methods</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Prepare, maintain and present clear and coherent communication, both verbal and written, to understand data needs and report results</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Create clear reports that tell compelling stories about the insights learned from data and the proposed actions/strategies/options as a result</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Working with the Navikenz Solution Architect, build/operationalize the defined solution to be scalable, maintainable and production-ready</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Stay up to date with the latest technology, techniques and methods</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Conduct research from which you&#39;ll develop prototypes and proof of concepts</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Manage/maintain the repository of built ML models and monitor for opportunities to use built insights/datasets/code/models for other clients</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Stay curious and enthusiastic about using algorithms to solve problems and enthuse others to see the benefit of your work</li>
                      </ul>
                    </div>
                    <div class="mb-40"> 
                      <h6 class="mb-xxl-3">Qualifications/Experience</h6>
                      <ul class="job-list">
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">University Graduate or Diploma or equivalent practical experience.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Experience with tools such as spreadsheet software, email, and word processing software.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Experience working with computers.</li>
                      </ul>
                    </div>
                    <div class="mb-40"> 
                      <h6 class="mb-xxl-3">Responsibilities</h6>
                      <p class="fnt-20 clr-0d o-8">The ideal candidate will have a Master’s degree or PhD in Statistics, Mathematics, Computer Science or another quantitative field, with at least 5 years of professional experience manipulating data sets and building statistical models, and familiar with the following software/tools/techniques:</p>
                      <ul class="job-list">
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Coding knowledge and experience with several languages: Python/R/Julia, Java/Javascript,REST, etc.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Combined knowledge of computer science and applications, modeling, statistics, analytics and maths to solve problems</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Knowledge and experience in statistical, machine learning algorithms and techniques:Regression, Classification, Random Forest, Boosting, Decision Trees, text mining, social network analysis, neural networks, etc.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Experience with distributed data/computing tools: Map/Reduce, Hadoop, Hive, Spark,Databricks, H2O.ai, etc.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Experience visualizing/presenting data for stakeholders using: Matplotlib, ggplot, D3, etc.</li>
                        <li class="fnt-20 clr-0d o-8 mb-2 mb-xxl-3">Experience with cloud based platforms/products - AWS, Azure, GCP, Kubeflow, AutoML etc.</li>
                      </ul>
                    </div>
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
                  <p class="fnt-16 fnt-600 clr-b">Please apply before 20 - DEC - 2021</p>
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
get_footer();
