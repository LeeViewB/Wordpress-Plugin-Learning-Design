<?php


/*
    Plugin Name: Coco Slider
    Plugin URI: http://leeview.cu.cc/
    Author: QuanChi Romanuleeee
    Author URI: https://google.com
    Description: Eu nu te contrazic.
*/

add_action('init','meniu_slider');

function meniu_slider() {
    $args = array(
        'label' => 'Slider',
        'public' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'supports' => array('title','thumbnail', 'editor'),
        'taxonomies' => array('category'),
        'menu_position' => 10,
        'menu_icon' => 'dashicons-images-alt2',
    
    );
    
    register_post_type('coco_slider',$args);
    
}

function afisare_slider(){
    
    global $post;
    
    $args = array(
        'posts_per_page' => 5,
        'post_type' => 'coco_slider',
    );
    
    $slides = get_posts($args);
    
    foreach($slides as $item){
        
        the_title();
        
        echo '<br />';
        
    }
    
    wp_reset_postdata();
    
}

add_shortcode('coco_slider','afisare_slider');