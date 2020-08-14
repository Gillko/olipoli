$(document).ready(function() {

	!function(e,t){"use strict";if(!Object.prototype.hasOwnProperty.call(e,"lightwidget")){e.addEventListener("message",function(e){if(-1===["lightwidget.com","dev.lightwidget.com","cdn.lightwidget.com","instansive.com"].indexOf(e.origin.replace(/^https?:\/\//i,"")))return!1;var i=function(e){if(-1<e.indexOf("{"))return JSON.parse(e);var i=e.split(":");return{widgetId:i[2].replace("instansive_","").replace("lightwidget_",""),size:i[1]}}(e.data);if(i.size<=0)return!1;[].forEach.call(t.querySelectorAll('iframe[src*="lightwidget.com/widgets/'+i.widgetId+'"],iframe[data-src*="lightwidget.com/widgets/'+i.widgetId+'"],iframe[src*="instansive.com/widgets/'+i.widgetId+'"]'),function(e){e.style.height=i.size+"px"})},!1),e.lightwidget={}}}(window,document);

	
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