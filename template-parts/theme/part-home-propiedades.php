<div id="propiedades-posts">
	<div class="container gpb-2 gpb-md-4">
		<div class="row row-property">
			<?php
			/*	
			WPBC_get_template_part( $part, $args );

				$part - file en [theme_folder_name]/template-parts/
				$args - optional args passed, single/array/object

			*/
				
			WPBC_get_template_part('theme/property-row-loop', array(
				'show_more' => true,
				'loop_items' => 9,
				'featured' => true,
			));?>
		</div>
	</div>
</div>