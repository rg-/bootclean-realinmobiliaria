
<?php 
$id = get_query_var('WPBC_id', null); 
$slug = get_query_var('WPBC_slug', null); 
if(empty($id)){
	$id = $_GET['WPBC_id'];
}
if(!empty($_GET['ref'])){
	$id = $_GET['ref'];
}

// VER functions/theme-sistemasweb.php
$prop_args = get_property_args($id);     
$is_destacado = WPBC_is_property_destacado($prop_args);    
$property_back_url = WPBC_get_property_back_url($prop_args);

if(!empty($prop_args)){
?>

<div id="property-single" class="post-property-single bg-shadow">

	<div class="container">

		<div class="row">

			<div class="col-12 order-2 order-lg-0"> 

				<div class="row gmt-3 gmb-2 align-items-center">
			
					<div class="col-6">
						<a href="<?php echo $property_back_url; ?>" class="btn btn-link btn-back"><i class="pngicon-arrow-left-grey sm"></i><?php _e('BACK TO LIST','realinmobiliaria');?></a>
					</div>

					<div class="col-6">
						<div class="property-share d-flex justify-content-end">
							<div class="post-share-buttons">
								<?php WPBC_get_template_part('theme/post-share', $prop_args); ?>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-5 order-1 order-lg-1 gpr-lg-5">

				<div data-clone="#property-head-mobile" class="d-none d-lg-block">
					
					<?php WPBC_get_template_part('theme/property-header', $prop_args); ?>
 
				</div>

				<div class="property-features features-icons font-PT-Serif row">

					<?php WPBC_get_template_part('theme/property-features', $prop_args); ?>

				</div>

				<hr class="gmb-2">

				<div class="property-description">

					<?php WPBC_get_template_part('theme/property-description', $prop_args); ?>

				</div>

				<div class="property-map">

					<?php WPBC_get_template_part('theme/property-map', $prop_args); ?>						

				</div>

				<div id="property-contact-clone" class="d-lg-none text-center"></div>

				<div class="property-back gmt-3 gmb-2 d-none d-lg-block">
					
					<a href="<?php echo $property_back_url; ?>" class="btn btn-back btn-primary btn-max lg"><i class="pngicon-arrow-left sm"></i><?php _e('BACK TO LIST','realinmobiliaria'); ?></a>

				</div>

			</div>

			<div class="col-lg-7 order-0 order-lg-2 gpl-lg-0">

				<div id="property-head-mobile" class="d-lg-none"></div>

				<div class="make-it-full-screen">
					<div class="property-slider position-relative gmt-1 gmt-lg-0 mb-4 bg-light">
						<?php WPBC_get_template_part('theme/property-slider', $prop_args); ?>
					</div>
				</div>

				<div class="property-amenities">
					<?php WPBC_get_template_part('theme/property-amenities', $prop_args); ?>
				</div>

				<div class="property-prices">
					<?php WPBC_get_template_part('theme/property-prices', $prop_args); ?>
				</div>

				<hr class="mt-3 gmb-1">

				<div data-clone="#property-contact-clone" class="property-contact gpy-1 d-none d-lg-flex justify-content-end align-items-center">
					<span class="font-italic font-PT-Serif gp-1 gp-lg-0 d-block d-lg-inline-block"><?php _e('I want to know more about this property!','realinmobiliaria'); ?></span> <a href="#contact-form" class="gml-1 btn btn-primary btn-max scroll-to"><?php _e('CONTACT US','realinmobiliaria'); ?></a>
				</div>

			</div>

		</div>

		<hr class="">

	</div>

</div>

<?php WPBC_get_template_part('theme/property-related', $prop_args); ?>

<?php } else {?>
<div id="property-single" class="post-property-single bg-shadow">

	<div class="container">

		<div class="row gpy-3">
			<div class="col-12 ">
				<h2 class="property-title font-PT-Serif"><?php _e('Sorry but the page you are looking for do not exist.', 'realinmobiliaria'); ?></h2>
			</div>
		</div>

	</div>

</div>
<?php } ?>