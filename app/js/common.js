$(function() {
	$('.hamburger').on('click', function () {
		$(this).toggleClass('is-active');
		$('.top-menu').toggleClass('d-none');
		$('.top-menu').addClass('mobile');
		$('ul.navigation').addClass('flex-column');
	});


	//to top
	$(window).on("scroll", function () {
		if ( window.scrollY >= window.innerHeight * 0.8 ) {
				$('.top-button').addClass('visible');
			} else {
				$('.top-button').removeClass('visible');
			}
	});



	//scroll to
	$('.navigation a').bind('click', function(e) {
		e.preventDefault();
		$(".hamburger--spring").removeClass("is-active");
		$('.top-menu').addClass('d-none');
		$('.top-menu').removeClass('mobile');
		$('ul.navigation').removeClass('flex-column');

		$("nav").removeClass("clicked");
		var target = $(this).attr("href") || $(this).attr("data"), // Set the target as variable
			pos = $(target).offset().top; // navigation panel heigth
		// perform animated scrolling by getting top-position of target-element and set it as scroll target
		$('html, body').stop().animate({
			scrollTop: pos
		}, 600, function() {
				location.hash = target; //attach the hash (#jumptarget) to the pageurl
			});

		return false;
	});

	//to top
	$('.top-button').click(function () {
		$('html, body').stop().animate({
			scrollTop: 0
		}, 600, function () {
			location.hash = '';
		} );
	})



	//owl

	if($('.main-gallery').length){
		$(".owl-carousel.main-gallery").owlCarousel({
			items: 1,
			loop: true,
			center: true,
			nav: true,
			dots: false,
			navText: ['<span class="icon icon-to-arrow"></span>', '<span class="icon icon-right-arrow"></span>']
		});
	}

	


	if($('.load-intro').length){
		// animations
		
		//wide screen
		if ($(window).width() > $(window).height()) {
			$('.sign-holder').addClass('wide-screen');
		}
		//vivus
		if (!sessionStorage.hasOwnProperty('intro')) {
			sessionStorage.setItem('intro', true);
		}

		if($('#draw-text').length && (sessionStorage.intro == 'true')){
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
		if ($("#about-product-text").length) {
			new Vivus('about-product-text', {
				duration: 300,
				file: 'img/sections-text/about-product.svg',
				onReady: function (myVivus) {
					myVivus.el.setAttribute('height', '100%');
				}
			})
		}
	} // main page check








});
