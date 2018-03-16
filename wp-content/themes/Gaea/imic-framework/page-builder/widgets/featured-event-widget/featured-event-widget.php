<?php

/*
Widget Name: Featured Events Widget
Description: A widget to show featured events.
Author: imithemes
Author URI: http://imithemes.com
*/

class Featured_Events_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'featured-event-widget',
			__('Featured Events Widget', 'imic-framework'),
			array(
				'description' => __('A widget to show featured events.', 'imic-framework'),
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
				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated event categories slugs)', 'imic-framework'),
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

siteorigin_widget_register('featured-event-widget', __FILE__, 'Featured_Events_Widget');