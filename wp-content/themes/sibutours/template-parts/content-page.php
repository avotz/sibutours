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
				 <div class="owl-carousel">

					 <?php if ( has_post_thumbnail() ) :

	                  $id = get_post_thumbnail_id($post->ID);
	                  $big_url = wp_get_attachment_image_src($id,'tour-gallery', true);
	                  $thumb_url = wp_get_attachment_image_src($id,'medium', true);
	                  ?>
	                  
	              		<?php  if(wp_is_mobile()){ ?>
	               		<figure class="page-banner tour-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
			
						</figure>

					<?php  }else{ ?>
						<figure class="page-banner tour-banner" style="background-image: url('<?php echo $big_url[0] ?>');">
			
						</figure>
	                 <?php } ?>

	              <?php endif; ?>
		
					
					 <?php  if(wp_is_mobile()){ 
	               		 $images = rwmb_meta( 'rw_gallery_thumb', 'type=image&size=medium' ); 
					}else{ 
						  $images = rwmb_meta( 'rw_gallery_thumb', 'type=image&size=property-thumb' ); 
	                    } 

		             if ( $images ) : ?>
		             
		             	 
		               
		                     <?php foreach ( $images as $image ){?>

		                     		<figure class="tour-banner" style="background-image: url('<?php echo $image['url'] ?>');"></figure>
		                         
		                      <?php } ?>

		           
				
				  	 
				  	<?php endif; ?>
					
				</div>

				
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
