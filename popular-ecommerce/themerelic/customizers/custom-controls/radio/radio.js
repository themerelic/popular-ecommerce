jQuery(document).ready(function($) {
    "use strict";
    
    /**
     * Script for image selected from radio option
     */
    $('.controls#popular-ecommerce-img-container li img').click(function(){
        $('.controls#popular-ecommerce-img-container li').each(function(){
            $(this).find('img').removeClass ('popular-ecommerce-radio-img-selected') ;
        });
        $(this).addClass ('popular-ecommerce-radio-img-selected') ;
    });

});