<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor cta Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_CTA_Widget extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'cta';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('CTA Builder', 'Call to action');
	}


	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-button';
	}


	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url()
	{
		return 'https://therightsw.com/';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the cta widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords()
	{
		return ['cta', 'call to action', 'banner shortcode'];
	}

	/**
	 * Register Widget Controls
	 * 
	 * Add input fields to allow the user to customize widget settings
	 * 
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{
		//our control fucntion code goes here

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'Call to action'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//banner size control
		$this->add_control(
			'banner_size',
			[
				'label' => __('Banner Size', 'Call to action'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __('Default', 'Call to action'),
					'box' => __('Box', 'Call to action'),
					'full_width' => __('Full Width', 'Call to action'),
				],
			]
		);

		//banner position control
		$this->add_control(
			'banner_position',
			[
				'label' => __('Banner Position', 'Call to Action'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center center',
				'options' => [
					'top left' => __('Top Left', 'Call to Action'),
					'top center' => __('Top Center', 'Call to Action'),
					'top right' => __('Top Right', 'Call to Action'),
					'center left' => __('Center Left', 'Call to Action'),
					'center center' => __('Center Center', 'Call to Action'),
					'center right' => __('Center Right', 'Call to Action'),
					'bottom left' => __('Bottom Left', 'Call to Action'),
					'bottom center' => __('Bottom Center', 'Call to Action'),
					'bottom right' => __('Bottom Right', 'Call to Action'),
				],
			]
		);

		//banner image control
		$this->add_control(
			'background_image',
			[
				'label' => __('Background Image', 'Call to action'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .my-widget-box' => 'background-image: url("{{URL}}");',
				],
			]
		);

		//banner url control
		$this->add_control(
			'banner_url',
			[
				'label' => __('Banner URL', 'Call to action'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
				],

			]
		);

		// banner image size control
		$this->add_control(
			'image_size',
			[
				'label' => __('Image Size', 'Call to action'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Fill',
				'options' => [
					'Fill' => __('Fill', 'Call to action'),
					'Contain' => __('Contain', 'Call to action'),
					'Cover' => __('Cover', 'Call to action'),
				],
				'selectors' => [
					'{{WRAPPER}} .my-widget-box' => 'background-size: {{VALUE}}; background-repeat: no-repeat;',
				],
			]
		);
		//banner heading control
		$this->add_control(
			'image_title',
			[
				'label' => __('Banner Heading', 'Call to action'),
				'type' => \Elementor\Controls_Manager::TEXT,
				// 'default' => __('Heading', 'Call to action'),
			]
		);
		//banner sub heaidng control
		$this->add_control(
			'image_description',
			[
				'label' => __('Banner Sub Heading', 'Call to action'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				// 'default' => __('Sub Heading', 'Call to action'),
			]
		);

		$this->end_controls_section();
		//  Code for content tab ends here 

		// Style Tab Controls code starts 
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'Call to action'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//Code for style options
		$this->add_control(
			'heading_options',
			[
				'label' => esc_html__('Heading Options', 'Call to action'),
				'type'   => \Elementor\Controls_Manager::HEADING,
				'separator' => 'befrore',
			]
		);
		//control for heading color
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'Call to action'),
				'type'   => \Elementor\Controls_Manager::COLOR,
				'default' => '#272626',
				'selectors' => ['{{WRAPPER}} .my-widget-box h2' => 'color: {{VALUES}}',],

			]
		);
		//control for headng typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'Call to action'),
				'name' => 'Heading_Typography',
				'selector' => '{{WRAPPER}} .my-widget-box h2',
			]
		);
		//control for heaidng alignment
		$this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__('Alignment', 'Call to action'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'Call to action'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'Call to action'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'Call to action'),
						'icon' => 'eicon-text-align-right',
					],

				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .my-widget-box h2' => 'text-align: {{ALIGNMENT}}',
				],
			]
		);
		//sub heading options control starts here 
		$this->add_control(
			'sub_heading_options',
			[
				'label' => esc_html__('Sub Heading Options', 'Call to action'),
				'type'   => \Elementor\Controls_Manager::HEADING,
				'separator' => 'befrore',
			]
		);
		//control for sub heading color
		$this->add_control(
			'sub_heading_color',
			[
				'label' => esc_html__('Color', 'Call to action'),
				'type'   => \Elementor\Controls_Manager::COLOR,
				'default' => '#272626',
				'selectors' => ['{{WRAPPER}} .my-widget-box h6' => 'color: {{VALUES}}',],

			]
		);

		//control for sub heading typography 
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'Call to action'),
				'name' => 'Sub_Heading_Typography',
				'selector' => '{{WRAPPER}} .my-widget-box h6',
			]
		);
		//control for sub heading alignment
		$this->add_control(
			'sub_heading_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__('Alignment', 'Call to action'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'Call to action'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'Call to action'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'Call to action'),
						'icon' => 'eicon-text-align-right',
					],

				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .my-widget-box h6' => 'text-align: {{ALIGNMENT}}',
				],
			]
		);
		//banner image layout control section starts here
		$this->add_control(
			'image_layout',
			[
				'label' => esc_html__('Image layout Options', 'Call to action'),
				'type'   => \Elementor\Controls_Manager::HEADING,
				'separator' => 'befrore',
			]
		);
		//control for banner image margin 
		$this->add_control(
			'margin',
			[
				'label' => __('Margin', 'Call to action'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .my-widget-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		//control for banner image padding
		$this->add_control(
			'padding',
			[
				'label' => __('Padding', 'Call to action'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .my-widget-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		function get_form_options()
		{
			$form_options = [
				'margin' => [
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'control_type' => 'margin', // Use the ID of the margin control
				],
				'padding' => [
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'control_type' => 'padding', // Use the ID of the padding control
				],
			];
			return $form_options;
		}
		//control for banner backgorund color 
		$this->add_control(
			'background_color',
			[
				'label' => __('Background Color', 'Call to action'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .my-widget-box'  => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}
	//style tab controls code ends here 




	/**
	 *Render widget output on the frontend
	 *
	 * Written in PHP and used to generate the final HTML
	 * 
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$banner_heading = $settings['image_title'];
		$banner_sub_heading = $settings['image_description'];
?>
		<div class="banner" data-banner-position="<?php echo $settings['banner_position']; ?>" data-banner-size="<?php echo $settings['banner_size']; ?>">
			<a href="<?php echo $settings['banner_url']['url']; ?>">
				<div class="my-widget-box">
					<div>
						<h2><?php echo $banner_heading ?></h2>
					</div>
					<div>
						<h6><?php echo $banner_sub_heading ?></h6>
					</div>
				</div>
			</a>
		</div>

<?php
	}
}
