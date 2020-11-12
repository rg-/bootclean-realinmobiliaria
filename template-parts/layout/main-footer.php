<footer id="main-footer">

	<div class="bg-secondary text-white image-cover attachment-fixed" style="background-image:url(<?php echo get_stylesheet_directory_uri();?>/images/theme/main-footer-bg.jpg);">
		
		<div class="container"> 

			<div id="contact-form" class="row gpt-3 gpt-md-6 gpb-2 row-contacto">
				<div class="col-md-5 gpr-md-6">
					<h3 class="section-title xl gmb-2 gmb-md-4" data-inview="animated" data-animated-once="1" data-animated-on="fadeInUp" data-animated-off="fadeOutDown" data-animation-duration=".5s"><?php _e('Contact us','realinmobiliaria');?></h3>


					<?php 
					$email = get_theme_option('social_email');
					$email_link = str_replace('@', '(at)', $email);
					$email_link_e = str_replace('.', '(dot)', $email_link);
					$email_link = 'mailto:'.$email_link_e;
					?>
					<p><a class="antispam preserve-content-span" href="<?php echo $email_link; 
					?>"><i class="bcicon-envelope"></i> <span><?php echo "antispam"; 
					?></span></a></p>
					<hr>

					<?php
					$real_property_address_1 = get_theme_option('real_property_address_1'); 
					?>
					<h6 class="gmt-2"><?php echo $real_property_address_1['location_title_1']; ?></h6>
					<p>
						<?php $location_url_map = $real_property_address_1['location_url_map']; ?>
						<a target="_blank" href="<?php echo $location_url_map; ?>">
						<i class="bcicon-location"></i> <?php 
						echo $real_property_address_1['location_street_1']; 
						?>
						</a>
					</p>
					<?php
						$whatsapp = $real_property_address_1['social_whatsapp'];
						$whatsapp_link = str_replace('+', '', $whatsapp);
						$whatsapp_link = str_replace(' ', '', $whatsapp_link);
						$whatsapp_link = 'https://api.whatsapp.com/send?phone='.$whatsapp_link;
					?>
					<p class="gmb-2"><a class="gmr-2" target="_blank" href="<?php echo $whatsapp_link; 
					?>"><i class="bcicon-whatsapp-outline"></i> <?php echo $whatsapp; 
					?></a> 
						<span class="has-icon"><i class="bcicon-phone"></i> <?php 
					$phone = $real_property_address_1['social_phone']; echo $phone; 
					?></span>
					</p> 
					<hr>

					<?php 
					$real_property_address_2 = get_theme_option('real_property_address_2'); 
					?>
					<h6 class="gmt-2"><?php echo $real_property_address_2['location_title_2']; ?></h6>
					<p>
						<?php $location_url_map = $real_property_address_2['location_url_map_2']; ?>
						<a target="_blank" href="<?php echo $location_url_map; ?>">
						<i class="bcicon-location"></i> <?php 
						echo $real_property_address_2['location_street_2']; 
						?>
						</a>
					</p>
					<?php
						$whatsapp_2 = $real_property_address_2['social_whatsapp_2'];
						$whatsapp_link_2 = str_replace('+', '', $whatsapp_2);
						$whatsapp_link_2 = str_replace(' ', '', $whatsapp_link_2);
						$whatsapp_link_2 = 'https://api.whatsapp.com/send?phone='.$whatsapp_link_2;

						$whatsapp_3 = $real_property_address_2['social_whatsapp_3'];
						$whatsapp_link_3 = str_replace('+', '', $whatsapp_3);
						$whatsapp_link_3 = str_replace(' ', '', $whatsapp_link_3);
						$whatsapp_link_3 = 'https://api.whatsapp.com/send?phone='.$whatsapp_link_3;
					?>
					<p><a class="gmr-2" target="_blank" href="<?php echo $whatsapp_link_2; 
					?>"><i class="bcicon-whatsapp-outline"></i> <?php echo $whatsapp_2; 
					?></a> 
						<span class="has-icon"><i class="bcicon-phone"></i> <?php 
					$phone = $real_property_address_2['social_phone_2']; echo $phone; 
					?></span>
					<br>
						<a class="gmr-2" target="_blank" href="<?php echo $whatsapp_link_3; 
					?>"><i class="bcicon-whatsapp-outline"></i> <?php echo $whatsapp_3; 
					?></a> 
					</p>

				</div>
				<div class="col-md-7 gpl-md-2">
					<?php

					global $q_config;  
					$forms = array(
						'es'=> '[contact-form-7 id="18" title="Formulario de contacto ES"]',
						'en'=> '[contact-form-7 id="67" title="Formulario de contacto EN"]',
						'pb'=> '[contact-form-7 id="68" title="Formulario de contacto PT"]',
					); 

					if(!empty($q_config)){  
						$contact_form = $forms[$q_config['language']]; 
					}else{
						$contact_form = $forms['es'];
					}
					
					echo do_shortcode($contact_form);

					?>
				</div>
			</div>

			<div class="row row-no-gutters gpt-3 gpb-3 row-suscribe">
				<div class="col-md-5">
					<h3 class="section-title xl gmt-1" data-inview="animated" data-animated-once="1" data-animated-on="fadeInUp" data-animated-off="fadeOutDown" data-animation-duration=".5s"><?php _e('Subscribe','realinmobiliaria');?></h3>
				</div>
				<div class="col-md-7 gpt-1 ">
					
					<!-- Begin Mailchimp Signup Form -->
					<div id="mc_embed_signup">
					<form action="https://realinmobiliaria.us20.list-manage.com/subscribe/post?u=ba6255ec0334c62ccfcefb04a&amp;id=6a4aaa57a8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll" class="">
						
								<div class="mc-field-group form-group d-md-flex justify-content-between">
									<input type="email" value="" placeholder="<?php _e('Enter your email','realinmobiliaria');?>" name="EMAIL" class="required email form-control w-md-auto flex-fill gmr-1 gml-lg-1" id="mce-EMAIL">
									<input type="submit" value="<?php _e('SUBSCRIBE','realinmobiliaria');?>" name="subscribe" id="mc-embedded-subscribe" class="btn btn-white btn-max gmt-1 gmt-md-0">
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ba6255ec0334c62ccfcefb04a_6a4aaa57a8" tabindex="-1" value=""></div>
							    
							    
						  	</div>

						  </div>
						</form>

					</div>

					<!--End mc_embed_signup-->
				</div>
			</div>

		</div>

	</div>

	<div class="bg-secondary text-white">

		<div class="container">
			<div class="row gpt-2 gpb-1">
				<div class="col-md-9">
					<!--<p class="d-sm-none text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/theme/logo-realinmobiliaria.png" width="200" alt=" "/></p>-->
					<p class="footer-copyright"><?php 
					$footer_copy = get_theme_option('footer_copy'); echo $footer_copy; 
					?></p>
				</div>
				<div class="col-md-3 text-right">
					<p class="footer-copyright"><a href="http://nomadeweb.com/?r=realinmobiliaria" target="_blank" class="nomade-link"><?php _e('Design & Development','realinmobiliaria');?></a></p>
				</div>
			</div>
		</div>

	</div>

</footer>