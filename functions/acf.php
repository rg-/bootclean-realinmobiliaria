<?php

if( function_exists('acf_add_options_page') ) {
	
	$args = array(
		'page_title' => __('Real Inmobiliaria Settings','realinmobiliaria'),
		'menu_slug' => 'realinmobiliaria-settings',
		'capability' => 'manage_options',
	);
	
	acf_add_options_page($args); 
	
}

if( function_exists('acf_add_local_field_group') ):


$real_property_settings__sub_fields = array();

	$real_property_settings__sub_fields[] = array(
			'key' => 'field_real_property_single_id',
			'label' => 'Página Propiedad Single',
			'name' => 'real_property_single_id',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		);

	$real_property_settings__sub_fields[] = array(
			'key' => 'field_real_property_page_id',
			'label' => 'Página Listado de Propiedades',
			'name' => 'real_property_page_id',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'id',
			'ui' => 1,
		);


$real_property_address_1__sub_fields = array(

	array(
			'key' => 'field_location_title_1',
			'label' => 'Dirección Título',
			'name' => 'location_title_1',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),

	array(
			'key' => 'field_location_street_1',
			'label' => 'Dirección calle',
			'name' => 'location_street_1',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	array(
			'key' => 'field_social_whatsapp',
			'label' => 'Whatsapp',
			'name' => 'social_whatsapp',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_social_phone',
			'label' => 'Teléfono',
			'name' => 'social_phone',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),   
		array(
			'key' => 'field_location_url_map',
			'label' => 'Dirección Mapa',
			'name' => 'location_url_map',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
);

$real_property_address_2__sub_fields = array(
	array(
			'key' => 'field_location_title_2',
			'label' => 'Dirección Título',
			'name' => 'location_title_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	array(
			'key' => 'field_location_street_2',
			'label' => 'Dirección calle',
			'name' => 'location_street_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		), 

	array(
			'key' => 'field_social_whatsapp_2',
			'label' => 'Whatsapp',
			'name' => 'social_whatsapp_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	array(
			'key' => 'field_social_whatsapp_3',
			'label' => 'Whatsapp',
			'name' => 'social_whatsapp_3',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_social_phone_2',
			'label' => 'Teléfono',
			'name' => 'social_phone_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		), 
		
		array(
			'key' => 'field_location_url_map_2',
			'label' => 'Dirección Mapa',
			'name' => 'location_url_map_2',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
);

acf_add_local_field_group(array(
	'key' => 'group_5d69a6c8c9163',
	'title' => 'Theme Options',
	'fields' => array(

		array (
			'key' => 'field_real_property_settings',
			'label' => __('Property Settings','realinmobiliaria'),
			'name' => 'real_property_settings',
			'type' => 'group',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => $real_property_settings__sub_fields,
		), 
		// GROUP END 

		array (
			'key' => 'field_real_property_address_1',
			'label' => __('Address 1','realinmobiliaria'),
			'name' => 'real_property_address_1',
			'type' => 'group',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => $real_property_address_1__sub_fields,
		), 
		// GROUP END 

		array (
			'key' => 'field_real_property_address_2',
			'label' => __('Address 2','realinmobiliaria'),
			'name' => 'real_property_address_2',
			'type' => 'group',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => $real_property_address_2__sub_fields,
		), 
		// GROUP END 

		array(
			'key' => 'field_google_map_API_KEY',
			'label' => 'Google Maps API Key',
			'name' => 'google_map_API_KEY',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_social_email',
			'label' => 'Email',
			'name' => 'social_email',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_social_facebook',
			'label' => 'Facebook',
			'name' => 'social_facebook',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_social_instagram',
			'label' => 'Instagram',
			'name' => 'social_instagram',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		
		array(
			'key' => 'field_footer_copy',
			'label' => 'Texto copyright',
			'name' => 'footer_copy',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'realinmobiliaria-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

/*

	Set the default "item_type" value for Sider component

*/
	
add_filter('acf/load_field/key=key__r_slider_item__type', function($field){

	$field['default_value'] = "cover";
	return $field;

});

/*

	Set the default "item_content" class value for Sider component

*/
	
add_filter('acf/load_field/key=key__slider__classes_item_content', function($field){

	$field['default_value'] = "d-flex justify-content-end align-items-end";
	return $field;

});