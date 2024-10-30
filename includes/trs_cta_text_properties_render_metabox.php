<?php
/**
 * Render the metabox markup
 */
  if(!function_exists('trs_cta_text_properties_render_metabox')){
function trs_cta_text_properties_render_metabox() {
    // Variables
    global $post; 
	// Get the current post data
   // Get the saved values
    $subHeading = esc_attr ( get_post_meta( $post->ID, 'cta_subheading', true ) );
	$headingColor = esc_attr( get_post_meta( $post->ID, 'cta_heading_color', true ) );
	$subHeading_color = esc_attr( get_post_meta( $post->ID, 'cta_subheading_color', true ) );
	$headingFontSize = esc_attr( get_post_meta( $post->ID, 'cta_heading_font_size', true ) );
	$subheadingFontSize = esc_attr( get_post_meta( $post->ID, 'cta_subheading_font_size', true ) );
	$headingTextAlign = esc_attr( get_post_meta( $post->ID, 'cta_heading_text_align', true ) );
	$subheadingTextAlign = esc_attr( get_post_meta( $post->ID, 'cta_subheading_text_align', true ) );
?>
             <!-- Sub Heading Text Field -->
			<fieldset>
            <div class="subHeadingField banneField">
			<label for="subheading_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Sub Heading', 'trs_cta_image_properties' );
?>
					</label>
                 <input
                    type="text"
                    name="subheading_metabox"
                    id="subheading_metabox"
                    class="cta_class"
                    placeholder="Add Sub Heading"
                    value="<?php echo esc_attr( $subHeading); ?>"
                >
            </div>
        </fieldset>
				<!-- Heading Font Size Field -->
		  <fieldset>
            <div class="bannerHeadingFontField banneField">
			<label for="heading_font_size_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Heading Font Size', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="text"
                    name="heading_font_size_metabox"
                    id="heading_font_size_metabox"
                    class="cta_class"
                    placeholder="30px"
                    value="<?php echo esc_attr( $headingFontSize ); ?>"
                >
            </div>
        </fieldset>
			<!-- Sub Heading Font Size -->
            <fieldset>
            <div class="bannersubheadingColorField banneField">
			<label for="subheading_color_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Enter Sub Heading Font Size', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="text"
                    name="subheading_font_size_metabox"
                    id="subheading_font_size_metabox"
                    class="cta_class"
                    placeholder="20px"
                    value="<?php echo esc_attr( $subheadingFontSize ); ?>"
                >
            </div>
        </fieldset>	
		<!-- Heading Text Align Field -->
		  <fieldset>

            <div class="headingTextAlignField banneField">
			<label for="heading_text_align_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Heading Text Align', 'trs_cta_image_properties' );
?>
				</label>
         <select name="heading_text_align_metabox" id="heading_text_align_metabox"  class="cta_class">
        <option value="left" <?php selected(esc_attr( $headingTextAlign ), 'left'); ?>>Left</option>
        <option value="center" <?php selected(esc_attr( $headingTextAlign ), 'center'); ?>>Center</option>
		<option value="right" <?php selected(esc_attr( $headingTextAlign ), 'right'); ?>>Right</option>
        </select>    
            </div>
        </fieldset>
		
			<!-- SubHeading Text Align Field -->
		  <fieldset>

            <div class="subHeadingTextAlignField banneField">
			<label for="subheading_text_align_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Select Sub Heading Text Align', 'trs_cta_image_properties' );
?>
				</label>
         <select name="subheading_text_align_metabox" id="subheading_text_align_metabox"  class="cta_class">
        <option value="left" <?php selected(esc_attr( $subheadingTextAlign ), 'left'); ?>>Left</option>
        <option value="center" <?php selected(esc_attr( $subheadingTextAlign ), 'center'); ?>>Center</option>
		<option value="right" <?php selected(esc_attr($subheadingTextAlign ), 'right'); ?>>Right</option>
        </select>
                 
            </div>
        </fieldset>		

        <!-- Heading Color Field -->
		 <fieldset>
            <div class="bannerHeadingColorField banneField">
			<label for="heading_color_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Choose Heading Color', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="color"
                    name="heading_color_metabox"
                    id="heading_color_metabox"
                    class="cta_class"
                    value="<?php echo esc_attr( $headingColor); ?>"
                >
            </div>
        </fieldset>
		
		
		<!-- Sub Heading Color Picker -->
		<fieldset>
            <div class="bannersubheadingColorField banneField">
			<label for="subheading_color_metabox">
<?php
							// This runs the text through a translation and echoes it (for internationalization)
							_e( 'Choose Sub Heading Color', 'trs_cta_image_properties' );
?>
				</label>
                 <input
                    type="color"
                    name="subheading_color_metabox"
                    id="subheading_color_metabox"
                    class="cta_class"
                    value="<?php echo esc_attr( $subHeading_color); ?>"
                >
            </div>
        </fieldset>
<?php

    // Security field
    // This validates that submission came from the
    // actual dashboard and not the front end or
    // a remote server.
    wp_nonce_field( 'trs_cta_text_properties_form_metabox_nonce', 'trs_cta_text_properties_form_metabox_process' );
}
  }
/**
 * Save the metabox
 * @param  Number $post_id The post ID
 * @param  Array  $post    The post data
 */
 if(!function_exists('trs_cta_text_properties_save_metabox')){
function trs_cta_text_properties_save_metabox( $post_id, $post ) {
	
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;	
	}

    // Verify that our security field exists. If not, bail.
    if ( !isset( $_POST['trs_cta_text_properties_form_metabox_process'] ) ) return;

    // Verify data came from edit/dashboard screen
    if ( !wp_verify_nonce( $_POST['trs_cta_text_properties_form_metabox_process'], 'trs_cta_text_properties_form_metabox_nonce' ) ) {
        return $post->ID;
    }

    // Verify user has permission to edit post
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }

    // Check that our custom fields are being passed along
    // This is the `name` value array. We can grab all
    // of the fields and their values at once.
   	 if ( !isset( $_POST['subheading_metabox'] ) ) {
        return $post->ID;
		}
		
		 if ( !isset( $_POST['heading_color_metabox'] ) ) {
        return $post->ID;
    }
	
	 if ( !isset( $_POST['subheading_color_metabox'] ) ) {
        return $post->ID;
    }
	
	if ( !isset( $_POST['heading_font_size_metabox'] ) ) {
        return $post->ID;
    }
	
	if ( !isset( $_POST['subheading_font_size_metabox'] ) ) {
        return $post->ID;
    }
	if ( !isset( $_POST['heading_text_align_metabox'] ) ) {
        return $post->ID;
    }
	
    /**
	
    /**
     * Sanitize the submitted data
     * This keeps malicious code out of our database.
     * `wp_sanitize` strips our dangerous server values
     * and allows through anything you can include a post.
     */
   $sanitized_subheading = sanitize_text_field( $_POST['subheading_metabox'] );
	$sanitized_heading_color = sanitize_hex_color( $_POST['heading_color_metabox'] );
	$sanitized_subheading_color = sanitize_hex_color( $_POST['subheading_color_metabox'] );
	$sanitized_heading_font_size = sanitize_text_field( $_POST['heading_font_size_metabox'] );
	$sanitized_subheading_font_size = sanitize_text_field( $_POST['subheading_font_size_metabox'] );
	$sanitized_heading_text_align = sanitize_text_field( $_POST['heading_text_align_metabox'] );
	$sanitized_subheading_text_align = sanitize_text_field( $_POST['subheading_text_align_metabox'] );
	
	
    // Save our submissions to the database
    update_post_meta( $post->ID, 'cta_subheading', $sanitized_subheading );
	update_post_meta( $post->ID, 'cta_heading_color', $sanitized_heading_color );
	update_post_meta( $post->ID, 'cta_subheading_color', $sanitized_subheading_color );
	update_post_meta( $post->ID, 'cta_heading_font_size', $sanitized_heading_font_size );
	update_post_meta( $post->ID, 'cta_subheading_font_size', $sanitized_subheading_font_size );
	update_post_meta( $post->ID, 'cta_heading_text_align', $sanitized_heading_text_align );
	update_post_meta( $post->ID, 'cta_subheading_text_align', $sanitized_subheading_text_align );
}
add_action( 'save_post', 'trs_cta_text_properties_save_metabox', 1, 2 );
 }