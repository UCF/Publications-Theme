<?php get_header(); ?>

	<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
	?>
	
	<div class="publication_wrap">
	
	<?php
	$shortcode 		   	  	= get_post_meta($post->ID, 'pubedition_embed', TRUE);
	$embedcode_explode_id 	= preg_split("/documentId=/", $shortcode); //split up shortcode at documentid
	$embedcode_explode_id 	= preg_split("/ name=/", $embedcode_explode[1]); //remove the rest of the embed code, leaving the document id
	$docID 			   	  	= $embedcode_explode_id[0];
	
	$embedcode_explode_name = preg_split("/name=/", $shortcode); //split up shortcode at name
	$embedcode_explode_name	= preg_split("/ username=/", $embedcode_explode[1]); //remove the rest of the embed code, leaving the name
	$docname = $embedcode_explode_name[0];
	
	if( (strstr($_SERVER['HTTP_USER_AGENT'],"iPad")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPhone")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPod")) ) {
	?>
	
	<div class="row">
		<div class="span5">
			<img src='http://image.issuu.com/<?=$docID?>/jpg/page_1_thumb_large.jpg' alt='<?=$post->post_title?>' title='<?=$post->post_title?>' />
		</div>
		<div class="span7">
			<h2><?=$post->post_title?></h2>
			<p>Hello, <?=$_SERVER['HTTP_USER_AGENT']?> user!</p>
			<p><a href="http://issuu.com/universityofcentralflorida/docs/<?=$docname?>?mode=mobile">Click here</a> to access this publication on your device.</p>
		</div>
	</div>
	
	<?php 
	} else {
		echo apply_filters('the_content', $shortcode); 
	}
	?>
	
	</div>
	
<?php get_footer(); ?>