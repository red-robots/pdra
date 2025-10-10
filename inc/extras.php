<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

/*** Add class to Related Products on Woocommerce ***/
add_filter( 'woocommerce_output_related_products_args', 'custom_related_products_class' );
function custom_related_products_class( $args ) {
	// Add your custom class to the 'before' argument
	$args['before'] = '<div class="related-products-container related products clear">'; 
	$args['after'] = '</div>'; // Close the div
	return $args;
}