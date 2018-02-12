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
            <span class="copy">Sibutour &copy; <?php echo date('Y');?> </span>
            <div class="languages">
            	<a href="<?php echo esc_url( home_url( '/en' ) ); ?>">EN</a>
            	<a href="<?php echo esc_url( home_url( '/es' ) ); ?>">ES</a>
            	<a href="<?php echo esc_url( home_url( '/fr' ) ); ?>">FR</a>
            </div>
            <div class="tripadvisor-marque">
              <div id="TA_cdsscrollingravewide750" class="TA_cdsscrollingravewide">
              <ul id="pice5SLktaim" class="TA_links ddauEb7A">
              <li id="CmFdNE3Q" class="fD5pny9">
              <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://static.tacdn.com/img2/t4b/Stacked_TA_logo.png" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
              </li>
              </ul>
              </div>
              <script async src="https://www.jscache.com/wejs?wtype=cdsscrollingravewide&amp;uniq=750&amp;locationId=1772405&amp;lang=en_US&amp;border=true&amp;display_version=2"></script>
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
  <div id="package-popup" class="request-popup white-popup mfp-hide mfp-with-anim">
		<?php  if(get_locale() == "es_ES"){
         echo do_shortcode('[contact-form-7 id="155" title="Contact Form ES"]');
        } if(get_locale() == "en_US") {
         echo do_shortcode('[contact-form-7 id="45" title="Contact Form"]') ;
       } if(get_locale() == "fr_FR") {
          echo do_shortcode('[contact-form-7 id="182" title="Contact Form FR"]'); 
        } ?>               
	    
	</div>

<?php wp_footer(); ?>

<script>
 
    var wpcf7ElmInquireTour = document.querySelector( '#tour-popup div.wpcf7' );
    var wpcf7ElmInquireTransfer = document.querySelector( '#transfer-popup div.wpcf7' );
    var wpcf7ElmContact = document.querySelector( '.page-template-page-contact div.wpcf7' ); //form contact
    

      if(wpcf7ElmContact)
    {
          wpcf7ElmContact.addEventListener( 'wpcf7submit', function( event ) {
            ga('send', 'event', 'Contact Form', 'submit');
        }, false );
      }
       if(wpcf7ElmInquireTour)
    {
          wpcf7ElmInquireTour.addEventListener( 'wpcf7submit', function( event ) {
            ga('send', 'event', 'Inquire Tour Form', 'submit');
        }, false );
      }
        if(wpcf7ElmInquireTransfer)
    {
          wpcf7ElmInquireTransfer.addEventListener( 'wpcf7submit', function( event ) {
            ga('send', 'event', 'Inquire Transfer Form', 'submit');
        }, false );
      }
   
</script>

</body>
</html>
