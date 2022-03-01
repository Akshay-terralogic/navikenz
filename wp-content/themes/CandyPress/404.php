<?php
  /**
  * The template for displaying 404 pages (not found)
  *
  * @link https://codex.wordpress.org/Creating_an_Error_404_Page
  *
  * @package CandyPress
  */

  get_header();
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;
?>

<main>
  <!--banner-->
  <section class="kn-banner error-404"> 
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-6"> <img class="kn-banner__img img-fit" src="<?php echo get_template_directory_uri(); ?>/dist/img/404/404.png" alt=""></div>
        <div class="col-md-6 d-flex align-items-center"> 
          <div class="kn-banner__wrp"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/404/404.svg" alt="">
            <h1 class="Nk-h2 mb-md-4 mt-2 mt-md-4 mt-xxlg-5 clr-05">Looks like you’re lost</h1>
            <p class="fnt-20 clr-w d-none d-lg-block clr-0d o-8">The page you are looking for not available!</p><a class="btn btn--b-trans backtoHome mt-42" href="">Back to home<i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
