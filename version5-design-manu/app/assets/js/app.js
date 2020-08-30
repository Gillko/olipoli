$(document).ready(function(){
	//Current page and it's active navigation
		//jquery
		//var current__page = $('body').attr('class');

		//javascript
		var current__page = document.getElementsByTagName('body')[0].className;

		var active__link = document.querySelector('a.' + current__page);
		active__link.className = active__link.className + ' header__navigation-active';

		var active__link_mobile = document.querySelector('li.' + current__page);
		active__link_mobile.className = active__link_mobile.className + ' header__navigation-active-mobile';




	//hamburger navigation
	var $header 				= '.header';
	var $navigationHamburger 	= '.header__navigation-hamburger';
	var $navigation 			= '.header__navigation';

	$($navigationHamburger).click(function(){
		$(this).toggleClass('open');

		$($navigation).toggleClass('open');
	});

	$(document).mouseup(function(e) {
		if (!$($header).is(e.target) // if the target of the click isn't the container...
		&& $($header).has(e.target).length === 0) // ... nor a descendant of the container
		{
			$($navigation).removeClass('open');
			$($navigationHamburger).removeClass('open');
		}
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