<?php get_header(); ?>
<div id="main"<?php if(!is_front_page()) { ?> class="submargin"<?php } ?>>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
	<div class="post single">
		<h1 id="single-title"><?php the_title(); ?></h1>
				<div id="byline">
					Posted by <?php the_author() ?> On <?php the_time('F jS, Y') ?> / <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
				</div><!-- /Post Byline -->
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=button_count&amp;width=140&amp;show_faces=false&amp;action=recommend&amp;colorscheme=light&amp;font=arial&amp;height=21&amp;appId=242194749152435" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:21px;" allowTransparency="true"></iframe>
<a href="https://twitter.com/share" class="twitter-share-button" style="margin-left: 40px;">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-annotation="none" style="width: 90px;"></div>

<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
		<div class="postcontent"> 
       		<?php if ($xs_disable_thumbnails_posts == "true") { ?>
			<?php } else { ?>
			<?php if ( has_post_thumbnail() ) {  ?>
            <div class="thumbnail-wrap">
			<?php the_post_thumbnail('singe-post-image'); ?>
            </div><!-- END thumbnail-wrap -->
		<?php } } ?>
		<?php the_content(); ?>
        <p id="post-admin"><?php edit_post_link( $link, $before, $after, $id ); ?></p>
	</div><!-- /Postcontet -->
</div><!-- /Post -->
<div class="clear"></div>
<?php  comments_template(); ?>
<?php endwhile; ?>
<?php endif; ?>
</div><!-- End Main -->			
<?php get_sidebar(); ?>	
<?php get_footer(); ?>