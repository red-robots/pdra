<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides

  $labels = array(
	'name' => _x('Quarries', 'post type general name'),
    'singular_name' => _x('Quarry', 'post type singular name'),
    'add_new' => _x('Add New', 'Quarry'),
    'add_new_item' => __('Add New Quarry'),
    'edit_item' => __('Edit Quarries'),
    'new_item' => __('New Quarry'),
    'view_item' => __('View Quarry'),
    'search_items' => __('Search Quarries'),
    'not_found' =>  __('No Quarries found'),
    'not_found_in_trash' => __('No Quarries found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Quarries'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('quarry',$args); // name used in query
  
  $labels = array(
	'name' => _x('Leaders', 'post type general name'),
    'singular_name' => _x('Leader', 'post type singular name'),
    'add_new' => _x('Add New', 'Leader'),
    'add_new_item' => __('Add New Leader'),
    'edit_item' => __('Edit Leader'),
    'new_item' => __('New Leader'),
    'view_item' => __('View Leader'),
    'search_items' => __('Search Leaders'),
    'not_found' =>  __('No Leaders found'),
    'not_found_in_trash' => __('No Leaders found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Leaders'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('leader',$args); // name used in query

  $labels = array(
	'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No Events found'),
    'not_found_in_trash' => __('No Events found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Events'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('event',$args); // name used in query
  
  $labels = array(
	'name' => _x('General Assembly Minutes', 'post type general name'),
    'singular_name' => _x('General Assembly Minutes', 'post type singular name'),
    'add_new' => _x('Add New', 'General Assembly Minutes'),
    'add_new_item' => __('Add New General Assembly Minutes'),
    'edit_item' => __('Edit General Assembly Minutes'),
    'new_item' => __('New General Assembly Minutes'),
    'view_item' => __('View General Assembly Minutes'),
    'search_items' => __('Search General Assembly Minutes'),
    'not_found' =>  __('No General Assembly Minutes found'),
    'not_found_in_trash' => __('No General Assembly Minutes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'General Assembly Minutes'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('ga-minutes',$args); // name used in query
  
  $labels = array(
	'name' => _x('Board of Director Minutes', 'post type general name'),
    'singular_name' => _x('Board of Director Minutes', 'post type singular name'),
    'add_new' => _x('Add New', 'Board of Director Minutes'),
    'add_new_item' => __('Add New Board of Director Minutes'),
    'edit_item' => __('Edit Board of Director Minutes'),
    'new_item' => __('New Board of Director Minutes'),
    'view_item' => __('View Board of Director Minutes'),
    'search_items' => __('Search Board of Director Minutes'),
    'not_found' =>  __('No Board of Director Minutes found'),
    'not_found_in_trash' => __('No Board of Director Minutes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Board of Director Minutes'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('bod-minutes',$args); // name used in query
  // Add more between here
  
  // and here
  
} // close custom post type

/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'leader_type', 'leader',
   array( 
  'hierarchical' => true, // true = acts like categories false = acts like tags
  'label' => 'Leader Type', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'leader-type' ),
  '_builtin' => true
  ) );
  
} // End build taxonomies
