		</div><!-- close body .container -->
		<div id="footer">
			<div class="container wide">
				
				<div class="row" id="footer_navigation">
					<div class="span3">
						<a href="<?=site_url()?>"><h2 id="footer_logo">UCF</h2></a>
						<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column One')):?><?php endif;?>
					</div>
					<div class="span2">
						<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column Two')):?><?php endif;?>
					</div>
					<div class="span2">
						<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column Three')):?><?php endif;?>
					</div>
					<div class="span2">
						<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column four')):?><?php endif;?>
					</div>
					<div class="span3 search">
						<?php get_search_form();?>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?="\n".footer_()."\n"?>
</html>