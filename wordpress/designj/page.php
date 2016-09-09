<?php
$s_designd_address1_loc1 = get_option('designd_address1_loc1');
$s_designd_address2_loc1 = get_option('designd_address2_loc1');
$s_designd_city_loc1 = get_option('designd_city_loc1');
$s_designd_state_loc1 = get_option('designd_state_loc1');
$s_designd_zip_loc1 = get_option('designd_zip_loc1');
?>
<?php get_header(); ?>
	<div id="main"<?php if(!is_front_page()) { ?> class="submargin"<?php } ?>>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
		<div class="post noborder">
			<?php if(!is_front_page()) { ?><h1><?php the_title(); ?></h1><?php } ?>		
			<div class="postcontent">
			<?php $pageicon = TEMPLATEPATH. "/images/serviceicons/" . $post->post_name . ".png";
			if(file_exists($pageicon)) { ?>
			<img src="<?php bloginfo('template_url');?>/images/serviceicons/<?php echo $post->post_name; ?>.png" width="128" height="128" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="float: right; margin: 0 0 10px 10px;" class="service-icon <?php echo $post->post_name; ?>" />
			<?php } ?>
				<?php the_content(); ?>
				<?php if(is_page('contact') && $s_designd_address1_loc1 !='') { ?>
				<div class="clear"></div>
				<div class="cmap">
				<hr />
				<br />
				<iframe width="630" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo str_replace(array('<br />',' '), '+', $s_designd_address1_loc1); ?>+<?php echo $s_designd_city_loc1; ?>+<?php echo $s_designd_state_loc1; ?>+<?php echo $s_designd_zip_loc1; ?>&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=<?php echo str_replace(array('<br />',' '), '+', $s_designd_address1_loc1); ?>+<?php echo $s_designd_city_loc1; ?>+<?php echo $s_designd_state_loc1; ?>+<?php echo $s_designd_zip_loc1; ?>&amp;ie=UTF8&amp;t=m&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left" target="_blank">View Larger Map</a></small>
				</div>
				<?php } ?>
			</div><!-- /Postcontent -->
		</div><!-- /Post -->
		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>	
	</div><!-- End Main -->			
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
