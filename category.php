<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<div class="page-content" id="category" data-template="category">
		<div class="row" id="pubsort">
			<div class="span9">
				<strong style="float: left; margin: 9px 20px 0 0;">Sort By:</strong>
				<div class="tabs-below">
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?=get_site_url()?>">Category</a></li>
						<li><a href="<?=get_site_url()?>?sort=alphabetical">Alphabetical</a></li>
						<li><a href="<?=get_site_url()?>?sort=newest">Newest</a></li>
						<li><a href="<?=get_site_url()?>?sort=showall">List All</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
				
				<?php 
					$cat 	 = $wp_query->queried_object;
					$catname = $cat->name;
					$catid	 = $cat->cat_ID;
					
					print "<h2>Publications found under <span style='font-weight: 200;'>".$catname."</span></h2>";
					
					get_pubs_list($catid);
					
				?>
				
		</div>
	</div>
<?php get_footer();?>