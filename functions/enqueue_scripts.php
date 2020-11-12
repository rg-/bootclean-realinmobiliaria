<?php

add_filter('BC_enqueue_scripts__version', function(){
	return '9.0.5';
},10,1);

add_filter('wpbc/filter/version',function(){
	return '9.0.0';
},10,1);

/* ----------------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------------- */

	function real_child_wp_enqueue_scripts() {   
		
		/**
		 * Add custom js
		 */ 
		wp_register_script( 'real-customs', get_stylesheet_directory_uri() .'/js/customs.js', array('jquery','main'), null, true);
		wp_enqueue_script( 'real-customs' ); 
 
	}
	add_action( 'wp_enqueue_scripts', 'real_child_wp_enqueue_scripts', 0 );

 

/* ----------------------------------------------------------------------------------------------- */ 
/* ----------------------------------------------------------------------------------------------- */