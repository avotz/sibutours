<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Page Home
 * @package sibutours
 */

get_header(); ?>

	<main class="main">
            <div id="fullpage">
           

                <div class="section" id="section-0" data-anchor="home">
                    
                   <section class="banner">
                      <!--   <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/rio-celeste.jpg');">
                                        
                                      
                                    </div> -->
                        <div class="cycle-slideshow" 
                                    data-cycle-fx="fadeout"
                                    data-cycle-timeout="4000"
                                    data-cycle-slides=".banner__slide"
                                    >
                                      <?php if(!wp_is_mobile()){?>
                                    <div class="cycle-pager banner__pager"></div>
                                    
                                    <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/rio-celeste.jpg');">
                                        
                                      
                                    </div>

                                    <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/home.jpg');">
                                        
                                       
                                    </div>
                                    <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/bg-page1.jpg');">
                                        
                                      
                                    </div>
                                    <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/bg-page2.jpg');">
                                        
                                      
                                    </div>
                                     
                                    <?php }else{?>
                                        <div class="banner__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/rio-celeste.jpg');">
                                        
                                      
                                       </div>
                                     <?php }?>
                                    
                            </div>       
                       
                    </section>
                    
                </div>
                <?php $categories = get_terms( array(
                                'taxonomy' => 'product_cat',
                                'hide_empty' => false,
                                //'number' => 9,
                                /*'slug' => ['buggy-tours','bike-golf-cart-and-equipment-rentals','fishing-tours','zip-line','catamaran','volcano-parks','surfing-paddle-board']*/
                                
                            ) );
                      
                         foreach ($categories as $key => $category) {  
                            $lastKey=$key+1;
                             ?>
                             
                             <div class="section" id="section-<?php echo $key+1 ?>" data-anchor="<?php echo $category->slug; ?>">
                                
                              <!-- <div class="section__bg background-cover" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/bg-page4.jpg');"></div>-->

                               <div class="slide slide__home slide__category" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/categories/<?php echo $category->slug; ?>.jpg');">
                                    
                                </div>
                               
                                
                               <div class="slide slide-2 slide__category " data-anchor="discover" >
                                     <div class="slide__container">
                                            <div class="row">
                                                <div class="column column-2">
                                                     <div class="slide__title-spacer"></div>
                                                     <div class="slide__content">
                                                        <h2 class="entry-title page-header"><a href="#"><?php echo $category->name; ?></a></h2>
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


                            
                    <?php } ?>
                    <div class="section" id="section-<?php echo $lastKey+1 ?>" data-anchor="vacations-package">
                                
                              <!-- <div class="section__bg background-cover" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/bg-page4.jpg');"></div>-->

                               <div class="slide slide__home slide__category" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/packages/vacations-package.jpg');">
                                    
                                </div>
                               
                                
                               <div class="slide slide-2 slide__category " data-anchor="vacations-package" >
                                     <div class="slide__container">
                                            <div class="row">
                                                <div class="column column-2">
                                                     <div class="slide__title-spacer"></div>
                                                     <div class="slide__content">
                                                        <h2 class="entry-title page-header"><a href="#">Vacations Packages</a></h2>
                                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto molestiae id eum cupiditate deleniti fugiat dicta mollitia quidem tempora! Quae dignissimos similique iure fugiat ullam temporibus, at provident vel velit!</p>  
                                                        
                                                        
                                                     </div>
                                                 </div>
                                                 <div class="column column-2">
                                                     <ul class="tours__grid">
                                                         <?php
                                                            $args = array(
                                                              'post_type' => 'vacations-package',
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
                                                                                <a href="<?php the_permalink(); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
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


                            
                
                 
                   
                     
                        
                    
                   
                   
             
                
                
            </div>
            
           <?php  get_template_part( 'template-parts/menu', 'home' ); ?>
           <div class="home-tripadvisor">
            <a href="http://www.tripadvisor.com/Attraction_Review-g309235-d1772405-Reviews-Sibu_Tours-Province_of_Guanacaste.html" target="_blank"><img src="<?php echo get_template_directory_uri();  ?>/img/tripadvisor-7yearsinarow.png" alt="tripadvisor"></a>
           </div>

             
        </main>

<?php

get_footer();
