<?php
  /**
  * The template for displaying the footer
  *
  * Contains the closing of the #content div and all content after.
  *
  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
  *
  * @package CandyPress
  */
  
  $t_options = get_option('tp_opt');
  global $tempDir;
  global $siteUrl;

?>
<p id="cookie-notice">This website uses cookies to ensure you get the best experience on our website<br><button onclick="acceptCookie();">Accept</button></p>
<style>#cookie-notice{color:#fff;font-family:inherit;background:#051d60;padding:20px;position:fixed;bottom:10px;right:10px;width:100%;max-width:300px;box-shadow:0 10px 20px rgba(0,0,0,.2);border-radius:5px;margin:0px;visibility:hidden;z-index:1000000;box-sizing:border-box}#cookie-notice button{color:inherit;background:transparent ;border:1px solid #fff;padding:10px;margin-top:10px;width:100%;cursor:pointer}@media only screen and (max-width:600px){#cookie-notice{max-width:100%;bottom:0;left:0;border-radius:0}}</style>
<script>function acceptCookie(){document.cookie="cookieaccepted=1; max-age=2592000; UTC; path=/",document.getElementById("cookie-notice").style.visibility="hidden"}document.cookie.indexOf("cookieaccepted")<0&&(document.getElementById("cookie-notice").style.visibility="visible");</script>

<footer class="nk-footer sec-p v-scrolling" id="nk-footer">
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-6">
        <h2 class="Nk-h2 gsap-footer-h2">Let's make something worth talking about.</h2>
      </div>
    </div>
    <div class="mt-4 mt-lg-5"> 
      <?php echo do_shortcode( '[contact-form-7 id="5" title="footer form"]'); ?>
      <div class="row nk-footer__links"> 
        <div class="col-6 col-md-3 col-lg-2">
          <p class="fnt-700 footer-heading">Quick links</p>
          <?php 
            wp_nav_menu( array( 
            'theme_location' => 'footer_quick_links',
            'container' => 'ul',
            'menu_class' => ' ',
            )); 
          ?>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <p class="fnt-700 footer-heading">Careers</p>
          <?php 
            wp_nav_menu( array( 
            'theme_location' => 'footer_careers_links',
            'container' => 'ul',
            'menu_class' => ' ',
            )); 
          ?>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <p class="fnt-700 footer-heading">Services</p>
          <?php 
            wp_nav_menu( array( 
            'theme_location' => 'footer_services_links',
            'container' => 'ul',
            'menu_class' => ' ',
            )); 
          ?>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <p class="fnt-700 footer-heading">Support</p>
          <?php 
            wp_nav_menu( array( 
            'theme_location' => 'footer_support_links',
            'container' => 'ul',
            'menu_class' => ' ',
            )); 
          ?>
        </div>
        <div class="col-md-8 col-lg-4 d-none d-md-block"> 
          <p class="fnt-16 clr-w fnt-700 gsap-upDown-footer">Sign up for our newsletter to stay abreast of digital trends and their impact on businesses</p>
          <div class="subscribe gsap-upDown-footer">
            <input class="form-input" type="text" placeholder="Your email address">
            <button class="subscribe-btn" type="submit">Subscribe</button>
          </div>
        </div>
      </div>
      <div class="row justify-content-between social-media-wrp d-md-none b-mbl"> 
        <div class="col-5"> 
          <p class="fnt-16 clr-w fnt-700 gsap-upDown-footer"> Write to us</p><a class="fnt-16 clr-w text-end fnt-700 gsap-upDown-footer" href="">info@navikenz.com</a>
        </div>
        <div class="col-4 social-media gsap-upDown-footer"> <a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/facebook icon.svg" alt=""></a><a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/Twitter.svg" alt=""></a><a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/linkedin icon.svg" alt=""></a></div>
      </div>
      <div class="row justify-content-between social-media-wrp"> 
        <div class="col-md-5 gsap-upDown-footer"> 
          <p class="fnt-16 clr-w fnt-600 text-center text-md-start">2021 | © Navikenz | All rights reserved</p>
        </div>
        <div class="col-md-4 social-media d-none d-md-flex gsap-upDown-footer"> <a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/facebook icon.svg" alt=""></a><a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/Twitter.svg" alt=""></a><a class="social-media__link" href=""> <img src="<?php echo $tempDir; ?>/img/icons/linkedin icon.svg" alt=""></a></div>
      </div>
    </div>
  </div>
</footer>
</main>
<?php wp_footer(); ?>



