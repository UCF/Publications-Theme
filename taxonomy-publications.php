<?php get_header(); ?>

	<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
	
	$cats = get_the_category($latestEdition->ID);
	$catlist =""; 
	if ($cats[0] =="") { $catlist = "n/a"; } 
	else { 
		foreach ($cats as $cat) {
			$catlist .= "<a href='".get_category_link( $cat->cat_ID )."'>".$cat->cat_name."</a>, ";
		}
		$catlist = substr($catlist, 0, -2);
	}
	
	?>
	
	<div class="publication_wrap">
		<?php echo apply_filters('the_content', get_post_meta($latestEdition->ID, 'pubedition_embed', TRUE)); ?>
	</div>
	
<?php get_footer(); ?>