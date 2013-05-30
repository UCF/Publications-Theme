<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="category" data-template="category">
		<div class="row" id="cat_pubslist">
			<?php $cat = $wp_query->queried_object; ?>
			<div class="span12"><h2><a href="<?=get_site_url()?>/categories/">All Categories</a> &raquo; <span style="font-weight: 200;"><?=$cat->name?></span></h2></div>
				<?php		
					$per_page = 16; 
					$pagenum  = $_GET['pagenum'] ? (int)$_GET['pagenum'] : 1;
					
					$pubs = get_pubs($cat->cat_ID);
					
					if (count($pubs) > $per_page) {
						$paginated_pubs = paginate_pubs($pubs, $per_page, $pagenum);
						display_pubs($paginated_pubs);	
					}
					else {
						display_pubs($pubs);	
					}
				?>
			</div>
		</div>
		<?=display_pagination(count($pubs), $per_page, $pagenum)?>
	</div>
<?php get_footer();?>