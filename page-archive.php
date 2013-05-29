<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories">
		<div class="row">
			<div class="span12" id="allcats_list">
				<?php 
					/*
					 * Display all issues of the given publication
					 */
					$publication = htmlentities($_GET['publication']);
					if (!$publication) {
						print '<h2>Archives</h2><p>No publication specified.</p>';
					}
					else {
						print '<h2>Archives for '.$publication.'</h2>';
						$posts = get_posts(array(
							'post_type' => 'pubedition', 
							'publication' => $publication, 
							'order' => 'DESC', 
							'numberposts' => -1
						));
						if (empty($posts)) {
							print 'No editions found for this publication.';
						}
						else {
							//display pub editions
						}
					}
				?>
			</div>	
		</div>
	</div>
<?php get_footer();?>