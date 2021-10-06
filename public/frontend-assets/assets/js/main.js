$(document).ready(function() {
	
    //For toggole dropdown
    $('.dropdown-toggle').dropdown();

    $('.shopping-bag').click(function() {
		$('.shopping-cart-wrapper').addClass('shopping-cart-appended');
	})

	$('.close-icon').click(function() {
		$('.shopping-cart-wrapper').removeClass('shopping-cart-appended');
	})

	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 10) {
	        $('.header-upper').addClass('fixed-header');
	    }
	    else {
	        $('.header-upper').removeClass('fixed-header');
	    }
	});
})



