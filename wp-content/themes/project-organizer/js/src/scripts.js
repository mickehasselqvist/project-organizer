(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.show_menu').click(function(e) {
			$('.nav').slideToggle();
		});
		
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
