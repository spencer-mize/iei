<?php

add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );
function enqueue_theme_css(){
    wp_enqueue_style('default',get_template_directory_uri() . '/css/stylesheets/style.css');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "scripts_enqueue", 11);
function scripts_enqueue(){
	wp_deregister_script('jquery');
	if(preg_match('/(?i)msie [2-8]/',$_SERVER['HTTP_USER_AGENT'])) {
		wp_register_script('jquery', "http://code.jquery.com/jquery-1.11.4.min.js", false, null, true);   
	}else{
		wp_register_script('jquery', "http://code.jquery.com/jquery-2.1.3.min.js", false, null, true);   
	}	
	wp_register_script('bootstrap', get_template_directory_uri() . '/vendor/twbs/bootstrap-sass/assets/javascripts/bootstrap.min.js', array('jquery'), null, true); 
	wp_register_script('theme-script', get_template_directory_uri() . '/js/script.js', array('jquery','bootstrap'), null, true); 
	wp_enqueue_script('theme-script');	
}

?>