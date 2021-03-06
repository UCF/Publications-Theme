<?php if ($_GET['issuu-data'] == 'docID') {
	$issuudata = array();
	$issuudata['docID'] = get_pubedition_docid($post->ID);
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
		//Display message stating a newer issue is available, with link to new issue, if this is not the newest post under its taxonomy term
		$terms	= wp_get_post_terms($post->ID, 'publications');
		foreach ($terms as $term) {
			$termid   = $term->term_id;
			$termlink = get_term_link( $term, 'publications' );
		}
		$latest_edition = get_posts( array(
			'post_type' => 'pubedition',
			'tax_query' => array(
				array(
					'taxonomy' => 'publications',
					'terms' => $terms[0],
				)
			),
			'post_status' => 'publish',
			'numberposts' => 1
		) );
		$latest_edition = $latest_edition[0];
		if ($post->ID !== $latest_edition->ID) {
			print '<div class="alert in fade">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<strong>Note: </strong> A newer version of this publication is available!  <a class="btn btn-small" href="'.$termlink.'" style="margin-left: 6px;">View Updated Publication</a>
					</div>';
		}

		?>

	<?php embed_issuu($post->ID); ?>

	</body>
	<?="\n".footer_()."\n"?>
</html>
<?php } ?>
