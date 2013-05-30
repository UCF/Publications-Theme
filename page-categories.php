<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories" data-template="category">
		<div class="row">
			<div class="span12" id="allcats_list">
				<h2>All Categories</h2>
				
				<?php 	
					/*
					 * Print all categories and the number of unique publications (taxonomy terms) per category:
					 */ 
									
					$all_cats = get_categories();
					foreach ($all_cats as $cat) {
						//For each category, get all publications and count them
						$pubs = get_pubs($cat->cat_ID);
						$cat_pubcount = count($pubs);
						
						print '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.' ('.$cat_pubcount.')</a><br/>';
					}
				?>
			</div>
				
		</div>
	</div>
<?php get_footer();?>