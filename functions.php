<?php
//Include the css and js files in Admin
if(!function_exists('trs_cta_admin_enqueue_script')){
function trs_cta_admin_enqueue_script() {   
 
    wp_enqueue_style( 'admin_style', plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css' );
}
add_action('admin_enqueue_scripts', 'trs_cta_admin_enqueue_script');
}

//Include the css and js files at Front
if(!function_exists('trs_cta_enqueue_script')){
function trs_cta_enqueue_script() {   
	wp_enqueue_style( 'main-style', plugin_dir_url( __FILE__ ) . 'assets/css/main-style.css' );
	wp_enqueue_script( 'customjs', plugin_dir_url( __FILE__ ) . 'assets/js/ctabanner.js', array( 'jquery' ), '', true );
}
add_action('wp_enqueue_scripts', 'trs_cta_enqueue_script');
}

// Ajax URL for TRS CTA Click Counter
if(!function_exists('trs_cta_ajaxurl')){
function trs_cta_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action('wp_head', 'trs_cta_ajaxurl');
}

if(!function_exists('trs_cta_change_title_text')){
function trs_cta_change_title_text( $title ){
    $screen = get_current_screen();
  
    if  ( 'cta' == $screen->post_type ) {
         $title = 'Add Heading';
    }
  
    return $title;
}
add_filter( 'enter_title_here', 'trs_cta_change_title_text' );
}

if(!function_exists('trs_cta_shortcode_columns')){
function trs_cta_shortcode_columns($columns) {
    $columns['shortcode'] = 'Shortcode';
	$columns['counter'] = 'Counter';
    return $columns;
}
add_filter('manage_edit-cta_columns', 'trs_cta_shortcode_columns');
}

if(!function_exists('trs_cta_shortcode_show_columns')){
add_action('manage_cta_posts_custom_column',  'trs_cta_shortcode_show_columns');
function trs_cta_shortcode_show_columns($column) {
	global $post;
      switch ( $column ) {
		   case 'shortcode' :
?>
        <p>[trs_cta_banner id="<?php echo esc_attr( $post->ID );?>"]</p> 
<?php 
            break;
			
			  case 'counter' :
			  $counter = esc_attr( get_post_meta($post->ID, 'cta_click_counter', true) );
			if(empty($counter)){
				echo 0;
			}else{
				echo esc_attr( $counter );
			}		
			  break;
    }
		}
					}

if(!function_exists('trs_cta_sortable_column')){
add_filter( 'manage_edit-cta_sortable_columns', 'trs_cta_sortable_column' );
function trs_cta_sortable_column( $columns ) {
    $columns['shortcode'] = 'Shortcode';
	$columns['counter'] = 'Counter';

    return $columns;
}
			}

// define the post_submitbox_start callback 
if(!function_exists('trs_cta_post_submitbox_start')){
function trs_cta_post_submitbox_start() { 
		global $post;
		$counter = esc_attr( get_post_meta($post->ID, 'cta_click_counter', true) );
?>
	<div class="misc-pub-section misc-pub-visibility" id="visibility">
				<span>
<?php
			if(empty($counter)){
				$counter = 0;
?>
				Click Count: <b><?php echo esc_attr( $counter );?></b>
<?php
			}else{
?>
				Click Count: <b><?php echo esc_attr( $counter );?></b>
<?php
			}
?>	
				</span>			
			</div>
<?php
		}
add_action( 'post_submitbox_misc_actions', 'trs_cta_post_submitbox_start', 10, 0 ); 	
		}
if(!function_exists('trs_cta_remove_row_actions')){
add_filter( 'post_row_actions', 'trs_cta_remove_row_actions', 10, 1 );
function trs_cta_remove_row_actions( $actions )
{
    if( get_post_type() == 'cta' )
        unset( $actions['view'] );
    return $actions;
}
	}

if(!function_exists('trs_cta_footer_admin')){
function trs_cta_footer_admin () {  
  if( get_post_type() == 'cta' ){
?>
	<div> © 2022 All rights reserved. Developed by <a href="https://therightsw.com/" target="_blank">The Right Software</a></div>
<?php
  }
}  
add_action('admin_footer_text', 'trs_cta_footer_admin'); 
	}