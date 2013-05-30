<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<?php $page    = get_page_by_title('Home');?>
	<div class="page-content" id="home" data-template="home-description">
		<div class="row" id="pubslist">
			<?php
				$per_page = 16; 
				$sort 	  = $_GET['sort'] ? $_GET['sort'] : 'latest';
				$pagenum  = $_GET['pagenum'] ? (int)$_GET['pagenum'] : 1;
				
				if ($sort == 'latest') {
					$pubs = get_pubs();
					if (count($pubs) > $per_page) {
						$paginated_pubs = paginate_pubs($pubs, $per_page, $pagenum);
						display_pubs($paginated_pubs);	
					}
					else {
						display_pubs($pubs);	
					}
				}
				elseif ($sort == 'alphabetical') {
					$pubs = get_pubs(null,null,'alpha');
					display_pubs($pubs, 'alphalist');
				}
			?>	
		</div>
		
		<?php if($sort == 'latest') {
			display_pagination(count($pubs), $per_page, $pagenum);
		} ?>
		
		<div class="row">
		
			<div class="bottom span12">
				<?php $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $page->post_content));?>
				<?php if($content):?>
				<?=$content?>
				<?php endif;?>
			</div>
		
		</div>
	</div>
<?php get_footer();?>