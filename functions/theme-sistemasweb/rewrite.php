<?php 


function real_add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','real_add_cors_http_header');

/*

	propiedad query_vars

*/
add_filter('query_vars', 'add_state_var', 99, 1);
function add_state_var($vars){
		$vars[] = 'lang';
    $vars[] = 'WPBC_slug';
    $vars[] = 'WPBC_id';   
    return $vars;
}

/* 	
	2020
	qTranslate Slug Duplicate content Fix

*/

if(function_exists('qtrans_getLanguage')){

	add_action('init', 'WPBC_qtranslate_output_buffer');
	function WPBC_qtranslate_output_buffer() {
		ob_start();
	}
	add_action('wp_head','WPBC_qtranslate_redirect_if_duplicate');
	function WPBC_qtranslate_redirect_if_duplicate(){

		global $post;
		if(is_front_page() || is_admin()){
			return;
		}
		if(!empty($post->post_parent)){
			return;
		}
		if('post'==get_post_type($post)){
			return;
		}


		$WPBC_id = get_query_var('WPBC_id', null); 
		$WPBC_slug = get_query_var('WPBC_slug', null); 
		$prop_args = get_property_args($WPBC_id);    
		global $q_config; 
	  $current_lang = $q_config['language'];
	  $propiedad_title = WPBC_get_languages($prop_args['Título'],false);
		$propiedad_slug = sanitize_title($propiedad_title);  
	  if($propiedad_slug != $WPBC_slug){
	  	$qtranslate_current_url = WPBC_get_property_url($prop_args,false);
	  	wp_redirect($qtranslate_current_url,301);
	          		exit;
	  } 
	} 
}

/*

	propiedad custom_rewrite_tag

	Change url used for each property, including slug, ref, etc.

*/

add_action('init', 'custom_rewrite_tag', 90, 0);

function custom_rewrite_tag(){
	
	$id = get_query_var('WPBC_id', null);  
	if(empty($id)){
		$id = $_GET['WPBC_id'];
	}
	
	$prop_args = get_property_args($id); 
	
	$slug = sanitize_title($prop_args['Título']);

	$real_property_page_id = get_theme_option('real_property_single_id');
	
	$pagename = get_post_field( 'post_name', $real_property_page_id );

	if( WPBC_is_qtrans() ){

		global $q_config; 
		$enabled_languages = $q_config['enabled_languages'];  
		$default_language = $q_config['default_language'];
 
		foreach ($enabled_languages as $key => $value) {
			$slugArray = get_post_meta( $real_property_page_id, '_qts_slug_'.$value );
			$qTpagename = !empty($slugArray) ? $slugArray[0] : "";
			add_rewrite_rule('^'.$qTpagename.'/([^/]+)/([0-9]+)/?$','index.php?pagename='.$pagename.'&WPBC_slug=$matches[1]&WPBC_id=$matches[2]','top');
		} 
		
	} 
	
	add_rewrite_rule('^'.$pagename.'/([^/]+)/([0-9]+)/?$','index.php?pagename='.$pagename.'&WPBC_slug=$matches[1]&WPBC_id=$matches[2]','top');
 
}    