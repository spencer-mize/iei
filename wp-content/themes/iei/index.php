<?php

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}
$context = Timber::get_context();
$templates = array( 'index.twig' );
if (is_front_page() || is_home() ) {
	array_unshift( $templates, 'home.twig' );
}else if(is_single()){
	$context['post'] = $context['posts'][0];
	$type = $context['post']->post_type;
	$templates = array('page-'.$context['posts'][0]->post_name.'.twig','single-'.$type.'.twig','single.twig','index.twig');
}else if(is_page()){
	$templates = array('page-'.$context['posts'][0]->post_name.'.twig','page.twig','index.twig');
}
Timber::render( $templates, $context );

?>