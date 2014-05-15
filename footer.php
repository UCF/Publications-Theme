		</div><!-- close body .container -->
		<div class="container" role="contentinfo">
			<p id="footer_accessibility">For accessible versions of any of our publications, contact <a href="mailto:atservices@ucf.edu">atservices@ucf.edu</a>.</p>
		</div>
		
		<div id="footer">
						
			<div class="container wide">
							
				<div class="row" id="footer_navigation">
					<div class="span3">
						<a href="http://www.ucf.edu/"><h2 id="footer_logo">UCF</h2></a>
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
	<?="\n".footer_()."\n"?>
</html>