<?php get_header(); ?>

	<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
	?>
	
	<div class="publication_wrap">

	<?php 
	$shortcode = get_post_meta($latestEdition->ID, 'pubedition_embed', TRUE);
	embed_issuu($shortcode); 
	?>
	
	</div>
	
<?php get_footer(); ?>