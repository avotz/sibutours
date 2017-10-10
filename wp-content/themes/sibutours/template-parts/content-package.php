<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sibutours
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		  if ( has_post_thumbnail() ) :

          $id = get_post_thumbnail_id($post->ID);
          $big_url = wp_get_attachment_image_src($id,'tour-gallery', true);
          $thumb_url = wp_get_attachment_image_src($id,'large', true);
          ?>
          
      	<?php  if(wp_is_mobile()){ ?>
       		<figure class="post-banner package-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
               <a href="<?php echo $big_url[0] ?>" class="btn danger package-gallery">Gallery</a>
                <?php $images = rwmb_meta( 'rw_gallery_thumb', 'type=image&size=property-thumb' ); 
	             if ( $images ) : ?>
	             
	             	 
	               
	                     <?php foreach ( $images as $image ){?>
                            <a href="<?php echo $image['url'] ?>" class="package-gallery"></a>
	                     		
	                      <?php } ?>

	        
			  	<?php endif; ?>
			</figure>

		<?php  }else{ ?>
			<figure class="post-banner package-banner" style="background-image: url('<?php echo $big_url[0] ?>');">
				
                <a href="<?php echo $big_url[0] ?>" class="btn danger package-gallery">Gallery</a>
                <?php $images = rwmb_meta( 'rw_gallery_thumb', 'type=image&size=property-thumb' ); 
	             if ( $images ) : ?>
	             
	             	 
	               
	                     <?php foreach ( $images as $image ){?>
                            <a href="<?php echo $image['url'] ?>" class="package-gallery"></a>
	                     		
	                      <?php } ?>

	        
			  	<?php endif; ?>
			</figure>
         <?php } ?>

      <?php endif; 

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php sibutours_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
    <ul id="tabs">
        <li><a href="#" name="tab-description">Description</a></li>
        <li><a href="#" name="tab-schelude">Schedule</a></li>
        <li><a href="#" name="tab-hotel">Hotel Activities</a></li>
        <li><a href="#" name="tab-rates">Rates</a></li>    
    </ul>

    <div id="content-tabs"> 
        <div id="tab-description">
            <?php
			the_content();	?>
        </div>
        <div id="tab-schelude">
        <?php
			echo do_shortcode(rwmb_meta( 'rw_schedule')); 	?>
        
        </div>
        <div id="tab-hotel">
        <?php
			echo do_shortcode(rwmb_meta( 'rw_hotel_activities')); 	?>
        </div>
        <div id="tab-rates">
            <?php
			    echo do_shortcode(rwmb_meta( 'rw_rates')); 	?>
        </div>
    </div>
        
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
