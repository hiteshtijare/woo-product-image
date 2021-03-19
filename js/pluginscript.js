jQuery(document).ready( function($) {

      jQuery('input#woo_plugin_media_manager').click(function(e) {

             e.preventDefault();
             console.log('clicked');
            

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
         if(response) {
                jQuery('#product_response').html(response);
            }
            else {
               jQuery('#product_response').html('');
               alert("Might be some problem with Uploaded Image Name.");
            }
         }
      })   
}