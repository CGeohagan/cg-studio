jQuery(document).ready(function($){
// script goes here
	


	/********************
		 	 Menu Scripts 
	*********************/

	const mobileMenu = document.querySelector('.mobile-menu');
	const menu = document.querySelector('.menu');
	const menuLinks = document.querySelectorAll('.menu a');

	mobileMenu.addEventListener('click', function() {
		menu.classList.add('is-menu-active');
		TweenMax.staggerFromTo(menuLinks, .6, {opacity:0}, {opacity:1}, .1);
	});

	for (const menuLink of menuLinks) {
		menuLink.addEventListener('click', function() {
			menu.classList.remove('is-menu-active');
		});
	}



	/*********************
		Loading Animations
	*********************/

	/*  Defining the items and chapters */

	const items = document.querySelectorAll('.item');
	const chapters = document.querySelectorAll('.chapter');
	const services = document.querySelectorAll('#services');
	const servicesList = document.querySelector('.services__list');
	const singleFernLeaves = document.querySelectorAll('.ferns-full path');

	/* GSAP Animations */

	// Animations that are called when home page or portfolio page loads
	TweenMax.staggerFrom('.site-header a', .6, {opacity:0, ease:Power2.easeIn, delay: .2}, .2);

	// Function for animations that are called when home page loads
	function homePageAnimations() {
		const fadeInUp = document.querySelectorAll('.fadeinup span');
		TweenMax.staggerFrom(fadeInUp, .8, {opacity:0, ease:Power2.easeIn, delay:.4}, .2);

		const fernLeaves = document.querySelectorAll('.fern path');
		TweenMax.staggerTo(fernLeaves, .5, {fill:'#fff'}, .05);
	}

	// Function for animations that are called when item is visible
	function visibleFadeInUp(item, itemChildren, transformY) {
		if (!item.classList.contains('animated')) {
			if (item.classList.contains('visible')) {
				TweenMax.staggerFromTo(itemChildren, .7, 
					{opacity:0, y:transformY}, 
					{opacity:1, y:0}, .5);
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

	// Function to animate services list items
	function animateServicesList() {
		isVisible(services);
		const serviceItems = servicesList.children;
		TweenMax.staggerTo(singleFernLeaves, 1, {fill:'#fff'}, .1);
		visibleFadeInUp(services[0], serviceItems, 0);
	}

	// Function to animate details on individual details text on portfolio page 
	function animateDetailsText() {
		const details = document.querySelectorAll('.details');
		TweenMax.fromTo(details, .5, {transform:'scaleY(0)'}, {transform:'scaleY(1)'});
		const detailsText = details[0].children[0].children;
		const detailsLeft = document.querySelector('.details__text-left');
		const detailsRight = document.querySelector('.details__text-right');
		const pinkButton = document.querySelector('.pink-button');
		const detailsArray = [detailsLeft, detailsRight, pinkButton];
		TweenMax.staggerFromTo(detailsArray, .7, {opacity:0, delay:.7}, {opacity:1, delay:.7}, .5);
	}



	/*********************
		Scripts for slider
	*********************/

	/* Add in functionality to automatically update the width */

	function sliderScripts() {
		// Select all of the style items
		const slider = document.querySelector('.slider');
		const sliderItems = document.querySelectorAll('.slider__item');

		// Determine the number of list items using the length property 
		const listNum = sliderItems.length;
		const lastSliderNum = -75 * (listNum - 1);

		// Set the list width to listNum * 75% view width
		slider.style.width = listNum * 75 + 'vw';

		// Select the previous and next buttons to navigate slider
		const prevButton = document.querySelector('.prev-button');
		const nextButton = document.querySelector('.next-button');
		console.log(prevButton);

		// Create function for setting transformX value when slider moves
		function setTransform(transformX) {
			slider.style.transform = 'translateX(' + transformX + 'vw)';
		}

		// Create functions for adding and removing function class
		function addActiveSlider() {
			currentSliderItem.classList.add('is-slider-active');
		}

		function removeActiveSlider() {
			currentSliderItem.classList.remove('is-slider-active');
		}

		// Set the currrentSliderItem to the first item and add the active class
		const firstSliderItem = slider.firstElementChild;
		const lastSliderItem = slider.lastElementChild;
		var currentSliderItem = firstSliderItem;
		firstSliderItem.classList.add('is-slider-active');

		// Set the transform value for the list when the page loads
		// This will set the page on the first slider
		var transformXValue = 12.5;
		setTransform(transformXValue);

		// When you click on the next button
		nextButton.addEventListener('click', function() {
			if (currentSliderItem === lastSliderItem) {
				// If the current item is the last one
				// 1) Move active class to the first item
				removeActiveSlider();
				currentSliderItem = firstSliderItem;
				addActiveSlider();
				// 2) Set the transformX value to the beginning 
				transformXValue = 12.5;
				setTransform(transformXValue);
			} else {
				// If the current item is not the last one
				// 1) Move active class to the next list item
				removeActiveSlider();
				currentSliderItem = currentSliderItem.nextElementSibling;
				addActiveSlider();
				// 2) Subtract 75vw from the transformX value
				transformXValue = transformXValue - 75;
				setTransform(transformXValue);
			}
		});

		// When you click on the previous button
		prevButton.addEventListener('click', function() {
			if (currentSliderItem === firstSliderItem) {
				// If the current item is the first one
				// 1) Move active class to the last item
				removeActiveSlider();
				currentSliderItem = lastSliderItem;
				addActiveSlider();
				// 2) Set the transformX value to the end
				transformXValue = 12.5 + lastSliderNum;
				setTransform(transformXValue);
			} else {
				// If the current item is not the first one
				// 1) Move active class to the previous list item
				removeActiveSlider();
				currentSliderItem = currentSliderItem.previousElementSibling;
				addActiveSlider();
				// 2) Add 75vw to the transformX value
				transformXValue = transformXValue + 75;
				setTransform(transformXValue);
			}
		});
	}



	/***********************************************
		 Functions for checking which page is loaded
		 and running corresponding functions
	 ***********************************************/

	// Check if on the front page by checking for items array
	if (items.length !== 0) {
		// If on the front page, call the animations for the page load
		homePageAnimations();
		// If on the front page, everytime the user scrolls, this function is called to check if the sections and items are visible

		// Using variable didScroll to check whether the user scrolled
		var didScroll = false;

		// When the user scrolls, didScroll variable becomes true
		window.onscroll = scrollFunction;
		function scrollFunction() {
			didScroll = true;
		}

		// Setting a time interval
		setInterval(function() {
			// To check if the user scrolled
			if(didScroll) {
				didScroll = false;
				colorChapters();
				animateItems();	
				animateServicesList();
			}
		}, 100);		

	} else {
		animateDetailsText();
		sliderScripts();
	}

	
});

