<?php
$s_designd_box1_link = get_option('designd_box1_link');
$s_designd_box2_link = get_option('designd_box2_link');
$s_designd_box3_link = get_option('designd_box3_link');
$s_designd_box4_link = get_option('designd_box4_link');
$s_designd_box5_link = get_option('designd_box5_link');
?>
<div id="boxeswrap">
<div id="bottomboxes"> 
<div class="box1"><a href="<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box1_link)) ?>"><?php echo $s_designd_box1_link ?></a></div>
<div class="box2"><a href="<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box2_link)) ?>"><?php echo $s_designd_box2_link ?></a></div>
<div class="box3"><a href="<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box3_link)) ?>"><?php echo $s_designd_box3_link ?></a></div>
<div class="box4"><a href="<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box4_link)) ?>"><?php echo $s_designd_box4_link ?></a></div>
<div class="box5"><a href="<?php echo strtolower(str_replace( array(' ','/'), "-", $s_designd_box5_link)) ?>"><?php echo $s_designd_box5_link ?></a></div>
</div>
</div>
<!-- END Bottom Boxes -->