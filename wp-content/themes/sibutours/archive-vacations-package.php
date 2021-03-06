<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sibutours
 */

get_header(); ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fp-controlArrow fp-prev" style="left: 15px;width: 0;border-width: 38.5px 34px 38.5px 0;border-color: transparent #fff transparent transparent;color: #666;"></a>
<div class="slide slide-2 slide__category " data-anchor="vacations-package" >
<div class="fp-scrollable">
 <div class="slide__container">
        <div class="row">
            <div class="column column-2">
                 <div class="slide__title-spacer"></div>
                 <div class="slide__content">
                    <h2 class="entry-title page-header page-category-wc"><a href="#">Vacation Packages</a></h2>
                    <p>Costa Rica, located in the beautiful tropics just 9.5 degrees north from the Equator. Offers you from Coffee plantations, marine turtles, exotic birds, rain forest, hiking, white water rafting, actives volcanoes, beautiful beaches, fishing and much more.</p> 
                    <p>Sibu Tours has prepare two different customized packages deal for you to experience the vacation of your life time.
                    </p>
                    <p>
                    We like to invite you to take a look to these amazing and fun packages. We also invite to write us for any question or request that you may have. We will be glad to make it happen.</p>  
                    
                 </div>
             </div>
             <div class="column column-2">
                 <ul class="tours__grid">
                     <?php
                        $args = array(
                          'post_type' => 'vacation-package',
                          //'order' => 'ASC',
                          'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
                          'posts_per_page' => -1,
                         
                          
                        );
                        $items = new WP_Query( $args );
                        
                        if( $items->have_posts() ) {
                          while( $items->have_posts() ) {
                             $items->the_post();
                           
                            ?>

                                <li class="full">
                                 <article class="tours__grid__item" >
                                    <div class="entry-content grid-item">
                                        <figure class="entry-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                             <?php if ( has_post_thumbnail() ) :

                                                  $id = get_post_thumbnail_id($post->ID);
                                                  $thumb_url = wp_get_attachment_image_src($id,'large', true);
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
                                            <a href="<?php the_permalink(); ?>" title="Vacations Package">Vacation Packages</a>
                                            </h4>
                                            </div>
                                            </div>
                                            <div class="entry-excerpt-wrapper">
                                           <?php /*echo word_count(get_the_excerpt(), '24'); */?>
                                            <a href="<?php the_permalink(); ?>" class="button">
                                            <?php  if(get_locale() == "es_ES"){?>
                                                Ver paquete
                                               <?php } if(get_locale() == "en_US") {?>
                                               View package
                                               <?php } if(get_locale() == "fr_FR") {?>
                                               Voir le paquete
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

<?php

get_footer();
