<?php

/*
add_action('wpbc/layout/start', function(){
   
  // Something could go here, like echo "<h2>Hello</h2"; 
  
}, 5 );
*/
// 

add_filter('wpbc/body/data', function($out){
	$out = ' data-scroll-to-time=1000 '.$out;
	return $out;
},10,1 );



add_filter('wpbc/filter/layout/start/defaults', function($template_args){

	if(is_page_template('_template_builder.php')){
		$template_args['container']['class'] = 'container-builder';
		$template_args['container']['row'] = 'row-builder';
		$template_args['container']['col_content'] = 'col-builder';
		$template_args['container']['col_sidebar'] = 'col-sidebar';  
	}

	return $template_args;
	
},10,1 ); 

/*

.md-preloader {
  @easing:      cubic-bezier(.8,.0,.4,.8);

  @speed:       1320ms;             // overall time taken for all the partitions to meet once
  @color:       #448AFF;            // Blue A200 in the Material Design color palette
  @linecap:     square;             // could be 'round', but the official one is square
  @partitions:  5;                  // number of points where the arc meets
  @arc:         0.72;               // fraction of the circumference that the arc grows to
  @perimeter:   67px * pi();        // circumference of the raw svg inner cricle

  font-size: 0;
  display: inline-block;
  animation: outer @speed * @partitions linear infinite;

  svg {
    animation: inner @speed linear infinite;

    circle {
      fill: none;
      stroke: @color;
      stroke-linecap: @linecap;
      animation: arc @speed @easing infinite;
    }
  }

  @keyframes outer {
    0% {
      transform: rotate(0);
    }
    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes inner {
    0% {
      transform: rotate(-360deg * (1 - @arc));
    }
    100% {
      transform: rotate(0);
    }
  }

  @keyframes arc {
    0% {
      stroke-dasharray: 1 @perimeter;
      stroke-dashoffset: 0;
    }
    40% {
      stroke-dasharray: @arc * @perimeter, @perimeter;
      stroke-dashoffset: 0;
    }
    100% {
      stroke-dasharray: 1 @perimeter;
      stroke-dashoffset: -@arc * @perimeter;
    }
  }
}

*/