
// sticky-menu
// window.onscroll = function() {myFunction()};

// var header = document.getElementById("myheader");
// var sticky = header.offsetTop;

// function myFunction() {
//   if (window.pageYOffset >= sticky) {
//     header.classList.add("sticky-menu");
//   } else {
//     header.classList.remove("sticky-menu");
//   }
// }

  jQuery(document).ready(function(){
    stickyMenu();
    function stickyMenu(){
         var scrollTop = jQuery(window).scrollTop();
          if (scrollTop > 0) {
              jQuery('.header_top_wrap').addClass('hidden');
              jQuery('.sticky-menu').addClass('nav-sticky');
              jQuery('.sticky-menu').addClass('fadeInDown');
              jQuery('.sticky-menu').addClass('animated');
          } else {
              jQuery('.sticky-menu').removeClass('fadeInDown');
              jQuery('.sticky-menu').removeClass('nav-sticky');
              jQuery('.header_top_wrap').removeClass('hidden');
          }
    }
    jQuery(window).scroll(function(){
        stickyMenu();
     
    });
  }); 

jQuery(document).ready(function() {
    "use strict";

    jQuery('ul.sub-menu').wrap('<div class="wrap-popup column1" />').addClass("nav").wrap('<div class="popup" />');
    jQuery('ul.children').wrap('<div class="wrap-popup column1" />').addClass("nav").wrap('<div class="popup" />');
    

    // preloader
     jQuery('.ostore-preloader').hide();

     //Quanitity New Add
    function ecommerce_lite_spinner_up_down () {
        jQuery('body').on('tap click', '.ostore_pro_qty_spinner .quantity-up', function() {
            var input 	= jQuery(this).parent().find('input[type="number"]'),
            max 		= input.attr('max'),
            oldValue 	= parseFloat(input.val());
            if (oldValue >= max && '' != max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            input.val(newVal);
            input.trigger("change");
        });
        jQuery('body').on('tap click', '.ostore_pro_qty_spinner .quantity-down, .ostore_pro_qty_spinner .quantity-down', function() {
            var input 	= jQuery(this).parent().find('input[type="number"]'),
            min 		= input.attr('min'),
            oldValue 	= parseFloat(input.val());
            if (oldValue <= min && '' != min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            input.val(newVal);
            input.trigger("change");
        });
    }
    ecommerce_lite_spinner_up_down ();


    /******************************************
    Newsletter popup
    ******************************************/

    jQuery('.newsletter-close').click(function() {
        jQuery(".newsletter-wrap").hide();
        jQuery(".newsletter-bg").hide();

    }); 
    jQuery('.new_cat > .active').each(function() {
      var cat_link = jQuery(this).attr('cat_link');
      jQuery(this).closest('.title-bg').find('.tab-all-product a').attr("href",cat_link);
    });

    jQuery(document).on('click',".new_cat li a",function(){
        var all_link = jQuery(this).closest('li').attr('cat_link');
        jQuery(this).closest('.title-bg').find('.tab-all-product a').attr("href",all_link);
    });


        /******************************************
        testimonials slider
        ******************************************/

        jQuery("#testimonials-slider .slider-items").owlCarousel({
            items: 1,
            itemsDesktop: [1024, 1],
            itemsDesktopSmall: [900, 1],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        Home testimonials slider
        ******************************************/

        jQuery(".subDropdown")[0] && jQuery(".subDropdown").click(function() {
            jQuery(this).toggleClass("plus"), jQuery(this).toggleClass("minus"), jQuery(this).parent().find("ul").slideToggle()
        })
    if (jQuery('#home-testimonials-slider').length) {
        jQuery('#home-testimonials-slider').bxSlider({
            auto: true,
            infiniteLoop: true,
            hideControlOnEnd: true
        });
    }

        /******************************************
        New product slider
        ******************************************/

        jQuery("#product-slide .slider-items").show().owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: true,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),


        /******************************************
        New Category Slider
        ******************************************/

        jQuery("#new-category-slider .slider-items").show().owlCarousel({
            items: 3,
            itemsDesktop: [1024, 3],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: true,
            navigationText: ['<a class="cat-flex-prev"></a>', '<a class="cat-flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /**************************************
        *           Category Product Slider
        ***************************************/
        jQuery("#new-product-slider2 .slider-items").show().owlCarousel({
            items: 2,
            itemsDesktop: [1024, 2],
            itemsDesktopSmall: [900, 2],
            itemsTablet: [640, 1],
            itemsMobile: [390, 1],
            navigation: true,
            navigationText: ['<a class="cat-flex-prev"></a>', '<a class="cat-flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        Our clients slider home3
        ******************************************/

        jQuery("#our-clients-slider3 .slider-items").show().owlCarousel({
            items: 5,
            itemsDesktop: [1024, 5],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [480, 2],
            navigation: !0,
            navigationText: ['<a class="cat-flex-prev"></a>', '<a class="cat-flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),

        /******************************************
        hot deals slider
        ******************************************/
       jQuery(".hot-deals-slider .slider-items").show().owlCarousel({
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1024, 1], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 1], // 3 items betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0;
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ['<a class=flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: false,
        autoPlay: true,
        });



        /******************************************
        Related posts
        ******************************************/

        jQuery("#related-posts .slider-items").show().owlCarousel({
            items: 3,
            itemsDesktop: [1024, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: true,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: true
        }),


    /******************************************
    Footer expander
    ******************************************/

    jQuery(".collapsed-block .expander").click(function(e) {
        var collapse_content_selector = jQuery(this).attr("href");
        var expander = jQuery(this);
        if (!jQuery(collapse_content_selector).hasClass("open")) expander.addClass("open").html("&minus;");
        else expander.removeClass("open").html("+");
        if (!jQuery(collapse_content_selector).hasClass("open")) jQuery(collapse_content_selector).addClass("open").slideDown("normal");
        else jQuery(collapse_content_selector).removeClass("open").slideUp("normal");
        e.preventDefault()
    });

    


    /******************************************
    totop
    ******************************************/
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        jQueryback_to_top = jQuery('.totop');

    //hide or show the "back to top" link
    jQuery(window).scroll(function() {
        (jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('totop-is-visible'): jQueryback_to_top.removeClass('totop-is-visible totop-fade-out');
        if (jQuery(this).scrollTop() > offset_opacity) {
            jQueryback_to_top.addClass('totop-fade-out');
        }
    });

    //smooth scroll to top
    jQueryback_to_top.on('click', function(event) {
        event.preventDefault();
        jQuery('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

    /******************************************
    tooltip
    ******************************************/


    jQuery('[data-toggle="tooltip"]').tooltip();



    /* ---------------------------------------------
            carousel
      --------------------------------------------- */
    if (jQuery.fn.owlCarousel) {

        jQuery("#owl-slider").owlCarousel({
            autoPlay: 4000, //Set AutoPlay to 3 seconds
            items: 1,
            navigation: true,
            //pagination : false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });


        jQuery("#img-carousel").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });



    }

    /* ---------------------------------------------
         slider typist
         --------------------------------------------- */

    if (typeof Typist == 'function') {
        new Typist(document.querySelector('.typist-element'), {
            letterInterval: 60,
            textInterval: 3000
        });
    }

})

/******************************************
Stick menu
******************************************/

jQuery(window).scroll(function() {
        jQuery(this).scrollTop() > 1 ? jQuery("nav").addClass("stick") : jQuery("nav").removeClass("stick"),
            jQuery(this).scrollTop() > 1 ? jQuery(".top-cart").addClass("stick") : jQuery(".top-cart").removeClass("stick")

    }),


    /******************************************
    top search
    ******************************************/

    function(e) {}(jQuery),
    jQuery.extend(jQuery.easing, {}),
    function(e) {
        e.fn.extend({
            accordion: function() {}
        })
    }(jQuery), jQuery(function(e) {
        e(".accordion").accordion(), e(".accordion").each(function() {
            var t = e(this).find("li.active");
            t.each(function(n) {
                e(this).children("ul").css("display", "block"), n == t.length - 1 && e(this).addClass("current")
            })
        })
    }),


    function(e) {
        e.fn.extend({}), jQuery(function() {
            function e() {
                var e = jQuery('.navbar-collapse form[role="search"].active');
                e.find("input").val(""), e.removeClass("active")
            }
            jQuery('.navbar-collapse form[role="search"] button[type="reset"]').on("click keyup", function(t) {
                console.log(t.currentTarget), (27 == t.which && jQuery('.navbar-collapse form[role="search"]').hasClass("active") || "reset" == jQuery(t.currentTarget).attr("type")) && e()
            }), jQuery(document).on("click", '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(e) {
                e.preventDefault();
                var t = jQuery(this).closest("form"),
                    n = t.find("input");
                t.addClass("active"), n.focus()
            }), jQuery(document).on("click", '.navbar-collapse form[role="search"].active button[type="submit"]', function(t) {
                t.preventDefault();
                var n = jQuery(this).closest("form"),
                    i = n.find("input");
                jQuery("#showSearchTerm").text(i.val()), e()
            })
        })
    }(jQuery);


/*Home Slider JavaScript file */
/* Main Slideshow */
jQuery(window).load(function() {
    jQuery(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
        jQuery('.ma-banner7-container .timethai').addClass('pos_hover');
    });
    jQuery(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
        jQuery('.ma-banner7-container .timethai').removeClass('pos_hover');
    });
});
jQuery(window).load(function() {
    jQuery('#os-inivoslider-banner').show().nivoSlider({
        effect: 'random',
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 1000,
        pauseTime: 6000,
        startSlide: 0,
        controlNav: false,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: 'Prev',
        nextText: 'Next',
        afterLoad: function(){
            },     
        beforeChange: function(){ 
        }, 
        afterChange: function(){ 
        }
    });
});


/*Dropdown Menu Section Js */
jQuery(document).ready(function () {
    /*Add top Cart */
    jQuery(".mini-cart-link").click(function(e){e.preventDefault()}); 

   jQuery('.menu-item-has-children').hover(function () {
       jQuery(this).find('.sub-menu').first().addClass('menu-hover');
   }, function () {
       jQuery(this).find('.sub-menu').first().removeClass('menu-hover');
   });
  
   jQuery('.page_item_has_children').hover(function () {
       jQuery(this).find('.children').first().addClass('menu-hover');
   }, function () {
       jQuery(this).find('.children').first().removeClass('menu-hover');
   });
});


 //jQuery("#zoom_mw").elevateZoom({scrollZoom : true});


 /* Wishlist count ajax update */
jQuery( document ).ready( function($){
    $('body').on( 'added_to_wishlist', function(){
        $('.top-wishlist .count').load( yith_wcwl_l10n.ajax_url + ' .top-wishlist span', {action: 'yith_wcwl_update_single_product_list'} );
    });
    
    $("body").on('click', 'a.js-prevent', function(e){
    	e.preventDefault();
    })
});
