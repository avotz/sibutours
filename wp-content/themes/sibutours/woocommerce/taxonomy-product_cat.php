<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//wc_get_template( 'archive-product.php' );
$categorySelected = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'slug' => get_query_var('product_cat')
            
        ) );
$category = $categorySelected[0];
//var_dump($category);
get_header(); 

?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fp-controlArrow fp-prev" style="left: 15px;width: 0;border-width: 38.5px 34px 38.5px 0;border-color: transparent #fff transparent transparent;color: #666;"></a>
<div class="slide slide-2 slide__category " data-anchor="discover" >
<div class="fp-scrollable">
 <div class="slide__container">
        <div class="row">
            <div class="column column-2">
                 <div class="slide__title-spacer"></div>
                 <div class="slide__content">
                    <h2 class="entry-title page-header page-category-wc"><a href="#"><?php echo $category->name; ?></a></h2>
                     <?php echo $category->description; ?>
                    
                    
                 </div>
             </div>
             <div class="column column-2">
                 <ul class="tours__grid">
                     <?php
                        $args = array(
                          'post_type' => 'product',
                          //'order' => 'ASC',
                          'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
                          'posts_per_page' => -1,
                         'tax_query' => array(
                            array(
                              'taxonomy' => 'product_cat',
                              'field' => 'slug',
                              'terms' => $category->slug
                            )
                          )
                          
                        );
                        $items = new WP_Query( $args );
                        
                        if( $items->have_posts() ) {
                          while( $items->have_posts() ) {
                             $items->the_post();
                           
                            ?>

                                <li>
                                 <article class="tours__grid__item" >
                                    <div class="entry-content grid-item">
                                        <figure class="entry-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                             <?php if ( has_post_thumbnail() ) :

                                                  $id = get_post_thumbnail_id($post->ID);
                                                  $thumb_url = wp_get_attachment_image_src($id,'tour-thumb', true);
                                                  ?>
                                                  
                                               
                                                
                                              <?php endif; ?>
                                              <img src="<?php echo $thumb_url[0] ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                          </a>
                                        </figure>
                                        <div class="entry-excerpt">
                                            <div class="entry-header">
                                            <div class="tour-title">
                                            <small class="tour-regions">
                                             <?php the_title(); ?>
                                            </small>
                                            <h4>
                                            <a href="<?php the_permalink(); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
                                            </h4>
                                            </div>
                                            </div>
                                            <div class="entry-excerpt-wrapper">
                                           <?php /*echo word_count(get_the_excerpt(), '24'); */?>
                                            <a href="<?php the_permalink(); ?>" class="button">
                                               <?php  if(get_locale() == "es_ES"){?>
                                                Ver tour
                                               <?php } if(get_locale() == "en_US") {?>
                                               View Tour
                                               <?php } if(get_locale() == "fr_FR") {?>
                                               Voir le tour
                                                <?php } ?>
                                              
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                             </li>
                             
                              
                            <?php
                             
                          }
                        }
                      ?>

                
                 </ul>
             </div>
        </div>
     
 </div>
 </div>
</div>
<?php get_footer(); ?>
