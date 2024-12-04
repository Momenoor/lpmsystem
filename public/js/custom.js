jQuery(document).ready(function($) {
    "use strict"

    // ------- Main Slider ------- //
    var homeSlider = $('#home1-slider');
    if (homeSlider.length) {
        homeSlider.owlCarousel({
            margin: 0,
            loop: true,
            items: 1,
            dots: false,
			nav:true,
        })
    }

   // ------- News ------- //
   	// ------- Filter Gallery Start ------- //
    if ($('.filter-news').length) {
        if ($('.filter-news .isotope').length) {
            $container = $('.filter-news .isotope');
            
            $container.imagesLoaded( function() {
				$container.isotope({
					itemSelector: '.item',
					transitionDuration: '0.6s',
					masonry: {
						columnWidth: $container.width() / 12
					},
					layoutMode: 'masonry'
				});
            });
        }
    }

    // ------- Awards ------- //
    if ($('#award-slider').length) {
        $('#award-slider').owlCarousel({
            margin: 0,
            loop: true,
            items: 1,
            dots: true,
			autoplay:true,
        })
    }

    // ------- Department Slider ------- //
    if ($('#h3-dprt').length) {
        $('#h3-dprt').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
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
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    }


    // ------- Testimonials ------- //
    if ($('#h3-testim').length) {
        $('#h3-testim').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 2,
                    nav: true,
                    loop: false
                }
            }
        })
    }


    // ------- Testimonials ------- //
    if ($('#event-gallery').length) {
        $('#event-gallery').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            responsiveClass: true,
			arrow:true,
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
    }


    // ------- CountDown ------- //
    if ($('#defaultCountdown').length) {
        var austDay = new Date();
        austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
        $('#defaultCountdown').countdown({
            until: austDay
        });
        $('#year').text(austDay.getFullYear());
    }
	
	
	    // ------- Comming Soon Countdown ------- //
    if ($('#cs-countdown').length) {
        austDay = new Date();
        austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
        $('#cs-countdown').countdown({
            until: austDay
        });
        $('#year').text(austDay.getFullYear());
    }



    // ------- PrettyPhoto ------- //
    if ($('.gallery').length) {
        $("area[data-rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[data-rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            theme: 'light_square',
            slideshow: 3000,
            autoplay_slideshow: false
        });
        $(".gallery:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast',
            slideshow: 10000,
            hideflash: false
        });
    }
	
	
	
	 // ------- Filter Gallery Start ------- //
    if ($('.filter-gallery').length) {
        if ($('.filter-gallery .isotope').length) {
            var $container = $('.filter-gallery .isotope');
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).on("resize", function() {
                $container.isotope({
                    masonry: {
                        columnWidth: $container.width() / 12
                    }
                });
            });
        }
        if ($('.filter-gallery #filters').length) {
            $('.filter-gallery #filters').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $container.isotope({
                    filter: filterValue
                });
            });
            // change is-checked class on buttons
            $('.filter-gallery .button-group').each(function(i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        }
    }

    // ------- Filter Gallery End ------- //

}); //End