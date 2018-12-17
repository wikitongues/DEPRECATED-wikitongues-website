(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		/* Homepage Alert Module */

		// slide in module
		setTimeout(function(){
			$('.wt_alert').addClass('slide-in');
		}, 1000);

		// close module function
		function closeModule() {
			$('.wt_close-module').on('click', function(){
				$(this).closest('.wt_module').hide();
			});
		}
		
		// load close module function
		closeModule();
	});
	
})(jQuery, this);
