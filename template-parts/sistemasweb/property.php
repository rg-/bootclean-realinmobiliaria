<?php 
if(!empty($_GET['ref'])){ 
	$id = $_GET['ref']; 
	$property = get_property_args($id);
	echo "<pre>";
	print_r($property);
	echo "</pre>";
}
?>