/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	// $('a').click(function(){
	// 	if( $('[name="' + $.attr(this, 'href').substr(1) + '"]').length ){
	// 		$('html, body').animate({
	// 			scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	// 		}, 500);
	// 		return false;
	// 	}
	// });

	/*
	*
	*	Nice Page Scroll
	*
	------------------------------------*/
	/*$(function(){	
		$("html").niceScroll();
	});*/
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();
    
    /*-----------------------------------
	 * Custom mobile navigation
	 ------------------------------------*/
	//if hamburger clicked move menu into view
	$('#site-navigation > .fa-bars')
	.on('click',function(){
		$('.mobile-menu').animate({
			"right": 0,
		});
	});
	//if hamburger clicked on menu move back out of view
	$('.mobile-menu > .fa-bars')
	.on('click',function(){
		var $nav = $('.mobile-menu');
		$nav.animate({
			"right": 100*(-1*$nav.outerWidth()/$(window).width())-2+"%",
		});
	});

	/*** Popup Notice ***/
	//sessionStorage.setItem("data", "All the Best");

	//var newdata = sessionStorage.getItem('data');
	//var poppy = sessionStorage.getItem('data','noticePopup');

	//const overlay = document.getElementById('overlay');
	const popup = document.getElementById('popup');
	const closePopupBtn = document.getElementById('closePopup');

	function showPopup() {
		popup.style.display = 'block';
		//overlay.style.display = 'block';
	}

	function hidePopup() {
		popup.style.display = 'none';
		//overlay.style.display = 'none';
	}

	showPopup();

	closePopupBtn.addEventListener('click', hidePopup);

	//if(!poppy){	
		// 1000 to load it after 1 second from page load
		// setTimeout(function(){
		// 	showPopup();
		// },100);
	
		//closePopupBtn.addEventListener('click', hidePopup);
		//overlay.addEventListener('click', hidePopup); // Close when clicking outside the popup

		//sessionStorage.setItem('noticePopup','true');
	//}

	//$(window).bind('beforeunload', function(){ localStorage.removeItem('myPopup'); });

});// END #####################################    END
