<?php 
$s_designd_blurb_title = get_option('designd_blurb_title');
$s_designd_blurb_text = get_option('designd_blurb_text');
$s_designd_box1_link = get_option('designd_box1_link');
$s_designd_box2_link = get_option('designd_box2_link');
$s_designd_box3_link = get_option('designd_box3_link');
$s_designd_box4_link = get_option('designd_box4_link');
$s_designd_box5_link = get_option('designd_box5_link');
?>
<div id="slider">
<?php if($s_designd_blurb_title != '' || $s_designd_blurb_text != '') { ?>
<div class="textleft">
<h1><?php echo $s_designd_blurb_title; ?></h1>
<p><?php echo $s_designd_blurb_text; ?></p></div>
<?php } ?>
<?php get_sidebar('right'); ?>
</div>
<!-- END slider -->