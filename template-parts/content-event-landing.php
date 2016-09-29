<?php
/**
 * Template part for displaying page content in page-event-landing.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-event-landing"); ?>>
    <section class="row-1 standard-sub-nav">
		<?php $matches = array();
		$title = false;
		$menu_string = wp_nav_menu( array( 'theme_location' => 'primary','echo'=>false ));
		$return = return_sub_menu_no_recursion($menu_string);
        if($return!==-1):
            echo $return;
        else: ?>
            <header><h1><?php echo get_the_title();
            $title = true;?></h1></header>
        <?php endif; ?>
        <div class="background-image" style="background-image:url(<?php if(get_field("standard_nav_background_image","option")) echo wp_get_attachment_image_src(get_field("standard_nav_background_image","option"),"full")[0];?>);"></div>
    </section>
    <?php if(!empty(get_the_content())||!$title):?>
        <section class="row-2">
            <?php if(!$title):?>
                <header>
                    <h1><?php echo get_the_title(); ?></h1>
                </header>
            <?php endif;?>
            <div class="copy">
                <?php the_content();?>
            </div>
        </section><!--.row-2-->
    <?php endif;?>
    <section class="row-3">
        <?php if(!empty(get_the_content())||!$title):?>
            <header>
                <h2><?php the_title();?></h2>
            </header>
        <?php endif;?>
        <div class="event wrapper">
            <?php $date = intval(date("Ymd"));
            $args = array('post_type'=>'event',
            'order'=>'ASC','orderby'=>'menu_order',
            'posts_per_page'=>-1,'meta_query'=>array(
                'relation'=>'AND',
                    array(
                        'key'=>'date',
                        'compare'=>'EXISTS',
                    ),
                    array(
                        'key'=>'date',
                        'value'=>$date,
                        'compare'=>'>=',
                        'type'=>'NUMERIC',
                    ),
                ),
            );
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):$query->the_post();?>
                    <div class="event">
                        <?php if(get_field("date")):?>
                            <?php echo get_field("date");?>
                        <?php endif;?>
                        <?php echo " - ";?><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a>
                    </div><!--.event-->
                <?php endwhile;
            endif;?>
        </div><!--.copy-->
    </section><!--.row-3-->
</article><!-- #post-## -->
