<?php

/*
Widget Name: Projects List Widget
Description: A widget to show Projects list/grid view.
Author: imithemes
Author URI: http://imithemes.com
*/

class Projects_List_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'projects-list-widget',
			__('Projects List Widget', 'imic-framework'),
			array(
				'description' => __('A widget to show Projects list/grid view.', 'imic-framework'),
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
					'label' => __('All posts button text', 'imic-framework'),
					'default' => __('All Posts', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => __('All posts button URL', 'imic-framework'),
					'description' => __('This button will be displayed only if the widget has title.', 'imic-framework'),
				),

				'categories' => array(
					'type' => 'text',
					'label' => __('Categories (Enter comma separated post category slugs)', 'imic-framework'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => __( 'Number of Posts to show', 'imic-framework' ),
					'default' => 4,
					'min' => 1,
					'max' => 25,
					'integer' => true,
				),
				'show_post_meta' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Show post meta like post date?', 'imic-framework'),
				),
				'excerpt_length' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Show post excerpt', 'imic-framework'),
				),
				'read_more_text' => array(
					'type' => 'text',
					'default' => 'Continue reading',
					'label' => __('Continue reading button text, Leave blank to hide button - Default is Continue Reading', 'imic-framework'),
				),
				'listing_layout' => array(
					'type' => 'section',
					'label' => __( 'Layout', 'imic-framework' ),
					'hide' => false,
					'description' => __( 'Choose listing layout.', 'imic-framework' ),
					'fields' => array(
						'layout_type'    => array(
							'type'    => 'radio',
							'default' => 'list',
							'label'   => __( 'Layout Type', 'imic-framework' ),
							'options' => array(
								'list' => __( 'List View', 'imic-framework' ),
								'grid'      => __( 'Grid View', 'imic-framework' ),
								)
						),
						'grid_column' => array(
							'type' => 'select',
							'state_name' => 'grid',
							'prompt' => __( 'Choose Grid Column', 'framework' ),
							'options' => array(
								'6' => __( 'Two', 'framework' ),
								'4' => __( 'Three', 'framework' ),
								'3' => __( 'Four', 'framework' ),
							)
						),
					),
				)
			),
			plugin_dir_path(__FILE__)
		);
	}


	
	function get_template_variables( $instance, $args ) {
		$layout = $instance['listing_layout'];
		return array(
				'layout_type' => array(
					'column'  => (!empty($layout['grid_column']))? $layout['grid_column'] : 4
				)
			);
	}
	
	function get_template_name( $instance ) {
		return $instance['listing_layout']['layout_type'] == 'list' ? 'list-view' : 'grid-view';
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

siteorigin_widget_register('projects-list-widget', __FILE__, 'Projects_List_Widget');