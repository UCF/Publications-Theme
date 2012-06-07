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
	<div class="publication-content" id="<?=$latestEdition->post_name?>">
	
		<div class="row">
			<div class="span3" id="single_pub_details">
				<h2><?=$publication->name?></h2>
				<p><strong>Found Under </strong><?=$catlist?></p>
				<p><strong>Published On </strong><?=date('M j, Y', strtotime($latestEdition->post_date));?></p>
				<div class="well" id="pub_link_box">
					<p><strong>Link to this page:</strong></p>
					<p><?=get_term_link( $publication, 'publications' )?></p>
					<br/>
					<p><strong>Embed Code:</strong></p>
					<p>To copy the HTML embed code, right-click on the publication and select "Copy embed code".  Paste it into an HTML editor wherever you'd like to display the publication.</p>
				</div>
			</div>
			<div class="span9" id="issuuembed">
				<?php echo apply_filters('the_content', get_post_meta($latestEdition->ID, 'pubedition_embed', TRUE)); ?>
				
				<?php if (!($latestEdition->post_content) == "") { echo "<div class='single_pub_content'>".apply_filters('the_content', $latestEdition->post_content)."</div>"; } ?>
			</div>
		</div>
		
	</div>	
	
<?php get_footer(); ?>