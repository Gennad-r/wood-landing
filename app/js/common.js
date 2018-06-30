$(function() {
	$('.hamburger').on('click', function () {
		$(this).toggleClass('is-active');
		$('.top-menu').toggleClass('d-none');
		$('.top-menu').toggleClass('mobile');
		$('ul.navigation').toggleClass('flex-column');
	});


	//wide screen
	if ($(window).width() > $(window).height()) {
		$('.sign-holder').addClass('wide-screen');
	}

	//owl
	$(".owl-carousel").owlCarousel({
		items: 1,
		loop: true,
		center: true,
		nav: true,
		dots: false,
		navText: ['<span class="icon icon-to-arrow"></span>', '<span class="icon icon-right-arrow"></span>']
	});



	//vivus
	if (!sessionStorage.hasOwnProperty('intro')) {
		sessionStorage.setItem('intro', true);
	}

	if($('#draw-text') && (sessionStorage.intro == 'true')){
		$('.load-intro').css({
			'opacity': 1,
			'top': 0
		});
		new Vivus('draw-text', {duration: 300, type: 'sync'}, function () {
			setTimeout(() => $('.load-intro').css('opacity', 0), 1000)
			sessionStorage.setItem('intro', false)
			setTimeout(function () {
				$('.load-intro').css('display', 'none')
			}, 3000)
		})
	} else {
		$('.load-intro').css('display', 'none')
	}


	if ($("#wood-type-text-draw")) {
		new Vivus('wood-type-text-draw', {
			duration: 300,
			file: 'img/sections-text/wood-type.svg',
			onReady: function (myVivus) {
				myVivus.el.setAttribute('height', '100%');
			}
		})
	}
	if ($("#about-product-text")) {
		new Vivus('about-product-text', {
			duration: 300,
			file: 'img/sections-text/about-product.svg',
			onReady: function (myVivus) {
				myVivus.el.setAttribute('height', '100%');
			}
		})
	}


});
