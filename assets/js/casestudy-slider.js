$(document).ready(function(){
	$(".logo-slider").slick({
		slidesToShow: 5,
		focusOnSelect: true,
		arrows: false,
		prevArrow: '<svg id="arrow-left" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="26.79 30.88 17.12 22.5 26.79 14.12 27.45 14.88 18.64 22.5 27.45 30.12 26.79 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
		nextArrow: '<svg id="arrow-right" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="18.21 30.88 17.55 30.12 26.36 22.5 17.55 14.88 18.21 14.12 27.88 22.5 18.21 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
		asNavFor: '.case-slider',

		responsive:[
			{
				breakpoint: 1366,
				settings: {
					slidesToShow: 4,
					arrows: true
				}
			},
			{
				breakpoint: 1200,
				settings:{
					slidesToShow: 3,
					arrows: true
				}
			},
			{
				breakpoint: 992,
				settings:{
					slidesToShow: 2,
					arrows: true
				}
			},
			{
				breakpoint: 576,
				settings:{
					slidesToShow: 1,
					arrows: true,
					dots: true
				}
			}
		]
	});

	var totalSlides = $('.logo-slider .slick-slide').length;

	if ($(window).width() > 1365 && totalSlides > 5){
		$(".case-slider").slick({
			fade: true,
			asNavFor: '.logo-slider',
			prevArrow: '<svg id="arrow-left" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="26.79 30.88 17.12 22.5 26.79 14.12 27.45 14.88 18.64 22.5 27.45 30.12 26.79 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
			nextArrow: '<svg id="arrow-right" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="18.21 30.88 17.55 30.12 26.36 22.5 17.55 14.88 18.21 14.12 27.88 22.5 18.21 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
	
			responsive:[
				{
					breakpoint: 1366,
					settings: {
						arrows: false
					}
				}
			]
		});
	}

	else{
		$(".case-slider").slick({
			fade: true,
			prevArrow: '<svg id="arrow-left" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="26.79 30.88 17.12 22.5 26.79 14.12 27.45 14.88 18.64 22.5 27.45 30.12 26.79 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
			nextArrow: '<svg id="arrow-right" data-name="Rectangle 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45"><defs><style>.cls-1{fill:#929496;}.cls-2{fill:#e9eaea;}</style></defs><polygon class="cls-1" points="18.21 30.88 17.55 30.12 26.36 22.5 17.55 14.88 18.21 14.12 27.88 22.5 18.21 30.88"/><path class="cls-2" d="M22.5,45A22.5,22.5,0,1,1,45,22.5,22.52,22.52,0,0,1,22.5,45Zm0-44A21.5,21.5,0,1,0,44,22.5,21.52,21.52,0,0,0,22.5,1Z"/></svg>',
	
			responsive:[
				{
					breakpoint: 1366,
					settings: {
						arrows: false
					}
				}
			]
		});

		$('.case-slider svg').on('click', function(e){
	  		var i = $('.case-slider .slick-current').index();
	
	  		$('.logo-slider .slick-slide').removeClass('slick-current');
	  		$('.logo-slider .slick-slide:eq('+i+')').addClass('slick-current');
		});
	}
});