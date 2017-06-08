jQuery(document).ready(function($){
	// script goes here

	var page = document.querySelector('#page');
	var work = document.querySelector('#work');
	var services = document.querySelector('#services');
	var workOffset = work.offsetTop;
	var serviceOffset = services.offsetTop;

	// When the user slides to a new section, this function turns the background to new color
	function colorSlide() {
		var scrollTop = $(window).scrollTop();

		if (scrollTop  >= workOffset && scrollTop <= serviceOffset) {
			page.style.backgroundColor = '#f3eeeb';
		} else if (scrollTop >= serviceOffset) {
			page.style.backgroundColor = '#F7E6E3';
		} else {
			page.style.backgroundColor = '#d5dddf';
		}

	}

	// Check for a better way to set this function
	$(window).scroll(colorSlide);

});
