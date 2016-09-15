<?php
/**
 * Template part for displaying page content in page-leadership.php
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
		$return = return_sub_menu_no_recursion($menu_string);
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
	<section class="row-3">
        <header><h2><?php if(get_field("officers_title"))echo get_field("officers_title");else echo "Officers";?></h2></header>
        <?php $rows = get_field("officers");
        $count = count($rows);
        for($i=0;$i<$count;$i++):
            $row = $rows[$i];?>
            <div class="officer count-<?php echo $i%3;?>">
                <?php if(isset($row['image'])):?>
                    <img src="<?php echo wp_get_attachment_image_src($row['image'],"full")[0];?>" alt="<?php echo get_post($row['image'])!==null?get_post($row['image'])->post_title:"";?>">
                <?php endif;?>
                <?php if(isset($row['title'])):?>
                    <div class="title"><?php echo $row['title'];?></div><!--.title-->
                <?php endif;?>
                <?php if(isset($row['term'])):?>
                    <div class="term"><?php echo $row['term'];?></div><!--.term-->
                <?php endif;?>
                <?php if(isset($row['tel'])):?>
                    <div class="tel"><?php echo $row['tel'];?></div><!--.tel-->
                <?php endif;?>
                <?php if(isset($row['email'])):?>
                    <div class="email"><a class="surrounding" target="_blank" href="<?php echo $row['email'];?>"></a></div><!--.email-->
                <?php endif;?>
            </div><!--.officer-->
        <?php endfor;?>
	</section><!--.row-3-->
	<section class="row-4">
        <header><h2><?php if(get_field("board_title"))echo get_field("board_title");else echo "Board of Directors";?></h2></header>
        <div class="north-district">
            <header><h3><?php if(get_field("board_north_title"))echo get_field("board_north_title");else echo "North District";?></h3></header>
            <?php $rows = get_field("board_north");
            $count = count($rows);
            for($i=0;$i<$count;$i++):
                $row = $rows[$i];?>
                <div class="board-north count-<?php echo $i%3;?>">
                    <?php if(isset($row['image'])):?>
                        <img src="<?php echo wp_get_attachment_image_src($row['image'],"full")[0];?>" alt="<?php echo get_post($row['image'])!==null?get_post($row['image'])->post_title:"";?>">
                    <?php endif;?>
                    <?php if(isset($row['title'])):?>
                        <div class="title"><?php echo $row['title'];?></div><!--.title-->
                    <?php endif;?>
                    <?php if(isset($row['term'])):?>
                        <div class="term"><?php echo $row['term'];?></div><!--.term-->
                    <?php endif;?>
                    <?php if(isset($row['tel'])):?>
                        <div class="tel"><?php echo $row['tel'];?></div><!--.tel-->
                    <?php endif;?>
                    <?php if(isset($row['email'])):?>
                        <div class="email"><a class="surrounding" target="_blank" href="<?php echo $row['email'];?>"></a></div><!--.email-->
                    <?php endif;?>
                </div><!--.board-north-->
            <?php endfor;?>
        </div><!--.north-district .wrapper-->
        <div class="central-district wrapper">
            <header><h3><?php if(get_field("board_central_title"))echo get_field("board_central_title");else echo "Central District";?></h3></header>
            <?php $rows = get_field("board_north");
            $count = count($rows);
            for($i=0;$i<$count;$i++):
                $row = $rows[$i];?>
                <div class="board-central count-<?php echo $i%3;?>">
                    <?php if(isset($row['image'])):?>
                        <img src="<?php echo wp_get_attachment_image_src($row['image'],"full")[0];?>" alt="<?php echo get_post($row['image'])!==null?get_post($row['image'])->post_title:"";?>">
                    <?php endif;?>
                    <?php if(isset($row['title'])):?>
                        <div class="title"><?php echo $row['title'];?></div><!--.title-->
                    <?php endif;?>
                    <?php if(isset($row['term'])):?>
                        <div class="term"><?php echo $row['term'];?></div><!--.term-->
                    <?php endif;?>
                    <?php if(isset($row['tel'])):?>
                        <div class="tel"><?php echo $row['tel'];?></div><!--.tel-->
                    <?php endif;?>
                    <?php if(isset($row['email'])):?>
                        <div class="email"><a class="surrounding" target="_blank" href="<?php echo $row['email'];?>"></a></div><!--.email-->
                    <?php endif;?>
                </div><!--.board-central-->
            <?php endfor;?>
        </div><!--.central-district .wrapper-->
        <div class="south-district wrapper">
            <header><h3><?php if(get_field("board_south_title"))echo get_field("board_south_title");else echo "South District";?></h3></header>
            <?php $rows = get_field("board_south");
            $count = count($rows);
            for($i=0;$i<$count;$i++):
                $row = $rows[$i];?>
                <div class="board-south count-<?php echo $i%3;?>">
                    <?php if(isset($row['image'])):?>
                        <img src="<?php echo wp_get_attachment_image_src($row['image'],"full")[0];?>" alt="<?php echo get_post($row['image'])!==null?get_post($row['image'])->post_title:"";?>">
                    <?php endif;?>
                    <?php if(isset($row['title'])):?>
                        <div class="title"><?php echo $row['title'];?></div><!--.title-->
                    <?php endif;?>
                    <?php if(isset($row['term'])):?>
                        <div class="term"><?php echo $row['term'];?></div><!--.term-->
                    <?php endif;?>
                    <?php if(isset($row['tel'])):?>
                        <div class="tel"><?php echo $row['tel'];?></div><!--.tel-->
                    <?php endif;?>
                    <?php if(isset($row['email'])):?>
                        <div class="email"><a class="surrounding" target="_blank" href="<?php echo $row['email'];?>"></a></div><!--.email-->
                    <?php endif;?>
                </div><!--.board-south-->
            <?php endfor;?>
        </div><!--.south-district .wrapper-->
	</section><!--.row-4-->
	<section class="row-5">
        <header><h2><?php if(get_field("trustees_title"))echo get_field("trustees_title");else echo "Board of Trustees";?></h2></header>
        <?php $rows = get_field("trustees");
        $count = count($rows);
        for($i=0;$i<$count;$i++):
            $row = $rows[$i];?>
            <div class="trustee count-<?php echo $i%3;?>">
                <?php if(isset($row['name'])):?>
                    <div class="name"><?php echo $row['name'];?></div><!--.name-->
                <?php endif;?>
                <?php if(isset($row['location'])):?>
                    <div class="location"><?php echo $row['location'];?></div><!--.location-->
                <?php endif;?>
            </div><!--.trustee-->
        <?php endfor;?>
	</section><!--.row-5-->
</article><!-- #post-## -->
