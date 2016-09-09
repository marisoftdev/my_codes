<?php $options = get_option( 'fresh_theme_settings' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<?php
//Load Favicon
$s_designd_favicon = get_option('designd_favicon');
?>
<!-- Styles & Favicon -->
<?php if($s_designd_favicon != '') { ?>
<link rel="shortcut icon" href="<?php echo $s_designd_favicon; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/custom-css.php" />

<!-- JS & WP Head -->
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>

<!-- Superfish Navigation Menu -->
<script> 
jQuery(function($){
    $(document).ready(function() { 
        $('ul.sf-menu').superfish({ 
            delay: 100,
            animation: {opacity:'show',height:'show'},
			speed: 'normal',
            autoArrows:  false,
            dropShadows: false
        }); 
    }); 
});
</script>

<?php
//Load Anayltics
$s_designd_google_analytics = get_option('designd_google_analytics');
//Load Site Logo
$s_designd_sitelogo = get_option('designd_sitelogo');
//Load Box Links
$s_designd_show_boxes_checkbox = get_option('designd_show_boxes_checkbox');
$s_designd_box1_link = get_option('designd_box1_link');
$s_designd_box2_link = get_option('designd_box2_link');
$s_designd_box3_link = get_option('designd_box3_link');
$s_designd_box4_link = get_option('designd_box4_link');
$s_designd_box5_link = get_option('designd_box5_link');
//Load Social Media
$s_designd_youtube_url = get_option('designd_youtube_url');
$s_designd_linkedin_url = get_option('designd_linkedin_url');
$s_designd_twitter_url = get_option('designd_twitter_url');
$s_designd_facebook_url = get_option('designd_facebook_url');
//Load Site Colors
$s_designd_page_background = get_option('designd_page_background');
$s_designd_cta_color_picker = get_option('designd_cta_color_picker');
$s_designd_menubar_color_picker = get_option('designd_menubar_color_picker');
//Load Company Address
$s_designd_Company_Name = get_option('designd_Company_Name');
$s_designd_address1_loc1 = get_option('designd_address1_loc1');
$s_designd_address2_loc1 = get_option('designd_address2_loc1');
$s_designd_city_loc1 = get_option('designd_city_loc1');
$s_designd_state_loc1 = get_option('designd_state_loc1');
$s_designd_zip_loc1 = get_option('designd_zip_loc1');
$s_designd_phone_number1 = get_option('designd_phone_number1');
$s_designd_email_address = get_option('designd_email_address');
?>
<?php if($s_designd_google_analytics != '') { ?>
<?php echo $s_designd_google_analytics; ?>
<?php } ?>
</head>
<body<?php if(is_front_page()) { ?> class="home"<?php } else { ?> class="page" <?php } ?> id="<?php echo $post->post_name; ?>">
<div id="header">
  <div id="header-logo">
 			 <?php if($s_designd_sitelogo !='') { ?>
            	<a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><img src="<?php echo $s_designd_sitelogo; ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
           	 <?php } else { ?>
            	<?php if (is_front_page()) {?>
        			<h1><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h1>
                <?php } else { ?>
                	<h2><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h2>
				<?php } ?>
        		<p id="header-description">
					<?php bloginfo( 'description' ) ?>
				</p>
                <?php } ?>
	</div><!-- /header-logo -->
    
		<?php if($options['phone'] != '') { ?>
            <div id="phonebig">
                <img src="<?php bloginfo('template_url'); ?>/images/phonebig.png" alt="" /><?php echo $s_designd_phone_number1; ?>
           </div><!-- END header phone number -->
       <?php } ?>
	   <div id="primary-nav">
<?php wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'sort_column' => 'menu_order',
		'menu_class' => 'sf-menu',
    	'fallback_cb' => 'default_menu' ) ); ?>

</div><!-- /primary-nav -->
    <div id="mobile-menu" ><label for="menu-toggle">Menu</label>
    <input type="checkbox" id="menu-toggle"/>
    <ul id="menu">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'sort_column' => 'menu_order',
                'menu_class' => 'sf-menu',
                'fallback_cb' => 'default_menu' ) ); ?>
    </ul>
        </div>
<div class="clear"></div>

</div><!-- /header -->
<div class="clear"></div>
<div id="wrap">
<?php if (is_front_page()) {?>
<?php get_template_part( 'nivoslider' ) ?> 
<?php if($s_designd_show_boxes_checkbox == 'true') { ?>
<?php get_template_part( 'bottomboxes' ) ?> 
<?php } ?>
<div class="clear"></div>
<?php } ?>