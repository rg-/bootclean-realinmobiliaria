<?php

$page = !empty($_GET['page']) ? $_GET['page'] : 1; 
$priceRange = !empty($_GET['priceRange']) ? $_GET['priceRange'] : ( isset($args['priceRange']) ? $args['priceRange'] : null );  
$type = !empty($_GET['type']) ? $_GET['type'] : ( isset($args['type']) ? $args['type'] : null ); 
$operation = !empty($_GET['operation']) ? $_GET['operation'] : ( isset($args['operation']) ? $args['operation'] : null );  
$location = !empty($_GET['location']) ? $_GET['location'] : ( isset($args['location']) ? $args['location'] : null );  
$rooms = !empty($_GET['rooms']) ? $_GET['rooms'] : ( isset($args['rooms']) ? $args['rooms'] : null ); 
$sort = !empty($_GET['sort']) ? $_GET['sort'] : ( isset($args['sort']) ? $args['sort'] : null ); 
$features = !empty($_GET['features']) ? $_GET['features'] : [];
$featured = !empty($_GET['featured']) ? $_GET['featured'] : false;
$neighborhood = !empty($_GET['neighborhood']) ? $_GET['neighborhood'] : null; 
$loop_items = isset($_GET['loop_items']) ? $_GET['loop_items'] : null; 
$next_page = $page + 1;
$delay_count = 0.6;

// ($operation, $type, $priceRange, $features=[], $featured=false, $page=1, $location=null, $neighborhood=null, $rooms=null)
$properties = apply_filters(
  'fetch_properties',
  $operation, 
  $type, 
  $priceRange, 
  $features,
  $featured,
  $page,
  $location, 
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
$current_item = 1;
foreach ($properties['posts'] as $property) {
  if (!is_null($loop_items) && $current_item > $loop_items) {
      break;
  }
  $current_item++;
  echo "<p>".$property['Referencia']." - ".$property['Título']."</p>"; 
}
if (count($properties['posts']) == 0) {
	return false;
}
?>