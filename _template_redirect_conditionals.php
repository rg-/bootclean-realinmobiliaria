<!-- NOT USED ?? --><!DOCTYPE html> 
<html <?php language_attributes(); ?>>
  <head>
	  
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> 
	
    <title><?php wp_title('|', true, 'right'); ?></title>
    
	<style>
		html, body{height:100%;}
		body{
			font-family: Arial, sans-serif;
			background:#fff;
			color:#000;
			padding:0;
			margin:0;
		}
		table{
			width:100%;
			height:100%;
			padding:0;
			margin:0;
		}
		tr{
			height:100%;
			padding:0;
		}
		td{
			padding:0;
			width:100%;
			height:100%;
			vertical-align:middle;
			text-align:center;
		}
	</style>
		
	</head>
	<!-- head END -->
 
 
	<body <?php body_class('coming-soon'); ?>>
		
		<table border="0">
			<tr>
				<td><img src="<?php echo CHILD_THEME_URI.'/images/theme/logo-realinmobiliaria.png'; ?>" width="232" height="41" alt=" "/><br><?php WPBC_get_template_part('theme/social-links'); ?></td>
			</tr> 
		</table>
		 
	</body>
	
</html>