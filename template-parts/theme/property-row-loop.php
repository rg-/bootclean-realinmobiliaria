<?php
/*

    @ Template hijo de: template-parts/theme/part-propiedades

    Se pueden pasar x parametros via url para el ajax, o via shortcode args.
    
    Las vars via $_GET se usan el action ajax, ej: 
        
        /wp-admin/admin-ajax.php?action=get_template&name=theme/property-row-loop&show_more=1&page=2&loop_items=6

    Las vars via $args, se pasan via WPBC_get_template_part($part, $args)

        WPBC_get_template_part('theme/property-row-loop', array(
            'show_more' => true,
            'loop_items' => 6
        ));
*/

$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$priceRange = !empty($_GET['priceRange']) ? $_GET['priceRange'] : ( isset($args['priceRange']) ? $args['priceRange'] : null ); 

$type = !empty($_GET['type']) ? $_GET['type'] : ( isset($args['type']) ? $args['type'] : null );

$operation = !empty($_GET['operation']) ? $_GET['operation'] : ( isset($args['operation']) ? $args['operation'] : null ); 

$location = !empty($_GET['location']) ? $_GET['location'] : ( isset($args['location']) ? $args['location'] : null );

$rooms = !empty($_GET['rooms']) ? $_GET['rooms'] : ( isset($args['rooms']) ? $args['rooms'] : null );

$sort = !empty($_GET['sort']) ? $_GET['sort'] : ( isset($args['sort']) ? $args['sort'] : null );

$features = !empty($_GET['features']) ? $_GET['features'] : [];
$neighborhood = !empty($_GET['neighborhood']) ? $_GET['neighborhood'] : null;

$loop_items = isset($args['loop_items']) ? $args['loop_items'] : null;
$loop_class = "ajax-item col-sm-6 col-md-4 gpt-1 gmb-3 gmb-md-2"; 
$next_page = $page + 1;
$current_page = $page;
$delay_count = 0.6;

// ($operation, $type, $priceRange, $features=[], $featured=false, $page=1, $location=null, $neighborhood=null, $rooms=null)
$properties = apply_filters(
    'fetch_properties',
    $operation,
    /*
    $operation [
            1 => 'Venta',
            2 => 'Alquiler anual',
            3 => 'Alquiler temporario',
        ]
    */
    $type,
    /*
    $type [
            1 => 'Casa',
            2 => 'Departamento',
            3 => 'Campo',
            4 => 'Chacra',
            5 => 'Local',
            6 => 'Terreno',
            7 => 'Barrio Privado',
            8 => 'Hotel'
        ]
    */
    $priceRange,
    /*
    $priceRange [
            "10000|50000" => "De US$ 10.000 a US$ 50.000",
            "50000|100000" => "De US$ 50.000 a US$ 100.000",
            "100000|300000" => "De US$ 100.000 a US$ 300.000",
            "300000|500000" => "De US$ 300.000 a US$ 500.000",
            "500000|1000000000000" => "Mayor a US$ 500.000",
        ]
    */
    $features,
    isset($args['featured']),
    $page,
    $location,
    /*
    $locations = [
            1 => [
                'name' => 'Punta Ballena',
                'neighborhoods' => [
                    1 => 'Bosque de Portezuelo',
                    ...
                    ]
                ....
                ],
            2 => [
                'name' => 'Punta del Este',
                ....
                ],
            ]
    */
    $neighborhood,

    $rooms,
	
	$sort
); 

$query_string = build_query([
    'page' => $next_page,
    'priceRange' => $priceRange,
    'type' => $type,
    'operation' => $operation,
    'location' => $location,
    'rooms' => $rooms,
    'features' => $features,
    'sort' => $sort,
]);

$max_pages = $properties['meta']['pages']; 

/* Set global back url based on view */
global $global_back_url;
$query_string_current = build_query([
    'page' => $current_page,
    'priceRange' => $priceRange,
    'type' => $type,
    'operation' => $operation,
    'location' => $location,
    'rooms' => $rooms,
    'features' => $features,
    'sort' => $sort,
]);  
$global_back_url = '';
$real_property_page = get_permalink(get_theme_option('real_property_page_id')); 
$global_back_url = $real_property_page.'?'.$query_string_current; 

/*
    Primero cargo con php las propiedades "normalmente", no js involucrado.
*/
$current_item = 1;
foreach ($properties['posts'] as $property) {
    if (!is_null($loop_items) && $current_item > $loop_items) {
        break;
    }
    

    //echo "<pre>";
    //print_r($property);
    //echo "</pre>";
    if(!empty($args['not_Referencia']) && $property['Referencia'] == $args['not_Referencia']){

    } else{
    
    $current_item++;

    ?>
    <div class="<?php echo $loop_class; ?>" data-inview="animated" data-animated-once="1" data-animated-on="fadeIn" data-animated-off="fadeOut" data-animation-delay="<?php echo $delay_count; ?>s" data-animation-duration="1s">
        <?php
        /*
            Aca lo mismo pero para cada item del loop

            Se puede pasar por ej. el REF/ID de la propiedad a levantar y luego usar ese id
            en el template 'theme/property-post-loop'
            .. dejo un ejemplo $propiedad_REF 
            lo armo $page.'_'.$i, solo para que no se repita el ID al hacer el ajax

        */

        
            WPBC_get_template_part('theme/property-post-loop', $property);
        

        ?>
    </div>
    <?php
     
        $delay_count = $delay_count + $delay_count;
        if($delay_count > 1){
            $delay_count = 0.3;
        }

    }
}

if (count($properties['posts']) == 0) { ?>
<div class="col-12 text-center">
    <p><?php _e('No properties found.','realinmobiliaria'); ?></p>
</div>
<?php }
    
/*
    Si uso el "show_more", se agrega el boton para cargar con ajax desde la url "data-ajax-href"
    en el div "data-ajax-target", en este caso al ser "_parent" usa el div class "row-property" que
    esta en el template "part-propiedades.php" que envuelve todo este otro template.
*/

if( !empty($args['show_more']) || !empty($_GET['show_more']) ){
?>
<?php // echo $query_string; ?>
<?php if( $next_page <= $max_pages ){ ?>
<div class="col-12 text-center" data-ajax-nav="more" data-ajax-target="_parent" data-ajax-item=".ajax-item" data-ajax-scroll-to="1">
    <span data-ajax-href="<?php echo admin_url('admin-ajax.php'); ?>?action=get_template&name=theme/property-row-loop&show_more=1&<?php echo $query_string; ?>"><span class="btn btn-link"><?php _e('Load listing','realinmobiliaria'); ?></span><br><i class="d-inline-block mx-auto icon pngicon-arrow-down-alt"></i></span>
</div>
<?php }
}?>