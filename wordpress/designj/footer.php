<?php
//Load Social Media
$s_designd_youtube_url = get_option('designd_youtube_url');
$s_designd_gplus_url = get_option('designd_gplus_url');
$s_designd_linkedin_url = get_option('designd_linkedin_url');
$s_designd_twitter_url = get_option('designd_twitter_url');
$s_designd_facebook_url = get_option('designd_facebook_url');
$s_designd_rss_url = get_option('designd_rss_url');
//Load Company Address
$s_designd_Company_Name = get_option('designd_Company_Name');
$s_designd_address1_loc1 = get_option('designd_address1_loc1');
$s_designd_address2_loc1 = get_option('designd_address2_loc1');
$s_designd_city_loc1 = get_option('designd_city_loc1');
$s_designd_state_loc1 = get_option('designd_state_loc1');
$s_designd_zip_loc1 = get_option('designd_zip_loc1');
$s_designd_phone_number1 = get_option('designd_phone_number1');
$s_designd_phone_number2 = get_option('designd_phone_number2');
$s_designd_fax = get_option('designd_fax');
$s_designd_email_address = get_option('designd_email_address');
$s_designd_copyright_footer = get_option('designd_copyright_footer');
$s_designd_stats_siteid = get_option('designd_stats_siteid');
$s_designd_footer_code = get_option('designd_footer_code');
?>
<div class="clear"></div>
</div><!-- /wrap -->
<div id="footer">
<div id="footerwrap">
<?php get_sidebar('footer'); ?>
<div class="fsidebar frightsidebar">
<div class="box fbox"><h4>Contact</h4>
<div class="textwidget" itemtype="http://schema.org/LocalBusiness" itemscope="">
<p>
<?php if($s_designd_Company_Name != '') {?>
<strong><span itemprop="name"><?php echo $s_designd_Company_Name; ?></span></strong>
<?php } ?>
<span itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
<?php if($s_designd_address1_loc1 != '') {?>
<br /><span itemprop="streetAddress"><?php echo $s_designd_address1_loc1; ?></span>
<?php } ?>
<?php if($s_designd_city_loc1 != '') {?>
<br /><span itemprop="addressLocality"><?php echo $s_designd_city_loc1; ?></span>,
<?php } ?>
<?php if($s_designd_state_loc1 != '') {?> <span itemprop="addressRegion"><?php echo $s_designd_state_loc1; ?></span>
<?php } ?>
<?php if($s_designd_zip_loc1 != '') {?> <span itemprop="postalCode"><?php echo $s_designd_zip_loc1; ?></span>
<?php } ?>
</span>
</p>
<?php if($s_designd_phone_number1 != '') { ?>
<span class="phoneno">Phone: </span><span itemprop="telephone"><?php echo $s_designd_phone_number1; ?></span><br />
<?php } ?>
<?php if($s_designd_phone_number2 != '') { ?>
<span style="margin-left: 42px;"><span itemprop="telephone"><?php echo $s_designd_phone_number2; ?></span></span><br />
<?php } ?>
<?php if($s_designd_fax != '') { ?>
<span class="faxno">Fax: </span><span itemprop="faxNumber"><?php echo $s_designd_fax; ?></span><br />
<?php } ?>
<?php if($s_designd_email_address !='') { ?>
<span class="emailadd">Email: </span><a href="mailto:<?php echo antispambot($s_designd_email_address); ?>"><span itemprop="email"><?php echo antispambot($s_designd_email_address); ?></span></a>
<?php } ?>
</div>
</div>

<div class="box"><h4>Social Media</h4>
<div class="textwidget">
<?php if($s_designd_facebook_url !='') { ?>
<a href="<?php echo $s_designd_facebook_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Facebook" title="Facebook" /></a>
<?php } ?>
<?php if($s_designd_twitter_url !='') { ?>
<a href="<?php echo $s_designd_twitter_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Twitter" title="Twitter" /></a>
<?php } ?>
<?php if($s_designd_linkedin_url !='') { ?>
<a href="<?php echo $s_designd_linkedin_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/linkedin.png" alt="LinkedIn" title="LinkedIn" /></a>
<?php } ?>
<?php if($s_designd_gplus_url !='') { ?>
<a href="<?php echo $s_designd_gplus_url; ?>" target="_blank" rel="publisher"><img src="<?php bloginfo('template_url'); ?>/images/gplus.png" alt="Google +" title="Google +" /></a>
<?php } ?>
<?php if($s_designd_youtube_url !='') { ?>
<a href="<?php echo $s_designd_youtube_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/youtube.png" alt="YouTube" title="YouTube" /></a>
<?php } ?>
<?php if($s_designd_rss_url !='') { ?>
<a href="<?php echo $s_designd_rss_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="RSS" title="RSS" /></a>
<?php } ?>
</div>
</div>
</div>
<div id="footer-left">&copy; Copyright <?php echo date('Y'); ?> <?php if($s_designd_copyright_footer != '') { ?><?php echo $s_designd_copyright_footer; ?><?php } else { ?><?php bloginfo( 'name' ); ?><?php } ?></div>
	<div id="footer-right"></div>
  <div class="clear"></div>
  </div>
</div><!--/footer -->
<?php wp_footer(); ?>
<?php if($s_designd_stats_siteid != '') { ?>
<script src="http://hello.staticstuff.net/w/vaxion.js" type="text/javascript"></script>
<script type="text/javascript">try{ vaxion.init(<?php echo $s_designd_stats_siteid; ?>); }catch(e){}</script>
<noscript><p><img alt="AxionStats by VerticalAxion" width="1" height="1" src="http://win.staticstuff.net/<?php echo $s_designd_stats_siteid; ?>ns.gif" /></p></noscript>
<?php } ?>
<?php echo $s_designd_footer_code; ?>
</body>
</html>
