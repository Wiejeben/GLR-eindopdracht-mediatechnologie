$(document).ready(function ()
{
	$('.bxslider1').bxSlider({
		mode: 'horizontal',
		speed: 500,
		easing: 'ease-in-out',
		controls: false,
		auto: true,
		autoControls: false,
		pause: 2000,
		pager: false
	});
	
	$('.bxslider2').bxSlider({
		mode: 'fade',
		speed: 500,
		easing: 'ease-in-out',
		controls: false,
		auto: true,
		autoControls: false,
		pause: 1000,
		pager: false,
		captions: true
	});

	$('.confirm').on('click', function()
	{
		return confirm('Weet u zeker dat u dit element wilt verwijderen?')
	})
})