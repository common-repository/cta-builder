<?php
/**
 * Render the metabox markup
 */
 if(!function_exists('trs_cta_image_properties_render_metabox')){
function trs_cta_image_properties_render_metabox() {
    // Variables
    global $post; 
	// Get the current post data
   // Get the saved values
    $bannerURL = esc_attr( get_post_meta( $post->ID, 'cta_banner_url', true ) ); 
	$bannerPosition = esc_attr( get_post_meta( $post->ID, 'cta_banner_position', true ) );
	$borderColor = esc_attr( get_post_meta( $post->ID, 'cta_border_color', true ) );
	$bannerSize = esc_attr( get_post_meta( $post->ID, 'cta_banner_size', true ) );
	$bgColor = esc_attr( get_post_meta( $post->ID, 'cta_bg_color', true ) );
	$bgRepeat = esc_attr( get_post_meta( $post->ID, 'cta_bg_repeat', true ) );
	$border = esc_attr( get_post_meta( $post->ID, 'cta_border', true ) );
	

?>
		<!-- CTA Banner URL -->
        <fieldset>
            <div class="bannerFieldUrl banneField">
			<label for="banner_url_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Banner URL', 'trs_cta_image_properties' );
?>
					</label>
                 <input
                    type="text"
                    name="banner_url_metabox"
                    id="banner_url_metabox"
                    class="cta_class"
                    placeholder="https://therightsw.com/"
                    value="<?php echo esc_attr( $bannerURL); ?>"
                >
            </div>
        </fieldset>

		<!-- CTA Banner Size -->
		<fieldset>

            <div class="bannerSizeField banneField">
				<label for="banner_size_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Image Size', 'trs_cta_image_properties' );
?>
				</label>
         <select name="banner_size_metabox" id="banner_size_metabox"  class="cta_class">
        <option value="fill" <?php selected(esc_attr($bannerSize), 'fill'); ?>>Fill</option>
        <option value="contain" <?php selected(esc_attr($bannerSize), 'contain'); ?>>Contain</option>
        <option value="cover" <?php selected(esc_attr($bannerSize), 'cover'); ?>>Cover</option>
        <option value="none" <?php selected(esc_attr($bannerSize), 'none'); ?>>None</option>
        <option value="scale-down" <?php selected(esc_attr($bannerSize), 'scale-down'); ?>>Scale-Down</option>
        </select>
                 
            </div>
        </fieldset>
		
				<!-- Banner Position Field -->
		<fieldset>
            <div class="bannerPositionField banneField">
			<label for="border_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Banner Position', 'trs_cta_image_properties' );
?>
				</label>
				 <select name="banner_position_metabox" id="banner_position_metabox"  class="cta_class">
        <option value="top" <?php selected(esc_attr($bannerPosition), 'top'); ?>>Top</option>
        <option value="right" <?php selected(esc_attr($bannerPosition), 'right'); ?>>Right</option>
		<option value="bottom" <?php selected(esc_attr($bannerPosition), 'bottom'); ?>>Bottom</option>
		<option value="left" <?php selected(esc_attr($bannerPosition), 'left'); ?>>Left</option>
		<option value="center" <?php selected(esc_attr($bannerPosition), 'center'); ?>>Center</option>
        </select>
            </div>
        </fieldset>
		
		<!-- Backgorund Repeat Field -->
		  <fieldset>

            <div class="bannerRepeatField banneField">
			<label for="bg_repeat_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Background Repeat', 'trs_cta_image_properties' );
?>
				</label>
         <select name="bg_repeat_metabox" id="bg_repeat_metabox"  class="cta_class">
        <option value="repeat" <?php selected(esc_attr($bgRepeat), 'repeat'); ?>>Repeat</option>
        <option value="no-repeat" <?php selected(esc_attr($bgRepeat), 'no-repeat'); ?>>No-Repeat</option>
        </select>
                 
            </div>
        </fieldset>

        
				<!-- Border Field -->
			<fieldset>
            <div class="bannerBorderField banneField">
			<label for="border_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Border', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="text"
                    name="border_metabox"
                    id="border_metabox"
                    class="cta_class"
                    placeholder="2px solid"
                    value="<?php echo esc_attr( $border); ?>"
                >
            </div>
        </fieldset>
		
			<!-- Banner Background Color -->
		 <fieldset>
            <div class="bannerbgColorField banneField">
			<label for="bg_color_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Choose Background Color', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="color"
                    name="bg_color_metabox"
                    id="bg_color_metabox"
                    class="cta_class"
                    value="<?php echo esc_attr( $bgColor); ?>">

            </div>
        </fieldset>


		
		<!-- Border Color -->
		  <fieldset>
            <div class="bannerBorderColorField banneField">
			<label for="border_color_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Border Color', 'trs_cta_image_properties' );
?>
					</label>
                 <input
                    type="color"
                    name="border_color_metabox"
                    id="border_color_metabox"
                    class="cta_class"
                    value="<?php echo esc_attr( $borderColor); ?>"
                >
            </div>
        </fieldset>
<?php

    // Security field
    // This validates that submission came from the
    // actual dashboard and not the front end or
    // a remote server.
    wp_nonce_field( 'trs_cta_image_properties_form_metabox_nonce', 'trs_cta_image_properties_form_metabox_process' );
}
	}
/**
 * Save the metabox
 * @param  Number $post_id The post ID
 * @param  Array  $post    The post data
 */
  if(!function_exists('trs_cta_image_properties_save_metabox')){
function trs_cta_image_properties_save_metabox( $post_id, $post ) {
	
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;	
	}

    // Verify that our security field exists. If not, bail.
    if ( !isset( $_POST['trs_cta_image_properties_form_metabox_process'] ) ) return;

    // Verify data came from edit/dashboard screen
    if ( !wp_verify_nonce( $_POST['trs_cta_image_properties_form_metabox_process'], 'trs_cta_image_properties_form_metabox_nonce' ) ) {
        return $post->ID;
    }

    // Verify user has permission to edit post
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }

    // Check that our custom fields are being passed along
    // This is the `name` value array. We can grab all
    // of the fields and their values at once.
    if ( !isset( $_POST['banner_url_metabox'] ) ) {
        return $post->ID;
    }
	
	
	 if ( !isset( $_POST['border_color_metabox'] ) ) {
        return $post->ID;
    }
	
	if ( !isset( $_POST['banner_size_metabox'] ) ) {
        return $post->ID;
    }
	
	if ( !isset( $_POST['bg_color_metabox'] ) ) {
        return $post->ID;
    }
	
	 if ( !isset( $_POST['bg_repeat_metabox'] ) ) {
        return $post->ID;
    }
	
	 if ( !isset( $_POST['border_metabox'] ) ) {
        return $post->ID;
    }
	
	 if ( !isset( $_POST['banner_position_metabox'] ) ) {
        return $post->ID;
    }
	
	
    /**
	
    /**
     * Sanitize the submitted data
     * This keeps malicious code out of our database.
     * `wp_sanitize` strips our dangerous server values
     * and allows through anything you can include a post.
     */
    $sanitized_banner_url = sanitize_url( $_POST['banner_url_metabox'] );
	$sanitized_border_color = sanitize_hex_color( $_POST['border_color_metabox'] );
	$sanitized_banner_size = sanitize_text_field( $_POST['banner_size_metabox'] );
	$sanitized_bg_color = sanitize_hex_color( $_POST['bg_color_metabox'] );
	$sanitized_bg_repeat = sanitize_text_field( $_POST['bg_repeat_metabox'] );
	$sanitized_border = sanitize_text_field( $_POST['border_metabox'] );
	$sanitized_banner_position = sanitize_text_field( $_POST['banner_position_metabox'] );
	
	
    // Save our submissions to the database
    update_post_meta( $post->ID, 'cta_banner_url', $sanitized_banner_url );
	update_post_meta( $post->ID, 'cta_border_color', $sanitized_border_color );update_post_meta( $post->ID, 'cta_banner_size', $sanitized_banner_size );
	update_post_meta( $post->ID, 'cta_bg_color', $sanitized_bg_color );
	update_post_meta( $post->ID, 'cta_bg_repeat', $sanitized_bg_repeat );
	update_post_meta( $post->ID, 'cta_border', $sanitized_border );
	update_post_meta( $post->ID, 'cta_banner_position', $sanitized_banner_position );
	

}
add_action( 'save_post', 'trs_cta_image_properties_save_metabox', 1, 2 );
	}