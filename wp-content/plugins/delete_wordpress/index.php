<?php

/*
    Plugin Name: Kill Wordpress Plugin
    Plugin URI: http://leeview.cu.cc/
    Author: LeeView
    Author URI: https://google.com
    Description: Intr-o zi am fost. In alta zi nu am fost. Per total, a fost o zi buna.
*/


add_shortcode('afisare_text','kwp_afisare_text');
add_filter('the_title','kwp_change_title');
add_filter('the_content','kwp_facebook_like');



function kwp_afisare_text(){
    
    echo '<br /> <img src="http://placehold.it//350x150">';
}

function kwp_change_title($titlu){
    
    echo $titlu.' $$$';
}

function kwp_facebook_like ($content){
    
    echo do_shortcode($content);
    echo '<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fcringechannel&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=100146883885063" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
}