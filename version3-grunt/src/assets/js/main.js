$(document).ready(function() {
	$(function loop() {
		$('#stars').css({opacity: 1});
		$('#stars').animate ({
			opacity: 0,
		}, 750, 'linear', function() {
			loop();
		});
	});
	$(function() {
		$(document).on('click', 'a.link', function(event){
			event.preventDefault();
			$('html, body').animate({
				scrollTop: $( $.attr(this, 'href')).offset().top
			}, 500);
		});
	});
	$(function() {
		$(document).on('click', 'button.rsTmb', function(event){
			event.preventDefault();
			$('html, body').animate({
				scrollTop: $( $.attr(this, 'href')).offset().top
			}, 500);
		});
	});
	$(function() {
		$("#one").on('click', function () {
			$('.background').addClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#two").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').addClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#three").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').addClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#four").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').addClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#five").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').addClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#six").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').addClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#seven").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').addClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#eight").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').addClass('background-image-eight');
			$('.background').removeClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
		$("#nine").on('click', function () {
			$('.background').removeClass('background-image-one');
			$('.background').removeClass('background-image-two');
			$('.background').removeClass('background-image-three');
			$('.background').removeClass('background-image-four');
			$('.background').removeClass('background-image-five');
			$('.background').removeClass('background-image-six');
			$('.background').removeClass('background-image-seven');
			$('.background').removeClass('background-image-eight');
			$('.background').addClass('background-image-nine');

			$('html, body').animate({
				scrollTop: $("#package-scrolling").offset().top
			});
		});
	});
});