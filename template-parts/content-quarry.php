<?php
/**
 * Template part for displaying quarry pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="row-1">
		<?php $args=('posts_per_page'=>-1,'post_type'=>'quarry');
		$query = new WP_Query($args);
		if($query->have_posts()):?>
            <ul>
                <?php while($query->have_posts()):the_post();?>
                    <li><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></li>
                <?php endwhile;?>
            </ul>
		<?php endif;?>
    </section>
	<section class="row-2">
        <header>
            <h1><?php echo get_the_title(); ?></h1>
        </header>
        <div class="column-1">
            <?php if(get_field("map")):?>
                <div class="map">
                    <?php echo get_field("map");?>
                </div><!--.map-->
            <?php endif;?>
            <?php if(get_field("lat_long")||get_field("address")||(get_field("map_button_text")&&get_field("map_link"))):?>
                <div class="map-info">
                    <?php if(get_field("address")):?>
                        <div class="address">
                            <?php echo get_field("address");?>
                        </div><!--.address-->
                    <?php endif;?>
                    <?php if(get_field("lat_long")):?>
                        <div class="lat-long">
                            <?php echo get_field("lat_long");?>
                        </div><!--.lat-long-->
                    <?php endif;?>
                    <?php if(get_field("map_button_text")&&get_field("map_link")):?>
                        <div class="button">
                            <?php echo get_field("map_button_text");?>
                            <a class="surrounding" href="<?php echo get_field("map_link");?>" target="_blank"></a>
                        </div><!--.button-->
                    <?php endif;?>
                </div><!--.map-info-->
            <?php endif;?>
            <div class="copy">
                <?php echo get_the_content();?>
            </div><!--.copy-->
        </div><!--.column-1-->
        <div class="column-2">
            <?php if(get_field("pdf_image")):?>
                <div class="pdf-image">
                    <img src="<?php echo wp_get_attachment_image_src(get_field("pdf_image"),"full")[0];?>" alt="<?php echo get_post(get_field("pdf_image"))!==null?get_post(get_field("pdf_image"))->post_title:"";?>">
                </div><!--.pdf-image-->
            <?php endif;?>
            <?php if(get_field("pdf_button_text")&&get_field("pdf_link")):?>
                <div class="button">
                    <?php echo get_field("pdf_button_text");?>
                    <a class="surrounding" href="<?php echo get_field("pdf_link");?>" target="_blank"></a>
                </div><!--.button-->
            <?php endif;?>
        </div><!--.column-2-->
    </section><!--.row-2-->
	<section class="row-3">
        <?php if(get_field("row_3_title")):?>
            <header>
                <h2><?php echo get_field("row_3_title");?></h2>
            </header>
        <?php endif;?>
        <?php if(get_field("gallery")):
            $images = get_field('gallery');?>
			<?php if($images!=null && count($images)>0): ?>
				<div class="gallery">
					<?php for($i=0;$i<count($images);$i++):?>
						<div class="thumbnail count-<?php echo $i%3;?>">
							<a class="gallery" href="<?php echo $images[$i]['url'];?>">
								<img src="<?php echo wp_get_attachment_image_src($images[$i]['ID'],"gallery")[0];?>" alt="<?php echo $images[$i]['title']; ?>">															
                            </a>
                        </div><!--.thumbnail-->
                    <?php endfor;?>
                </div><!--.gallery-->
            <?php endif; //if images ?>
        <?php endif;//if gallery?>
	</section><!--.row-3-->
</article><!-- #post-## -->
