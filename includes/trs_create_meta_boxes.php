<?php

/**
 * Create the metabox
 */
if (!function_exists('trs_cta_create_metabox')) {
    function trs_cta_create_metabox()
    {

        add_meta_box(
            'cta_banner_size_metabox', // Metabox ID
            'Banner Sizes', // Title to display
            'trs_cta_banner_sizes_render_metabox', // Function to call that contains the metabox content
            'cta', // Post type to display metabox on
            'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
            'default' // Priority relative to other metaboxes
        );

        add_meta_box(
            'cta_image_properties_metabox', // Metabox ID
            'Banner Image Properties', // Title to display
            'trs_cta_image_properties_render_metabox', // Function to call that contains the metabox content
            'cta', // Post type to display metabox on
            'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
            'default' // Priority relative to other metaboxes
        );

        add_meta_box(
            'cta_text_properties_metabox', // Metabox ID
            'Banner Text Properties', // Title to display
            'trs_cta_text_properties_render_metabox', // Function to call that contains the metabox content
            'cta', // Post type to display metabox on
            'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
            'default' // Priority relative to other metaboxes
        );

        add_meta_box(
            'cta_shortcode_metabox', // Metabox ID
            'Shortcode', // Title to display
            'trs_cta_shortcode_render_metabox', // Function to call that contains the metabox content
            'cta', // Post type to display metabox on
            'side', // Where to put it (normal = main colum, side = sidebar, etc.)
            'default' // Priority relative to other metaboxes
        );
    }
    add_action('add_meta_boxes', 'trs_cta_create_metabox');
}
