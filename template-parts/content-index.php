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
        <?php if(get_field("row_1_image")):?>
            <img class="full-width" src="<?php echo wp_get_attachment_image_src(get_field("row_1_image"),"full")[0];?>" alt="<?php echo get_post(get_field("row_1_image"))!==null?get_post(get_field("row_1_image"))->post_title:"";?>">
         <?php endif;//if for row_1_image?>
        <header>
            <h1><?php echo get_bloginfo("name");?></h1>
        </header>
	</section><!--.row-1-->
	<section class="row-2 row-join">
        <?php if(get_field("row_join_text","option")):?>
            <div class="column-1"><?php echo get_field("row_join_text","option");?></div><!--.column-1-->
        <?php endif;//if for row_join_text?>
        <?php if(get_field("row_join_button_text","option")):?>
            <div class="column-2"><div class="button"><?php echo get_field("row_join_button_text","option");?></div></div><!--.column-2-->
        <?php endif;//if for row_join_button_text?>
	</section><!--.row-2 .row-join-->
	<section class="row-3" style="background-image:url(<?php if(get_field("row_3_image")) echo wp_get_attachment_image_src(get_field("row_3_image"),"full")[0];?>);">
        <div class="column-1">
            <?php if(get_post(5)!==null):
                $post=get_post(5);
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
            <?php endif;//if for get_post?>
        </div><!--.column-2-->
        <div class="column-3">
            <?php if(get_post(55)!==null):
                $post=get_post(55);
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
            <?php endif;//if for get_post?>
        </div><!--.column-3-->
	</section><!--.row-3-->
</article><!-- #post-## -->
