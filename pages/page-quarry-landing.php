<?php
/**
 * Template Name: Quarry Landing
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'quarry-landing' );

			endif; // End of the if.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
