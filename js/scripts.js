(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		/* Homepage Alert Module */

		// slide in module
		setTimeout(function(){
			// $('.wt_alert').addClass('slide-in');
			console.log('oh hai')
		}, 1000);

		// close module function
		function closeModule() {
			$('.wt_close-module').on('click', function(){
				$(this).closest('.wt_module').removeClass('slide-in');
			});
		}
		
		// load close module function
		closeModule();
	});
	
})(jQuery, this);
