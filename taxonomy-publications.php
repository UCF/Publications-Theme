<?php get_header(); ?>

	<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
	?>
	<div class="publication-content" id="<?=$latestEdition->post_name?>">
	
		<div class="row" id="subpage-nav">
			<a class="btn" href="<?=get_site_url()?>"><i class="icon-chevron-left"></i> Back to All Publications</a>
		</div>
	
		<div class="row">
			<div class="span4">
				<h2><?=$latestEdition->post_title?></h2>
				<a target="_blank" class="btn btn-primary" href="<?=get_post_meta($latestEdition->ID, 'pubedition_url', TRUE)?>">Launch Online Viewer</a>
			</div>
			<div class="span8">
				<?php
				echo get_the_post_thumbnail($latestEdition->ID, 'large', array('class' => 'publication-single-image'));
				?>
			</div>
		</div>
		
	</div>	
	
<?php get_footer(); ?>