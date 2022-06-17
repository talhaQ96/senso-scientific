(function($) {
	// Mobile navigation
	// https://www.jqueryscript.net/menu/Creating-A-Responsive-Mobile-Navigation-Menu-with-slicknav-jQuery-Plugin.html
	$('.main-navigation').slicknav({
		'prependTo': '.site-header',
		closedSymbol: '&#9660;',
		openedSymbol: '&#9650;',
		'label': ''
	});
})(jQuery);
