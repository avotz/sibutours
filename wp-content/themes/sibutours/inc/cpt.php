<?php

add_filter( 'rwmb_meta_boxes', 'sibutours_register_meta_boxes' );

function sibutours_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'page'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Gallery',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'gallery_thumb',
                'type'  => 'image_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
             
           
        )
    );

    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'sibutours' ),
        'post_types' => array( 'vacation-package'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Gallery',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'gallery_thumb',
                'type'  => 'image_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
            array(
                'name'  => __( 'Schedule and activities', 'sibutours' ),
                'desc'  => '',
                'id'    => $prefix . 'schedule',
                'type'  => 'wysiwyg',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( ' Hotel and activities included', 'sibutours' ),
                'desc'  => '',
                'id'    => $prefix . 'hotel_activities',
                'type'  => 'wysiwyg',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
           
             array(
                'name'  => __( 'Rates', 'sibutours' ),
                'desc'  => '',
                'id'    => $prefix . 'rates',
                'type'  => 'wysiwyg',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
            array(
                'name'  => __( 'Sidebar', 'sibutours' ),
                'desc'  => '',
                'id'    => $prefix . 'sidebar',
                'type'  => 'wysiwyg',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
              array(
                'name'  => 'PDF',
                'desc'  => 'Format: PDF File',
                'id'    => $prefix . 'pdf_thumb',
                'type'  => 'file_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
             
           
        )
    );

    
    return $meta_boxes;
}
