<?php

/*
Widget Name: Featured Projects Widget
Description: A widget to show featured projects.
Author: imithemes
Author URI: http://imithemes.com
*/

class Featured_Projects_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'featured-projects-widget',
			__('Featured Projects Widget', 'imic-framework'),
			array(
				'description' => __('A widget to show featured projects.', 'imic-framework'),
				'panels_icon' => 'dashicons dashicons-star-filled',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'imic-framework'),
				),

				'allpostsbtn' => array(
					'type' => 'text',
					'label' => __('All projects button text', 'imic-framework'),
					'default' => __('All Projects', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => __('All projects button URL', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),

				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated projects category slugs)', 'imic-framework'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => __( 'Number of Projects to show', 'imic-framework' ),
					'default' => 3,
					'min' => 1,
					'max' => 50,
					'integer' => true,
				),
				'show_post_meta' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Show project items first parent category', 'imic-framework'),
				),
				'grid_column' => array(
					'type' => 'select',
					'state_name' => 'grid',
					'prompt' => __( 'Choose Grid Column', 'framework' ),
					'options' => array(
						'6' => __( 'Two', 'framework' ),
						'4' => __( 'Three', 'framework' ),
						'3' => __( 'Four', 'framework' ),
						'2' => __( 'Six', 'framework' ),
					)
				),

			),
			plugin_dir_path(__FILE__)
		);
	}


	function get_style_hash($instance) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return array();
	}
	
	function get_template_name($instance) {
		return 'grid-view';
	}


}

siteorigin_widget_register('featured-projects-widget', __FILE__, 'Featured_Projects_Widget');