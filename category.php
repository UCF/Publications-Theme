<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="category" data-template="category">
		<div class="row" id="cat_pubslist">
				
				<?php 
					$cat 	 = $wp_query->queried_object;
					$catname = $cat->name;
					$catid	 = $cat->cat_ID;
					
					print "<div class='span12'><h2><a href='".get_site_url()."/categories/'>All Categories</a> &raquo; <span style='font-weight: 200;'>".$catname."</span></h2></div>";
					
					get_pubs_list($catid);
					
				?>
				
		</div>
	</div>
<?php get_footer();?>