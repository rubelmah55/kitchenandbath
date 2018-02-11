(function ($) {
	"use strict";

	/* slider */
	$('.slider_area').slick({ 
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		draggable: true,
		dots: true,
		arrows: false,
		fade: false,
		autoplay: true,
		autoplaySpeed: local.slide_delay || 3000,
		speed: local.slide_delay || 3000,
		fade: true
	});

	/* Smooth scroll */
	$(function() {
	  $('a').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});

	//Click event to scroll to top
	$('.services_box_wrapper li').click(function(){
		$('.services_box_wrapper li').removeClass('active');
		$(this).addClass('active');
	});
	
	var separator = $( '<div class="separator big text-center" style="max-width: 100%;"><span class="fa fa-stop"></span><span class="fa fa-stop"></span><span class="fa fa-stop"></span></div>' );
	$( "body.page-id-3801 .uber-grid-filters" ).after(separator);

}(jQuery));	