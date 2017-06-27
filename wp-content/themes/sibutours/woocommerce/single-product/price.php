<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
    
<div class="tour-header-group-1">
	<div class="tour-header-meta-wrapper">
		<div class="tour-meta tour-meta-price">

		    <span class="tour-meta-header">
		    	 <?php  if(get_locale() == "es_ES"){?>
                 Hora de salida:
               <?php } if(get_locale() == "en_US") {?>
                Departure Time:
               <?php } if(get_locale() == "fr_FR") {?>
                Heure de départ:
                <?php } ?>
		    	
		    </span>
		    <span class="tour-meta-content"><?php echo get_post_meta( $product->get_id(), 'departure_time', true ); ?></span>
		 </div>
		 <div class="tour-meta tour-meta-price">
		    <span class="tour-meta-header">
		    	 <?php  if(get_locale() == "es_ES"){?>
                Hora de regreso:
               <?php } if(get_locale() == "en_US") {?>
                Return Time:
               <?php } if(get_locale() == "fr_FR") {?>
                Heure de retour:
                <?php } ?>

		     </span>
		    <span class="tour-meta-content"><?php echo get_post_meta( $product->get_id(), 'return_time', true ); ?></span>
		 </div>
	</div>
</div>

<div class="tour-header-group-2">
    <div class="tour-header-book-now-wrapper">
      <a href="#tour-popup" class="btn success tour-popup-link" data-title="<?php echo $product->get_slug(); ?>">
	   <?php  if(get_locale() == "es_ES"){?>
        Consulta ahora
       <?php } if(get_locale() == "en_US") {?>
       Inquire Now
       <?php } if(get_locale() == "fr_FR") {?>
       Enquête maintenant
        <?php } ?>
      

      </a>
       <!-- <p class="price"><?php echo $product->get_price_html(); ?></p> -->
    </div>
  </div>


