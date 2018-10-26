jQuery(document).ready(function() {
    "use strict";


    //Nav menu Call
    jQuery('[data-sidenav]').sidenav();

    //Nav Menu Section
    jQuery('ul.sub-menu').unwrap('<div class="wrap-popup column1" />').unwrap('<div class="popup" />');
    jQuery('ul.children').unwrap('<div class="wrap-popup column1" />').unwrap('<div class="popup" />');
    
    //Add the Wrapper Section
    jQuery('ul>li.menu-item-has-children>a').append('<span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon><i class="fa fa-angle-down"></i></span><span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon><i class="fa fa-angle-up"></i></span>').attr('data-sidenav-dropdown-toggle', '');
    jQuery('ul.sidenav-dropdown').attr('data-sidenav-dropdown', '');

    
    //Add Button Class woocommerce
    jQuery('.add-to-cart-mt').addClass('woocommerce');


});

jQuery(document).ready(function ($) {

$('.add_to_cart_button').on('click', function () {
        var cart = $('.relic-icon-basket1');
        var imgtodrag = $(this).parent('.item').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
});

// product-slider
    jQuery(".product-slider").show().owlCarousel({
      items : 1,
      itemsCustom : false,
      itemsDesktop : [1199, 1],
      itemsDesktopSmall : [979, 1],
      itemsTablet : [768, 1],
      itemsTabletSmall : true,
      itemsMobile : [480, 1],
      autoPlay : true,
      pagination : true
    });
 
    
/**
 * Quick View Section
 */
function ostore_pro_product_single_carousel () {
	if (jQuery('.thumbnails').length) {
		jQuery('.images, #yith-quick-view-content').each(function(){
			var cur_slidesToShow = 1;
			var cur_sliderAutoplay = 4000;
			var cur_fade = true;

			jQuery(this).find('.ostore-pro-single-woo-slick').slick({
				slidesToShow: cur_slidesToShow,
				slidesToScroll: cur_slidesToShow,
				autoplay: false,
				autoplaySpeed: cur_sliderAutoplay,
				speed: 500,
				dots: false,
				fade: cur_fade,
				focusOnSelect: true,
				arrows: false,
				infinite: false,
				asNavFor: jQuery(this).find('.thumbnails')
			});
			jQuery(this).find('.thumbnails').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				nextArrow: '<i class="slick-next fa fa-angle-right"></i>',
  				prevArrow: '<i class=" slick-prev fa fa-angle-left"></i>',
				asNavFor: jQuery(this).find('.ostore-pro-single-woo-slick'),
				dots: false,
				focusOnSelect: true,
				infinite: false,
			})
		});
		
	}
}
jQuery( document ).ajaxComplete(function() {
	if( ! jQuery('.ostore-pro-thumbnails-control.slick-slider').length ){
		ostore_pro_thumbnails_slider ();
	}
});
function ostore_pro_thumbnails_slider () {
	var controls_wrapper, slider, slides, slide, item;

	slider = jQuery('#yith-quick-view-content .woocommerce-product-gallery__wrapper');
	slides = slider.find('.woocommerce-product-gallery__image');
	controls_wrapper = jQuery('<div class="ostore-pro-thumbnails-control"></div>');

	for (var i = 0; i < slides.length; i++) {
		slide = slides[i];
		item = '<div class="ostore-pro-thumb-control-item"><img src="' + jQuery(slide).attr( 'data-thumb' ) + '"></div>';
		controls_wrapper.append(item);
	}

	slider.parent().append(controls_wrapper);
    imagesLoaded(slider.parent(), ostore_pro_vertical_thumb );
    jQuery('#yith-quick-view-content .woocommerce-product-gallery__image').easyZoom();
  }

function ostore_pro_vertical_thumb (){
	jQuery('#yith-quick-view-content').each(function(){
		var cur_slidesToShow = 1;
		var cur_sliderAutoplay = 4000;
		var cur_fade = true;
		
		jQuery(this).find('.woocommerce-product-gallery__wrapper').slick({
			slidesToShow: cur_slidesToShow,
			slidesToScroll: cur_slidesToShow,
			autoplay: false,
			autoplaySpeed: cur_sliderAutoplay,
			speed: 500,
			dots: false,
			fade: cur_fade,
			focusOnSelect: true,
			arrows: false,
			infinite: false,
			asNavFor: jQuery(this).find('.ostore-pro-thumbnails-control')
		});
		jQuery(this).find('.ostore-pro-thumbnails-control').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			nextArrow: '<i class="slick-next fa fa-angle-right"></i>',
				prevArrow: '<i class=" slick-prev fa fa-angle-left"></i>',
			asNavFor: jQuery(this).find('.woocommerce-product-gallery__wrapper'),
			dots: false,
			focusOnSelect: true,
			infinite: false,
		})
		var x = jQuery(this).find('.woocommerce-product-gallery')[0];
		jQuery(x).addClass('ready');
	});	
}