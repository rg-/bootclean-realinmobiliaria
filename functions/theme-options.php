<?php

/* ----------------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------------- */
/* 
	Do not use Cleaner Login custom branding feature 

add_filter('BC_cleaner__login', function(){
	return false; 
});*/
/* ----------------------------------------------------------------------------------------------- */

/*

	Show/Hide the Bootclean Debug Bar on WP front end templates.

*/
add_filter('WPBC_layout_debug', function(){
	return false; 
}); 

/* ----------------------------------------------------------------------------------------------- */
/*

	Show/Hide the Bootclean Options Page on WP Admin

*/
add_filter('WPBC_options_show_menu',function(){
	return true; // false default
}, 10, 1);	

/* ----------------------------------------------------------------------------------------------- */


/* ----------------------------------------------------------------------------------------------- */
/*

	Enable/Disable the Template post type.

*/
add_filter('WPBC_template_builder__post_type_show_in_menu',function(){
	return true; // false default
}, 10, 1);

/* ----------------------------------------------------------------------------------------------- */


/* ----------------------------------------------------------------------------------------------- */

/*

	Set the default values for the Bootclean -> Admin Settings -> Login Screen

*/
add_filter('WPBC_set_default_option__'.'bc-options--admin-login--enable',function($option, $k){
	$option['std'] = '1';
	return $option;
}, 10, 2);

add_filter('WPBC_set_default_option__'.'bc-options--admin-login--brand-logo',function($option, $k){
	$option['std'] = CHILD_THEME_URI.'/images/theme/logo-realinmobiliaria.png';
	return $option;
}, 10, 2);
add_filter('WPBC_set_default_option__'.'bc-options--admin-login--brand-logo-width',function($option, $k){
	$option['std'] = 232;
	return $option;
}, 10, 2);
add_filter('WPBC_set_default_option__'.'bc-options--admin-login--brand-logo-height',function($option, $k){
	$option['std'] = 41;
	return $option;
}, 10, 2);

add_filter('WPBC_set_default_option__'.'bc-options--admin-login--body-background',function($option, $k){
	$option['std']['color'] = '#fff';
	return $option;
}, 10, 2);


add_filter('WPBC_set_default_option__'.'bc-options--admin-login--body-text-color',function($option, $k){
	$option['std'] = '#d2b789';
	return $option;
}, 10, 2);

add_filter('WPBC_set_default_option__'.'bc-options--admin-login--body-text-color-hover',function($option, $k){
	$option['std'] = '#d2b789';
	return $option;
}, 10, 2);

/* ----------------------------------------------------------------------------------------------- */ 


