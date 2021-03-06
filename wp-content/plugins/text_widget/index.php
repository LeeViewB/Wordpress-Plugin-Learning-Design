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
        
        extract($args);
        $text = $instance['text'];
        
        echo $before_widget;
        
        echo '<p>'.$text.'</p>';
                
        echo $after_widget;
    }
    
    public function form($instance){
        //ce apare aici apare in Dashboard in back-end.
        if(isset($instance['text'])){
            $text = $instance['text'];            
        }else{
            $text = '';
        }
        
        echo '<h2>Parerea ta conteaza, omule!</h2>';
        
        echo '<label>Scrie text aici:</label>';
        echo '<input name="'.$this->get_field_name('text').'" id="'.$this->get_field_name('text').'" type="text" class="widefat" value="'.$text.'">';
        echo '<br />';
        echo '<br />';
    }
    
    public function update($new_instance, $old_instance){
        // actualizeaza anumite campuri sau categorii
        $instance = array();
        
        $instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '' ;
        return $instance;
    }
}