<?php
/**
 * Template part for displaying page content in page-ga-minutes.php.
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
            <?php echo get_the_content();?>
        </div>
    </section><!--.row-2-->
    <section class="row-3 row-minutes">
        <?php if(get_field("ga_minutes_header_text","option")):?>
            <header>
                <h2><?php echo get_field("ga_minutes_header_text","option");?></h2>
            </header>
        <?php endif;?>
        <?php $date = date("Ymd");
        $args = array('post_type'=>'ga-minutes','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'meta_query'=>array(
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
                        <a href="<?php echo get_field("file_upload");?>"><?php echo get_the_title();?></a> - <?php if(get_field("meeting_date"))echo get_field("meeting_date");?>
                    <?php endif;?>
                </div><!--.minutes-->
            <?php endwhile;
            wp_reset_postdata();
        endif;?>
    </section>
	<section class="row-4 row-join">
        <?php if(get_field("row_join_text","option")):?>
            <div class="column-1"><?php echo get_field("row_join_text","option");?></div><!--.column-1-->
        <?php endif;//if for row_2_text?>
        <?php if(get_field("row_join_button_text","option")):?>
            <div class="column-2">
                <div class="button">
                    <?php echo get_field("row_join_button_text","option");?>
                    <?php if(get_field("row_join_button_link","option")):?>
                        <a href="<?php echo get_field("row_join_button_link","option");?>" class="surrounding"></a>
                    <?php endif;?>
                </div>
            </div><!--.column-2-->
        <?php endif;//if for row_2_button_text?>
	</section><!--.row-4 .row-join-->
</article><!-- #post-## -->
