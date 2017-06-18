jQuery(document).ready(function($){
// script goes here



	/*  Defining the items and chapters */

	const items = document.querySelectorAll('.item');
	const chapters = document.querySelectorAll('.chapter');
	const services = document.querySelectorAll('#services');
	const servicesList = document.querySelector('.services__list');



	/* GSAP Animations */

	// Animations that are called when screen loads

	TweenMax.staggerFrom('.site-header a', .8, {opacity:0, ease:Power2.easeIn, delay: .4}, .2);

	const fadeInUp = document.querySelectorAll('.fadeinup span');
	TweenMax.staggerFrom(fadeInUp, .8, {opacity:0, y:500, ease:Power2.easeIn, delay:.4}, .2);

	const whiteFlowers = document.querySelectorAll('.white-flower');
	const fernLeaves = document.querySelectorAll('.fern path');
	const pinkFlowers = document.querySelectorAll('.pink-flower');

	TweenMax.staggerTo(fernLeaves, .5, {fill:'#fff'}, .05);

	// Function for animations that are called when item is visible
	function visibleFadeInUp(item, itemChildren, transformY) {
		if (!item.classList.contains('animated')) {
			if (item.classList.contains('visible')) {
				TweenMax.staggerFromTo(itemChildren, .6, 
					{opacity:0, y:transformY}, 
					{opacity:1, y:0}, .4);
				item.classList.add('animated');
			}
		}
	}



	/* Functions for animating items as they come on screen */

	// Function to determine if element is visible in the viewport
	function isVisible(sections) {
		// Run this code for every section in sections
		for (const section of sections) {

			// Defining the distance scrolled and the distance from the top and bottom of each section
			const scrollTop = document.body.scrollTop;
			const sectOffset = section.offsetTop;
			const secHeight = section.scrollHeight;
			const secEnd = sectOffset + secHeight;

			// If the distance scrolled is between the top and bottom of a section, the visible class is added
			if (scrollTop >= (sectOffset - 140) && scrollTop <= secEnd) {
				section.classList.add('visible');	

			// Else, the visible class is removed		
			} else {
				section.classList.remove('visible');
			}
		}
	};

	// Function for changing the colors of the chapters as they are visible
	function colorChapters() {
		isVisible(chapters);

		// If the chapter is visible, then the color set for the data attribute is used to change the background color
		for (const chapter of chapters) {
			if (chapter.classList.contains('visible')) {
				const secColor = chapter.dataset.color;
				page.style.backgroundColor = secColor;
			} 
		}
	}

	// Function to animate individual portfolio items as they scroll into screen
	function animateItems() {
		isVisible(items);
		for (const item of items) {
			const itemChildren = item.firstElementChild.children;
			visibleFadeInUp(item, itemChildren, 100);
		}
	}

	// Function to animated services list items
	function animateServicesList() {
		isVisible(services);
		const serviceItems = servicesList.children;
		const singleFernLeaves = document.querySelectorAll('.ferns-full path');
		TweenMax.staggerTo(singleFernLeaves, .6, {fill:'#fff'}, .1);
		visibleFadeInUp(services[0], serviceItems, 0);
	}

	// Everytime the user scrolls, this function is called to check if the sections and items are visible
	$(window).scroll(function() {
		colorChapters();
		animateItems();	
		animateServicesList();
	});

});

