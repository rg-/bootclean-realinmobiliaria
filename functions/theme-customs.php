<?php   
/*
add_action('wpbc/layout/body/start', function(){
	global $start_time;
	$start_time = microtime(true);   
},5);  
add_action('wpbc/layout/body/end', function(){
	global $start_time;
	echo 'This page was generated in: '.number_format(microtime(true) - $start_time, 2).' seconds.';   
},99);
*/
function REAL_WPBC_get_image_src_FX($atts, $content = null){
	extract(shortcode_atts(array(
		"id" => 0,
		"size" => 'large', 
		"icon" => false,
		"type" => '0',
	), $atts));

	if(!empty($id)){
		$url = wp_get_attachment_image_src( $id, $size, $icon ); 
		return $url[$type];
	}
}

add_shortcode('WPBC_get_image_src', 'REAL_WPBC_get_image_src_FX');

/*
	
	ACF required 
	Add custom menu item (admin) text input for adding parameters into the href link parameter

	TODO: Move to bootstrap core as Megamenu addon. !!!!!!!!!!!!

*/

if(function_exists('acf_add_local_field_group')){
	$nav_params_fields = array(
		array (
		'key' => 'field_nav_menu_item_params',
		'label' => 'Parameters',
		'name' => 'nav_menu_item_params',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array (
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
	);
	acf_add_local_field_group(array(
		'key' => 'wpbc_group__nav_menu_item_params',
		'title' => 'Params',
		'fields' => $nav_params_fields,
		'location' => array(
			array(
				array(
					'param' => 'nav_menu_item',
					'operator' => '==',
					'value' => 'all',
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

	// Filter menu_link_attributes to change the href value adding the params, if, used.

	add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth){  
		$nav_menu_item_params = WPBC_get_field('nav_menu_item_params', $item->ID);
		if(!empty($nav_menu_item_params)){
			$atts['data-params'] = $nav_menu_item_params;
			$atts['href'] = $atts['href'].$nav_menu_item_params;
		}  
		return $atts;
	}, 10, 4); 
	add_filter( 'nav_menu_css_class', function ( $classes, $item, $args ) {
			//
			 
			$post = get_post($item->object_id);
			if(!empty($post)){
				$classes[] = $post->post_type . '-' . $post->post_name; 
				$nav_menu_item_params = WPBC_get_field('nav_menu_item_params', $item->ID);
				if(!empty($nav_menu_item_params)){
					$classes[] = 'has-params';
					$url_components = parse_url($nav_menu_item_params);
					parse_str($url_components['query'], $params); 
					foreach ($params as $key => $value) {
						$classes[] = $key .'-'. $value;
					} 
					
				}
			} 
	    return $classes;

	}, 10, 3 );

	// Adding pagename & the Params as "key-value" format into Body Class
	
	add_filter( 'body_class', 'WPBC_add_slug_body_class' );

	function WPBC_add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		} 
		$basename = basename($_SERVER['REQUEST_URI']); 
		if(!empty($basename)){
			$classes[] = 'has-params';
			$url_components = parse_url($basename);
			parse_str($url_components['query'], $params); 
			foreach ($params as $key => $value) {
				$classes[] = $key .'-'. $value;
			} 
		}
		return $classes;
	}  

}

// USED ??
add_filter('WPBC_widgets_init__defaults', function ($defatuls_widgets){
	$defatuls_widgets[] = array(
		'name'          => 'Mailchimp Area',
		'id'            => 'mailchimp-area',
		'description'   => '',
		'class'         => 'wpbc-widget', // ?? This one is a myst?
		'before_widget' => '<div class="widget-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="section-title">',
		'after_title'   => '</h4>',
	); 
	return $defatuls_widgets;

},10,1);

function get_theme_icons($name='', $color='', $format='png'){
	if(!empty($name)){
		if(!empty($color)) $color = '-'.$color;
		$icon = get_stylesheet_directory_uri().'/images/icons/'.$name.''.$color.'.'.$format.'';
		return $icon;
	}
}

function get_theme_option($option){
	// back_property_button_link
	// google_map_API_KEY


	/*

	back_property_button_link
	google_map_API_KEY
	
	social_email

	social_facebook
	social_instagram
	social_whatsapp
	social_phone
	social_telephone

	location_street
	location_zone
	footer_copy

	*/
	$option = WPBC_get_field($option, 'options');
	return $option;
}



/*

	Get a table list with translations from .MO files if used

*/
function WPBC_get_translations_table_FX($atts, $content = null) {
  extract(shortcode_atts(array(), $atts));
  
  global $q_config;
  $current_lang = $q_config['language'];

  $s = $GLOBALS['l10n'][ 'realinmobiliaria' ];
  $s = $s->entries;

  $m = false;

  ob_start();  
  ?>
  <table class="table">
    <thead>
      <tr>
        <th>Texto Inglés</th><th>Texto <?php echo $q_config['language_name'][$current_lang]; ?></th>
        <?php if($m) { ?>
          <th>TEXTO PORTUGUÉS</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>    
  <?php
  foreach ($s as $key) {
    // singular, translations(arr) 
    $translation = is_array($key->translations) ? $key->translations[0] : ''; 
    ?>
    <tr>
      <td><?php echo $key->singular; ?></td><td><?php echo $translation; ?></td>
      <?php if($m) { ?>
        <th>???</th>
      <?php } ?>
    </tr>
    <?PHP
  }
  ?>
    </tbody>
  </table>
  <?PHP
  $content .= ob_get_contents();
  ob_end_clean(); 
  return $content;
};
add_shortcode('WPBC_get_translations_table', 'WPBC_get_translations_table_FX');