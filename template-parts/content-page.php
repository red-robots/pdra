<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="row-1">
		<?php $matches = array();
		$title = false;
		$menu_string = wp_nav_menu( array( 'theme_location' => 'primary','echo'=>false ));
		$return = return_sub_menu($menu_string);
        if($return!==-1):
            echo $return;
        else: ?>
            <header><h1><?php echo get_the_title();
            $title = true;?></h1></header>
        <?php endif; ?>
    </section>
	<section class="row-2">
        <?php if(!$title):?>
            <header>
                <h1><?php echo get_the_title(); ?></h1>
            </header>
        <?php endif;?>
        <div class="copy">
            <?php echo get_the_content();?>
        </div>
    </section><!--.row-2-->
	<section class="row-3 row-join">
        <?php if(get_field("row_join_text","option")):?>
            <div class="column-1"><?php echo get_field("row_join_text","option");?></div><!--.column-1-->
        <?php endif;//if for row_2_text?>
        <?php if(get_field("row_join_button_text","option")):?>
            <div class="column-2"><button><?php echo get_field("row_join_button_text","option");?></button></div><!--.column-2-->
        <?php endif;//if for row_2_button_text?>
	</section><!--.row-3 .row-join-->
</article><!-- #post-## -->
