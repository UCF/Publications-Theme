<?php get_header(); ?>

	<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
	?>
	
	<div class="publication-content" id="<?=$latestEdition->post_slug?>">
	
		<div class="row" id="subpage-nav">
			<a class="btn" href="<?=get_site_url()?>"><i class="icon-chevron-left"></i> Back to All Publications</a>
		</div>
	
		<div class="row">
			<h2><?=$latestEdition->post_title?></h2>
			
		</div>
	</div>	
	
<?php get_footer(); ?>