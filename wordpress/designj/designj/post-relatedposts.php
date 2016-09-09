<div class="box pad" id="related-posts">
<h4>Related Posts</h4>
<ul>
<?php foreach(get_the_category() as $category){ $cat = $category->cat_ID; } query_posts('cat=' . $cat . '&orderby=rand&showposts=3'); ?>
<?php while (have_posts()) : the_post();
$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
$firstImageSrc = wp_get_attachment_image_src(array_shift(array_keys($images)));
?>
<li>
<div style="background-image: url(<?php echo get_the_image() ?>)" class="relatedimage"></div>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="clear"></div>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>

</div><!-- /related-posts -->