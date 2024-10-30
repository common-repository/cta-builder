<?php
/**
 * Deactivate the plugin.
 */
if(!function_exists('trs_cta_uninstall')){
	function trs_cta_uninstall(){
		/** Disable TRS CTA Shortcode **/	
		add_shortcode( 'trs_cta_banner', '__return_false' );
		  flush_rewrite_rules();
	}
register_deactivation_hook(__FILE__, 'trs_cta_uninstall');
 }
 
  if(!function_exists('trs_cta_delete')){
function trs_cta_delete(){
if( is_admin() ) {
	
		$trs_cta_posts= get_posts( array('post_type'=>'cta','numberposts'=>-1) );
			foreach ($trs_cta_posts as $allpost) {
				wp_delete_post( $allpost->ID, true );
				}
}
}
register_uninstall_hook(__FILE__, 'trs_cta_delete');
	}