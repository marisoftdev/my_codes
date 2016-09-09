<?php while (have_posts()) : the_post(); ?>
<div class="post<?php if(!is_front_page()) { ?> submargin<?php } ?>">
<div class="postcontent">
<?php if ( has_post_thumbnail() ) {  ?>
<div class="thumbnail-wrap">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
</div><!-- END thumbnail-wrap -->
<?php } ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php $raw = strip_tags(get_the_excerpt()); echo $raw; ?>
</div><!-- END Post Content -->
</div><!-- END Post -->
<?php endwhile; ?>