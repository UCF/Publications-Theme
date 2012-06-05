<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<?php $page    = get_page_by_title('Home');?>
	<div class="page-content" id="home" data-template="home-description">
		<div class="row" id="pubsort">
			<div class="span9">
				<strong style="float: left; margin: 9px 20px 0 0;">Sort By:</strong>
				<div class="tabs-below">
					<ul class="nav nav-tabs">
						<li><a href="<?=get_site_url()?>">Category</a></li>
						<li <?php if ($_GET['sort'] == "alphabetical") { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=alphabetical">Alphabetical</a></li>
						<li <?php if ($_GET['sort'] == "newest") { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=newest">Newest</a></li>
						<li <?php if ($_GET['sort'] == "showall") { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?sort=showall">List All</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
				
				<?php get_pubs_list(); ?>
				
		</div>
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