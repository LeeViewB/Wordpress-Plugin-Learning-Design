<?php

/*
    Plugin Name: Text Widget
    Plugin URI: http://leeview.cu.cc/
    Author: QuanChi Romanul
    Author URI: https://google.com
    Description: Intr-o zi n-am fost. In alta zi am fost. Per total, a fost o zi acceptabila.
*/

add_action('widgets_init', 'register_text_widget');

function register_text_widget(){
    register_widget('Text_ipsum');
}

class Text_ipsum extends WP_Widget {
    
    public function __construct(){
        parent::__construct(
            'text_ipsum',   //ID
            'Text_ipsum',   //Name
            array('description' => 'This is a fun widget!')
        );
        
    }
    
    public function widget($args, $instance){
        //ce apare aici afiseaza pe site.        
    }
    
    public function form($instance){
        //ce apare aici apare in Dashboard in back-end.
    }
    
    public function update($new_instance, $old_instance){
        
    }
}