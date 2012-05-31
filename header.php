<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta name="viewport" content="width=1024">
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
		
		<? if($post->post_type == 'story'
			&& ($stylesheet_id = get_post_meta($post->ID, 'story_stylesheet', True)) !== False
			&& ($stylesheet_url = wp_get_attachment_url($stylesheet_id)) !== False) { ?>
			<link rel='stylesheet' href="<?=$stylesheet_url?>" type='text/css' media='all' />
		<? } ?>
		<? if($post->post_type == 'page'
			&& ($stylesheet_id = get_post_meta($post->ID, 'page_stylesheet', True)) !== False
			&& ($stylesheet_url = wp_get_attachment_url($stylesheet_id)) !== False) { ?>
			<link rel='stylesheet' href="<?=$stylesheet_url?>" type='text/css' media='all' />
		<? } ?>
	</head>
	
	<body class="<?=body_classes()?>">
	
		<div class="container wide" id="header">
			<div class="row">
				<div class="span12">
					<div class="row" style="position:relative;">
						<a href="<?=site_url()?>" class="span3 title">
						PEGASUS
						</a>
						<div class="span5 edition">
							Summer 2012
						</div>
			
						<div class="span4 description">
							The Magazine of the University of Central Florida
						</div>
						<div class="toggle_story_nav">
							<a>&#9650;</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">