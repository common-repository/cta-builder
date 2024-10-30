<?php

/**
 * Plugin Name:       Call To Action
 * Plugin URI:        https://therightsw.com/plugin-development/
 * Description:       This **TRS CTA Builder** call-to-action plugin allows you to create HTML5 clickable banners and add to your pages with shortcode. It is user friendly. User can set heading & sub-heading text, User can set font size, font color, text alignment, font family, image size, image position, border, border color, background color. This plugin will generate a shortcode which can be used in any page or template. Shows number of clicks in admin.
 * Version:           1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            The Right Software
 * Author URI:        https://therightsw.com/plugin-development/
 * License:           GPL v2 or later
 * Text Domain:       Call To Action
 */

include(plugin_dir_path(__FILE__) . 'trs_cta_activate.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_post_type.php');

include(plugin_dir_path(__FILE__) . 'functions.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_create_meta_boxes.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_image_properties_render_metabox.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_text_properties_render_metabox.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_banner_sizes_render_metabox.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_shortcode_render_metabox.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_shortcode.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_counter.php');

include(plugin_dir_path(__FILE__) . 'trs_cta_uninstall.php');

include(plugin_dir_path(__FILE__) . 'includes/trs_cta_register_widget.php');