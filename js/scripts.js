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

		// homepage popup notice
		function popupNotice() {
			if ( $('body').hasClass('home') ){
				$('.wt_popup-overlay').show();
				$('body').addClass('no-scroll');

				$('.wt_popup-overlay button').on('click', function(){
					$('.wt_popup-overlay').hide();
					$('body').removeClass('no-scroll');
				});
			} else {
				console.log('popup notice only appears on homepage');
			}
		}

		function donateModule() {
			$(window).scroll(function(){
				$('.wt_donate-module').addClass('visible');
			});

			$('#close-module').click(function(e){
				e.preventDefault();

				$('.wt_donate-module').hide();
			});
		}

		if ( $('body').hasClass('single-languages') ) {
			donateModule();
		}
		
		// setTimeout(function(){
		// 	popupNotice();
		// }, 7500);

		// load close module function
		closeModule();

		// load nav color change function
		navColorChange();
	});
	
})(jQuery, this);
