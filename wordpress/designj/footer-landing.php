<?php
//Load Social Media
$s_designd_youtube_url = get_option('designd_youtube_url');
$s_designd_gplus_url = get_option('designd_gplus_url');
$s_designd_linkedin_url = get_option('designd_linkedin_url');
$s_designd_twitter_url = get_option('designd_twitter_url');
$s_designd_facebook_url = get_option('designd_facebook_url');
$s_designd_rss_url = get_option('designd_rss_url');
?>
<div class="clear"></div>
</div><!-- /wrap -->
<div id="footer">
<div id="footerwrap">
<div class="fsidebar">
<div class="box fbox copyrightbox">
<div class="textwidget">
<p style="line-height: 32px;">&copy; Copyright 2012 <?php if($s_designd_copyright_footer != '') { ?><?php echo $s_designd_copyright_footer; ?><?php } else { ?><?php bloginfo( 'name' ); ?><?php } ?></p>
</div>
</div>

<div class="box fsocials" style="float: right; text-align: right;">
<?php if($s_designd_facebook_url !='') { ?>
<a href="<?php echo $s_designd_facebook_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="Facebook" title="Facebook" /></a>
<?php } ?>
<?php if($s_designd_gplus_url !='') { ?>
<a href="<?php echo $s_designd_gplus_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/gplus.png" alt="Google +" title="Google +" /></a>
<?php } ?>
<?php if($s_designd_twitter_url !='') { ?>
<a href="<?php echo $s_designd_twitter_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" alt="Twitter" title="Twitter" /></a>
<?php } ?>
<?php if($s_designd_linkedin_url !='') { ?>
<a href="<?php echo $s_designd_linkedin_url; ?>" target="_blank" ><img src="<?php bloginfo('template_url'); ?>/images/linkedin.png" alt="LinkedIn" title="LinkedIn" /></a>
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
  <div class="clear"></div>
  </div>
</div><!--/footer -->
<?php wp_footer(); ?>
<?php if($s_designd_stats_siteid != '') { ?>
<script src="http://hello.staticstuff.net/w/vaxion.js" type="text/javascript"></script>
<script type="text/javascript">try{ vaxion.init(<?php echo $s_designd_stats_siteid; ?>); }catch(e){}</script>
<noscript><p><img alt="AxionStats by VerticalAxion" width="1" height="1" src="http://win.staticstuff.net/<?php echo $s_designd_stats_siteid; ?>ns.gif" /></p></noscript>
<?php } ?>
</body>
</html>
