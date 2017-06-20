<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sibutours
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<div class="entry-page-container">
			<div class="page-media">
				 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15689.514217217933!2d-85.696299!3d10.549521!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaf2757b69dccefae!2sSibu+Tours!5e0!3m2!1ses-419!2s!4v1497994027465" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				
			</div>
			<div class="page-info">
				<div class="page-content">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<?php
						the_content();

	
					?>
				</div>
				
				
			</div>
		</div>
		
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
