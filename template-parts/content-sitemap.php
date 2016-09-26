<?php
/**
 * Template part for displaying page content in page-sitemap.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap"); ?>>
    <section class="row-1 standard-sub-nav">
            <header>
                <h1><?php echo get_the_title();?></h1>
            </header>
        <div class="background-image" style="background-image:url(<?php if(get_field("standard_nav_background_image","option")) echo wp_get_attachment_image_src(get_field("standard_nav_background_image","option"),"full")[0];?>);"></div>
    </section>
    <?php $text = get_the_content();
    if(!empty($text)):?>
        <section class="row-2 copy">
            <?php echo $text;?>
        </section><!-- .row-2 -->
        <section class="row-3 copy">
    <?php else:?>
        <section class="row-3 copy none-above">
    <?php endif;?>
        <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
    </section><!-- .row-3 -->
</article><!-- #post-## -->
