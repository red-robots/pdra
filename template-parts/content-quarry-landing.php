<?php
/**
 * Template part for displaying quarry landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="row-1">
        <header><h1><?php echo get_the_title();?></h1></header>
    </section>
	<section class="row-2">
        <?php $args=('posts_per_page'=>-1,'post_type'=>'quarry');
		$query = new WP_Query($args);
		if($query->have_posts()):?>
            <?php $count = $query->max_num_pages;
            for($i=0;$i<$count;$i++):the_post();?>
                <div class="quarry count-<?php echo $i%3;?>">
                    <header><h2><?php echo get_the_title();?></h2></header>
                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),"full")[0];?>" alt="<?php echo get_post(get_post_thumbnail_id())!==null?get_post(get_post_thumbnail_id())->post_title:"";?>">
                    <?php if(get_field("address")):?>
                        <div class="address">
                            <?php echo get_field("address");?>
                        </div><!--.address-->
                    <?php endif;?>
                    <?php if(get_field("full_detail_button_text")):?>
                        <div class="button">
                            <?php echo get_field("full_detail_button_text");?>
                            <a class="surrounding" href="<?php echo get_the_permalink();?>"></a>
                        </div><!--.button-->
                    <?php endif;?>
                </div><!--.quarry-->
            <?php endfor;?>
		<?php endif;?>
    </section><!--.row-2-->
</article><!-- #post-## -->
