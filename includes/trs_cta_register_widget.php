<?php
/**
 * Register cta Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_cta_widget( $widgets_manager ) {

	include( ABSPATH . 'wp-content/plugins/cta-builder/widgets/trs_cta_widget.php' ); //include the widget file

	$widgets_manager->register( new \Elementor_CTA_Widget() ); //register the widget

 }
add_action( 'elementor/widgets/register', 'register_cta_widget' );
?>