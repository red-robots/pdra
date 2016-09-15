<?php 
if ( ! function_exists( 'acstarter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acstarter_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on ACStarter, use a find and replace
   * to change 'acstarter' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'acstarter', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'acstarter' ),
    'footer_left' => esc_html__( 'Footer Left', 'acstarter' ),
    'footer_right' => esc_html__( 'Footer Right', 'acstarter' ),
    'sitemapBW' => esc_html__( 'SitemapBW', 'acstarter' ),
    'sitemap' => esc_html__( 'Sitemap', 'acstarter' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  // add_theme_support( 'post-formats', array(
  //  'aside',
  //  'image',
  //  'video',
  //  'quote',
  //  'link',
  // ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'acstarter_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif;
add_action( 'after_setup_theme', 'acstarter_setup' );

  /*
   * Custom image size for gallery
   */
   add_image_size("gallery",600,500,array('center','center'));
   
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acstarter_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'acstarter_content_width', 640 );
}
add_action( 'after_setup_theme', 'acstarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acstarter_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'acstarter' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'acstarter_widgets_init' );

function return_sub_menu($menu_string){
    $index = strpos($menu_string,"current-menu-item");
    if($index === -1)return -1;
    $start_matched = preg_match('/.*?(<\s*ul[^>]*sub-menu[^>]*>).*?/i', $menu_string, $start_matches);
    $end_matched = preg_match('/.*?(<\s*\/\s*ul\s*>).*?/i', $menu_string, $end_matches);
    if($start_matched!==1||$end_matched!==1) return -1;
    $saved_start_matches = $start_matches;
    $poss = array();
    $poss_items = array();
    $offset = -1;
    for($j = 1;$j<count($saved_start_matches);$j++){
        $match = $saved_start_matches[$j];
        do{
            $offset++;
            $offset = strpos($menu_string,$match,$offset);
            if($offset===false)break;
            $poss[]=$offset;
            $poss_items[$offset]=0;
        }while($offset<strlen($menu_string));
    }
    $saved_end_matches = $end_matches;
    $offset = -1;
    for($j = 1;$j<count($saved_end_matches);$j++){
        $match = $saved_end_matches[$j];
        do{
            $offset++;
            $offset = strpos($menu_string,$match,$offset);
            if($offset===false)break;
            $poss[]=$offset;
            $poss_items[$offset]=1;
        }while($offset<strlen($menu_string));
    }
    //make sure they are in order for the next loops
    sort($poss,SORT_NUMERIC);
    $count=0;
    $start_index = -1;
    for($i = count($poss)-1;$i>=0;$i--){
        if($poss[$i]>$index)continue;
        if($poss_items[$poss[$i]]===0&&$count===0){
            $start_index = $poss[$i];
            break;
        }
        elseif($poss_items[$poss[$i]]===0)$count--;
        else $count++;
    }
    if($start_index===-1)return -1;
    $count=0;
    $end_index = -1;
    for($i = 0;$i<count($poss);$i++){
        if($poss[$i]<$index)continue;
        if($poss_items[$poss[$i]]===1&&$count===0){
            $end_index = $poss[$i];
            break;
        }
        elseif($poss_items[$poss[$i]]===1)$count--;
        else $count++;
    }
    if($end_index===-1)return -1;
    return substr($menu_string,$start_index,$end_index-$start_index);
}
function return_sub_menu_no_recursion($menu_string){
    $index = strpos($menu_string,"current-menu-item");
    if($index === -1)return -1;
    $start_matched = preg_match('/.*?(<\s*ul[^>]*sub-menu[^>]*>).*?/i', $menu_string, $start_matches);
    $end_matched = preg_match('/.*?(<\s*\/\s*ul\s*>).*?/i', $menu_string, $end_matches);
    if($start_matched!==1||$end_matched!==1) return -1;
    $saved_start_matches = $start_matches;
    $poss = array();
    $poss_items = array();
    $poss_length = array();
    $offset = -1;
    for($j = 1;$j<count($saved_start_matches);$j++){
        $match = $saved_start_matches[$j];
        do{
            $offset++;
            $offset = strpos($menu_string,$match,$offset);
            if($offset===false)break;
            $poss[]=$offset;
            $poss_items[$offset]=0;
            $poss_length[$offset]=strlen($match);
        }while($offset<strlen($menu_string));
    }
    $saved_end_matches = $end_matches;
    $offset = -1;
    for($j = 1;$j<count($saved_end_matches);$j++){
        $match = $saved_end_matches[$j];
        do{
            $offset++;
            $offset = strpos($menu_string,$match,$offset);
            if($offset===false)break;
            $poss[]=$offset;
            $poss_items[$offset]=1;
            $poss_length[$offset]=strlen($match);
        }while($offset<strlen($menu_string));
    }
    //make sure they are in order for the next loops
    sort($poss,SORT_NUMERIC);
    //holds all sub menu starting tags
    $remove_start_index = array();
    //holds all ul ending tags
    $remove_end_index = array();
    $count=0;
    $start_index = -1;
    for($i = count($poss)-1;$i>=0;$i--){
        if($poss[$i]>$index)continue;
        if($poss_items[$poss[$i]]===0&&$count===0){
            $start_index = $poss[$i];
            break;
        }
        elseif($poss_items[$poss[$i]]===0){
            $count--;
            if($count===0){
                $remove_start_index[]=$poss[$i];
            }
        }
        else {
            $count++;
            if($count===1){
                $remove_end_index[]=$poss[$i];
            }
        }
    }
    if($start_index===-1||count($remove_start_index)!==count($remove_end_index))return -1;
    $count=0;
    $end_index = -1;
    for($i = 0;$i<count($poss);$i++){
        if($poss[$i]<$index)continue;
        if($poss_items[$poss[$i]]===1&&$count===0){
            $end_index = $poss[$i];
            break;
        }
        elseif($poss_items[$poss[$i]]===1){
            $count--;
            if($count===0){
                $remove_end_index[]=$poss[$i];
            }
        }
        else {
            $count++;
            if($count===1){
                $remove_start_index[]=$poss[$i];
            }
        }
    }
    if($end_index===-1||count($remove_start_index)!==count($remove_end_index))return -1;
    $temp_start_index = $start_index;
    $return = "";
    for($i = 0;$i<count($remove_start_index);$i++){
        $length = $remove_start_index[$i]-$temp_start_index;
        $return.=substr($menu_string,$temp_start_index,$length);
        $temp_start_index = $remove_end_index[$i]+$poss_length[$remove_end_index[$i]];
    }
    $return.=substr($menu_string,$temp_start_index,$end_index-$temp_start_index+$poss_length[$end_index]);
    return $return;
}
