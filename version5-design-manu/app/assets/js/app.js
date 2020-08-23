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
});