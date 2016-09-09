<?php

//include theme admin
require_once(TEMPLATEPATH . '/admin/admin-functions.php'); 
require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');

//includes
include('functions/theme-admin.php');
include('functions/better-excerpts.php');
include('functions/slides-meta.php');

//scripts
add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	
	wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
	
	if(is_front_page()) :
	wp_enqueue_script('nivoSlider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.pack.js');
	endif;
}


//Remove WordPress Version For Security Reasons
remove_action('wp_head', 'wp_generator');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

//Image resizing
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'header-image',  880, 280, true );
add_image_size( 'singe-post-image',  200, 150, true );
add_image_size( 'post-image',  160, 120, true );
add_image_size( 'related-image',  100, 80, true );
}

// Enable Custom Background
add_custom_background();

//Add Pagination Support
include('functions/pagination.php');

//Register Sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown on the right-hand side.',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer',
'description' => 'Widgets in this area will be shown in the footer.',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Right',
'description' => 'Widgets in this area will be shown on the right side of the big image.',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Landing Page',
'description' => 'Widgets in this area will be shown on the Landing Page.',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

function kc_widget_form_extend( $instance, $widget ) {
 if ( !isset($instance['classes']) )
 $instance['classes'] = null;
  
 /* Allows User to Add Custom CSS Classes */
$row = "<p>Custom Class (default: pad):\n";
$row .= "\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][classes]' id='widget-{$widget->id_base}-{$widget->number}-classes' class='widefat' value='{$instance['classes']}'/>\n";
$row .= "</p>\n";

echo $row;
 return $instance;
}
add_filter('widget_form_callback', 'kc_widget_form_extend', 10, 2);function kc_widget_update( $instance, $new_instance ) {
 $instance['classes'] = $new_instance['classes'];
 return $instance;
}
add_filter( 'widget_update_callback', 'kc_widget_update', 10, 2 );
function kc_dynamic_sidebar_params( $params ) {
 global $wp_registered_widgets;
 $widget_id = $params[0]['widget_id'];
 $widget_obj = $wp_registered_widgets[$widget_id];
 $widget_opt = get_option($widget_obj['callback'][0]->option_name);
 $widget_num = $widget_obj['params'][0]['number'];

 if ( !empty($widget_opt[$widget_num]['classes']) )
 $params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$widget_opt[$widget_num]['classes']} ", $params[0]['before_widget'], 1 );

 return $params;
}
add_filter( 'dynamic_sidebar_params', 'kc_dynamic_sidebar_params' );
 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'bwp_trim_excerpt');

    function bwp_trim_excerpt($text)
    {
        $raw_excerpt = $text;
        if ( '' == $text ) {
            $text = get_the_content('');
            $text = strip_shortcodes( $text );
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]&gt;', $text);
            $text = strip_tags($text, '<img>');
            $excerpt_length = apply_filters('excerpt_length', 30);
            $excerpt_more = apply_filters('excerpt_more', ' ' . '...');
            $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
            if ( count($words) > $excerpt_length ) {
                array_pop($words);
                $text = implode(' ', $words);
                $text = $text . $excerpt_more;
            } else {
                $text = implode(' ', $words);
            }
        }
        return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
    }

// Register Navigation Menus
register_nav_menus(
	array(
	'primary'=>__('Top Menu'),
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}
add_action( 'init', 'create_post_types' );
function create_post_types() {
// Define Post Type For Slider
  register_post_type( 'slides',
    array(
      'labels' => array(
		'name' => _x( 'Slides', 'post type general name' ), // Tip: _x('') is used for localization
		'singular_name' => _x( 'Slide', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Slide' ),
		'add_new_item' => __( 'Add New Slide' ),
		'edit_item' => __( 'Edit Slide' ),
		'new_item' => __( 'New Slide' ),
		'view_item' => __( 'View Slide' ),
		'search_items' => __( 'Search Slides' ),
		'not_found' =>  __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in Trash' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
    )
  );
}

//Analytics in dashboard
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

$s_designd_stats_siteid = get_option('designd_stats_siteid');
$s_designd_stats_sitekey = get_option('designd_stats_sitekey');
if ($s_designd_stats_siteid && $s_designd_stats_sitekey != '') {
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Live Analytics', 'custom_dashboard_analytics');

}
function custom_dashboard_analytics() {
$s_designd_stats_siteid = get_option('designd_stats_siteid');
$s_designd_stats_sitekey = get_option('designd_stats_sitekey');
echo '
<a href="http://stats.verticalaxion.com/?site_id='. $s_designd_stats_siteid .'&sitekey='. $s_designd_stats_sitekey .'" style="display: block; font-size: 18px; margin-bottom: 10px; font-weight: bold;">&raquo; Click to See Full Stats</a>
<div style="width: 100%; overflow: hidden;">
<div style="float: left">
<script src="http://stats.verticalaxion.com/widgets/flashy/?site_id='.$s_designd_stats_siteid.'&sitekey='.$s_designd_stats_sitekey.'&w=400&h=300&date=last-28-days&type=visitors&title=&hide_y=0&hide_title=0&hide_branding=0" type="text/javascript"></script>
</div>
<div style="float: left">
<script src="http://stats.verticalaxion.com/widgets/tally/?site_id='.$s_designd_stats_siteid .'&sitekey='. $s_designd_stats_sitekey .'&width=200&height=300&title=&hide_title=0&hide_branding=0" type="text/javascript"></script>
</div>
<div style="float: left">
<script src="http://stats.verticalaxion.com/widgets/visitors/?site_id='.$s_designd_stats_siteid.'&sitekey='. $s_designd_stats_sitekey .'&width=200&height=300&limit=4&title=&hide_title=0&hide_branding=0" type="text/javascript"></script>
</div> 
</div> ';
}
}

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>';
		$args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		);
		$attachments = get_posts($args);
		if ($attachments) { 
		$attimage = wp_get_attachment_image_src($attachments[0]->ID, 'thumbnail');
		echo '<meta property="og:image" content="'.$attimage[0].'" />';
		}
		else {
		function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}
echo '<meta property="og:image" content="' . catch_that_image() . '"/>';
		}
	echo "\n";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

add_filter('mce_buttons_2', 'add_font_family_row_2' );

function add_font_family_row_2( $mce_buttons ) {
        $pastetext = array_search( 'pastetext', $mce_buttons );
        $pasteword = array_search( 'pasteword', $mce_buttons );
        $removeformat = array_search( 'removeformat', $mce_buttons );

        unset( $mce_buttons[ $pastetext ] );
        unset( $mce_buttons[ $pasteword ] );
        unset( $mce_buttons[ $removeformat ] );
        array_splice( $mce_buttons, $pastetext, 0, 'fontselect' );
        return $mce_buttons;
}
function add_font_family_row_3( $mce_buttons ) {
        $mce_buttons[] = 'fontselect';
        return $mce_buttons;
}
add_filter('tiny_mce_before_init', 'font_choices' );
function font_choices( $init ) {
        $init['theme_advanced_fonts'] = 
                'Andale Mono=andale mono,times;'.
                'Arial=arial,helvetica,sans-serif;'.
                'Arial Black=arial black,avant garde;'.
                'Book Antiqua=book antiqua,palatino;'.
                'Comic Sans MS=comic sans ms,sans-serif;'.
                'Courier New=courier new,courier;'.
                'Georgia=georgia,palatino;'.
                'Helvetica=helvetica;'.
                'Impact=impact,chicago;'.
                'Symbol=symbol;'.
                'Tahoma=tahoma,arial,helvetica,sans-serif;'.
                'Terminal=terminal,monaco;'.
                'Times New Roman=times new roman,times;'.
                'Trebuchet MS=trebuchet ms,geneva;'.
                'Verdana=verdana,geneva;'.
                'Webdings=webdings;'.
                'Wingdings=wingdings,zapf dingbats'.
                '';
        return $init;
}
function wp_editor_fontsize_filter( $options ) {
	array_shift( $options );
	array_unshift( $options, 'fontsizeselect');
	array_unshift( $options, 'formatselect');
	return $options;
}
add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');

function get_the_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = get_bloginfo('template_url')."/images/default.png";
  }
  return $first_img;
}

function filter_plugin_updates( $value ) {
    unset( $value->response['testimonials-by-woothemes/woothemes-testimonials.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

function filter_plugin_updates_vc( $value ) {
    unset( $value->response['js_composer/js_composer.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates_vc' );
?>