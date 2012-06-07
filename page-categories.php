<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories" data-template="category">
		<div class="row">
				
				<?php 					
					print "<div class='span12' id='allcats_list'><h2>All Categories</h2>";
					wp_list_categories(array('title_li' => '', 'style' => 'none', 'show_count' => 1));
					print "</div>";
				?>
				
		</div>
	</div>
<?php get_footer();?>