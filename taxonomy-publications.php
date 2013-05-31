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
			$archivelink = get_permalink(get_page_by_title('Archive')->ID).'?publication='.$terms[0]->slug; 
		?>
		<div class="alert in fade">
			<a class="close" data-dismiss="alert" href="#">×</a>
			You're viewing the newest edition of this publication.  
			<a class="btn btn-small" href="<?=$archivelink?>" style="margin-left: 6px;">View Archives (<?=get_pubedition_count_by_publication($terms[0]->term_id)?>)</a>
		</div>		
		<?php } ?>
		
		<?php embed_issuu($latestEdition->ID); ?>
	
	</body>
	<?="\n".footer_()."\n"?>
</html>
<?php } ?>