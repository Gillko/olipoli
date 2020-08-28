$(document).ready(function(){
	//jquery
	//var current__page = $('body').attr('class');

	//javascript
	var current__page = document.getElementsByTagName('body')[0].className;

	var active__link = document.querySelector('a.' + current__page);
	active__link.className = active__link.className + ' header__navigation-active';

	var active__link_mobile = document.querySelector('li.' + current__page);
	active__link_mobile.className = active__link_mobile.className + ' header__navigation-active-mobile';


	//hamburger navigation
	$('.header__navigation-hamburger').click(function(){
		$(this).toggleClass('open');

		$('.header__navigation').toggleClass('open');
	});

	//showing more before after references
	var $button					= '#button';
	var $hiddenCarFirst 		= '#before-after .before-after__car__hidden:first';
	var $hiddenCar 				= '#before-after .before-after__car__hidden';
	var $removeClassHiddenCar 	= 'before-after__car__hidden';
	var $scrollToCar			= '#before-after__car__scroll-to';

	var $car 					= '#before-after .before-after__car';

	$($button).click(function(){
		$($hiddenCar + ':hidden').slice(0,2).fadeIn().scrollTop();

		$($car).removeAttr('id');

		$($hiddenCarFirst).attr('id', 'before-after__car__scroll-to');
		
		$($hiddenCarFirst).removeClass($removeClassHiddenCar);

		$($hiddenCar + ':eq(0)').removeClass($removeClassHiddenCar);

		$('html, body').animate({
			scrollTop: $($scrollToCar).offset().top
		}, 1000);

		if($($car).length == $($car + ':visible').length){
			$($button).hide();
		}
	});
});