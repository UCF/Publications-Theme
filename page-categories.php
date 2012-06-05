<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="categories" data-template="category">
		<div class="row" id="pubsort">
			<div class="span9">
				<strong style="float: left; margin: 9px 20px 0 0;">Sort By:</strong>
				<div class="tabs-below">
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?=get_site_url()?>?sort=category">Category</a></li>
						<li><a href="<?=get_site_url()?>?sort=alphabetical">Alphabetical</a></li>
						<li><a href="<?=get_site_url()?>?sort=newest">Newest</a></li>
						<li><a href="<?=get_site_url()?>?sort=showall">List All</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
				
				<?php 					
					print "<div class='span12'><h2>All Categories</h2>";
					wp_list_categories(array('title_li' => '', 'style' => 'none'));
					print "</div>";
				?>
				
		</div>
	</div>
<?php get_footer();?>