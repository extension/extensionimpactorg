<?php

/*
Widget Name: Passed Events Widget
Description: A widget to show passed events.
Author: imithemes
Author URI: http://imithemes.com
*/

class Passed_Events_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'passed-event-widget',
			__('Passed Events Widget', 'imic-framework'),
			array(
				'description' => __('A widget to show passed events.', 'imic-framework'),
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
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => __( 'Number of Events to show', 'imic-framework' ),
					'default' => 3,
					'min' => 1,
					'max' => 50,
					'integer' => true,
				),
				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated projects category slugs)', 'imic-framework'),
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
		return 'template';
	}


}

siteorigin_widget_register('passed-event-widget', __FILE__, 'Passed_Events_Widget');