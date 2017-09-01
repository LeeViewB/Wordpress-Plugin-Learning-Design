<?php

/*
    Plugin Name: Ipsum Generator
    Plugin URI: http://leeview.cu.cc/
    Author: QuanChi Romanul
    Author URI: https://google.com
    Description: Intr-o zi n-am fost. In alta zi am fost. Per total, a fost o zi acceptabila.
    Shortcode example [ipsum paragrafe=5 lungime= short | medium | long | verylong]
*/

add_shortcode('ipsum','generate_ipsum');

function generate_ipsum($atts){
    
    if(empty($atts['type'])){
        $type = 'text';
    }else{
        $type = $atts['type'];
        
    }  
    
    switch($type){
        case 'text':
            if(empty($atts['paragrafe'])){
                $paragrafe = 3;
            }else{
                $paragrafe = $atts['paragrafe'];

            }   


            if(empty($atts['lungime'])){
                $lungime = medium;
            }else{
                $lungime = $atts['lungime'];

            }

            $ipsum = file_get_contents('http://loripsum.net/api/'.$paragrafe.'/'.$lungime);

            echo $ipsum;
            break;
    
        case 'img':
            if(empty($atts['width'])){
                $width = 275;
            }else{
                $width = $atts['width'];

            }


            if(empty($atts['height'])){
                $height = 65;
            }else{
                $height = $atts['height'];

            }

            echo "<br /><img src='http://placehold.it/".$width.'x'.$height."' />";

            break;
    }
}