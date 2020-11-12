<?php

	/*

	Very clear right? check if qtranslate is theme/enabled and actived

	*/
	function WPBC_is_qtrans(){
		if( function_exists('qtrans_getLanguage') && defined('BC_ACF_QTRANSLATEX_ENABLED') && BC_ACF_QTRANSLATEX_ENABLED == true ){
			return true;
		} else {
			return false;
		}
	}

// Use filter for custom fields add language functionality, NOT WORKING WITH CODEMIRROR

// add_filter('acf/load_field/key=key__r_html_code', 'real_qtranslate_wysiwyg_fx',100,1);

function real_qtranslate_wysiwyg_fx( $field ) {
	$field['type'] = 'qtranslate_wysiwyg';
	return $field;	 
}

add_filter('acf/load_field/name=location_street_1', 'bc_child_defaults_qtranslate_text_fx',100,1); 
add_filter('acf/load_field/name=location_street_2', 'bc_child_defaults_qtranslate_text_fx',100,1); 
add_filter('acf/load_field/name=footer_copy', 'bc_child_defaults_qtranslate_text_fx',100,1);
/*

	uSEFULL

	qtranxf_getLanguage()
	
	html SHORTCODES on admin or theme parts

	[:es]Spanish Text[:en]English Text[:]

*/ 
	add_filter('acf/load_field/key=key__r_slider_html_code', function($field){  
		$field['type'] = 'text';
		$field['wrapper']['class'] = '';
		return $field; 
	});
	add_filter('acf/load_field/key=key__r_slider_html_code', 'bc_child_defaults_qtranslate_text_fx',100,1);

 

/*

	WPBC_get_lang_selector

*/
if(!function_exists('WPBC_get_lang_selector')){
	function WPBC_get_lang_selector(){
		
		global $q_config;
		$lang_nav = '';
		
		$flag_location = qtranxf_flag_location();

		if ( is_404() ) {
			$url = get_option( 'home' );
		} else {
			$url = '';
		}

		if( function_exists('qtrans_getLanguage') && defined('BC_ACF_QTRANSLATEX_ENABLED') && BC_ACF_QTRANSLATEX_ENABLED == true ){ 
			
			$real_property_page_id = get_theme_option('real_property_single_id');

			$lang_nav .= '<div class="lang-menu">'; 
			$lang_nav .= '<ul class="lang-menu-nav">';

  		if(is_page($real_property_page_id)){

  			$id = get_query_var('WPBC_id', null);  
		    if(empty($id)){
		      $id = $_GET['WPBC_id'];
		    }  
		    $prop_args = get_property_args($id);  
		    $propiedad_REF = !empty($prop_args['Referencia']) ? $prop_args['Referencia'] : '';

		    foreach ( qtranxf_getSortedLanguages() as $language ) { 
	        $slugArray = get_post_meta( $real_property_page_id, '_qts_slug_'.$language );
	        $pagename = !empty($slugArray) ? $slugArray[0] : ""; 

	        /* 2020 */
	        $propiedad_title = qtrans_use($language, $prop_args['Título'],false);  
	        $propiedad_slug = sanitize_title($propiedad_title);  

	        $pagename = $language.'/'.$pagename; 
	        $alt = $q_config['language_name'][ $language ];
					if ( $language == $q_config['language'] ) {
						$class = 'active';
					}else{
						$class = '';
					}
					$flag_src = $flag_location . $q_config['flag'][ $language ];

					$lang_nav .=  '<li class="'.$class.'">'; 
					$item_href = get_option( 'home' ).'/'.$pagename.'/'.$propiedad_slug.'/'.$propiedad_REF;
					$lang_nav .=  '<a href="' . $item_href . '"';
					$lang_nav .=  ' class="qtranxs_short_' . $language . ' qtranxs_short" title="' . $alt . '">';
					$lang_nav .=  '<img src="' . $flag_src . '" class="flag" alt="' . $alt . '"/>';
					$lang_nav .=  '<span>' . $language . '</span></a></li>' . PHP_EOL;
	      }

  		}else{ 

  			foreach ( qtranxf_getSortedLanguages() as $language ) {
					$alt = $q_config['language_name'][ $language ];
					if ( $language == $q_config['language'] ) {
						$class = 'active';
					}else{
						$class = '';
					} 
					$flag_src = $flag_location . $q_config['flag'][ $language ];

					$lang_nav .=  '<li class="'.$class.' lang-nav-'.$language.'">'; 
					$lang_nav .=  '<a href="' . qtranxf_convertURL( $url, $language, false, true ) . '"';
					$lang_nav .=  ' class="qtranxs_short_' . $language . ' qtranxs_short" title="' . $alt . '">';
					$lang_nav .=  '<img src="' . $flag_src . '" class="flag" alt="' . $alt . '"/>';
					$lang_nav .=  '<span>' . $language . '</span></a></li>' . PHP_EOL;
				}
				 
  			
  		}  

			$lang_nav .= '</ul>';
			$lang_nav .= '</div>';

		}

		return $lang_nav;

	}

} 