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
					$postpubs = array();
					
					//Then get categories:					
					$cats = get_categories();
					foreach ($cats as $cat) {
						
						//For each category, get all pubeditions and store their publication and category information in $postpubs
						$posts = get_posts(array('post_type' => 'pubedition', 'category' => $cat->term_id, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => -1));
						
						foreach ($posts as $post) {
							$post_publications = get_the_terms( $post->ID, 'publications' );
							if (is_array($post_publications)) {
								foreach ($post_publications as $post_publication) {
									$post_publication_name = $post_publication->name;
									$postpubs[] = array('pubname' => $post_publication_name, 'cat' => $cat->name);
								}
							}
						}
					}
					
					//Remove duplicate $postpub entries to avoid a miscount
					$postpubs = array_map("unserialize", array_unique(array_map("serialize", $postpubs)));
					
					//Finally, get the count and spit it out:
					foreach ($cats as $cat) {
						$count = 1;
						foreach ($postpubs as $postpub) {
							if ($postpub['cat'] == $cat->name) {
								$count = $count + 1;
							}
						}
						$count = $count - 1;
						print "<a href='";
						print get_category_link($cat->term_id);
						print "'>".$cat->name." (".$count.")</a><br/>";
					}
					
					
					print "</div>";
					
				?>
				
		</div>
	</div>
<?php get_footer();?>