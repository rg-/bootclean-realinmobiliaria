<?php

add_action( 'wpcf7_init', 'custom_add_form_tag_wpbc_url' ); 
function custom_add_form_tag_wpbc_url() {
    wpcf7_add_form_tag( 'wpbc_url', 'custom_wpbc_url_form_tag_handler' ); // "clock" is the type of the form-tag
} 
function custom_wpbc_url_form_tag_handler( $tag ) {
	$field = '';

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
		    $link = "https"; 
		else
		    $link = "http";  
		// Here append the common URL characters. 
		$link .= "://";  
		// Append the host(domain name, ip) to the URL. 
		$link .= $_SERVER['HTTP_HOST'];  
		// Append the requested resource location to the URL 
		$link .= $_SERVER['REQUEST_URI'];

		$link = strtok($link, '?');
		$field = '<input type="hidden" name="'.$tag['basetype'].'" value="'.$link.'" />';
   
   return $field;
} 