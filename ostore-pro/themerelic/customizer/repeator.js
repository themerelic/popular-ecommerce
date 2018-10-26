/**
 * Ostore Pro Repeator Js
 */
jQuery(document).ready(function($){
	var ostore_pro_upload;
	var ostore_pro_selector;
    function ostore_pro_add_file(event, selector) {
		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		ostore_pro_selector = selector;
		event.preventDefault();
		if ( ostore_pro_upload ) {
			ostore_pro_upload.open();
		} else {
			ostore_pro_upload = wp.media.frames.ostore_pro_upload =  wp.media({
				title: $el.data('choose'),
				button: {
					text: $el.data('update'),
					close: false
				}
			});

			ostore_pro_upload.on( 'select', function() {
				var attachment = ostore_pro_upload.state().get('selection').first();
				ostore_pro_upload.close();
                ostore_pro_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					ostore_pro_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				ostore_pro_selector.find('.upload-button-wdgt').unbind().addClass('remove-file').removeClass('upload-button-wdgt').val(ostore_pro_img_remove.remove);
				ostore_pro_selector.find('.of-background-properties').slideDown();
				ostore_pro_selector.find('.remove-image, .remove-file').on('click', function() {
					ostore_pro_remove_file( $(this).parents('.section') );
				});
			});
		}
		ostore_pro_upload.open();
	}

	function ostore_pro_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button-wdgt').removeClass('remove-file').val(ostore_pro_img_remove.upload);
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button-wdgt').remove();
		}
		selector.find('.upload-button-wdgt').on('click', function(event) {			
			ostore_pro_add_file(event, $(this).parents('.section'));            
		});
	}

	$('body').on('click','.remove-image, .remove-file', function() {
		ostore_pro_remove_file( $(this).parents('.section') );
    });

    $(document).on('click', '.upload-button-wdgt', function( event ) {
    	ostore_pro_add_file(event, $(this).parents('.section'));
    });


    /**
     * Repeater Fields
    */
	function ostore_pro_refresh_repeater_values(){
		$(".ostore-pro-repeater-field-control-wrap").each(function(){			
			var values = []; 
			var $this = $(this);			
			$this.find(".ostore-pro-repeater-field-control").each(function(){
			var valueToPush = {};
			$(this).find('[data-name]').each(function(){
				var dataName = $(this).attr('data-name');
				var dataValue = $(this).val();
				valueToPush[dataName] = dataValue;
			});
			values.push(valueToPush);
			});
			$this.next('.ostore-pro-repeater-collector').val(JSON.stringify(values)).trigger('change');
		});
	}

    $('#customize-theme-controls').on('click','.ostore-pro-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.ostore-pro-repeater-field-control').toggleClass('expanded');
    });
    $('#customize-theme-controls').on('click', '.ostore-pro-repeater-field-close', function(){
    	$(this).closest('.ostore-pro-repeater-fields').slideUp();;
    	$(this).closest('.ostore-pro-repeater-field-control').toggleClass('expanded');
    });
    $("body").on("click",'.ostore-pro-add-control-field', function(){
		var $this = $(this).parent();
		if(typeof $this != 'undefined') {
            var field = $this.find(".ostore-pro-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){                
                field.find("input[type='text'][data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });
                field.find("textarea[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });
                field.find("select[data-name]").each(function(){
                	var defaultValue = $(this).attr('data-default');
                	$(this).val(defaultValue);
                });

                field.find(".attachment-media-view").each(function(){
                    var defaultValue = $(this).find('input[data-name]').attr('data-default');
                    $(this).find('input[data-name]').val(defaultValue);
                    if(defaultValue){
                        $(this).find(".thumbnail-image").html('<img src="'+defaultValue+'"/>').prev('.placeholder').addClass('hidden');
                    }else{
                        $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');   
                    }
                });

				field.find('.ostore-pro-fields').show();

				$this.find('.ostore-pro-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.ostore-pro-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                ostore_pro_refresh_repeater_values();
            }

		}
		return false;
	});
	
	$("#customize-theme-controls").on("click", ".ostore-pro-repeater-field-remove",function(){
		if( typeof	$(this).parent() != 'undefined'){
			$(this).closest('.ostore-pro-repeater-field-control').slideUp('normal', function(){
				$(this).remove();
				ostore_pro_refresh_repeater_values();
			});			
		}
		return false;
	});

	$("#customize-theme-controls").on('keyup change', '[data-name]',function(){
        ostore_pro_refresh_repeater_values();
        return false;
	});


	// Set all variables to be used in scope
	var frame;
	// ADD IMAGE LINK
	$('.customize-control-repeater').on( 'click', '.ostore-pro-upload-button', function( event ){
		event.preventDefault();
		var imgContainer = $(this).closest('.ostore-pro-fields-wrap').find( '.thumbnail-image'),
		placeholder = $(this).closest('.ostore-pro-fields-wrap').find( '.placeholder'),
		imgIdInput = $(this).siblings('.upload-id');

		// Create a new media frame
		frame = wp.media({
		    title: 'Select or Upload Image',
		    button: {
		    text: 'Use Image'
		    },
		    multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected in the media frame...
		frame.on( 'select', function() {
			// Get media attachment details from the frame state
			var attachment = frame.state().get('selection').first().toJSON();
			// Send the attachment URL to our custom image input field.
			imgContainer.html( '<img src="'+attachment.url+'" style="max-width:100%;"/>' );
			placeholder.addClass('hidden');
			// Send the attachment id to our hidden input
			imgIdInput.val( attachment.url ).trigger('change');
		});

		// Finally, open the modal on click
		frame.open();
	});


	// DELETE IMAGE LINK
	$('.customize-control-repeater').on( 'click', '.ostore-pro-delete-button', function( event ){

        event.preventDefault();
        var imgContainer = $(this).closest('.ostore-pro-fields-wrap').find( '.thumbnail-image'),
        placeholder = $(this).closest('.ostore-pro-fields-wrap').find( '.placeholder'),
        imgIdInput = $(this).siblings('.upload-id');

        // Clear out the preview image
        imgContainer.find('img').remove();
        placeholder.removeClass('hidden');

        // Delete the image id from the hidden input
        imgIdInput.val( '' ).trigger('change');

	});

	/*Drag and drop to change order*/
	$(".ostore-pro-repeater-field-control-wrap").sortable({
		orientation: "vertical",
		update: function( event, ui ) {
			ostore_pro_refresh_repeater_values();
		}
	});

});