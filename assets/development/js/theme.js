jQuery(document).ready(function($){
// script goes here


	// Defining the items and chapters
	const items = document.querySelectorAll('.item');
	const chapters = document.querySelectorAll('.chapter');


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


	// This function uses the isVisible() function to determine if a chapter is visible
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


	// GSAP Animations

	// Animations that are called when screen loads

	TweenMax.staggerFrom('.site-header a', .8, {opacity:0, ease:Power2.easeIn, delay: .4}, 0.2);

	const fadeInUp = document.querySelectorAll('.visible .fadeinup.active');
	TweenMax.from(fadeInUp, .8, {opacity:0, y:50, ease:Power2.easeIn, delay:.4});

	const whiteFlowers = document.querySelectorAll('.white-flower');
	const fernLeaves = document.querySelectorAll('.fern path');
	const pinkFlowers = document.querySelectorAll('.pink-flower');

	TweenMax.staggerTo(fernLeaves, .5, {fill:'#fff'}, .05);

	// Function to animation individual items as they scroll into screen
	function animateItems() {
		isVisible(items);
		for (const item of items) {
			const itemText = item.firstElementChild.firstElementChild;
			const itemFigure = item.firstElementChild.lastElementChild;
			const itemArray = [itemText, itemFigure];
			if (!item.classList.contains('animated')) {
				if (item.classList.contains('visible')) {
					TweenMax.staggerFromTo(itemArray, .8, 
						{opacity:0, y:200}, 
						{opacity:1, y:0}, .4);
					item.classList.add('animated');
				}
			}
		}
	}


	// Everytime the user scrolls, this function is called to check if the sections and items are visible
	$(window).scroll(function() {
		colorChapters();
		animateItems();	
	});

});

