<?php
/**
 * Template part for displaying page content in page-affiliates.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-affiliates"); ?>>
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
    <section class="row-3">
        <?php if(get_field("affiliates_header_text")):?>
            <header>
                <h2><?php echo get_field("affiliates_header_text");?></h2>
            </header>
        <?php endif;?>
        <?php $address_text = get_field("address_text");
        $phone_text = get_field("phone_text");
        $hours_text = get_field("hours_text");
        $staff_text = get_field("staff_text");
        $email_text = get_field("email_text");
        $website_text = get_field("website_text");
        if(have_rows('shop')):
            while(have_rows('shop')):the_row();?>
                <div class="affiliate">
                    <?php $shop_name = get_sub_field("shop_name");
                    $image = get_sub_field("image");
                    $address = get_sub_field("Address");
                    $phone_number = get_sub_field("phone_number");
                    $hours = get_sub_field("hours");
                    $owner = get_sub_field("owner");
                    $email_address = get_sub_field("email_address");
                    $other_information = get_sub_field("other_information");
                    $website = get_sub_field("website");?>
                    <div class="column-1 <?php echo (!empty($image))? "2-column": "1-column";?>">
                        <?php if(!empty($shop_name)):?>
                            <header>
                                <h3><?php echo $shop_name;?></h3>
                            </header>
                        <?php endif;?>
                        <?php if(!empty($address)):?>
                            <div class="address">
                                <?php if(!empty($address_text))echo $address_text;?>
                                <?php echo $address;?>
                            </div><!--.address-->
                        <?php endif;?>
                        <?php if(!empty($phone_number)):?>
                            <div class="phone-number">
                                <?php if(!empty($phone_text))echo $phone_text;?>
                                <?php echo $phone_number;?>
                            </div><!--.phone-number-->
                        <?php endif;?>
                        <?php if(!empty($hours)):?>
                            <div class="hours">
                                <?php if(!empty($hours_text))echo $hours_text."<br>";?>
                                <?php foreach($hours as $hour):?>
                                    <p><?php echo $hour['hours'];?></p>
                                <?php endforeach;?>
                            </div><!--.hours-->
                        <?php endif;?>
                        <?php if(!empty($owner)):?>
                            <div class="owner">
                                <?php if(!empty($staff_text))echo $staff_text;?>
                                <?php echo $owner;?>
                            </div><!--.owner-->
                        <?php endif;?>
                        <?php if(!empty($email_address)):?>
                            <div class="email-address">
                                <?php if(!empty($email_text))echo $email_text;?>
                                <a href="mailto:<?php echo $email_address;?>"><?php echo $email_address;?></a>
                            </div><!--.email-address-->
                        <?php endif;?>
                        <?php if(!empty($website)):?>
                            <div class="website">
                                <?php if(!empty($website_text))echo $website_text;?>
                                <a href="<?php echo $website;?>" target="_blank"><?php echo $website;?></a>
                            </div><!--.website-->
                        <?php endif;?>
                        <?php if(!empty($other_information)):?>
                            <div class="other-information">
                                <?php echo $other_information;?>
                            </div><!--.other-information-->
                        <?php endif;?>
                    </div><!--.column-1-->
                    <?php if(!empty($image)):?>
                        <div class="column-2">
                            <img src="<?php echo wp_get_attachment_image_src($image,"full")[0];?>" alt="<?php echo get_post($image)!==null?get_post($image)->post_title:"";?>">
                        </div><!--.column-2-->
                    <?php endif;?>
                </div><!--.affiliate-->
            <?php endwhile;
            wp_reset_postdata();
        endif;?>
    </section>
	<section class="row-4 row-join">
        <?php get_template_part( 'template-parts/row-join' );?>
	</section><!--.row-4 .row-join-->
</article><!-- #post-## -->
