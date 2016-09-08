(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		//Top menu
		$('.show_menu').click(function(e) {
			$(this).toggleClass('active');
			$('.nav').slideToggle();
		});

		//Search button (mobile)
		$('.show_search').click(function(e) {
			$(this).toggleClass('active');
			$('.search-form').slideToggle();
		});

		//Tabs on single project
		$('.tabs a').click(function(e) {
			e.preventDefault();

			var href = $(this).attr('href')
			$('.tab-content:visible').slideUp('fast', function() {
				$(href).slideDown('fast');
			});

			$('.tabs a').removeClass('active');
			$(this).addClass('active');
		});
		
	});
	
})(jQuery, this);
