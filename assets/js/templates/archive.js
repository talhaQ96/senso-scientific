$(document).ready(function(){

	// Search results page tabs 
	
	$('.archive .filter-buttons li').first().addClass('active');

	$(function(){
		$('.archive .search-results-wrapper').each(function(){
			if($(this)[0].firstElementChild.childElementCount == 0){
				$(this).remove();
			}
		});

		$('.archive .search-results-wrapper').first().addClass('active');
	});

	$(function(){
		$('.archive .filter-buttons li').each(function(){
			$(this).click(function(){
				var i = $(this).index();
				$('.archive .filter-buttons li').removeClass('active');
				$(this).addClass('active');
	            $('.archive .search-results-wrapper').hide();
	            $('.archive .search-results-wrapper:eq('+i+')').show();
			});
		});
	});
});