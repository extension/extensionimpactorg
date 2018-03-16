<?php

/*
Widget Name: Events List Future Past Widget
Description: A widget to show monthly future and past events.
Author: imithemes
Author URI: http://imithemes.com
*/

class Events_List_Future_Past_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'event-list-future-past-widget',
			__('Events List Future Past Widget', 'imic-framework'),
			array(
				'description' => __('A widget to show monthly future and past events.', 'imic-framework'),
				'panels_icon' => 'dashicons dashicons-star-filled',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated events category slugs)', 'imic-framework'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => __( 'Number of Events to show', 'imic-framework' ),
					'default' => 3,
					'min' => 1,
					'max' => 50,
					'integer' => true,
				),
				'event_layout_type' => array(
				'label' => __('Event Layout Type', 'framework'),
				'desc' => __("Select Event Layout Type.", 'framework'),
				'type' => 'select',
				'options' => array(
					'0' => __('Month List', 'framework'),
					'1' => __('Grid','framework'),
					'2' => __('Future & Past','framework'),
            	),
					'std' => 0,
        		), 
				'temp_event_columns_layout' => array(
				'label' => __('Columns Layout', 'framework'),
				'desc' => __("Select Columns Layout .", 'framework'),
				'type' => 'select',
				'options' => array(
					2 => __('Two','framework'),
					3 => __('Three', 'framework'),
					4 => __('Four','framework'),
				),
					'std' => 4,
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

siteorigin_widget_register('event-list-future-past-widget', __FILE__, 'Events_List_Future_Past_Widget');