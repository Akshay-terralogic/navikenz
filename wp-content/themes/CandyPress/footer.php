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
<footer class="nk-footer sec-p v-scrolling" id="nk-footer">
  <div class="container"> 
    <div class="row"> 
      <div class="col-lg-6">
        <h2 class="Nk-h2 gsap-footer-h2">Let's make something worth talking about.</h2>
      </div>
    </div>
    <form class="mt-4 mt-lg-5" action=""> 
      <div class="row"> 
        <div class="col-md-4"> 
          <input class="form-input mb-4 mb-md-0 gsap-upDown-footer" type="text" placeholder="Name">
        </div>
        <div class="col-md-4"> 
          <input class="form-input mb-4 mb-md-0 gsap-upDown-footer" type="email" placeholder="Email">
        </div>
        <div class="col-md-2"> 
          <button class="btn btn--w mt-2 mt-md-0 btn-saq gsap-upDown-footer" type="submit" data-text=" Submit">Submit</button>
        </div>
        <div class="col-lg-2 text-end d-none d-md-block">
          <p class="fnt-16 clr-w text-end fnt-700 gsap-upDown-footer">  Write to us</p><a class="fnt-16 clr-w text-end fnt-700 gsap-upDown-footer" href="">info@navikenz.com</a>
        </div>
      </div>
      <div class="row nk-footer__links"> 
        <div class="col-6 col-md-3 col-lg-2">
          <ul>
            <li class="gsap-upDown-footer"> 
              <p class="fnt-700">Quick links</p>
            </li>
            <li class="gsap-upDown-footer"> <a href="service.html">Our services</a></li>
            <li class="gsap-upDown-footer"> <a href="knowledge.html">Knowledge</a></li>
            <li class="gsap-upDown-footer"> <a href="customer.html"> Customers</a></li>
            <li class="gsap-upDown-footer"> <a href="partners.html">Partners</a></li>
            <li class="gsap-upDown-footer"> <a href="about-us.html">About us</a></li>
          </ul>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <ul>
            <li class="gsap-upDown-footer"> 
              <p class="fnt-700">Careers</p>
            </li>
            <li class="gsap-upDown-footer"> <a href="">Data science</a></li>
            <li class="gsap-upDown-footer"> <a href="">AI engineer</a></li>
            <li class="gsap-upDown-footer"><a href="">Graphic designer</a></li>
          </ul>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <ul>
            <li class="gsap-upDown-footer"> 
              <p class="fnt-700">Services</p>
            </li>
            <li class="gsap-upDown-footer"> <a href="">Plan</a></li>
            <li class="gsap-upDown-footer"> <a href="">Design</a></li>
            <li class="gsap-upDown-footer"><a href="">Develop</a></li>
          </ul>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <ul>
            <li class="gsap-upDown-footer"> 
              <p class="fnt-700">Support</p>
            </li>
            <li class="gsap-upDown-footer"> <a href="">Help</a></li>
            <li class="gsap-upDown-footer"> <a href="">FAQ </a></li>
            <li class="gsap-upDown-footer"><a href="contact-us.html">Contact us</a></li>
            <li class="gsap-upDown-footer"><a href="">Privacy</a></li>
          </ul>
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
        <div class="col-4 social-media gsap-upDown-footer"> <a class="social-media__link" href=""> <img src="./img/icons/facebook icon.svg" alt=""></a><a class="social-media__link" href=""> <img src="./img/icons/Twitter.svg" alt=""></a><a class="social-media__link" href=""> <img src="./img/icons/linkedin icon.svg" alt=""></a></div>
      </div>
      <div class="row justify-content-between social-media-wrp"> 
        <div class="col-md-5 gsap-upDown-footer"> 
          <p class="fnt-16 clr-w fnt-600 text-center text-md-start">2021 | © Navikenz | All rights reserved</p>
        </div>
        <div class="col-md-4 social-media d-none d-md-flex gsap-upDown-footer"> <a class="social-media__link" href=""> <img src="./img/icons/facebook icon.svg" alt=""></a><a class="social-media__link" href=""> <img src="./img/icons/Twitter.svg" alt=""></a><a class="social-media__link" href=""> <img src="./img/icons/linkedin icon.svg" alt=""></a></div>
      </div>
    </form>
  </div>
</footer>
</main>
<?php wp_footer(); ?>



