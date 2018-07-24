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

	// Bootstrap's tooltips
	$('[data-toggle="tooltip"]').tooltip();

	//scroll to
	$('.main-page .navigation a').bind('click', function(e) {
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

	// load more handler
	var spinner = '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>';
	var postPerPage = JSON.parse(wood_main_params.posts).posts_per_page;
	function scrollToNewPosts(n) {
		var postTarget = '.plate-holder:nth-child(' + (parseInt(n) + 1) + ')';
		$('html, body').animate({
			scrollTop: $(postTarget).offset().top
		}, 1000);
	}


	$('#load-more').click(function(e){
		//e.preventDefault();
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': wood_main_params.posts,
			'page' : wood_main_params.current_page
		};
		$.ajax({
			url : wood_main_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.attr('disabled', true);
				button.find('span').before(spinner);
			},
			success : function( data ){
				var num = $('.plate-holder').length
				if( data ) { 
					button.removeAttr('disabled');
					button.find('.lds-ring').remove();
					$('.plate-holder').last().after(data);
					scrollToNewPosts(num);
					wood_main_params.current_page++;
					$('[data-toggle="tooltip"]').tooltip();
					if ( wood_main_params.current_page == wood_main_params.max_page ) 
						button.remove();
				} else {
					button.remove();
				}
			}
		});
	});

	// ajax mail sending
	$('#special-offer-btn').click(function (e) {
		$('#offer').modal('show');
	})

	$('#get-plate').click(function (e) {
		$('#booking').modal('show');
	})




	$("#get-in-touch").submit(function() { //Change
		var th = $(this);
		$('input[name="From page"]').val('<a href=' + document.location.href + '>Page</a>');
		$('input[name="Country"]').val(wood_main_params.geo);
		$('input[name="Software"]').val(wood_main_params.agent);
			$.ajax({
				type: "POST",
				url: wood_main_params.mail_ajaxurl, //Change
				data: th.serialize(),
				beforeSend: function (xhr) {
					th.find('button').attr('disabled', true);
					th.find('button span').before(spinner);
				},
				success: function (data) {
					$('#done').modal('show');
					th.find('.lds-ring').remove();
					th.find('button').removeAttr('disabled');
					th.trigger("reset");
				}
			})
		return false;
	});

	$("#offer form, #booking form").submit(function() { //Change
		var th = $(this);
		$('input[name="From page"]').val('<a href=' + document.location.href + '>Page</a>');
		$('input[name="Country"]').val(wood_main_params.geo);
		$('input[name="Software"]').val(wood_main_params.agent);
			$.ajax({
				type: "POST",
				url: wood_main_params.mail_ajaxurl, //Change
				data: th.serialize(),
				beforeSend: function (xhr) {
					th.find('button.btn-wide').attr('disabled', true);
					th.find('button.btn-wide span').before(spinner);
				},
				success: function (data) {
					th.find('.lds-ring').remove();
					th.parents('#offer, #booking').modal('hide');
					$('#done').modal('show');
					th.find('button.btn-wide').removeAttr('disabled');
					th.trigger("reset");
				}
			})
		return false;
	});





});


