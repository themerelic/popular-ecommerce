jQuery(document).ready(function() {
    "use strict";
    /**
     * Tab widget script 
     */
    jQuery('.widget').each(function(){
        var widget_id = jQuery(this).attr('id');
        var checkdVal = jQuery("#"+widget_id + " .ostore_pro_tab_radio:checked").val();
        if(checkdVal){
            tabWidget(checkdVal, '#' + widget_id);
        }
    })
    
    function tabWidget( value, id ){
        //hide all
        jQuery(id + " .default_woocommerce_collection").parent('p').hide();
        jQuery(id + " .category_tab_collection").parent('div').hide()
        if( value == 'cat'){
            jQuery(id + " .category_tab_collection").parent('div').show()
        }else{
            jQuery(id + " .default_woocommerce_collection").parent('p').show();
        }
    }
    jQuery(".ostore_pro_tab_radio").live('change', function(){
        var id = "#"+jQuery(this).parents('.widget').attr('id');
        var value = jQuery(this).val();
        tabWidget(value, id );
    });
    jQuery( document ).on( 'widget-updated widget-added' , function( event, jQuerywidget ){
        var widget_id = jQuery(jQuerywidget).attr('id');
        tabWidget(jQuery("#" + widget_id + " .ostore_pro_tab_radio:checked").val(), "#"+ widget_id);
    });
    // end tab widget script 
    

    /** 
     * Import Demo Data Ajax Function Area 
    */ 
    jQuery("#demo_import").click(function (){
        var $import_true = confirm('Are you sure to import dummy content ? It will overwrite the existing data.');
        if($import_true == false) return;
        var imp = $(this).next('div');
        imp.addClass('demo-loading');

        jQuery(".import-message").html("The Demo Contents are Loading. It might take a while. Please keep patience. <div class='spinner'></div>");
        jQuery("#demo_import").fadeOut();
        jQuery.ajax({
            url: ajaxurl,
            data: ({
                'action': 'ostore_pro_demo_import',            
            }),
            success: function(response){
                imp.removeClass('demo-loading');
                alert("Demo Contents Successfully Imported");
                location.reload();
            }
        });
    });
});