<?php
$publication = $wp_query->queried_object;
$latest_edition = get_posts( array(
	'post_type' => 'pubedition',
	'tax_query' => array(
		array(
			'taxonomy' => 'publications',
			'terms'    => $publication->term_id
		)
	),
	'order' => 'DESC',
	'post_status' => 'publish',
	'numberposts' => 1
) );
$latest_edition = $latest_edition[0];


if ($_GET['issuu-data'] == 'docID') {
	$issuudata = array();
	$issuudata['docID'] = get_pubedition_docid($latest_edition->ID);
	print json_encode($issuudata);
}
else {
?>

<!DOCTYPE html>
<html style="width:100%; height:100%; margin-top:0 !important;">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?="\n".header_()."\n"?>
		<?php if(GA_ACCOUNT or CB_UID):?>

		<script type="text/javascript">
			var _sf_startpt = (new Date()).getTime();
			<?php if(GA_ACCOUNT):?>

			var GA_ACCOUNT = '<?=GA_ACCOUNT?>';
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', GA_ACCOUNT]);
			_gaq.push(['_setDomainName', 'none']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			<?php endif;?>
			<?php if(CB_UID):?>

			var CB_UID = '<?=CB_UID?>';
			var CB_DOMAIN = '<?=CB_DOMAIN?>';
			<?php endif?>
		</script>
		<?php endif;?>
	</head>



	<body class="<?=get_post_type($post->ID)?>">
		<?php
		if (is_only_edition($post->ID) == false) {
			$terms		 = wp_get_post_terms($post->ID, 'publications');
			$term        = $terms[0];
			$archivelink = get_permalink( get_page_by_title( 'Archive' ) ) .'?publication='. $term->slug;
		?>
		<div class="alert in fade">
			<a class="close" data-dismiss="alert" href="#">×</a>
			You're viewing the newest edition of this publication.
			<a class="btn btn-small" href="<?=$archivelink?>" style="margin-left: 6px;">View Archives (<?=get_pubedition_count_by_publication($term->term_id)?>)</a>
		</div>
		<?php } ?>

		<?php embed_issuu($latest_edition->ID); ?>

	</body>
	<?="\n".footer_()."\n"?>
</html>
<?php } ?>
