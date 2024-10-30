<?php
/**
 * Render the metabox markup
 */
 if(!function_exists('trs_cta_banner_sizes_render_metabox')){
function trs_cta_banner_sizes_render_metabox() {
    // Variables
    global $post; 
	// Get the current post data
   // Get the saved values
    $bannerSizes = esc_attr( get_post_meta( $post->ID, 'cta_bannersizes', true ) );
	
?>

				<!-- Banner Size Field -->
		  <fieldset>
            <div class="bannerSizesField banneField">
			<label for="banner_sizes_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Banner Size', 'trs_cta_banner_sizes' );
?>
				</label>
				<input class="bannerRadioBtn" type="radio" name="banner_sizes_metabox" value="default" <?php checked( esc_attr( $bannerSizes ), 'default' ); ?> >Default	
        <input class="bannerRadioBtn" type="radio" name="banner_sizes_metabox" value="boxed" <?php checked( esc_attr( $bannerSizes ), 'boxed' ); ?> >Boxed
        <input class="bannerRadioBtn" type="radio" name="banner_sizes_metabox" value="fullwidth" <?php checked( esc_attr( $bannerSizes ), 'fullwidth' ); ?> >Full Width
            </div>
        </fieldset>	
<?php
    // Security field
    // This validates that submission came from the
    // actual dashboard and not the front end or
    // a remote server.
    wp_nonce_field( 'trs_cta_banner_sizes_form_metabox_nonce', 'trs_cta_banner_sizes_form_metabox_process' );
}
 }
/**
 * Save the metabox
 * @param  Number $post_id The post ID
 * @param  Array  $post    The post data
 */
  if(!function_exists('trs_cta_banner_sizes_save_metabox')){
function trs_cta_banner_sizes_save_metabox( $post_id, $post ) {
	
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;	
	}

    // Verify that our security field exists. If not, bail.
    if ( !isset( $_POST['trs_cta_banner_sizes_form_metabox_process'] ) ) return;

    // Verify data came from edit/dashboard screen
    if ( !wp_verify_nonce( $_POST['trs_cta_banner_sizes_form_metabox_process'], 'trs_cta_banner_sizes_form_metabox_nonce' ) ) {
        return $post->ID;
    }

    // Verify user has permission to edit post
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }

    // Check that our custom fields are being passed along
    // This is the `name` value array. We can grab all
    // of the fields and their values at once.
   	 if ( !isset( $_POST['banner_sizes_metabox'] ) ) {
        return $post->ID;
		}

    /**
     * Sanitize the submitted data
     * This keeps malicious code out of our database.
     * `wp_sanitize` strips our dangerous server values
     * and allows through anything you can include a post.
     */
   $sanitized_bannersizes = sanitize_html_class( $_POST['banner_sizes_metabox'] );
	
	
    // Save our submissions to the database
    update_post_meta( $post->ID, 'cta_bannersizes', $sanitized_bannersizes);

	

}
add_action( 'save_post', 'trs_cta_banner_sizes_save_metabox', 1, 2 );
	}