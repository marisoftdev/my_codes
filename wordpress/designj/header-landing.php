<?php $options = get_option( 'fresh_theme_settings' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<?php
//Load Favicon
$s_designd_favicon = get_option('designd_favicon');
?>
<!-- Styles & Favicon -->
<?php if($s_designd_favicon != '') { ?>
<link rel="icon" type="image/png" href="<?php echo $s_designd_favicon; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/custom-css.php" />

<!-- JS & WP Head -->
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>

<?php
//Load Anayltics
$s_designd_google_analytics = get_option('designd_google_analytics');
//Load Site Logo
$s_designd_sitelogo = get_option('designd_sitelogo');
$s_designd_phone_number1 = get_option('designd_phone_number1');

?>
<?php if($s_designd_google_analytics != '') { ?>
<?php echo $s_designd_google_analytics; ?>
<?php } ?>
</head>
<body class="page landing" id="<?php echo $post->post_name; ?>">
<div id="header">
  <div id="header-logo" style="width: 100%; text-align: center;">
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
<div class="clear"></div>
       
</div><!-- /header -->
<div class="clear"></div>
<div id="wrap">