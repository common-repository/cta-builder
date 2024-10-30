jQuery(document).ready(function(jQuery) {
    jQuery( ".bannerurl" ).click(function(e) {
	 post_id = jQuery(this).attr("data-post-id");
      jQuery.ajax({
          url: ajaxurl, 
          data: {
              'action':'clickcount', 
			        'post_id' : post_id,
          },
          success:function(data) {
	
          },
      
      });
    });
});