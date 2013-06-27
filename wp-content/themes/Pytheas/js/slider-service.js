jQuery( function($) {
	$(window).load(function() {
		$('#service-slider-loader').hide();
		$('#service-slider').flexslider({
			slideshow : true,
			randomize : false,
			animation : 'fade',
			animationLoop: true,
			direction: "horizontal",
			reverse: false,
			initDelay: 0,
			slideshowSpeed: 7000,
			animationSpeed: 600,
			smoothHeight : true,
			controlNav : false,
			pauseOnAction: true,
			pauseOnHover: false,
			useCSS: true,
			touch: true,
			video: false,
			prevText : '<span class=" icon-angle-left"></span>',
			nextText : '<span class="icon-angle-right"></span>'
		});
	});
});