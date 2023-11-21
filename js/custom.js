/* ================ PageScroll2id ================ */

(function ($) {
	$(window).on("load", function () {
		$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
			highlightSelector: "#navigation-menu a"
		});
		$("a[rel='next']").click(function (e) {
			e.preventDefault();
			var to = $(this).parent().parent("section").next().attr("id");
			$.mPageScroll2id("scrollTo", to);
		});

	});
})(jQuery);

/* ================ Services ================ */

$('.owl-carousel').owlCarousel({
	loop: true,
	margin: 20,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1,
			nav: true
		},
		600: {
			items: 2,
			nav: false
		},
		1000: {
			items: 3,
			nav: true,
			loop: false
		}
	}
})

/* ================ Counter ================ */

$('.counter-item').appear(function () {
	$('.counter-number').countTo();
});

/* ================ Typed ================ */

if (window.location.href === 'index.html') {
	var typed2 = new Typed('#typed2', {
		strings: ['<span class="font-weight-bold"><strong class="browns">Со скидкой - 10%</span</strong></span>', '<span class="font-weight-bold"><strong class="browns">смета бесплатно!</strong></span>'],
		typeSpeed: 120,
		backSpeed: 120,
		fadeOut: true,
		loop: true
	});
}

/* ================ Back to top button ================ */

$(document).ready(function () {

	$(window).scroll(function () {
		var showAfter = 200;
		if ($(this).scrollTop() > showAfter) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});

	$('.back-to-top').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

});