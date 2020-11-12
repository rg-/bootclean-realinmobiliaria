<?php   
/*

	Filter api results localization

*/

	add_filter('wpbc/custom-filter/default_features', function($default_features){
		$default_features = array( 
			'Dormitorios' => array( 
					'title'=> __('Bedrooms','realinmobiliaria'),
					'title_single'=> __('Bedroom','realinmobiliaria')
				), 
			'Baños' => array( 
					'title'=> __('Bathrooms','realinmobiliaria'),
					'title_single'=> __('Bathroom','realinmobiliaria'),
					'icon_class'=>'Banos',
				), 
			'Mts_Edificado_Totales' => array( 
					'title'=>'m2'
				),
			'Mts_Terreno' => array( 
					'title'=>'m2'
				),
			'Cochera' =>  array( 
					'title'=> __('Garages','realinmobiliaria'),
					'title_single'=> __('Garage','realinmobiliaria')
				), 
		);  
		return $default_features; 
	},10,1);

	add_filter('wpbc/custom-filter/amenities_list', function($amenities_list, $prop_args){

		$amenities_list = array(
			'Vista_al_mar' => $prop_args['Vista_al_mar'],
			'Primera_Fila' => $prop_args['Primera_Fila'],
			'Dependencia_de_servicio' => $prop_args['Dependencia_de_servicio'],
			'Piscina' => $prop_args['Piscina'],
			'Calefaccion' => $prop_args['Calefaccion'],
			'Parrillero_propio' => $prop_args['Parrillero_propio'],
			'Financiacion' => $prop_args['Financiacion'],
			'Emprendimiento_en_Pozo' => $prop_args['Emprendimiento_en_Pozo'], 
			'Living' => $prop_args['Living'],
			'Comedor' => $prop_args['Comedor'],
			'Cocina' => $prop_args['Cocina'],
			'Balcon' => $prop_args['Balcon'],
			'Camas' => $prop_args['Camas'],
			'Mucama' => $prop_args['Mucama'], 
			'Camas_dobles' => $prop_args['Matrimoniales'], 
			'Camas_simples' => $prop_args['Single'],  
			'Capacidad' => $prop_args['Capacidad'], 
			'Seguridad' => $prop_args['Seguridad'], 
			'Wifi' => $prop_args['Wifi'], 
			'Alarma' => $prop_args['Alarma'], 
			'Tv_cable' => $prop_args['Tv_cable'], 
			'Lavarropas' => $prop_args['Lavarropas'], 
			'Heladera' => $prop_args['Heladera'], 
			'Microondas' => $prop_args['Microondas'], 
			'Lavavajillas' => $prop_args['Lavavajillas'], 
			'Ropa_blanca' => $prop_args['Ropa_blanca'], 
			'Canchas' => $prop_args['Canchas'], 
			'Terrazas' => $prop_args['Terrazas'], 
			'Toilette' => $prop_args['Toilette'], 
		); 

		if($prop_args==false){
			$amenities_list_temp = array();
			foreach($amenities_list as $k=>$v){
				$amenities_list_temp[] = $k;
			}
			$amenities_list = $amenities_list_temp;
		}

		return $amenities_list;

	},10,2);

	add_filter('wpbc/custom-filter/amenities_title', function($amenities_title, $prop_args){
 		// ej http://real.sistemasweb.uy/ws_propiedad/ws_propiedad.php?user_id=real_user&user_pass=real*20prop&propiedad=4953
		if($amenities_title == 'Vista_al_mar'){
			$amenities_title = __('Seaview','realinmobiliaria');
		}
		if($amenities_title == 'Primera_Fila'){
			$amenities_title = __('First row','realinmobiliaria');
		}
		if($amenities_title == 'Dependencia_de_servicio'){
			$amenities_title = __('Service unit','realinmobiliaria');
		}
		if($amenities_title == 'Piscina'){
			$amenities_title = __('Pool','realinmobiliaria');
		}
		if($amenities_title == 'Calefaccion'){
			$amenities_title = __('Heating','realinmobiliaria');
		}
		if($amenities_title == 'Parrillero_propio'){
			$amenities_title = __('Own grill','realinmobiliaria');
		}
		if($amenities_title == 'Financiacion'){
			$amenities_title = __('Financing','realinmobiliaria');
		}
		if($amenities_title == 'Emprendimiento_en_Pozo'){
			$amenities_title = __('Entrepreneurship in Well','realinmobiliaria');
		}
		if($amenities_title == 'Living'){
			$amenities_title = __('Living room','realinmobiliaria');
		}
		if($amenities_title == 'Comedor'){
			$amenities_title = __('Dinning room','realinmobiliaria');
		}
		if($amenities_title == 'Cocina'){
			$amenities_title = __('Kitchen','realinmobiliaria');
		}
		if($amenities_title == 'Balcon'){
			$amenities_title = __('Balcony','realinmobiliaria');
			if( !empty($prop_args['Balcon_tipo'])){
				$amenities_title = $prop_args['Balcon_tipo'];
			} 
		}
		if($amenities_title == 'Camas'){
			$amenities_title = __('Beds','realinmobiliaria');
		}
		if($amenities_title == 'Mucama'){
			$amenities_title = __('Maid - Clean service','realinmobiliaria');
		}
		if($amenities_title == 'Camas_dobles'){
			$amenities_title = __('Double beds','realinmobiliaria');
		}
		if($amenities_title == 'Camas_simples'){
			$amenities_title = __('Single beds','realinmobiliaria');
		}
		
		if($amenities_title == 'Capacidad'){
			$amenities_title = __('Capacity','realinmobiliaria');
		}
		if($amenities_title == 'Seguridad'){
			$amenities_title = __('Security','realinmobiliaria');
		}
		if($amenities_title == 'Wifi'){
			$amenities_title = __('Wifi','realinmobiliaria');
		}
		if($amenities_title == 'Alarma'){
			$amenities_title = __('Alarm','realinmobiliaria');
		}
		if($amenities_title == 'Tv_cable'){
			$amenities_title = __('Cable TV','realinmobiliaria');
		}
		if($amenities_title == 'Lavarropas'){
			$amenities_title = __('Washing machine','realinmobiliaria');
		}
		if($amenities_title == 'Heladera'){
			$amenities_title = __('Refrigerator','realinmobiliaria');
		}
		if($amenities_title == 'Microondas'){
			$amenities_title = __('Microwave oven','realinmobiliaria');
		}
		if($amenities_title == 'Lavavajillas'){
			$amenities_title = __('Dishwasher','realinmobiliaria');
		}
		if($amenities_title == 'Ropa_blanca'){
			$amenities_title = __('White clothes','realinmobiliaria');
		} 
		if($amenities_title == 'Canchas'){
			$amenities_title = __('Courts','realinmobiliaria');
			if( !empty($prop_args['Canchas_tipo'])){
				$amenities_title = $prop_args['Canchas_tipo'];
			}
		} 
		if($amenities_title == 'Terrazas'){
			$amenities_title = __('Terraces','realinmobiliaria');
		} 
		if($amenities_title == 'Toilette'){
			$amenities_title = __('Toilette','realinmobiliaria');
		} 



		
		return $amenities_title; 
	},10,2);

	add_filter('wpbc/custom-filter/operation', function($operation){
		/*
	
		private $operations = [
            1 => 'Venta',
            2 => 'Alquiler anual',
            3 => 'Alquiler temporario',
        ];

		*/
		if($operation == 'venta'){
			$operation = __('Sale','realinmobiliaria');
		}
		if($operation == 'alquiler'){
			$operation = __('Rent','realinmobiliaria');
		}
		if($operation == 'alquiler_temporario'){
			$operation = __('Rent','realinmobiliaria');
		}
		return $operation; 
	},10,1);

	add_filter('wpbc/custom-filter/Tipo_Propiedad', function($Tipo_Propiedad){
		/*

		private $propertyTypes = [
	      1 => 'Casa',
	      2 => 'Departamento',
	      3 => 'Campo',
	      4 => 'Chacra',
	      5 => 'Local',
	      6 => 'Terreno',
	      7 => 'Barrio Privado',
	      8 => 'Hotel'
	  ];

		*/
		if($Tipo_Propiedad == 'Casa'){
			$Tipo_Propiedad = __('House','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Departamento'){
			$Tipo_Propiedad = __('Apartments','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Campo'){
			$Tipo_Propiedad = __('Land','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Chacra'){
			$Tipo_Propiedad = __('Chacra','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Terreno'){
			$Tipo_Propiedad = __('Field','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Barrio Privado'){
			$Tipo_Propiedad = __('Private neighborhood','realinmobiliaria');
		}
		if($Tipo_Propiedad == 'Hotel'){
			$Tipo_Propiedad = __('Hotel','realinmobiliaria');
		}
		return $Tipo_Propiedad; 
	},10,1);



/*

	Share tags

*/

add_filter('wpbc/filter/post/share/permalink', 'wpbc_share_permalink', 10, 1 ); 
function wpbc_share_permalink($permalink){
	$id = get_query_var('WPBC_id', null); 
	if (is_page('propiedad') && !empty($id) ) { 
		$prop_args = get_property_args($id);
		$propiedad_REF = !empty($prop_args['Referencia']) ? $prop_args['Referencia'] : '';
		
		$propiedad_title = WPBC_get_languages($prop_args['Título'],false);
		$propiedad_slug = sanitize_title($propiedad_title);  

		$real_property_page_id = get_theme_option('real_property_single_id');   
		if( WPBC_is_qtrans() ){
			$real_property_page = WPBC_qtranxf_get_url_for_language(array('id'=>$real_property_page_id));
		}else{
			$real_property_page = get_permalink( $real_property_page_id );
		}  
		$permalink = $real_property_page.''.$propiedad_slug.'/'.$propiedad_REF; 
  }
	return $permalink;
}

add_filter('wpbc/filter/post/share/title', 'wpbc_share_title', 10, 1 ); 
function wpbc_share_title($title){
	$id = get_query_var('WPBC_id', null); 
	if (is_page('propiedad') && !empty($id) ) { 
		$property_args = get_property_args($id);
		
		/* 2020 */
		$title = WPBC_get_languages($property_args['Título'],false);
  }
	return $title;
} 