<?php
	
	$this_args = $args;
	
	$prop_prices_args = WPBC_get_property_prices_args($this_args);

	$currency = WPBC_get_property_currency();

?>
<div class="row "> 

	<?php if($prop_prices_args['alquiler'] == 'S' || !empty($prop_prices_args['Precio_alquiler'])){ ?>
		<div class="col-12">
			<hr class="mt-3 gmb-1">
			<h4 class="property-subtitle gmb-2 gmt-1 text-secondary"><?php _e('RENT PRICES','realinmobiliaria'); ?></h4>
		</div>
 		
 		<!-- enero -->
		<?php if(!empty($prop_prices_args['Enero']) || !empty($prop_prices_args['Precio_alquiler']) || !empty($prop_prices_args['Enero_Squincena']) ){ ?>
			
			<div class="col-12">

				<div class="row">

					<div class="col-sm-2">
						<p class="property-price-label title text-secondary"><?php _e('JANUARY','realinmobiliaria'); ?></p>
					</div>

					<div class="col-sm-10">
						<?php if(!empty($prop_prices_args['Enero'])){ ?> 
							<span class="property-price font-PT-Serif mb-2"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Enero'], 0, ',', '.'); ?></span>  
						<?php } ?>

						<div class="row">
							<?php if(!empty($prop_prices_args['Precio_alquiler'])){ ?>
								<div class="col-sm-6">
									<p class="property-price-label text-secondary"><?php _e('FIRST FIFTEEN','realinmobiliaria'); ?> <?php _e('JANUARY','realinmobiliaria'); ?> 
									</p>
									<span class="property-price font-PT-Serif"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Precio_alquiler'], 0, ',', '.'); ?></span>
								</div>
							<?php } ?>
							<?php if(!empty($prop_prices_args['Enero_Squincena'])){ ?>
								<div class="col-sm-6">
									<p class="property-price-label text-secondary"><?php _e('SECOND FIFTEEN','realinmobiliaria'); ?> <?php _e('JANUARY','realinmobiliaria'); ?></p>
									<span class="property-price font-PT-Serif"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Enero_Squincena'], 0, ',', '.'); ?></span>
								</div>
							<?php } ?>
						</div>

					</div>

				</div> 
 
			</div>
		<?php } ?>
		<!-- enero END -->

		<!-- Febrero -->
		<?php if(!empty($prop_prices_args['Febrero']) || !empty($prop_prices_args['Febrero_Pquincena']) || !empty($prop_prices_args['Febrero_Squincena']) ){ ?>
			
			<div class="col-12">

				<hr class="mt-3 gmb-2 hr-light">
				
				<div class="row">

					<div class="col-sm-2">
						<p class="property-price-label title text-secondary"><?php _e('FEBRUARY','realinmobiliaria'); ?></p>
					</div>

					<div class="col-sm-10">
						<?php if(!empty($prop_prices_args['Febrero'])){ ?> 
							<span class="property-price font-PT-Serif mb-2"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Febrero'], 0, ',', '.'); ?></span>  
						<?php } ?>

						<div class="row">
							<?php if(!empty($prop_prices_args['Febrero_Pquincena'])){ ?>
								<div class="col-sm-6">
									<p class="property-price-label text-secondary" ><?php _e('FIRST FIFTEEN','realinmobiliaria'); ?> <?php _e('FEBRUARY','realinmobiliaria'); ?> 
									</p>
									<span class="property-price font-PT-Serif"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Febrero_Pquincena'], 0, ',', '.'); ?></span>
								</div>
							<?php } ?>
							<?php if(!empty($prop_prices_args['Febrero_Squincena'])){ ?>
								<div class="col-sm-6">
									<p class="property-price-label text-secondary"><?php _e('SECOND FIFTEEN','realinmobiliaria'); ?> <?php _e('FEBRUARY','realinmobiliaria'); ?></p>
									<span class="property-price font-PT-Serif"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Febrero_Squincena'], 0, ',', '.'); ?></span>
								</div>
							<?php } ?>
						</div>

					</div>

				</div>  
			</div>
		<?php } ?>
		<!-- Febrero END -->
 
		<?php 
		if(!empty($prop_prices_args['Alquiler_Anual'])){ ?>
			<div class="col-12">

				<hr class="mt-3 gmb-2 hr-light">

				<div class="row">

					<div class="col-sm-2">
						<p class="property-price-label title text-secondary"><?php _e('ANNUAL RENTAL','realinmobiliaria'); ?></p>
					</div>

					<div class="col-sm-10">
						<span class="property-price font-PT-Serif mb-2"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Alquiler_Anual'], 0, ',', '.'); ?></span>
					</div>

				</div>

			</div>
		<?php } ?>
		
	<?php } ?>

	<?php 
	 if($prop_prices_args['venta'] == 'S' ){ ?>
	 	<div class="col-12">
	 		
	 		<hr class="mt-3 gmb-2 ">

				<div class="row">

					<div class="col-sm-2">
						<p class="property-price-label title text-secondary"><?php _e('SALE','realinmobiliaria'); ?></p>
					</div>

					<div class="col-sm-10">
						<?php if(!empty($prop_prices_args['Precio_Venta'])){ ?>
							<span class="property-price font-PT-Serif mb-2"><?php echo $currency; ?> <?php echo number_format($prop_prices_args['Precio_Venta'], 0, ',', '.'); ?></span>
						<?php } else{ ?>
							<span class="property-price font-PT-Serif mb-2"><?php _e('CHECK','realinmobiliaria'); ?></span>
						<?php } ?>
					</div>

				</div>

			</div>
	<?php }?>
	 

</div>