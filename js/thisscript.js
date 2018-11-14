'use strict';

console.log('Test');

var $ = jQuery;

$(document).ready(function(){
    $('.header-slider').slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 7000,
        swipeToSlide: true
    });
    
    get_instagram("danielkordan");
});

function toggleSearchPage() {
	// Check , is #searchpage active ?
	var active = $('#searchpage').hasClass('active');

	if (!active) {
		$('#searchstring').trigger('focus');
		return $('#searchpage').addClass('active');
	}
	//$('#searchbutton').trigger('focus');
	return $('#searchpage').removeClass('active');
}

function submitSearch() {
	var search = $('#s').val();
	if (!search) return false;
}

function inputCheck(e) {
	var value = $(e).val();
	if (value && value != '') {
		$(e).addClass('active');
	} else {
		$(e).removeClass('active');
	}
}

function scrollToTop(){
	$("html, body").animate({ scrollTop: 0 }, 300);
}
    