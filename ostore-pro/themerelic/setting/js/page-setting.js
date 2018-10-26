jQuery(function($){
  // Set all variables to be used in scope
  var frame,
    //   metaBox = $('#spider_menu_background'), // Your meta box id here
      addImgLink = $('#ostore_pro_menu_background');
    //   delImgLink = metaBox.find( '.delete-custom-img'),
      imgContainer = $('#bg-img-container');
      imgIdInput = $('#background-img-id');
  
  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Image For Subscription Popup Box',
      button: {
        text: 'Select'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      imgContainer.html( '<img src="'+attachment.url+'" alt="" style="max-width:50%;"/>' );

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.id );

      // Hide the add image link
      addImgLink.addClass( 'hidden' );

      // Unhide the remove image link
      delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();
  });
});