<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories">
		<div class="row" id="pubslist">
			<?php 
			/*
			 * Display all issues of the given publication
			 */
			$publication = htmlentities($_GET['publication']);
			if (!$publication) {
				print '<div class="span12"><h2>Archives</h2><p>No publication specified.</p></div>';
			}
			else {
				$publication = get_term_by('slug', $publication, 'publications');
				if (!$publication) {
					print '<div class="span12"><h2>Archives</h2><p>Invalid publication.</p></div>';
				}
				else { 
					print '<div class="span12"><h2>Archives for '.$publication->name.'</h2></div>';
					$pubs = get_pubs(null, $publication->term_id);
					$per_page = 16; 
					$pagenum  = $_GET['pagenum'] ? (int)$_GET['pagenum'] : 1;
					if (count($pubs) > $per_page) {
						$paginated_pubs = paginate_pubs($pubs, $per_page, $pagenum);
						display_pubs($paginated_pubs, true);	
					}
					else {
						display_pubs($pubs, true);
					}
				}
			}
			?>
		</div>
		<?=display_pagination(count($pubs), $per_page, $pagenum)?>
	</div>
<?php get_footer();?>