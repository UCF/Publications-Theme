<?php get_header();?>
	<?php $options = get_option(THEME_OPTIONS_NAME);?>
	<?php $page    = get_page_by_title('Home');?>
	<div class="page-content" id="home" data-template="home-description">
		<div class="row">
				
				<?php 
					$publications = get_terms( 'publications', 'order=DESC&hide_empty=0' );
					foreach ($publications as $publication) {
						$publicationID 		= $publication->term_taxonomy_id;
						$publicationName 	= $publication->name;
						?>
						
						<div class="span3">
						PUBLICATION: <?=$publicationName?>
						
						<?php
						$latestEdition 		= get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publicationName, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
						
						foreach ($latestEdition as $post) :  setup_postdata($post); ?> 
						
							LATEST EDITION:
							<?php the_title(); ?>
							<br/>
							
						<?php endforeach; ?>
						
						</div>
						
					<?php	
					}
				?> 
				
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