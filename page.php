<?php disallow_direct_load('page.php');?>
<?php get_header();?>
	<div class="page-content" id="page-single" data-template="page">
		<div class="row">
			<div class="span12">
				<h2><?php the_title(); ?></h2>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
<?php get_footer();?>