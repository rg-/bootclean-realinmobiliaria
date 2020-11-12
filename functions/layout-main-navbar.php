<?php

add_filter('wpbc/filter/layout/main-navbar/defaults', 'CHILD_main_navbar', 10, 1);

function CHILD_main_navbar($args){

	$class_append = 'position-fixed brand-defult bg-white navbar-expand-lg';
	$args['class'] = 'navbar navbar-expand-aside collapse-right '.$class_append;
	
	$logo_big = get_stylesheet_directory_uri().'/images/theme/logo-realinmobiliaria.png';

	$args['navbar_brand']['class'] = 'd-block gpl-1 gpl-lg-0'; 
	$args['navbar_brand']['title'] = '';   
	$args['navbar_brand']['image_alt'] = get_bloginfo('title');
	$args['navbar_brand']['image_class'] = 'navbar-brand-img';

	$brand .= '<img class="brand-img-default ' . $args['navbar_brand']['image_class']. '" src="' . $logo_big . '" alt="'. $args['navbar_brand']['image_alt'] .'"/>';

	$args['navbar_brand']['image'] = '';
	$args['navbar_brand']['title'] = $brand;

	$args['navbar_toggler']['class'] = 'toggler-primary gpr-1 gpr-lg-0';
	$args['navbar_toggler']['type'] = 'animate';
	$args['navbar_toggler']['effect'] = 'cross';

	$args['affix'] = true;

	$affix_simulate = true; 
	$affix_breakpoint = 'xs';

	$args['affix_defaults']['breakpoint'] = $affix_breakpoint;
	$args['affix_defaults']['simulate'] = $affix_simulate;
	// $args['nav_attrs'] = " data-affix-target='#main-content' ";
	$params = WPBC_layout__main_page_header_defaults();
	if(!empty($params['template_id'])){
		
	}

	return $args;

}

add_filter('wp_nav_menu_items', 'CHILD_wp_nav_menu_items', 10, 2);

function CHILD_wp_nav_menu_items($items, $args){
	
	if( $args->theme_location == 'primary' ){   
		$items_class = 'navbar-social';
		$items_icons = '';
		ob_start(); 
		WPBC_get_template_part('theme/reference-search-form');
		echo "<div class='social-links'>";
		WPBC_get_template_part('theme/social-link-whatsapp');
		WPBC_get_template_part('theme/social-link-facebook');
		WPBC_get_template_part('theme/social-link-instagram'); 
		echo "</div>";
		$items_icons = ob_get_contents(); 
		ob_end_clean(); 
		$items .= '<li class="d-lg-flex justify-content-start justify-content-lg-between align-items-center gpt-3 gpt-lg-0 gpx-lg-3 gml-lg-1 '.$items_class.'">'.$items_icons.WPBC_get_lang_selector().'</li>';



	}
	
	return $items;

}


/*

	Make dropdown hover default for navbar

	Later use this to manage from admin

*/

add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth){ 
	//$atts['data-scrollify-target'] = '#main-navbar';
	//$atts['class'] = $atts['class'].' scroll-to ';
	if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $args->depth > 1 ) {
		//$atts['data-target'] = '#dm';
		$atts['data-hover'] = 'dropdown';
		$atts['data-hover-respond'] = 'md';
	}  
	return $atts;
}, 10, 4); 