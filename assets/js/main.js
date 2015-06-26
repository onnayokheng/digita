(function($){

	$(document).ready(function(){

		// Applying data-bg-image
		$( "[data-bg-image]" ).each(function(){
			var _background = $(this).data("bg-image");
			$(this).css( "background-image", "url("+ _background +")" );
		});

		// Applying data-bg-color
		$( "[data-bg-color]" ).each(function(){
			var _background = $(this).data("bg-color");
			$(this).css( "background-color", _background );
		});
	});
	
})(jQuery);