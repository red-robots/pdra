<?php
/**
 * Template Name: Page with BOD + GA Minutes
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

				get_template_part( 'template-parts/content', 'bod-ga-minutes' );

			endif; // End of the if.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
