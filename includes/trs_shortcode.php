<?php
 if(!function_exists('trs_cta_banner')){
add_shortcode('trs_cta_banner', 'trs_cta_banner');
function trs_cta_banner($atts ){ 
    global $post;
     extract( shortcode_atts( array (
        'id' => '',
        'category' => '',
        'limit' => ''
    ), $atts ) );

        $args = array(
            'p' => isset($id) ?  $id : '',
            'post_type'=> 'cta',
            'post_status'=>'publish',
            'posts_per_page'=> isset($limit) ? $limit : -1,
            'category_name' =>  isset($category) ? $category : '', 
   );
         $query = new WP_Query($args);
?>
			<div class="main-section align-items-center">
<?php
            while($query->have_posts()):$query->the_post();
		if(!empty(get_post_meta( $post->ID, 'cta_bannersizes'))){
			
			/** Banner Size : DEFAULT **/
			if(get_post_meta( $post->ID, 'cta_bannersizes', true ) == 'default'){
?>
				<!-- Banner Anchor -->
			<a 
			data-post-id=<?php echo esc_attr( $post->ID );?>
			class="bannerurl post-<?php echo esc_attr( $post->ID );?>"
			target="_blank"
			href="<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_url', true ) );?>">		
			
			<!-- Main DIV for style -->
			<div class="cta-section default-size" style="
			background: url(<?php echo get_post_meta( get_the_ID(), 'cta_banner_url', true ); ?>);
			background-color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_color', true ) );?>;
			border: <?php echo esc_attr( get_post_meta($post->ID, 'cta_border', true ) ).' '.esc_attr( get_post_meta($post->ID, 'cta_border_color', true ) ) ;?>;
			background-size:<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_size', true ) );?>;
			background-repeat: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_repeat', true ) );?>;
			background-position:<?php esc_attr( get_post_meta( $post->ID, 'cta_banner_position', true ) );?>
			">

			<!-- Banner Heading -->
			<h2 class="cta-heading" style="
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_font_size', true ) );?>;
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_color', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_text_align', true ) );?>
			">
			<?php  esc_attr( the_title() ); ?> 
			</h2>
			
			<!-- Banner Sub Heading -->
            <p class="cta-subheading-class" style="
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_color', true ) );?>;
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_font_size', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_text_align', true ) );?>
			">
			<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading', true ) );?> 
			</p>             

          </div>
		  </a>   
<?php
			}
			/** Banner Size : BOXED **/
			elseif(get_post_meta( $post->ID, 'cta_bannersizes', true ) == 'boxed'){
?>
			<a 
			data-post-id=<?php echo esc_attr( $post->ID );?> 
			class="bannerurl post-<?php echo esc_attr( $post->ID );?>" 
			target="_blank" 
			href="<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_url', true ) );?>">
			
			<!-- Main DIV for style -->
			<div class="cta-section boxed-size" style="
			background: url('<?php echo esc_attr( get_the_post_thumbnail_url( $post->ID ) );?>');
			background-color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_color', true ) );?>;
			border: <?php echo esc_attr( get_post_meta($post->ID, 'cta_border', true ))	.' '.esc_attr( get_post_meta($post->ID, 'cta_border_color', true ) );?>;
			background-size:<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_size', true ) );?>;
			background-repeat: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_repeat', true ) );?>;
			background-position:<?php echo esc_attr( get_post_meta( $post->ID, 'cta_banner_position', true ) );?>
			">

			<!-- Banner Heading -->
			<h2 class="cta-heading" style="
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_font_size', true ) );?>;
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_color', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_text_align', true ) );?>
			">
			<?php esc_attr( the_title() ); ?> 
			</h2>
			
			<!-- Banner Sub Heading -->
            <p class="cta-subheading-class" style="
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_color', true ) );?>;
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_font_size', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_text_align', true ) );?>
			">
			<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading', true ) );?> 
			</p>             

          </div>
		  </a>
<?php
			}
			/** Banner Size : FULL WIDTH **/
			elseif(get_post_meta( $post->ID, 'cta_bannersizes', true ) == 'fullwidth'){
?>
			<a data-post-id=<?php echo esc_attr( $post->ID );?> 
			class="bannerurl post-<?php echo esc_attr( $post->ID );?>" 
			target="_blank" 
			href="<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_url', true ) );?>">
			
			<!-- Main DIV for style -->
			<div class="cta-section fullwidth-size" style="
			background: url('<?php echo esc_attr( get_the_post_thumbnail_url( $post->ID ) );?>');
			background-color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_color', true ) );?>;
			border: <?php echo esc_attr( get_post_meta($post->ID, 'cta_border', true ) )	.' '.esc_attr( get_post_meta($post->ID, 'cta_border_color', true ) );?>;
			background-size:<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_size', true ) );?>;
			background-repeat: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_repeat', true ) );?>;
			background-position:<?php echo esc_attr( get_post_meta( $post->ID, 'cta_banner_position', true ) );?>
			">

			<!-- Banner Heading -->
			<h2 class="cta-heading" style="
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_font_size', true ) );?>;
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_color', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_text_align', true ) );?>
			">
			<?php esc_attr( the_title() ); ?> 
			</h2>
			
			<!-- Banner Sub Heading -->
            <p class="cta-subheading-class" style="
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_color', true ) );?>;
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_font_size', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_text_align', true ) );?>
			">
			<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading', true ) );?> 
			</p>             

          </div>
		  </a>
<?php					
		}else{
?>
				<!-- Banner Anchor -->
			<a 
			data-post-id=<?php echo esc_attr( $post->ID );?> 
			class="bannerurl post-<?php echo esc_attr( $post->ID );?>" 
			target="_blank" 
			href="<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_url', true ) );?>">
			
			<!-- Main DIV for style -->
			<div class="cta-section default-size">

			<!-- Banner Heading -->
			<h2 class="cta-heading" style="
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_font_size', true ) );?>;
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_color', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_text_align', true ) );?>
			">
			<?php esc_attr( the_title() ); ?> 
			</h2>
			
			<!-- Banner Sub Heading -->
            <p class="cta-subheading-class" style="
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_color', true ) );?>;
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_font_size', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_text_align', true ) );?>
			">
			<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading', true ) );?> 
			</p>             

          </div>
		  </a>
<?php			
		}
			}else{
?>
			<!-- Banner Anchor -->		
			<a 
			data-post-id=<?php echo esc_attr( $post->ID );?>
			class="bannerurl post-<?php echo esc_attr( $post->ID );?>" 
			target="_blank" 
			href="<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_url', true ) );?>">
			
			<!-- Main DIV for style -->
			<div class="cta-section default-size" style="
			background: url('<?php echo esc_attr( get_the_post_thumbnail_url( $post->ID ) );?>');
			background-color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_color', true ) );?>;
			border: <?php echo esc_attr( get_post_meta($post->ID, 'cta_border', true ) ).' '.esc_attr( get_post_meta($post->ID, 'cta_border_color', true ) );?>;
			background-size:<?php echo esc_attr( get_post_meta($post->ID, 'cta_banner_size', true ) );?>;
			background-repeat: <?php echo esc_attr( get_post_meta($post->ID, 'cta_bg_repeat', true ) );?>;
			background-position:<?php echo esc_attr( get_post_meta( $post->ID, 'cta_banner_position', true ) );?>
			">

			<!-- Banner Heading -->
			<h2 class="cta-heading" style="
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_font_size', true ) );?>;
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_color', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_heading_text_align', true ) );?>
			">
			<?php  esc_attr( the_title() ); ?> 
			</h2>
			
			<!-- Banner Sub Heading -->
            <p class="cta-subheading-class" style="
			color: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_color', true ) );?>;
			font-size: <?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_font_size', true ) );?>;
			text-align:<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading_text_align', true ) );?>
			">
				<?php echo esc_attr( get_post_meta($post->ID, 'cta_subheading', true ) );?> 
			</p>             

          </div>
		  </a>
<?php				
			}
                 endwhile;
     wp_reset_postdata();
?>
		</div>
<?php
}
 }