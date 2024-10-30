<?php
/**
 * Activate the plugin.
 */
 if(!function_exists('trs_cta_activate')){
function trs_cta_activate() { 
// Trigger our function that registers the custom post type plugin.
    trs_cta_cpt(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'trs_cta_activate' );
 }