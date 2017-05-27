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
                                
                             foreach ($categories as $key => $category) {  ?>
                                 <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><?php echo $category->name ?></li>
                            <?php } ?>
                                
                                <!-- <li class="main__menu__item" data-goto="3">Nature & Cultural</li>
                                <li class="main__menu__item" data-goto="4">Water</li> -->
                                
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
                                
                             foreach ($categories as $key => $category) {  ?>
                                 <li class="main__menu__item" data-goto="<?php echo $key+2 ?>"><?php echo $category->name ?></li>
                            <?php } ?>
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
                                <a href="./">Experience the best of Sibu Tours</a>
                                </span>
                                <span class="show-for-small-only">&nbsp;</span>
                                </li>
                                 <?php $categories = get_terms( array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => false,
                                   
                                    
                                ) );
                                
                             foreach ($categories as $key => $category) {  ?>
                                 
                                 <li class="main__menu__item">
                                    <a href="/product-category/<?php echo $category->slug ?>">Discover <?php echo $category->name ?></a>
                                    <div class="fp-controlArrow fp-next"></div>
                                 </li>
                            <?php } ?>
                                
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <span id="main__link__down" class="main__link__down" data-goto=""><i class="icon-angle-down"></i></span>
