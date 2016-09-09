<?php
$s_designd_address1_loc1 = get_option('designd_address1_loc1');
$s_designd_address2_loc1 = get_option('designd_address2_loc1');
$s_designd_city_loc1 = get_option('designd_city_loc1');
$s_designd_state_loc1 = get_option('designd_state_loc1');
$s_designd_zip_loc1 = get_option('designd_zip_loc1');
$s_designd_phone_number1 = get_option('designd_phone_number1');
$s_designd_phone_number2 = get_option('designd_phone_number2');
$s_designd_fax = get_option('designd_fax');
$s_designd_email_address = get_option('designd_email_address');
$s_designd_newsletter_id = get_option('designd_newsletter_id');
$s_designd_relatedposts = get_option('designd_relatedposts');
?>

<div id="sidebar"><?php if ($s_designd_relatedposts == "No" ) { ?>
<?php } else { ?>
<?php if ( is_single() ) { ?>
    <?php get_template_part( 'post','relatedposts') ?>
<?php } ?><?php } ?><?php if($s_designd_address1_loc1 != '' || $s_designd_phone_number1 != '') { ?>
<div class="box pad cbox"><h4>Contact Information</h4><div class="textwidget">
<ul class="contact">
<?php if($s_designd_address1_loc1 != '') { ?>
<li class="address"><?php echo $s_designd_address1_loc1; ?><br />
<?php echo $s_designd_city_loc1; ?>, <?php echo $s_designd_state_loc1; ?> <?php echo $s_designd_zip_loc1; ?></li>
<?php } ?>
<?php if($s_designd_phone_number1 != '') { ?>
<li class="phone"><?php echo $s_designd_phone_number1; ?></li>
<?php } ?>
<?php if($s_designd_phone_number2 != '') { ?>
<li class="phone2"><?php echo $s_designd_phone_number2; ?></li>
<?php } ?>
<?php if($s_designd_fax != '') { ?>
<li class="fax"><?php echo $s_designd_fax; ?></li>
<?php } ?>
<?php if($s_designd_email_address != '') { ?>
<li class="email"><a href="mailto:<?php echo $s_designd_email_address; ?>"><?php echo $s_designd_email_address; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
<?php endif; ?>
<?php if($s_designd_newsletter_id != '') { ?>
<div class="box pad"><h4>Newsletter</h4><div class="textwidget">
<p>Join our Newsletter to get the latest technology news and special offers.</p>
<form method='get' accept-charset='UTF-8' name='oi_form' action='<?php echo $s_designd_newsletter_id; ?>'>
<input type='text' name='email' value="Email" onfocus="if(this.value == 'Email') this.value=''" onblur="if(this.value == '') this.value='Email'" class="ns-field" /><br />
<input type='hidden' name='goto' value='' />
<input type='hidden' name='iehack' value='&#9760;' />
<input type='submit' class="ns-submit" value='Subscribe' />
</form>
</div>
</div>
<?php } ?>
</div><!-- End Sidebar -->
