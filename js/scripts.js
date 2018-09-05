(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		function closeModule() {
			$('.wt_close-module').on('click', function(){
				$(this).closest('.wt_module').hide();
			});
		}
		
		closeModule();
	});
	
})(jQuery, this);
