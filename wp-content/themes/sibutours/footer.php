<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sibutours
 */

?>

	<footer class="footer">
            <div class="languages">
            	<a href="<?php echo esc_url( home_url( '/en' ) ); ?>">EN</a>
            	<a href="<?php echo esc_url( home_url( '/es' ) ); ?>">ES</a>
            	<a href="<?php echo esc_url( home_url( '/fr' ) ); ?>">FR</a>
            </div>
    </footer>

    <div id="transfer-popup" class="request-popup white-popup mfp-hide mfp-with-anim">               
	    <?php  if(get_locale() == "es_ES"){
         echo do_shortcode('[contact-form-7 id="196" title="Book Transfer ES"]');
        } if(get_locale() == "en_US") {
         echo do_shortcode('[contact-form-7 id="33" title="Book Transfer"]') ;
       } if(get_locale() == "fr_FR") {
          echo do_shortcode('[contact-form-7 id="197" title="Book Transfer FR"]'); 
        } ?> 
	</div>
	<div id="tour-popup" class="request-popup white-popup mfp-hide mfp-with-anim">
		<?php  if(get_locale() == "es_ES"){
         echo do_shortcode('[contact-form-7 id="184" title="Book Tour ES"]');
        } if(get_locale() == "en_US") {
         echo do_shortcode('[contact-form-7 id="32" title="Book Tour"]') ;
       } if(get_locale() == "fr_FR") {
          echo do_shortcode('[contact-form-7 id="185" title="Book Tour FR"]'); 
        } ?>               
	    
	</div>
  <div id="lodging-popup" class="request-popup white-popup mfp-hide mfp-with-anim">
    <?php  if(get_locale() == "es_ES"){
         echo do_shortcode('[contact-form-7 id="374" title="Book Lodging ES"]');
        } if(get_locale() == "en_US") {
         echo do_shortcode('[contact-form-7 id="373" title="Book Lodging"]') ;
       } if(get_locale() == "fr_FR") {
          echo do_shortcode('[contact-form-7 id="378" title="Book Lodging FR"]'); 
        } ?>               
      
  </div>

<?php wp_footer(); ?>

</body>
</html>
