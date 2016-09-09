<?php
/*
Template Name: Landing Page
*/
?>
<?php;
?>
<?php get_header('landing'); ?>
	<div id="main" class="full-width<?php if(!is_front_page()) { ?> submargin<?php } ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
		<div class="post noborder full-width">
			<h1 class="lptitle"><?php the_title(); ?></h1>	
			<div class="postcontent">
				<?php the_content(); ?>
			</div><!-- /Postcontent -->
		</div><!-- /Post -->
		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>	
	</div><!-- End Main -->			
<?php get_footer('landing'); ?>