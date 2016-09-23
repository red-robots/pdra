<?php
/**
 * Template part for displaying quarry pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-quarry"); ?>>
    <section class="row-1 standard-sub-nav">
		<?php $args=array('posts_per_page'=>-1,'post_type'=>'quarry');
		$query = new WP_Query($args);
		if($query->have_posts()):?>
            <ul class="sub-menu">
                <?php while($query->have_posts()):$query->the_post();?>
                    <li><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></li>
                <?php endwhile;?>
            </ul>
		<?php wp_reset_postdata();
		endif;?>
        <div class="background-image" style="background-image:url(<?php if(get_field("standard_nav_background_image","option")) echo wp_get_attachment_image_src(get_field("standard_nav_background_image","option"),"full")[0];?>);"></div>
    </section>
	<section class="row-2">
        <header>
            <h1><?php echo get_the_title(); ?></h1>
        </header>
        <div class="column wrapper">
            <div class="column-1 js-blocks">
                <?php if(get_field("map")):?>
                    <div class="map">
                        <?php echo get_field("map");?>
                    </div><!--.map-->
                <?php endif;?>
                <?php if((get_field("lat")&&get_field("long"))||(get_field("address_line_1")&&get_field("address_line_2"))||(get_field("map_button_text")&&get_field("map_link"))):?>
                    <div class="map-info">
                        <?php if(get_field("map_button_text")&&get_field("map_link")):?>
                            <div class="button">
                                <?php echo get_field("map_button_text");?>
                                <a class="surrounding" href="<?php echo get_field("map_link");?>" target="_blank"></a>
                            </div><!--.button-->
                        <?php endif;?>
                        <?php if(get_field("address_line_1")&&get_field("address_line_2")):?>
                            <div class="address">
                                <div class="line-1"><?php echo get_field("address_line_1");?></div>
                                <div class="line-2"><?php echo get_field("address_line_2");?></div>
                            </div><!--.address-->
                        <?php endif;?>
                        <?php if(get_field("lat")&&get_field("long")):?>
                            <div class="lat-long">
                                <div class="long"><?php echo get_field("long");?></div>
                                <div class="lat"><?php echo get_field("lat");?></div>
                            </div><!--.lat-long-->
                        <?php endif;?>
                    </div><!--.map-info-->
                <?php endif;?>
                <div class="copy">
                    <?php echo get_the_content();?>
                </div><!--.copy-->
            </div><!--.column-1-->
            <div class="column-2 js-blocks">
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
                <?php  $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,
                'tax_query'=>array(
                    array(
                        'taxonomy'=>'leader_type',
                        'field'=>'slug',
                        'terms'=>$post->post_name,
                    ),
                ));
                $manager_title = get_field("manager_title");
                $query = new WP_Query($args);
                if($query->have_posts()):$query->the_post();?>
                    <div class="manager wrapper">
                        <?php if(!empty($manager_title)):?>
                            <header>
                                <h3><?php echo $manager_title;?></h3>
                            </header>
                        <?php endif;?>
                        <div class="manager">
                            <?php $image = get_field('image');
                            if(!empty($image)):?>
                                <img src="<?php echo wp_get_attachment_image_src($image,"full")[0];?>" alt="<?php echo get_post($image)!==null?get_post($image)->post_title:"";?>">
                            <?php endif;?>
                            <div class="title"><?php the_title();?></div><!--.title-->
                            <?php $term = get_field('term');
                            if(!empty($term)):?>
                                <div class="term"><?php echo $term;?></div><!--.term-->
                            <?php endif;?>
                            <?php $tel = get_field('tel');
                            if(!empty($tel)):?>
                                <div class="tel"><?php echo $tel;?></div><!--.tel-->
                            <?php endif;?>
                            <?php $email = get_field('email');
                            if(!empty($email)):?>
                                <div class="email"><i class="fa fa-envelope"></i><a class="surrounding" target="_blank" href="<?php echo $email;?>"></a></div><!--.email-->
                            <?php endif;?>
                        </div><!--.manager-->
                    </div><!--.manager .wrapper-->
                <?php endif;?>
                <?php wp_reset_postdata();?>
            </div><!--.column-2-->
        </div><!--.column .wrapper-->
    </section><!--.row-2-->
    <?php $images = get_field('gallery');
    if($images!=null && count($images)>0): ?>
        <section class="row-3">
            <?php if(get_field("row_3_title")):?>
                <header>
                    <h2><?php echo get_field("row_3_title");?></h2>
                </header>
            <?php endif;?>
            <?php $row = 0;?>
            <div class="gallery wrapper">
                <?php for($i=0;$i<count($images);$i++):?>
                    <div class="thumbnail js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
                        <a class="gallery" href="<?php echo $images[$i]['url'];?>">
                            <img src="<?php echo wp_get_attachment_image_src($images[$i]['ID'],"gallery")[0];?>" alt="<?php echo $images[$i]['title']; ?>">															
                        </a>
                    </div><!--.thumbnail-->
                    <?php if($i%3===2){$row++;}?>
                <?php endfor;?>
            </div><!--.gallery-->
        </section><!--.row-3-->
    <?php endif; //if images ?>
	<?php $videos = get_field('videos');
	if($videos!=null && count($videos)>0):?> 
        <section class="row-4">
            <?php if(get_field("row_4_title")):?>
                <header>
                    <h2><?php echo get_field("row_4_title");?></h2>
                </header>
            <?php endif;?>
            <?php $row = 0;?>
            <div class="video wrapper">
                <?php for($i=0;$i<count($videos);$i++):?>
                    <div class="thumbnail js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
                        <?php preg_match("/src=\"(.+)\"/i",$videos[$i]['iframe'],$matches); ?>
                        <iframe src="<?php echo $matches[1];?>" allowfullscreen="allowfullscreen"></iframe>
                    </div><!--.thumbnail-->
                    <?php if($i%3===2){$row++;}?>
                <?php endfor;?>
            </div><!--.gallery-->
        </section><!--.row-4-->
    <?php endif;//if videos?>
</article><!-- #post-## -->
