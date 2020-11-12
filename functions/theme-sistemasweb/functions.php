<?php

global $WPBC_SW_CONFIG;

/* 

	Filter text content for qTranslate if actived 

*/
	/* 2020 */
function WPBC_get_languages($text, $echo=true){
	if(function_exists('qtrans_use')){
		global $q_config; 
		$current_lang = $q_config['language'];
		$text = qtrans_use($current_lang, $text,false);  
	} 
	if($echo){
		echo $text;
	}else{
		return $text;
	} 
}
/*

	$id corresponde al numero de Referencia cargado en el sistema

	Todas las demas funciones dependen de esta, usada en los template-parts tambien

*/
function get_property_args($id){  
	if(!empty($id)){
		$property = apply_filters(
		    'fetch_property',
		    $id
		);
		if (is_object($property) && get_class($property) == 'WP_Error'){
			return false; 
		}
		$property = apply_filters('wpbc/sistemasweb/property/args', $property, $id );
		return $property; 
	}
}

add_action( 'template_redirect', 'get_property_template_redirect' );
function get_property_template_redirect() {
	 
  if ( !empty($_GET['ref']) ) {
  	$prop_args = get_property_args($_GET['ref']);
  	$redirect_url = WPBC_get_property_url($prop_args);
    wp_redirect( $redirect_url, 301 );
    exit();
  }
}

/*

	WPBC_get_property_* Property functions

*/
 
function WPBC_get_property_tipo_propiedad($args=array()){
	$Tipo_Propiedad = $args['Tipo_Propiedad']; 
	$Tipo_Propiedad = apply_filters('wpbc/custom-filter/Tipo_Propiedad', $Tipo_Propiedad);
	return $Tipo_Propiedad;
}
function WPBC_get_property_operation($args=array()){
	$operation = 'venta'; // default
	if(WPBC_is_property_alquiler($args)){
		$operation = 'alquiler';
	}
	if(WPBC_is_property_alquiler_temporario($args)){
		$operation = 'alquiler_temporario';
	}
	return $operation;
}
function WPBC_get_property_operations($args=array()){
	$operations = array(); // default
	if(WPBC_is_property_venta($args)){
		$operations[] = 'venta';
	}
	if(WPBC_is_property_alquiler($args)){
		$operations[] = 'alquiler';
	}
	if(WPBC_is_property_alquiler_temporario($args)){
		$operations[] = 'alquiler_temporario';
	}
	return $operations;
}
function WPBC_get_property_meta_cats($args=array()){

	$operations = WPBC_get_property_operations($args); 
	$operations_temp = array();
	foreach ($operations as $operation) {
		$operation = apply_filters('wpbc/custom-filter/operation', $operation);
		$operations_temp[] = $operation;
	} 

	$Tipo_Propiedad = WPBC_get_property_tipo_propiedad($args);   
 	$meta_cats = strtoupper(implode(' / ',$operations_temp)).' / '.strtoupper($Tipo_Propiedad);
	return $meta_cats;
}

function WPBC_get_property_url($args=array(),$bk=true){
	global $global_back_url;

	$propiedad_REF = !empty($args['Referencia']) ? $args['Referencia'] : '';
	
	$propiedad_title = WPBC_get_languages($args['Título'],false);
	$propiedad_slug = sanitize_title($propiedad_title);  

	$real_property_page_id = get_theme_option('real_property_single_id');   
	
	if( WPBC_is_qtrans() ){
		$real_property_page = WPBC_qtranxf_get_url_for_language(array('id'=>$real_property_page_id));
	}else{
		$real_property_page = get_permalink( $real_property_page_id );
	} 
	
	$property_url = $real_property_page.''.$propiedad_slug.'/'.$propiedad_REF;
 
	if(!empty($global_back_url)){
		$property_url = $property_url . '?bk='. urlencode($global_back_url);
	}

	return $property_url;
}

function WPBC_get_property_back_url($args=array()){
	$real_property_page = get_permalink(get_theme_option('real_property_page_id')); 
	$property_back_url = $real_property_page.'?operation=V';

	if(WPBC_is_property_alquiler($args)) {
		$property_back_url = $real_property_page.'?operation=A'; 
	}
	if(WPBC_is_property_alquiler_temporario($args)) {
		$property_back_url = $real_property_page.'?operation=A'; 
	}  
	if(!empty($_GET['bk'])){
		$property_back_url = $_GET['bk']; 
	} 
	return $property_back_url;
}

function WPBC_get_property_prices_args($args=array()){
	$prop_prices_args = array(
		'venta' => $args['venta'],
		'alquiler' => $args['alquiler'],
		'Precio_Venta' => $args['Precio_Venta'],
		'Precio_Temporada' => $args['Precio_Temporada'], 
		'Revelion' => $args['Revelion'],
		
		'Enero' => $args['Enero'],
		'Precio_alquiler' => $args['Precio_alquiler'],
		'Enero_Squincena' => $args['Enero_Squincena'],
		
		'Febrero' => $args['Febrero'],
		'Febrero_Pquincena' => $args['Febrero_Pquincena'],
		'Febrero_Squincena' => $args['Febrero_Squincena'],
		
		'Alquiler_Anual' => $args['Alquiler_Anual'],
	);  
	return $prop_prices_args; 
}

function WPBC_get_property_currency($currency='U$S', $args=array()){
	$currency = apply_filters('wpbc/custom-filter/currency', $currency, $args );
	return $currency;
}

function WPBC_get_property_price($args, $if_query_vars=false){ 
		$get_precio_tag = 'Precio_Venta';
		if(!empty($args['Precio_alquiler'])){
			$get_precio_tag = 'Precio_alquiler';
		}
		if(!empty($args['Precio_Temporada'])){
			$get_precio_tag = 'Precio_Temporada';
		}
		if(!empty($args['Precio_Venta'])){
			$get_precio_tag = 'Precio_Venta';
		}
		if($if_query_vars && isset($_GET['operation']) ){
			$operation = $_GET['operation']; // V venta T alquiler A alquiler anual
			if($operation=='V' && !empty($args['Precio_Venta'])){
				$get_precio_tag = 'Precio_Venta';
			}
			if($operation=='T'){
				if(!empty($args['Precio_Temporada'])) $get_precio_tag = 'Precio_Temporada';
				if(!empty($args['Precio_alquiler'])) $get_precio_tag = 'Precio_alquiler';
			}
			if($operation=='A' && !empty($args['Precio_alquiler'])){
				$get_precio_tag = 'Precio_alquiler';
			}
		}
		$currency = WPBC_get_property_currency();
		return '<span data-precio_tag="'.$get_precio_tag.'">'.$currency.' '.number_format($args[$get_precio_tag], 0, ',', '.').'</span>';  
} 

function WPBC_get_property_features($args, $features_args=array()){
	$defaults = array(
		'tag' => 'span',
		'class' => '',
		'separator' => ' ',
		'use_icons' => false,
		'use_only' => array()
	);

	$features_args = wp_parse_args( $features_args, $defaults );
 
	$property_features = ''; 
 
	$default_features = apply_filters('wpbc/custom-filter/default_features', array());

	$use_only = $features_args['use_only'];
	 
	foreach ($default_features as $k=>$v) {
		if(!empty($args[$k]) && $args[$k] != 'N'){
			$f_value = $args[$k]; 
			$title = $f_value != 'S' ? $f_value : ''; 
			$s_title = $v['title'];
			if($f_value < 2){
				$s_title = $v['title_single'];
			} 
			$title .= ' '. ( !empty($s_title) ? $s_title : $v['meta'] );
 			$use = false;
			if(in_array($k,$use_only) && !empty($use_only) ) { 
				$use = true;  
			}
			if(empty($use_only)){
				$use = true;   
			}
			
			if($use){
				$tag = $features_args['tag'];
				$class = $k.( !empty($features_args['class']) ? ' '.$features_args['class'] : '' );
				if($features_args['use_icons']){
					$k = (!empty($v['icon_class'])) ? $v['icon_class'] : $k;
					$icon_class = 'feature-icon bcicon-'.$k.( !empty($features_args['icon_class']) ? ' '.$features_args['icon_class'] : '' );
					$title = '<i class="'.$icon_class.'"/></i> '.$title;
				}
				$property_features .= '<'.$tag.' class="feature '.$class.'">'.$title.'</'.$tag.'>'.$features_args['separator']; 
			}

		}
	}

	return $property_features;
}


/*

	WPBC_is_* Conditional functions

*/

function WPBC_is_property_venta($args=array()){
	$prop_prices_args = WPBC_get_property_prices_args($args);
	return (isset($prop_prices_args['venta']) && $prop_prices_args['venta']=='S') ? true : false;
}
function WPBC_is_property_alquiler($args=array()){
	$prop_prices_args = WPBC_get_property_prices_args($args);
	return (isset($prop_prices_args['alquiler']) && $prop_prices_args['alquiler']=='S') ? true : false;
}
function WPBC_is_property_alquiler_temporario($args=array()){
	$prop_prices_args = WPBC_get_property_prices_args($args);
	return (isset($prop_prices_args['Precio_Temporada']) && $prop_prices_args['Precio_Temporada']=='S') ? true : false;
} 
function WPBC_is_property_destacado($args=array()){ 
	return (isset($prop_args['Destacado']) && $prop_args['Destacado']=='S') ? true : false;
}


/*

	Shortcodes

*/


function WPBC_get_theme_icons_FX($atts, $content = null){
	$out = '';
	extract(shortcode_atts(array( 
		'args' => '',
	), $atts));
	$features =  apply_filters('wpbc/custom-filter/default_features', array());
	$amenities_list = apply_filters('wpbc/custom-filter/amenities_list', array(), false);
	$out .= '<div class="row">';
	foreach($features as $k=>$v){ 
		if($v['icon_class']){
			$icon = $v['icon_class'];
		}else{
			$icon = $k;
		}
		$iconized_tag = '<i class="am-icon text-primary xl bcicon-'.$icon.'"></i>'; 
		$out .='<div class="col-md-3 d-flex align-items-center">' .$iconized_tag . $k . '</div>';
	}
	foreach($amenities_list as $k){ 
		$iconized_tag = '<i class="am-icon text-primary xl bcicon-'.$k.'"></i>'; 
		$out .='<div class="col-md-3 d-flex align-items-center">' .$iconized_tag . $k . '</div>';
	}
	$out .= '</div>';
	return $out;

}
add_shortcode('WPBC_get_theme_icons', 'WPBC_get_theme_icons_FX');