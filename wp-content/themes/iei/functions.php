<?php
/* Clean up HEAD */
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');

/* Allow Menu Editing */
add_theme_support( 'menus' );

/* Allow Page Excerpts */
add_post_type_support('page','excerpt');

/* Remove CF7 Consta-load */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

add_filter('timber_context', 'add_wpcf7');
function add_wpcf7($context){
	$context['posts'] = Timber::get_posts();
	if($context['posts'][0]->post_name=="get-involved"){
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
		}
	 
		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}		
	}
	return $context;
}

/* Setup Admin Menus */
add_action('admin_menu', 'remove_menus');
function remove_menus () {
	$remove_menu_items = array(__('Posts'),__('Comments'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}

/* Add material to Timber context */
add_filter('timber_context', 'add_to_context');
function add_to_context($context){
	$context['menu'] = new TimberMenu();
	$context['posts'] = Timber::get_posts();

	if($context['posts'][0]->post_name=="our-partners"){
		$context['partners'] = Timber::get_posts(array('post_type' => 'partners', 'nopaging' => true));
	}
	if($context['posts'][0]->post_name=="our-team"){
		$context['members'] = Timber::get_posts(array('post_type' => 'board', 'nopaging' => true, 'orderby' => 'menu_order' ));
	}
	if($context['posts'][0]->post_name=="our-work"){
		$context['members'] = Timber::get_posts(array('post_type' => 'work', 'nopaging' => true, 'orderby' => 'menu_order' ));
	}		
	
	return $context;
}	

/* Remove marketing boxes */
function my_remove_meta_boxes() {
	$types = get_post_types();
	foreach($types as $type){
		remove_meta_box( 'wpcf-marketing', $type, 'side' );
	}
}
add_action( 'add_meta_boxes', 'my_remove_meta_boxes' );
 
/* Add SASS theme CSS */
add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );
function enqueue_theme_css(){
    wp_enqueue_style('default',get_template_directory_uri() . '/css/stylesheets/style.css');
}

/* Add scripts */
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