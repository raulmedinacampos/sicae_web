(function($) {
	var displayUppercase = function($element) {
		if ($element.val()) {
			$element.css('text-transform', 'uppercase');
		} else {
			$element.css('text-transform', 'none');
		}
	};

	$.fn.displayAsUppercase = function() {
		$(this).each(function() {
			var $element = $(this);
			displayUppercase($element);
			$element.on('input', function() {
				displayUppercase($element)
			});
		});
		return this;
	};

}(jQuery));