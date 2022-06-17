$(document).ready(function(){
	// Product single page tabs

	$('.acf-product-details ul li, .acf-product-details .description ').first().addClass('active');
	$('.acf-product-details .description ').first().addClass('active');

	$(function(){
		$('.acf-product-details ul li').each(function(){
			$(this).click(function(){
				var i = $(this).index();
				$('.acf-product-details ul li').removeClass('active');
				$(this).addClass('active');
	            $('.description').hide();
	            $('.description:eq('+i+')').show();
	            $('.description:eq('+i+')').css('display','flex');
			});
		});
	});

	// Product single page tabs mobile

	$('.acf-product-details-mobile h4').click(function(){
		$(this).toggleClass('dropdown');
		$(this).parent().siblings().children("h4").removeClass('dropdown');
		$(this).siblings("div").slideToggle(300);
		$(this).parent().siblings().children("div").slideUp(300);
	})
});