<!DOCTYPE html>
<html lang="en-US" <?php if ((('pubedition' == get_post_type() && (!(is_search()))) || ($wp_query->queried_object == "publication"))) { print "style='height: 100%;'"; } ?>>
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
		
		<? if($post->post_type == 'page'
			&& ($stylesheet_id = get_post_meta($post->ID, 'page_stylesheet', True)) !== False
			&& ($stylesheet_url = wp_get_attachment_url($stylesheet_id)) !== False) { ?>
			<link rel='stylesheet' href="<?=$stylesheet_url?>" type='text/css' media='all' />
		<? } ?>
	</head>
	
	<body class="<?php if ('pubedition' == get_post_type() && (!(is_search()))) { print get_post_type($post->ID); } ?>">
	
		<div class="container wide" id="header">
			<div class="row">
				<div class="span5 title">
					<a href="<?=site_url()?>">
						<h1>Publications</h1>
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row" id="pubsort">
				<div class="span9">
					<strong style="float: left; margin: 9px 20px 0 0;">View Publications By:</strong>
					<div class="tabs-below">
						<ul class="nav nav-tabs">
							<li <?php if ((is_page('categories') || is_category())) { print 'class="active"'; } ?>><a href="<?=get_site_url()?>/categories/">Category</a></li>
							<li <?php if ((is_home()) && $_GET['sort'] == "alphabetical") { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=alphabetical">Alphabetical</a></li>
							<li <?php if ((is_home()) && ($_GET['sort'] == "newest" || (!isset($_GET['sort'])))) { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=newest">Newest</a></li>
							<li <?php if ((is_home()) && $_GET['sort'] == "showall") { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=showall">List All</a></li>
						</ul>
					</div>
				</div>
			</div>