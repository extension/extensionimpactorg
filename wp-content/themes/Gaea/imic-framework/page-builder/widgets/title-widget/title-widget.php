<?php

/*
Widget Name: Fancy Title Widget
Description: A widget for bordered title with a button.
Author: imithemes
Author URI: http://imithemes.com
*/

class Title_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'title-widget',
			__('Title Widget', 'imic-framework'),
			array(
				'description' => __('A widget for bordered title with a button.', 'imic-framework'),
				'panels_icon' => 'dashicons dashicons-list-view',
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
					'label' => __('Button Text', 'imic-framework'),
					'default' => __('Button', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => __('Button URL', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}


	
	function get_template_name($instance) {
		return 'template';
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return array();
	}
	function modify_instance($instance){
		return $instance;
	}


}

siteorigin_widget_register('title-widget', __FILE__, 'Title_Widget');