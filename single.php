<?php get_header(); ?>
<?php 
//Display message stating a newer issue is available, with link to new issue, if this is not the newest post under its taxonomy term
$terms	= wp_get_post_terms($post->ID, 'publications');
foreach ($terms as $term) {
	$termid   = $term->term_id; 
	$termlink = get_term_link( $term->name, 'publications' );
}
$latestEditions = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $term->name, 'post_status' => 'publish', 'numberposts' => 1));
foreach ($latestEditions as $latestEdition) {
	if ($latestEdition->post_date > $post->post_date) {
		print '<div class="alert in fade">
   					<a class="close" data-dismiss="alert" href="#">×</a>
    				<strong>Note: </strong> A newer version of this publication is available!  <a class="btn btn-small" href="'.$termlink.'" style="margin-left: 6px;">View Updated Publication</a>
    			</div>';
	}
}

?>
<div class="publication_wrap">
	<?php echo apply_filters('the_content', get_post_meta($post->ID, 'pubedition_embed', TRUE)); ?>
</div>
<?php get_footer(); ?>