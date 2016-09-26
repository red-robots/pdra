<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
                <div class="row-1 standard-sub-nav">
                    <header>
                        <h1>404</h1>
                    </header>
                    <div class="background-image" style="background-image:url(<?php if(get_field("standard_nav_background_image","option")) echo wp_get_attachment_image_src(get_field("standard_nav_background_image","option"),"full")[0];?>);"></div>
                </div>
                <div class="row-2 copy">
                    <p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></p>
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
                    <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
				</div><!-- .row-2 -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
