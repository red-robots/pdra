<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <?php if(get_field("notice","option")
    &&get_field("show_notice","option")
    &&strcmp(get_field("show_notice","option"),"yes")===0):?>
        <div id="notice" class="copy">
            <?php echo get_field("notice","option");?>
        </div><!--.notice-->
    <?php endif;?>
	<header id="masthead" class="site-header" role="banner">
        <div class="logo wrapper">
            <?php if(get_field("logo","option")):?>
                <img class="logo" src="<?php echo wp_get_attachment_image_src(get_field("logo","option"),"full")[0];?>" alt="<?php echo get_post("logo","option")!==null?get_post(get_field("logo","option"))->post_title:"";?>">
                <a class="surrounding" href="<?php echo get_bloginfo("url");?>"></a>
            <?php endif;//if for logo?>
        </div><!--.logo.wrapper-->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            <?php if(get_field("facebook_link","option")):?>
                <i class="fa fa-facebook"><a class="surrounding" target="_blank" href="<?php echo get_field("facebook_link","option");?>"></a></i>
            <?php endif;?>
            <i class="fa fa-bars"></i>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
    <div class="mobile-menu">
        <i class="fa fa-bars"></i>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </div>

	<div id="content" class="site-content wrapper">
