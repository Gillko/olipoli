$(document).ready(function() {
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
});