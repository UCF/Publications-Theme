<?php $options = get_option(THEME_OPTIONS_NAME);?>
<?php if ($options['enable_google'] or $options['enable_google'] === null):?>
<?php
	$domain  = $options['search_domain'];
	$limit   = (int)$options['search_per_page'];
	$start   = (is_numeric($_GET['start'])) ? (int)$_GET['start'] : 0;
	$results = get_search_results($_GET['s'], $start, $limit, $domain);
?>
<?php get_header();?>
	<div class="page-content row" id="search-results">
		
		<div class="results span12">
			<h2>Search results for "<?=htmlentities($_GET['s'])?>"</h2>
			<?php get_search_form()?>
			
			<?php if(count($results['items'])):?>
			
			<ul class="result-list">
				<?php foreach($results['items'] as $result):?>
				<li class="item">
					<h3>
						<a class="sans ignore-external title <?=mimetype_to_application(($result['mime']) ? $result['mime'] : 'text/html')?>" href="<?=$result['url']?>">
							<?php if($result['title']):?>
							<?=$result['title']?>
							<?php else:?>
							<?=substr($result['url'], 0, 45)?>...
							<?php endif;?>
						</a>
					</h3>
					<a href="<?=$result['url']?>" class="ignore-external url sans"><?=$result['url']?></a>
					<div class="snippet sans">
						<?=str_replace('<br>', '', $result['snippet'])?>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
			
			<?php if($start + $limit < $results['number']):?>
			<a class="button more" href="./?s=<?=$_GET['s']?>&amp;start=<?=$start + $limit?>">More Results</a>
			<?php endif;?>
			
			<?php else:?>
				
			<p>No results found for "<?=htmlentities($_GET['s'])?>".</p>
			
			<?php endif;?>
		</div>
		
	</div>
<?php get_footer();?>
<?php else:?>
	<?php get_header();?>
	<div class="page-content row" id="search-results">
		
		<div class="results span12">
			<h2>Search results for "<?=htmlentities($_GET['s'])?>"</h2>
			<?php get_search_form()?>
			
			<?php if(have_posts()):?>
			<ul class="result-list">
    			<?php while(have_posts()): the_post();?>
    			<li class="item">
					<?php
					$pubs 	 = get_the_terms($post->ID, 'publications'); 
					foreach ($pubs as $pub) {
						$publink = get_term_link($pub->slug, 'publications');
						$pubname = $pub->name;
					}
					?>
    				<h3><a target="_blank" class="sans title" href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					<p><strong><a target="_blank" href="<?php the_permalink(); ?>" class="url sans"><?php the_permalink(); ?></a></strong></p>
					<p><strong>An Edition Of </strong><a href="<?=$publink?>"><?=$pubname?></a></p>
					<p><strong>Found Under</strong> <?php the_category(', '); ?></p>
					<p><strong>Published On</strong> <?php print get_the_date('M d, Y'); ?></p>
    				
    			</li>
			    <?php endwhile;?>
			</ul>
			<?php else:?>
				
			<p>No results found for "<?=htmlentities($_GET['s'])?>".</p>
			<?php endif;?>
		</div>
	</div>
	<?php get_footer();?>
<?php endif;?>