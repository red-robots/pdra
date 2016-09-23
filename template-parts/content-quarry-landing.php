<?php
/**
 * Template part for displaying quarry landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-quarry-landing"); ?>>
    <section class="row-1 standard-sub-nav">
        <header><h1><?php echo get_the_title();?></h1></header>
        <div class="background-image" style="background-image:url(<?php if(get_field("standard_nav_background_image","option")) echo wp_get_attachment_image_src(get_field("standard_nav_background_image","option"),"full")[0];?>);"></div>
    </section>
	<section class="row-2">
        <?php $args=array('posts_per_page'=>-1,'post_type'=>'quarry');
		$query = new WP_Query($args);
		if($query->have_posts()):?>
            <?php $count = $query->post_count;
            $row = 0;
            for($i=0;$i<$count;$i++):$query->the_post();?>
                <div class="quarry js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
                    <header><h2><?php echo get_the_title();?></h2></header>
                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),"full")[0];?>" alt="<?php echo get_post(get_post_thumbnail_id())!==null?get_post(get_post_thumbnail_id())->post_title:"";?>">
                    <?php if(get_field("address")):?>
                        <div class="address">
                            <div class="line-1"><?php echo get_field("address_line_1");?></div>
                            <div class="line-2"><?php echo get_field("address_line_2");?></div>
                        </div><!--.address-->
                    <?php endif;?>
                    <?php if(get_field("full_detail_button_text")):?>
                        <div class="button">
                            <?php echo get_field("full_detail_button_text");?>
                            <a class="surrounding" href="<?php echo get_the_permalink();?>"></a>
                        </div><!--.button-->
                    <?php endif;?>
                </div><!--.quarry-->
                <?php if($i%3===2){$row++;}?>
            <?php endfor;?>
		<?php endif;?>
    </section><!--.row-2-->
</article><!-- #post-## -->
