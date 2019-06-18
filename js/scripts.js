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

		// nav color change on scroll
		function navColorChange() {
			$(window).scroll(function(){
				if ( $(window).scrollTop() > 0 ) { 
					$('.header').addClass('background');
				} else {
					$('.header').removeClass('background');
				}
			});
		}
		
		// load close module function
		closeModule();

		// load nav color change function
		navColorChange();
	});
	
})(jQuery, this);
