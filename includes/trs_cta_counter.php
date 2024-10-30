<?php
if(!function_exists('trs_cta_clickcount')){
function trs_cta_clickcount(){

	if ( isset($_REQUEST['post_id']) ) {

		$post_id = esc_attr( $_REQUEST['post_id'] );
		$counter = "1";

		
		$db_counts = esc_attr( get_post_meta($post_id, 'cta_click_counter', true) );
		if(!empty($db_counts)){
			$total_counts = $db_counts + $counter;
		}else{
			$total_counts = 1;	
		}
    // Save our submissions to the database
    update_post_meta( $post_id, 'cta_click_counter', $total_counts);
    die();
	}
}
add_action('wp_ajax_clickcount', 'trs_cta_clickcount');
add_action( 'wp_ajax_nopriv_clickcount', 'trs_cta_clickcount' );
}