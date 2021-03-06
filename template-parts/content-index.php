<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
	<section class="row-1">
        <?php if(get_field("row_1_image")):?>
            <img class="full-width" src="<?php echo wp_get_attachment_image_src(get_field("row_1_image"),"full")[0];?>" alt="<?php echo get_post(get_field("row_1_image"))!==null?get_post(get_field("row_1_image"))->post_title:"";?>">
         <?php endif;//if for row_1_image?>
        <header>
            <h1 class="wow fadeIn" data-wow-delay="2s"><?php echo get_bloginfo("name");?></h1>
        </header>
	</section><!--.row-1-->
	<section class="row-2 row-join">
        <?php get_template_part( 'template-parts/row-join' );?>
	</section><!--.row-2 .row-join-->
	<section class="row-3">
        <div class="background-image" style="background-image:url(<?php if(get_field("row_3_image")) echo wp_get_attachment_image_src(get_field("row_3_image"),"full")[0];?>);"></div>
        <div class="column wrapper">
            <div class="column-1">
                <?php if(get_post(7)!==null&&get_post(5)!==null):
                    $post=get_post(5);
                    setup_postdata($post);?>
                    <header>
                        <h2><?php echo get_the_title();?></h2>
                    </header>
                    <?php $post=get_post(7);
                    setup_postdata($post);?>
                    <div class="copy">
                        <?php $the_content = get_the_content();
                        if(strlen($the_content)<=200):
                            echo $the_content;
                        else: 
                            echo substr($the_content,0,200)."...";
                        endif;?>
                    </div><!--.copy-->
                    <?php $the_permalink = get_the_permalink();
                    $post = get_post(51);
                    setup_postdata($post);
                    if(get_field("box_#1_button_text")):?>
                        <div class="button">
                            <?php echo get_field("box_#1_button_text");?>
                            <a class="surrounding" href="<?php echo $the_permalink;?>"></a>
                        </div><!--.button.wrapper-->
                    <?php endif;?>
                <?php endif;//if for get_post?>
            </div><!--.column-1-->
            <div class="column-2">
                <?php if(get_post(53)!==null):
                    $post= get_post(53);
                    setup_postdata($post);?>
                    <header>
                        <h2><?php echo get_the_title();?></h2>
                    </header>
                    <div class="copy">
                        <?php $the_content = get_the_content();
                        if(strlen($the_content)<=200):
                            echo $the_content;
                        else: 
                            echo substr($the_content,0,200)."...";
                        endif;?>
                    </div><!--.copy-->
                    <?php $the_permalink = get_the_permalink();
                    $post = get_post(51);
                    setup_postdata($post);
                    if(get_field("box_#2_button_text")):?>
                        <div class="button">
                            <?php echo get_field("box_#2_button_text");?>
                            <a class="surrounding" href="<?php echo $the_permalink;?>"></a>
                        </div><!--.button.wrapper-->
                    <?php endif;?>
                <?php endif;//if for get_post?>
            </div><!--.column-2-->
            <div class="column-3">
                <?php if(get_post(55)!==null):
                    $post=get_post(55);
                    setup_postdata($post);?>
                    <header>
                        <h2><?php echo get_the_title();?></h2>
                    </header>
                    <div class="event wrapper">
                       <?php $date = intval(date("Ymd"));
                        $args = array('post_type'=>'event',
                        'order'=>'ASC','orderby'=>'menu_order',
                        'posts_per_page'=>5,'meta_query'=>array(
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
                                        <div class="date">
                                            <?php echo get_field("date");?> -
                                        </div><!--.date-->
                                    <?php endif;?>
                                    <div class="title">
                                        <a href="<?php echo get_the_permalink();?>"><?php the_title();?></a>
                                    </div><!--.title-->
                                </div><!--.event-->
                            <?php endwhile;
                        endif;?>
                    </div><!--.copy-->
                    <?php $the_permalink = get_the_permalink(55);
                    $post = get_post(51);
                    setup_postdata($post);
                    if(get_field("box_#3_button_text")):?>
                        <div class="button">
                            <?php echo get_field("box_#3_button_text");?>
                            <a class="surrounding" href="<?php echo $the_permalink;?>"></a>
                        </div><!--.button.wrapper-->
                    <?php endif;?>
                <?php endif;//if for get_post?>
            </div><!--.column-3-->
        </div><!--.column.wrapper-->
	</section><!--.row-3-->
</article><!-- #post-## -->
