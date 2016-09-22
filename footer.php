<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row-1">
            <div class="column-1">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_left' ) ); ?>
			</div><!--.column-1-->
            <div class="column-2">
                <?php if(get_field("footer_quarry_title","option")):?>
                    <div class="footer-quarry-title"><?php echo get_field("footer_quarry_title","option");?></div>
                <?php endif;?>
                <?php wp_nav_menu( array( 'theme_location' => 'footer_right') ); ?>
            </div><!--.column-2-->
        </div><!-- .row-1 -->
		<div class="row-2">
            <div class="column-1">
                <div class="email">
                    <?php if( get_field("email","option")) echo get_field("email","option");?>
                </div><!--.email-->
            </div><!--.column-1-->
            <div class="column-2">
                <?php wp_nav_menu( array( 'theme_location' => 'sitemapBW') ); ?>
            </div><!--.column-2-->
        </div><!-- .row-2 -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
