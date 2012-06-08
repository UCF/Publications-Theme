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
		
		if ( $.browser.msie ) {
			if ( $.browser.version <9  ) {
				$("#pubslist .pub:nth-child(1), #pubslist .pub:nth-child(5), #pubslist .pub:nth-child(9), #pubslist .pub:nth-child(13), #pubslist .pub:nth-child(2), #pubslist .pub:nth-child(6), #pubslist .pub:nth-child(10), #pubslist .pub:nth-child(14)").parent().prepend("<div class='row' style='margin-left: 0;'>");
				$("#pubslist .pub:nth-child(5), #pubslist .pub:nth-child(9), #pubslist .pub:nth-child(13), #pubslist .pub:nth-child(16), #pubslist .pub:nth-child(5), #pubslist .pub:nth-child(9), #pubslist .pub:nth-child(13), #pubslist .pub:nth-child(17)").parent().prepend("</div>");
			}
		}
		else {
			$("#pubslist .pub:nth-child(5), #pubslist .pub:nth-child(9), #pubslist .pub:nth-child(13), #cat_pubslist .pub:nth-child(6), #cat_pubslist .pub:nth-child(10), #cat_pubslist .pub:nth-child(14)").css('clear','left');	
		}
		

	});
}else{console.log('jQuery dependancy failed to load');}