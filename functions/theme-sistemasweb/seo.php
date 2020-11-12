<?php
/*

	All in One SEO WP Plugin
	
	SEO TAGS filters 

*/

// define the aioseop_title callback 
// add the filter 
add_filter( 'aioseop_title', 'filter_aioseop_title', 10, 1 ); 

function filter_aioseop_title( $title ) { 
		$id = get_query_var('WPBC_id', null); 
		if(!empty($_GET['ref'])){
			$id = $_GET['ref'];
		}
  	if ( is_page('propiedad') && !empty($id) ) { 
  		$prop_args = get_property_args($id);  
  		$property_title = $prop_args['Título'] . ' -  Ref:' . $id; 
		  $site_title = get_bloginfo( 'name' );
		  $sep = '-'; //setting default separator if Admin didn't set it from backed
		  $title = $property_title . ' ' . $sep . ' ' . $site_title;
  	}
    return $title; 
}; 

add_filter( 'aioseop_description', 'filter_aioseop_description', 10, 1 ); 

function filter_aioseop_description( $description ) { 
		$id = get_query_var('WPBC_id', null); 
		if(!empty($_GET['ref'])){
			$id = $_GET['ref'];
		}
  	if ( is_page('propiedad') && !empty($id) ) { 
  		$prop_args = get_property_args($id);  
  		$property_title = $prop_args['Título']; 
		  
		  $description = $property_title . ' - ' . $prop_args['Localidad'] . ' - ' . WPBC_get_property_price($prop_args);
  	}
    return $description; 
}; 

add_filter( 'aioseop_canonical_url', 'filter_aioseop_canonical_url', 10, 1 ); 

function filter_aioseop_canonical_url( $canonical_url ) { 
		$id = get_query_var('WPBC_id', null); 
		if(!empty($_GET['ref'])){
			$id = $_GET['ref'];
		}
  	if ( is_page('propiedad') && !empty($id) ) { 
  		$prop_args = get_property_args($id);  
  		$property_title = $prop_args['Título']; 
		  
  		$propiedad_REF = !empty($prop_args['Referencia']) ? $prop_args['Referencia'] : '';
			
			/* 2020 */
			$propiedad_title = WPBC_get_languages($prop_args['Título'],false);
			$propiedad_slug = sanitize_title($propiedad_title); 

			$real_property_page_id = get_theme_option('real_property_single_id');   
			if( function_exists('qtrans_getLanguage') && defined('BC_ACF_QTRANSLATEX_ENABLED') && BC_ACF_QTRANSLATEX_ENABLED == true ){
				$real_property_page = WPBC_qtranxf_get_url_for_language(array('id'=>$real_property_page_id));
			}else{
				$real_property_page = get_permalink( $real_property_page_id );
			}  
			$canonical_url = $real_property_page.''.$propiedad_slug.'/'.$propiedad_REF; 
  	}
    return $canonical_url; 
}; 
  
function filter_aiosp_opengraph_default_image(){
		$id = get_query_var('WPBC_id', null); 
		if(!empty($_GET['ref'])){
			$id = $_GET['ref'];
		}
  	if ( is_page('propiedad') && !empty($id) ) { 
  		$prop_args = get_property_args($id);  
			$thumbnail = $prop_args['thumb'];
			$og = '<meta property="og:image" content="'.$thumbnail.'" />'; 
			$og .= '<meta property="twitter:image" content="'.$thumbnail.'" />'; 
			$og .= '<meta itemprop="image" content="'.$thumbnail.'" />'; 
			echo $og;
		}
}
add_action('wp_head', 'filter_aiosp_opengraph_default_image', 0);  