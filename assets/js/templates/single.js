// Sidebar toggle blog single page

$(document).ready(function(){
	$('.mobile-sidebar-button a').click(function(){
		$(this).toggleClass('active');
		$('.mobile-sidebar').toggleClass('open');
	});
});