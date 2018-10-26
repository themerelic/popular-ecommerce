jQuery(function($){
  // Set all variables to be used in scope
  var frame;

  
  
  // ADD IMAGE LINK
  $(document).on('click','.category_background', function( event ) {
    imgContainer = $(this).closest('.widget').find('.bg-img-container');
    imgIdInput = $(this).closest('.widget').find('.background-img-id');

    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Image For Title  Background',
      button: {
        text: 'Select'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    // $(document).on( 'select', 'frame' ,function() {
    frame.on('select',function(){
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();
      

      // Send the attachment URL to our custom image input field.
      imgContainer.html( '<img src="'+attachment.url+'" alt="" style="max-width:50%;"/>' );

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.id );

      // Hide the add image link
      $('.category_background').addClass( 'hidden' );

      // Unhide the remove image link
      // delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();


  });


// ADD IMAGE In Widget Section
  $(document).on('click','.kwidget_image', function( event ) {
    imgIdInput = $(this).parent('div').find('.upload');
    imgIdInput2 = $(this).parent('div').find('.uploadhas-file');
    var preivewImg = $(this).parent('div').find(".screenshot img");
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Image For Title  Background',
      button: {
        text: 'Select'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    // $(document).on( 'select', 'frame' ,function() {
    frame.on('select',function(){
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();
      

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.url );
      imgIdInput2.val(attachment.url);
      preivewImg.attr('src', attachment.url);
      // Hide the add image link
      // $('.kwidget_image').addClass( 'hidden' );

      // Unhide the remove image link
      // delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();

    
  });


  // remmove image from widget input
   jQuery(document).on('click','.remove-image', function( event ) {
      var img = jQuery(this).parent();
      var input = jQuery(this).parent().parent().find(".uploadhas-file");
      img.find('img').attr("src", "");
      input.val(""); 
   });



});