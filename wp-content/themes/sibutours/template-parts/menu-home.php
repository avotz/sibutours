<div class="main__menu main__menu__wrapper">
                <div class="main__menu__line-container">
                    <div class="main__menu__line" id="chapter-line"></div>
                </div>
                <div class="main__menu__logo-container">
                    <img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Logo" />
                </div>
                <div class="main__menu__container">
                    <div class="main__menu__before">
                        <div class="main__menu__items">
                            <ul class="main__menu__list">
                                 <li class="main__menu__item" data-goto="1">&nbsp;</li>
                                <?php $categories = get_terms( array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => false,
                                   
                                    
                                ) );
                                
                             foreach ($categories as $key => $category) { 
                                $lastKey = $key+2;
                                 ?>
                               
                                <?php if(wp_is_mobile()){?>
                                    <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><a href="/tour-category/<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
                                   <?php }else{ ?>
                                         <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><?php echo $category->name ?></li>
                               <?php   }
                                } 
                                ?>
                                
                                <!-- <li class="main__menu__item" data-goto="3">Nature & Cultural</li>
                                <li class="main__menu__item" data-goto="4">Water</li> -->
                                <?php if(wp_is_mobile()){?>
                                    <li class="main__menu__item" data-goto="<?php echo $lastKey+2 ?>"><a href="/vacation-package">Vacation packages</a></li>
                                   <?php }else{ ?>
                                         <li class="main__menu__item" data-goto="<?php echo $lastKey+2 ?>">Vacation packages</li>
                               <?php   } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main__menu__container">
                    <div class="main__menu__after">
                        <div class="main__menu__items">
                            <ul class="main__menu__list">
                                 <li class="main__menu__item" data-goto="1">&nbsp;</li>
                                <?php $categories = get_terms( array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => false,
                                   
                                    
                                ) );
                                
                             foreach ($categories as $key => $category) {  
                                $lastKey = $key+2;
                                 ?>
                                    
                                  <?php if(wp_is_mobile()){?>
                                    <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><a href="/tour-category/<?php echo $category->slug ?>"><?php echo $category->name ?></a></li>
                                   <?php }else{ ?>
                                         <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><?php echo $category->name ?></li>
                               <?php   }
                             } ?>
                               <?php if(wp_is_mobile()){?>
                                    <li class="main__menu__item" data-goto="<?php echo $lastKey+1 ?>"><a href="/vacation-package">Vacation packages</a></li>
                                   <?php }else{ ?>
                                         <li class="main__menu__item" data-goto="<?php echo $lastKey+1 ?>">Vacation packages</li>
                               <?php   } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main__menu__container">
                    <div class="main__menu__big">
                        <div class="main__menu__items">
                            <ul class="main__menu__list">
                                <li class="main__menu__item home">
                                <span class="hide-for-small-only">
                                <?php  if(get_locale() == "es_ES"){?>
                                 <a href="./">Experiencia lo mejor de Sibu Tours</a>
                               <?php } if(get_locale() == "en_US") {?>
                                <a href="./">Experience the best of Sibu Tours</a>
                               <?php } if(get_locale() == "fr_FR") {?>
                                 <a href="./">Experience the best of Sibu Tours</a>
                                <?php } ?>
                               
                                </span>
                                <span class="show-for-small-only">&nbsp;</span>
                                </li>
                                 <?php $categories = get_terms( array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => false,
                                   
                                    
                                ) );
                                
                             foreach ($categories as $key => $category) {  ?>
                                 
                                 <li class="main__menu__item">
                                    <a href="/tour-category/<?php echo $category->slug ?>">
                                       <?php  if(get_locale() == "es_ES"){?>
                                        Descubre <?php echo $category->name ?>
                                       <?php } if(get_locale() == "en_US") {?>
                                        Discover <?php echo $category->name ?>
                                       <?php } if(get_locale() == "fr_FR") {?>
                                        Discover <?php echo $category->name ?>
                                        <?php } ?>
                                      </a>
                                    <div class="fp-controlArrow fp-next"></div>
                                 </li>
                            <?php } ?>
                            <li class="main__menu__item">
                                    <a href="/vacation-package">
                                       <?php  if(get_locale() == "es_ES"){?>
                                        Paquete de vacaciones
                                       <?php } if(get_locale() == "en_US") {?>
                                        Vacation Packages
                                       <?php } if(get_locale() == "fr_FR") {?>
                                        Forfait vacances
                                        <?php } ?>
                                      </a>
                                    <div class="fp-controlArrow fp-next"></div>
                                 </li>
                                
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <span id="main__link__down" class="main__link__down" data-goto=""><i class="icon-angle-down"></i></span>
