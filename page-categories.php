<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories" data-template="category">
		<div class="row">
				
				<?php 					
					print "<div class='span12' id='allcats_list'><h2>All Categories</h2>";
					
					/*
					 * Print all categories and the number of unique publications (taxonomy terms) per category:
					 */ 
					
					//Set up empty array for count results (will contain 'pubname' and 'category'):
					$publication_cats = array();
					
					//Then get categories:					
					$all_cats = get_categories();
					foreach ($all_cats as $cat) {
						//For each category, get all pubeditions and store their publication and category information in $publication_cats
						$posts = get_posts(array('post_type' => 'pubedition', 'category' => $cat->term_id, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => -1));
						
						foreach ($posts as $post) {
							$post_publications = get_the_terms( $post->ID, 'publications' );
							if (is_array($post_publications)) {
								foreach ($post_publications as $post_publication) {
									if (!isset($publication_cats[$post_publication->name])) {
										$publication_cats[$post_publication->name] = $cat->name;
									}
								}
							}
						}
					}
					
					//Finally, get the count and spit it out:
					foreach ($all_cats as $cat) {
						$count = 0;
						foreach ($publication_cats as $publication=>$publication_catname) {
							if ($cat->name == $publication_catname) {
								$count++;
							}
						}
						if ($count > 0) {
							print "<a href='";
							print get_category_link($cat->term_id);
							print "'>".$cat->name." (".$count.")</a><br/>";
						}
					}
					
					
					print "</div>";
					
				?>
				
		</div>
	</div>
<?php get_footer();?>