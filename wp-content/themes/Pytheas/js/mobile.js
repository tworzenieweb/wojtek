jQuery( function($) {
	$(document).ready(function(){			
	function wpexMobileTaxNavClick() {
			var taxToggle = $( 'ul.tax-archives-filter li' );
			var taxDropdown = $(this).children('ul');
			taxToggle.click( function(e) {
				taxDropdown.fadeToggle();
				 e.stopPropagation();
			} );

		} wpexMobileTaxNavClick();
	});
});