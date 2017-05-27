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
            
    </footer>

    <div id="transfer-popup" class="request-popup white-popup mfp-hide mfp-with-anim">               
	    <?php echo do_shortcode('[contact-form-7 id="33" title="Book Transfer"]') ?>
	</div>
	<div id="tour-popup" class="request-popup white-popup mfp-hide mfp-with-anim">               
	    <?php echo do_shortcode('[contact-form-7 id="32" title="Book Tour"]') ?>
	</div>

<?php wp_footer(); ?>

</body>
</html>
