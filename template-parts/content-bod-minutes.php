<?php
/**
 * Template part for displaying page content in page-bod-minutes.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-ga-minutes"); ?>>
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
    <?php if ( ! post_password_required() ) :?>
        <section class="row-3 row-minutes">
            <?php if(get_field("bod_minutes_header_text","option")):?>
                <header>
                    <h2><?php echo get_field("bod_minutes_header_text","option");?></h2>
                </header>
            <?php endif;?>
            <?php $date = intval(date("Ymd"))-20000;
            $args = array('post_type'=>'bod-minutes','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'meta_query'=>array(
                'relation'=>'AND',
                    array(
                        'key'=>'meeting_date',
                        'compare'=>'EXISTS',
                    ),
                    array(
                        'key'=>'meeting_date',
                        'value'=>$date,
                        'compare'=>'>=',
                        'type'=>'NUMERIC',
                    ),
                ),
            );
            $query = new WP_Query($args);
            if($query->have_posts()):
                while($query->have_posts()):$query->the_post();?>
                    <div class="minutes">
                        <?php if(get_field("file_upload")):?>
                            <a href="<?php echo get_field("file_upload");?>" target="_blank"><?php echo get_the_title();?></a> - <?php if(get_field("meeting_date"))echo get_field("meeting_date");?>
                        <?php endif;?>
                    </div><!--.minutes-->
                <?php endwhile;
                wp_reset_postdata();
            endif;?>
        </section>
    <?php endif;//if for post_password_required?>
	<section class="row-4 row-join">
        <?php get_template_part( 'template-parts/row-join' );?>
	</section><!--.row-4 .row-join-->
</article><!-- #post-## -->
