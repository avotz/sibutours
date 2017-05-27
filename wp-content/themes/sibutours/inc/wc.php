<?php

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 4 );

/** woocommerce **/
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 2; // 4 related products
    $args['columns'] = 2; // arranged in 2 columns
    return $args;
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_city']);
     unset($fields['billing']['billing_postcode']);
     unset($fields['billing']['billing_state']);
     unset($fields['billing']['billing_company']);

     $fields['order']['order_comments']['placeholder'] = 'e.g. child seats';
      $fields['order']['order_comments']['label'] = 'Important Notes';
     

     return $fields;
}


/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<div id="tour_pickup_hotel">';

    woocommerce_form_field( 'tour_pickup_hotel', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Pick up hotel'),
        'placeholder'   => __('Hotel'),
        'required'  => true,
        ), $checkout->get_value( 'tour_pickup_hotel' ));

    /*woocommerce_form_field( 'tour_date', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Tour date'),
        'placeholder'   => __('dd/mm/yyyy'),
        'required'  => true,
        'input_class' => array('datepicker')
        ), $checkout->get_value( 'tour_date' ));*/

    echo '</div>';

}
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['tour_pickup_hotel'] )
        wc_add_notice( __( '<strong>Pick up hotel</strong> is a required field.' ), 'error' );

     /*if ( ! $_POST['tour_date'] )
        wc_add_notice( __( '<strong>Tour date</strong> is a required field.' ), 'error' );*/
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['tour_pickup_hotel'] ) ) {
        update_post_meta( $order_id, 'Pick up hotel', sanitize_text_field( $_POST['tour_pickup_hotel'] ) );
    }
    /* if ( ! empty( $_POST['tour_date'] ) ) {
        update_post_meta( $order_id, 'Tour date', sanitize_text_field( $_POST['tour_date'] ) );
    }*/
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Pick up hotel').':</strong> ' . get_post_meta( $order->id, 'Pick up hotel', true ) . '</p>';
    //*echo '<p><strong>'.__('Tour date').':</strong> ' . get_post_meta( $order->id, 'Tour date', true ) . '</p>';**/
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

//remove short description from sigle page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
//add description to sigle page without tab
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
        return '';
    }
function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );


function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );  
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

/**
* WooCommerce: Show only one custom product attribute above Add-to-cart button on single product page.
*/
/*function isa_woo_get_one_pa(){
  
    // Edit below with the title of the attribute you wish to display
    $desired_att = 'Departure Time';
   
    global $product;
    $attributes = $product->get_attributes();
     
    if ( ! $attributes ) {
        return;
    }
      
    $out = '';
   
    foreach ( $attributes as $attribute ) {
          
        if ( $attribute['is_taxonomy'] ) {
          
            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $desired_att)));
          
            // if this is desired att, get value and label
            if ( $attribute['name'] == 'pa_' . $tax_slug ) {
              
                $terms = wp_get_post_terms( $product->get_id(), $attribute['name'], 'all' );
                // get the taxonomy
                $tax = $terms[0]->taxonomy;
                // get the tax object
                $tax_object = get_taxonomy( $tax );
                // get tax label
                if ( isset ( $tax_object->labels->singular_name ) ) {
                    $tax_label = $tax_object->labels->singular_name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                    // Trim label prefix since WC 3.0
                    if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                       $tax_label = substr( $tax_label, 8 );
                    }
                }
                  
                foreach ( $terms as $term ) {
       
                    $out .= $tax_label . ': ';
                    $out .= $term->name . '<br />';
                       
                }           
              
            } // our desired att
              
        } else {
          
            // for atts which are NOT registered as taxonomies
              
            // if this is desired att, get value and label
            if ( $attribute['name'] == $desired_att ) {
                $out .= $attribute['name'] . ': ';
                $out .= $attribute['value'];
            }
        }       
          
      
    }
      
    echo $out;
}
add_action('woocommerce_single_product_summary', 'isa_woo_get_one_pa');
*/
/**
* Show all product attributes on the product page
*/
function isa_woocommerce_all_pa(){
    
    global $product;
    $attributes = $product->get_attributes();
    if ( ! $attributes ) {
        return;
    }
    
    $out = '<div class="tour-header-group-1">';
    $out .= '<div class="tour-header-meta-wrapper">';
    foreach ( $attributes as $attribute ) {
  
            // skip variations
            if ( $attribute['is_variation'] ) {
                continue;
            }
             
        if ( $attribute['is_taxonomy'] ) {
  
            $terms = wp_get_post_terms( $product->get_id(), $attribute['name'], 'all' );
            // get the taxonomy
            $tax = $terms[0]->taxonomy;
            // get the tax object
            $tax_object = get_taxonomy($tax);
            // get tax label
            if ( isset ($tax_object->labels->singular_name) ) {
                $tax_label = $tax_object->labels->singular_name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
                // Trim label prefix since WC 3.0
                if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                   $tax_label = substr( $tax_label, 8 );
                }                
            }
             
            foreach ( $terms as $term ) {
                $out .= '<div class="tour-meta tour-meta-price">';
                $out .= '<span class="tour-meta-header">'.$tax_label . ':</span>';
                $out .= '<span class="tour-meta-content">'.$term->name . '</span>';
                $out .= '</div>';
            }
                
        } else {
            $out .= '<div class="tour-meta tour-meta-price">';
            $out .= '<span class="tour-meta-header">'.$attribute['name'] . ':</span>';
            $out .= '<span class="tour-meta-content">'.$attribute['value'] . '</span>';
            $out .= '</div>';
        }
    }
    $out .= '</div></div>';
    echo $out;

    // <div class="tour-header-group-1">
    //             <div class="tour-header-meta-wrapper">
    //               <div class="tour-meta tour-meta-price">
    //                 <span class="tour-meta-header">Price from</span>
    //                 <span class="tour-meta-content">
    //                 $90 per person
    //                 </span>
    //               </div>
    //               <div class="tour-meta tour-meta-duration">
    //                 <span class="tour-meta-header">Duration</span>
    //                 <span class="tour-meta-content">6 days, 5 nights</span>
    //               </div>
    //             </div>
    //           </div>
}
     
add_action('woocommerce_single_product_summary', 'isa_woocommerce_all_pa',9);