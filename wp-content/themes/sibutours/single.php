<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sibutours
 */

get_header(); ?>

	<main class="main">
		<div class="inner">
		<?php if ( get_post_type( $post ) == 'vacational-package' ) :  ?>
					<div class="package-container">
						<div class="package-info">
								<?php
								while ( have_posts() ) : the_post();
		
									get_template_part( 'template-parts/content', 'package' ); 
		
									the_post_navigation();
		
									
								endwhile; // End of the loop.
								?>
						</div>
						<div class="package-sidebar">
							<a href="#package-popup" class="btn success package-popup-link block" data-title="<?php echo the_title(); ?>">
							<?php  if(get_locale() == "es_ES"){?>
								Consulta ahora
							<?php } if(get_locale() == "en_US") {?>
							Inquire Now
							<?php } if(get_locale() == "fr_FR") {?>
							Enquête maintenant
								<?php } ?>
							

							</a>
						<?php
			    			echo do_shortcode(rwmb_meta( 'rw_sidebar')); 	?>
						</div>
					</div>
						 
					<?php else: ?>
						<div class="blog-container">
							<div class="blog-info">
									<?php
									while ( have_posts() ) : the_post();
			
										get_template_part( 'template-parts/content', get_post_format() );
			
										the_post_navigation();
			
										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
			
									endwhile; // End of the loop.
									?>
							</div>
							<div class="blog-sidebar">
								<?php get_sidebar(); ?>
							</div>
						</div>
			<?php
					endif; ?>
			
			
		</div>

	</main><!-- #main -->

	
<?php

get_footer();
