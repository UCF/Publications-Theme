if (typeof jQuery != 'undefined'){
	jQuery(document).ready(function($) {
		if($.browser.msie) {
			var version = $.browser.version;
			if(version >= 7 && version < 8) {
				$('body').addClass('ie7');
			} else if(version >= 8 && version < 9) {
				$('body').addClass('ie8');
			} else if(version >= 9 && version < 10) {
				$('body').addClass('ie9');
			}
		}

		Webcom.slideshow($);
		Webcom.chartbeat($);
		Webcom.analytics($);
		Webcom.handleExternalLinks($);
		Webcom.loadMoreSearchResults($);
		
		$(".puburl").live("click", function(){ $(this).select(); });
		$(".modal textarea").live("click", function(){ $(this).select(); });

	});
}else{console.log('jQuery dependancy failed to load');}