<?php
  /**
  * Search
  *
  * This is the template that displays all pages by default.
  * Please note that this is the WordPress construct of pages
  * and that other 'pages' on your WordPress site may use a
  * different template.
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

<section class=""> 
  <div class="container"> 
    <div class="row">   
      <div class="col-12"> 
        <div class="serach-head-text">
          <h4 class="clr-b">Search result for <span class="clr-05" href="">“<?php if(isset($_GET['s'])){print $_GET['s'];} ?>”</span></h4>
        </div>
        <ul class="search-result">
          <?php if (have_posts()) : while ( have_posts() ) : the_post();?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; else : ?>
            <p>Sorry no posts matched your criteria.</p>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
