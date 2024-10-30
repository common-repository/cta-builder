<?php
function trs_cta_change_title_text( $title ){
    $screen = get_current_screen();
  
    if  ( 'cta' == $screen->post_type ) {
         $title = 'Add Heading';
    }
  
    return $title;
}
add_filter( 'enter_title_here', 'trs_cta_change_title_text' );
add_filter('manage_edit-cta_columns', 'trs_cta_shortcode_columns');
function trs_cta_shortcode_columns($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}

add_action('manage_cta_posts_custom_column',  'trs_cta_shortcode_show_columns');
function trs_cta_shortcode_show_columns($column) {
	global $post;
      switch ( $column ) {
		   case 'shortcode' :
?>
        <p>[trs_cta_banner id="<?=$post->ID;?>"]</p> 
<?php 
            break;		
    }
		}

function update_footer_admin () {  
  if( get_post_type() == 'cta' ){
?>
	<div> © 2022 All rights reserved. Developed by <a href="https://therightsw.com/" target="_blank">The Right Software</a></div>
<?php
  }
}  
add_action('admin_footer_text', 'update_footer_admin');