<?php
//Load Library to Load vars
require_once('../../../wp-load.php');
//Header makes browsers see a stylesheet
header("Content-type: text/css; charset: UTF-8");

//LOAD COLOR VARIABLES
$s_designd_cta_color_picker = get_option('designd_cta_color_picker'); 
$s_designd_lead_bg_color_picker = get_option('designd_lead_bg_color_picker'); 
$s_designd_strip_bg_color_picker = get_option('designd_strip_bg_color_picker'); 
$s_designd_btn_bg_color_picker = get_option('designd_btn_bg_color_picker'); 
$s_designd_btn_border_color_picker = get_option('designd_btn_border_color_picker');
$s_designd_footer_bg_color_picker = get_option('designd_footer_bg_color_picker'); 
$s_designd_box1_bg_color_picker = get_option('designd_box1_bg_color_picker'); 
$s_designd_box2_bg_color_picker = get_option('designd_box2_bg_color_picker'); 
$s_designd_box3_bg_color_picker = get_option('designd_box3_bg_color_picker'); 
$s_designd_box4_bg_color_picker = get_option('designd_box4_bg_color_picker'); 
$s_designd_box5_bg_color_picker = get_option('designd_box5_bg_color_picker'); 
$s_designd_rounded_corners_checkbox = get_option('designd_rounded_corners_checkbox');
$s_designd_box1_link = get_option('designd_box1_link');
$s_designd_box2_link = get_option('designd_box2_link');
$s_designd_box3_link = get_option('designd_box3_link');
$s_designd_box4_link = get_option('designd_box4_link');
$s_designd_box5_link = get_option('designd_box5_link');
$s_designd_link_color_color_picker = get_option('designd_link_color_color_picker'); 
$s_designd_lead_background = get_option('designd_lead_background');
$s_designd_website_background = get_option('designd_website_background');
$s_designd_custom_css = get_option('designd_custom_css');
?>

<?php if($s_designd_website_background != '') { ?>
body { background: #fff url(<?php echo $s_designd_website_background ?>) repeat-x 0 0; }
<?php } ?>
/*Custom styles */
a { color: <?php echo $s_designd_link_color_color_picker; ?> }
/*** Navigation Bar ***/
.sf-menu li li a:hover{background-color: <?php echo $s_designd_lead_bg_color_picker; ?>; }
/* FORMS */
#rsidebar .wpcf7 .wpcf7-text, .landing #sidebar .wpcf7 .wpcf7-text, .landing #sidebar .wpcf7 textarea {
	border: 1px solid <?php echo $s_designd_btn_border_color_picker; ?>;
}
#main .wpcf7 .wpcf7-submit, #rsidebar .wpcf7 .wpcf7-submit, .ns-submit, .landing #sidebar .wpcf7 .wpcf7-submit,
#rsidebar .gform_footer .gform_button,
#sidebar .gform_footer .gform_button,
#fsidebar .gform_footer .gform_button,
.wpb_widgetised_column .gform_footer .gform_button,
#main .gform_footer .gform_button {
	border: 1px solid <?php echo $s_designd_btn_border_color_picker; ?>;
	background-color: <?php echo $s_designd_btn_bg_color_picker; ?>;
	text-shadow: 1px 1px 2px <?php echo $s_designd_btn_border_color_picker; ?>;}
/* FOOTER */
#footer{background-color: <?php echo $s_designd_footer_bg_color_picker; ?>;}

#rsidebar{background-color: <?php echo $s_designd_lead_bg_color_picker; ?>;}

#slider { background: url(<?php echo $s_designd_lead_background; ?>) no-repeat 0 0; }

#bottomboxes .box1 { background: <?php echo $s_designd_box1_bg_color_picker; ?> url(images/icons/<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box1_link)) ?>.png) no-repeat 0 0; }
#bottomboxes .box2 { background: <?php echo $s_designd_box2_bg_color_picker; ?> url(images/icons/<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box2_link)) ?>.png) no-repeat 0 0; }
#bottomboxes .box3 { background: <?php echo $s_designd_box3_bg_color_picker; ?> url(images/icons/<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box3_link)) ?>.png) no-repeat 0 0; }
#bottomboxes .box4 { background: <?php echo $s_designd_box4_bg_color_picker; ?> url(images/icons/<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box4_link)) ?>.png) no-repeat 0 0; }
#bottomboxes .box5 { background: <?php echo $s_designd_box5_bg_color_picker; ?> url(images/icons/<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box5_link)) ?>.png) no-repeat 0 0; }

<?php if($s_designd_rounded_corners_checkbox == 'true') { ?>
#bottomboxes .box1, #bottomboxes .box2, #bottomboxes .box3, #bottomboxes .box4, #bottomboxes .box5 { border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; }
<?php }?>

<?php if($s_designd_custom_css != '') { 
echo $s_designd_custom_css; ?>
<?php } ?>