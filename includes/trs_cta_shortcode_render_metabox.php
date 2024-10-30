<?php

/**
 * Render the Shortcode metabox markup
 */
if (!function_exists('trs_cta_shortcode_render_metabox')) {
	function trs_cta_shortcode_render_metabox()
	{
		// Variables
		global $post;
?>
		<!-- Banner Size Field -->
		<fieldset>
			<div class="bannerSizesField banneField">
				<label for="shortcode_metabox"></label>
				<?php
				if ('publish' === esc_attr(get_post_status($post->ID))) {
				?>
					<p>[trs_cta_banner id="<?php echo esc_attr($post->ID); ?>"]</p>
				<?php
				}
				?>
			</div>
		</fieldset>
<?php
	}
}
