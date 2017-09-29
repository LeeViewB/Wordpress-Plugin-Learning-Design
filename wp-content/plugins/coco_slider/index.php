<?php


/*
    Plugin Name: Coco Slider
    Plugin URI: http://leeview.cu.cc/
    Author: QuanChi Romanuleeee
    Author URI: https://google.com
    Description: Eu nu te contrazic.
*/

add_action('init','meniu_slider');

add_image_size('slider_size',940,200,true);

add_filter('image_size_names_choose','marimi_poze');
function marimi_poze($sizes){
    return array_merge($sizes, array(
        'slider_size' => 'Marime slider',
    ));
}

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
        'orderby' => 'id',
        'order' => 'ASC',
    );
    
    $slides = get_posts($args);
    
    echo '<ul id="main_slider">';
    
    foreach($slides as $item){
        
        echo '<li>';
        echo '<img src="'.get_the_post_thumbnail_url($item->ID).'">';   
        echo '</li>';        
    }
    
    echo '</ul>';
    
    wp_reset_postdata();
    
}

add_shortcode('coco_slider','afisare_slider');

function coco_style(){
    wp_enqueue_style('coco-slider', plugin_dir_url( __FILE__ ).'css/lightslider.min.css' ,false);
}

function coco_script(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('coco-slider-js', plugin_dir_url( __FILE__ ).'js/lightslider.min.js', false);
    wp_enqueue_script('coco-settings-js', plugin_dir_url( __FILE__ ).'js/jssettings.js', false);
}

add_action('wp_enqueue_scripts','coco_style');
add_action('wp_enqueue_scripts','coco_script');