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
	<section class="row-3">
        <header><h2><?php if(get_field("officers_title"))echo get_field("officers_title");else echo "Officers";?></h2></header>
        <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array(
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'officers',
            ),
        ));
        $query = new WP_Query($args);
        $count = $query->post_count;
        $row =0;
        for($i=0;$i<$count;$i++):
            $query->the_post();?>
            <div class="officer js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
                <?php $image = get_field('image');
                if(!empty($image)):?>
                    <img src="<?php echo wp_get_attachment_image_src($image,"full")[0];?>" alt="<?php echo get_post($image)!==null?get_post($image)->post_title:"";?>">
                <?php endif;?>
                <div class="title">
                    <span class="name"><?php the_title();?></span>
                    <?php if(get_field("position")):?>
                        <span class="position"> - <?php echo get_field("position");?></span>
                    <?php endif;?>
                </div><!--.title-->
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
            </div><!--.officer-->
            <?php if($i%3===2){$row++;}?>
        <?php endfor;?>
	</section><!--.row-3-->
	<section class="row-4">
        <header><h2><?php if(get_field("board_title"))echo get_field("board_title");else echo "Board of Directors";?></h2></header>
        <div class="north-district">
            <header><h3><?php if(get_field("board_north_title"))echo get_field("board_north_title");else echo "North District";?></h3></header>
            <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array(
                array(
                    'taxonomy'=>'leader_type',
                    'field'=>'slug',
                    'terms'=>'north-district',
                ),
            ));
            $query = new WP_Query($args);
            $count = $query->post_count;
            $row = 0;
            for($i=0;$i<$count;$i++):
                $query->the_post();?>
                <div class="board-north js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
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
                </div><!--.board-north-->
                <?php if($i%3===2){$row++;}?>
            <?php endfor;?>
        </div><!--.north-district .wrapper-->
        <div class="central-district wrapper">
            <header><h3><?php if(get_field("board_central_title"))echo get_field("board_central_title");else echo "Central District";?></h3></header>
            <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array(
                array(
                    'taxonomy'=>'leader_type',
                    'field'=>'slug',
                    'terms'=>'central-district',
                ),
            ));
            $query = new WP_Query($args);
            $count = $query->post_count;
            $row = 0;
            for($i=0;$i<$count;$i++):
                $query->the_post();?>
                <div class="board-central js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
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
                </div><!--.board-central-->
                <?php if($i%3===2){$row++;}?>
            <?php endfor;?>
        </div><!--.central-district .wrapper-->
        <div class="south-district wrapper">
            <header><h3><?php if(get_field("board_south_title"))echo get_field("board_south_title");else echo "South District";?></h3></header>
            <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array(
                array(
                    'taxonomy'=>'leader_type',
                    'field'=>'slug',
                    'terms'=>'south-district',
                ),
            ));
            $query = new WP_Query($args);
            $count = $query->post_count;
            $row = 0;
            for($i=0;$i<$count;$i++):
                $query->the_post();?>
                <div class="board-south js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
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
                </div><!--.board-south-->
                <?php if($i%3===2){$row++;}?>
            <?php endfor;?>
        </div><!--.south-district .wrapper-->
	</section><!--.row-4-->
	<section class="row-5">
        <header><h2><?php if(get_field("quarry_manager_title"))echo get_field("quarry_manager_title");else echo "Quarry Managers";?></h2></header>
        <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array('relation'=>'OR',
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'quarry-manager',
            ),
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'american-quarry',
            ),
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'jmr-quarry',
            ),
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'lake-norman-quarry',
            ),
        ));
        $query = new WP_Query($args);
        $count = $query->post_count;
        $row = 0;
        for($i=0;$i<$count;$i++):
            $query->the_post();?>
            <div class="manager js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
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
            <?php if($i%3===2){$row++;}?>
        <?php endfor;?>
	</section><!--.row-5-->
	<section class="row-6">
        <header><h2><?php if(get_field("trustees_title"))echo get_field("trustees_title");else echo "Board of Trustees";?></h2></header>
        <?php $args = array('post_type'=>'leader','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>-1,'tax_query'=>array(
            array(
                'taxonomy'=>'leader_type',
                'field'=>'slug',
                'terms'=>'board-of-trustees',
            ),
        ));
        $query = new WP_Query($args);
        $count = $query->post_count;
        $row = 0;
        for($i=0;$i<$count;$i++):
            $query->the_post();?>
            <div class="trustee js-blocks count-<?php echo $i%3;?> row-<?php echo $row;?>">
                    <div class="name"><?php the_title();?></div><!--.name-->
                <?php $location = get_field("location");
                if(!empty($location)):?>
                    <div class="location"><?php echo $location;?></div><!--.location-->
                <?php endif;?>
            </div><!--.trustee-->
            <?php if($i%3===2){$row++;}?>
        <?php endfor;?>
	</section><!--.row-6-->
</article><!-- #post-## -->
