<?php
	$publication = $wp_query->queried_object;
	$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publication->name, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
	$latestEdition = $latestEdition[0];
?>
	
<?php if ($_GET['issuu-data'] == 'docID') {
	$issuudata = array();
	$issuudata['docID'] = get_pubedition_docid($latestEdition->ID);
	print json_encode($issuudata);
}
else {
?>
<!DOCTYPE html>
<html style="width:100%; height:100%; margin-top:0 !important;">
	<head>
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
		$shortcode = get_post_meta($latestEdition->ID, 'pubedition_embed', TRUE);
		embed_issuu($shortcode, $publication->name); 
		?>
	
	</body>
	<?="\n".footer_()."\n"?>
</html>
<?php } ?>