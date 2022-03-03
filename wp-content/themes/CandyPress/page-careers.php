<?php
  /**
  * The template for displaying all pages
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

<!--banner-->
<section class="kn-details">
  <div class="kn-details__img"><img src="./img/about-us/about-banner.png" alt="" /></div>
  <div class="container">
    <div class="kn-details__container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="Nk-h1 clr-w fnt-700">Our purposeEnabling human enterprise with AI to create a new digital future drives every Kenzien</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!--fun-->
<section class="Nk-fun sec-p">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="Nk-h2 mb-40 clr-0d">What is fun for us</h2>
        <p class="clr-0d fnt-20 fnt-700">We work with organizations across all stages of Digital and AI maturity spectrum and help them develop and progress their digital.</p>
      </div>
      <div class="offset-xl-1 col-md-6 col-xl-5 col-xxlg-4">
        <ul class="countData">
          <li class="countData__item">
            <div>
              <p class="fnt-64">150+</p>
              <p class="fnt-24 clr-0d mt-1 mt-md-2">TEAM</p>
            </div>
          </li>
          <li class="countData__item">
            <div>
              <p class="fnt-64">6+</p>
              <p class="fnt-24 clr-0d mt-1 mt-md-2">Locations</p>
            </div>
          </li>
          <li class="countData__item">
            <div>
              <p class="fnt-64">7+</p>
              <p class="fnt-24 clr-0d mt-1 mt-md-2">YEARS</p>
            </div>
          </li>
          <li class="countData__item">
            <div>
              <p class="fnt-64">6</p>
              <p class="fnt-24 clr-0d mt-1 mt-md-2">AWARDS</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="left-container">
    <div class="row gx-lg-5 flex-column-reverse flex-lg-row">
      <div class="col-lg-4 mt-8rem">
        <h4 class="fnt-32 clr-0e mb-3 mb-lg-4">Dexterous robotic hands manipulate thousands of objects with ease...</h4>
        <p class="fnt-20">We are looking out for energectic and open minded candidates who can fit in with our culture. Think you are the one? Explore with us! open minded candidates needed !</p>
      </div>
      <div class="col-lg-8 pe-0"><img class="Nk-fun__banner" src="./img/about/fun.png" alt="" /></div>
    </div>
  </div>
  <div class="right-container mt-10rem">
    <div class="row gx-lg-5 flex-column-reverse flex-lg-row-reverse">
      <div class="col-lg-4 mt-8rem">
        <h4 class="fnt-32 clr-0e mb-3 mb-lg-4">Collaborate to automate, how siemens healthineers is traversing its automation journey</h4>
        <p class="fnt-20">We are looking out for energectic and open minded candidates who can fit in with our culture. Think you are the one? Explore with us! open minded candidates needed !</p>
      </div>
      <div class="col-lg-8 ps-0"><img class="Nk-fun__banner" src="./img/about/fun-2.png" alt="" /></div>
    </div>
  </div>
</section>
<!--vedio banner-->
<section class="vedio-banner">
  <div class="videoCoverImage">
    <div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'">
      <img src="./img/about/image 80.png" alt="" />
      <div class="vedio-play-button"><img src="./img/icons/play.svg" alt="" /></div>
    </div>
    <div id="thevideo" style="display: none;">
      <iframe src="https://www.youtube.com/embed/oNPTWlU4u4g?rel=0;&amp;autoplay=1&amp;mute=1&amp;loop=1" frameborder="0" allowfullscreen="" include=""></iframe>
    </div>
  </div>
</section>
<!--gallary-->
<section class="Nk-gallary sec-p">
  <div class="container">
    <h2 class="Nk-h2 mb-40 clr-05">Activities that keep us together.</h2>
    <div class="row gutter-40 gutter-sm-8">
      <div class="col-8"><img class="Nk-gallary__img Nk-gallary__img--lg" src="./img/about/image 86.png" alt="" /></div>
      <div class="col-4"><img class="Nk-gallary__img Nk-gallary__img--lg" src="./img/about/Rectangle 681.png" alt="" /></div>
      <div class="col-6"><img class="Nk-gallary__img Nk-gallary__img--sm" src="./img/about/Rectangle 685.png" alt="" /></div>
      <div class="col-6"><img class="Nk-gallary__img Nk-gallary__img--sm" src="./img/about/Rectangle 684.png" alt="" /></div>
    </div>
  </div>
</section>
<!--part-->
<section class="interested sec-p">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <h2 class="Nk-h2 clr-0d mb-3 mb-lg-4">Be a part of our team</h2>
        <p class="fnt-16 clr-0e mb-4">We’re always on the lookout for innovators and game changes to bring their talenta to our team. Got skills and a creative mind?</p>
        <a class="btn btn--b-trans mt-1 btn-saq" href="" data-text="Join our team">Join our team</a>
      </div>
    </div>
  </div>
</section>



<?php
get_footer();
