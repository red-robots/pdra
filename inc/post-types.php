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
