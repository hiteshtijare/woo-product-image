jQuery(document).ready( function($) {

      jQuery('input#woo_plugin_media_manager').click(function(e) {

             e.preventDefault();
             var image_frame;
             if(image_frame){
                 image_frame.open();
             }
             // Define image_frame as wp.media object
             image_frame = wp.media({
                           title: 'Select Media',
                           multiple : true,
                           library : {
                                type : 'image',
                            }
                       });

                       image_frame.on('close',function() {
                          // On close, get selections and save to the hidden input
                          // plus other AJAX stuff to refresh the image preview
                          var selection =  image_frame.state().get('selection');
                          var gallery_ids = new Array();
                          var my_index = 0;
                          selection.each(function(attachment) {
                             gallery_ids[my_index] = attachment['id'];
                             my_index++;
                          });
                          var ids = gallery_ids.join(",");
                          jQuery('input#woo_plugin_image_id').val(ids);
                          Refresh_Assign_Image(ids);
                       });

                      image_frame.on('open',function() {
                        // On open, get the id from the hidden input
                        // and select the appropiate images in the media manager
                        var selection =  image_frame.state().get('selection');
                        var ids = jQuery('input#woo_plugin_image_id').val().split(',');
                        ids.forEach(function(id) {
                          var attachment = wp.media.attachment(id);
                          attachment.fetch();
                          selection.add( attachment ? [ attachment ] : [] );
                        });

                      });

                    image_frame.open();
     });

});

// Ajax request to refresh and assign image
function Refresh_Assign_Image(the_id){
        var data = {
            action: 'woo_plugin_set_image',
            id: the_id
        };

        jQuery.ajax({
         type : "post",
         dataType : "json",
         url : ajaxurl,
         data : data,
         success: function(response) {
            if(response.success === true) {
                jQuery('#woo_plugin-preview-image').replaceWith( response.data.image );
            }
            else {
               alert("Your vote could not be added")
            }
         }
      })   
}