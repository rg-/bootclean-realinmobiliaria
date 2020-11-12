<?php

/*
	Register a new nav menu "secondary" for use at foooter
*/
add_action( 'after_setup_theme', function(){ 
	register_nav_menus( array(
		'secondary' => __( 'Footer Menu', 'passadore' ),
	) ); 
} ); 