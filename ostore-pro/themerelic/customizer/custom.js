( function( $ ) {
    
    $(window).load(function () {
        var imageRepeator = jQuery(".payment_wraper");
        imageRepeator.each(function (item) {
           var begin_attachment_string = jQuery(this).find(".images-input").val();
           var begin_attachment_array = begin_attachment_string.split(",");
           jQuery(this).find(".images").html('')
           for(var i = 0; i < begin_attachment_array.length; i++){
               if(begin_attachment_array[i] != ""){
                    jQuery(this).find(".images").append( "<li class='image-list'><img src='"+begin_attachment_array[i]+"'></li>" );
               }
           }
        })
                
                $(".button-secondary.upload").click(function () {
                    var parentEle = jQuery(this).parents(".payment_wraper");
                        
                    var custom_uploader = wp.media.frames.file_frame = wp.media({
                        multiple: true
                    });
    
                    custom_uploader.on('select', function() {
                        var selection = custom_uploader.state().get('selection');
                        var attachments = [];
                        selection.map( function( attachment ) {
                            attachment = attachment.toJSON();
                            parentEle.find(".images").append( "<li class='image-list'><img src='"+attachment.url+"'></li>" );
                            attachments.push(attachment.url);
                            //
                         });
                         var attachment_string = attachments.join() + "," + parentEle.find('.images-input').val();
                         parentEle.find('.images-input').val(attachment_string).trigger('change');
                     });
                     custom_uploader.open();
                    
                 });
                
                $(".images").click(function () {
                    parentEle = $(event.target).parents(".payment_wraper");
                        var img_src = $(event.target).parents().find("img").attr('src');
                        $(event.target).closest("li").remove();
                        var attachment_string = parentEle.find('.images-input').val();
                        attachment_string = attachment_string.replace(img_src+",", "");
                        parentEle.find('.images-input').val(attachment_string).trigger('change');
                    });

                /** 
                  * Preloader Selection 
                */  
                $(".ostore-preloader").click(function (e) {
                    e.preventDefault();
                    var preloader = $(this).attr("preloader");      
                    $(this).parents(".ostore-preloader-container").find('.ostore-preloader').removeClass('active');
                    $(this).addClass('active');
                    $(this).parents(".ostore-preloader-container").next('input:hidden').val(preloader).change();
                });

            });
    
    } )( jQuery );