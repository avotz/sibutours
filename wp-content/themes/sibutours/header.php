<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sibutours
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
 <link href='http://fonts.googleapis.com/css?family=ABeeZee|Open+Sans:400,300,700|Roboto+Slab' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<?php if(is_front_page()) :?>
  <body <?php body_class('fp-viewing-home transparent-header'); ?>>
<?php else: ?>
  <body <?php body_class(); ?>>
<?php endif ?>
<header class="header">
    <div class="header__container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Logo" /></a>
       
        <div class="header__secondary">
            <a href="https://www.facebook.com/pages/Sibu-Tours-Guanacaste-Costa-Rica/280873449268" class="header__secondary__item " target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.youtube.com/user/SibuToursCostaRica" class="header__secondary__item " target="_blank"><i class="fa fa-youtube"></i></a>
            <a href="https://www.instagram.com/sibu_tours_costa_rica/" class="header__secondary__item " target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="http://www.tripadvisor.com/Attraction_Review-g309235-d1772405-Reviews-Sibu_Tours-Province_of_Guanacaste.html" class="header__secondary__item "><i class="fa fa-tripadvisor"></i></a>
        </div>
        <button id="btn-menu" class="header__btn-menu">
            <i class="icon-menu"></i>
        </button>
        <?php wp_nav_menu( array(
             'theme_location' => 'header',
             'menu_id' => 'header-menu',
             'container'       => 'nav',
            'container_class' => 'header__menu',
            'container_id'    => '',
            'menu_class'      => 'header__menu__ul',
              ) 
          ); 
          ?>
         
        
    </div>   
    
</header>
