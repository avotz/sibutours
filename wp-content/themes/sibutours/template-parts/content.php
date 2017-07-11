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
       		<figure class="post-banner blog-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
				<?php  if ( !is_single() ) :?>
					<a href="<?php echo get_permalink() ?>"></a>
				
				<?php  endif;?>
			</figure>

		<?php  }else{ ?>
			<figure class="post-banner blog-banner" style="background-image: url('<?php echo $big_url[0] ?>');">
				<?php  if ( !is_single() ) :?>
					<a href="<?php echo get_permalink() ?>"></a>
				
				<?php  endif;?>
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
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sibutours' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
