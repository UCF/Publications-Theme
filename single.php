<?php get_header(); ?>
<div class="pubedition_wrap">
	<?php echo apply_filters('the_content', get_post_meta($post->ID, 'pubedition_embed', TRUE)); ?>
</div>
<?php get_footer(); ?>