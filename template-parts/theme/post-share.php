<?php

$this_args = $args;

$social_defaults = array( 
	array(
		'id' => 'email',
		'icon_html' => '<i class="icon-enveope"></i> Email', 
		'title'=> 'Email'
	),
	array(
		'id' => 'facebook',
		'icon_html' => '<i class="icon-facebook"></i> Facebook', 
		'title'=> 'Facebook'
	),
	array(
		'id' => 'twitter',
		'icon_html' => '<i class="icon-twitter"></i> Twitter', 
		'title'=> 'Twitter'
	),
	/*
	array(
		'id' => 'pinterest',
		'icon_html' => '<i class="icon-pinterest"></i> Pinterest',
		'title'=> 'Pinterest'
	),
	*/  
);
$social_defaults = apply_filters('wpbc/filter/post/share/defaults', $social_defaults);   
$share_args = array( 
	'class' => '',
	'switch_label' => '<i class="font-PT-Serif text-primary gmb-2">'.__('Share','realinmobiliaria').'</i>', 
	'switch_icon' => '<i class="icon-share text-primary"></i>', 
	'switch_class' => 'ml-auto py-3',
	'item_class' => 'btn btn-social mb-3',
	'item_input_class' => 'form-control border-secondary mb-3 w-100 p-2',
	'share_buttons_class' => '',
	'social_defaults' => $social_defaults,

	/* 2020 */
	'share_buttons_before' => '<p>'.__('Share','realinmobiliaria').'</p><h2 class="font-PT-Serif gmb-2">'.WPBC_get_languages($this_args['Título'],false).'</h2>',

	'type' => 'modal', // default || modal
	// 'modal_title' => $this_args['title'],
	'modal_body_class' => 'modal-body gpb-2',
); 
WPBC_post_share( $share_args );  
/*

	Also can use this filters to get the permlink and title used on share links:

	$the_permalink = get_permalink();
		$the_permalink = apply_filters('wpbc/filter/post/share/permalink',$the_permalink);
	$the_title = get_the_title();
		$the_permalink = apply_filters('wpbc/filter/post/share/title',$the_title);

*/
?>