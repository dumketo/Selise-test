jQuery(document).ready(function($) {
	$(window).scroll(function(){
		if ($(this).scrollTop() > 50) {
			$('.section-wrapper-head:not(.tiny)').addClass('tiny');
		} else {
			$('.section-wrapper-head').removeClass('tiny');
		}
	});
});