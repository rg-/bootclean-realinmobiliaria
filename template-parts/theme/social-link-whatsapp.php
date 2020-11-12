<?php 
$whatsapp = get_theme_option('social_whatsapp');
$whatsapp_link = str_replace('+', '', $whatsapp);
$whatsapp_link = str_replace(' ', '', $whatsapp_link);
$whatsapp_link = 'https://api.whatsapp.com/send?phone='.$whatsapp_link;
?>
<a href="<?php echo $whatsapp_link; ?>" target="_blank"><i class="bcicon-whatsapp"></i></a>