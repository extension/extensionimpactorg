<?php
function add_my_awesome_widgets_collection($folders){
    $folders[] = ImicFrameworkPath . '/page-builder/widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_my_awesome_widgets_collection');

function nativechurch_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('Gaea Theme Widgets', 'framework'),
        'filter' => array(
            'groups' => array('framework')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'nativechurch_add_widget_tabs', 30);


if(!function_exists('imic_prebuilt_pages')) {
function imic_prebuilt_pages($layouts){
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 1///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
    $layouts['home1'] = array(
        // We'll add a title field
        'name' => __('Home version 1', 'framework'),
  'widgets' => 
  array (
    0 => 
    array (
      'tab_id' => 67,
      'tabs' => 
      array (
        0 => 
        array (
          'tab_nav_title' => 'Our Mission',
          'tab_nav_content' => '<p></p>
<img class="alignright size-full wp-image-10" style="margin-top: -20px" src="http://preview.imithemes.com/gaea-wp/wp-content/uploads/2014/09/img_mission.jpg" alt="img_mission" />
<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>',
        ),
        1 => 
        array (
          'tab_nav_title' => 'Why you should join us',
          'tab_nav_content' => '<p></p>
[container extra="row"]
[one_third extra="" anim=""]

[icon_box icon_image="fa-globe" title="To make the planet lively" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-info"]

[/one_third]
[one_third extra="" anim=""]

[icon_box icon_image="fa-umbrella" title="To save the Rain Water" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-warning"]

[/one_third]
[one_third extra="" anim=""]

[icon_box icon_image="fa-pagelines" title="To make Forests Greener" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-success"]

[/one_third]

[/container]',
        ),
      ),
      'display_type' => 'horizontal',
      'panels_info' => 
      array (
        'class' => 'Tabs_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '<i class="fa fa-folder"></i> Latest Posts',
      'allpostsbtn' => 'Visit Blog',
      'allpostsurl' => '#',
      'categories' => '',
      'number_of_posts' => 2,
      'show_post_meta' => true,
      'excerpt_length' => true,
      'read_more_text' => 'Continue reading',
      'listing_layout' => 
      array (
        'layout_type' => 'list',
        'grid_column' => false,
      ),
      'panels_info' => 
      array (
        'class' => 'Posts_List_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 1,
        'style' => 
        array (
          'class' => 'border-right padding-tb45',
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'title' => ' Upcoming Events',
      'number' => '4',
      'category' => '',
      'status' => 'future',
      'url' => '#',
      'panels_info' => 
      array (
        'class' => 'upcoming_events',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 2,
        'style' => 
        array (
          'class' => 'padding-tb45',
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'title' => '<small>Mission</small>Partners',
            'allpostsbtn' => 'All partners',
            'allpostsurl' => '#',
            'panels_info' => 
            array (
              'class' => 'Title_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          1 => 
          array (
            'title' => '',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem.',
            'panels_info' => 
            array (
              'class' => 'WP_Widget_Text',
              'raw' => false,
              'grid' => 1,
              'cell' => 0,
              'id' => 1,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
          2 => 
          array (
            'title' => '',
            'allpostsbtn' => 'Button',
            'allpostsurl' => '',
            'images' => 
            array (
              0 => 
              array (
                'icon_image' => '63',
                'icon_title' => '',
                'more_url' => '',
              ),
              1 => 
              array (
                'icon_image' => '62',
                'icon_title' => '',
                'more_url' => '',
              ),
              2 => 
              array (
                'icon_image' => '61',
                'icon_title' => '',
                'more_url' => '',
              ),
              3 => 
              array (
                'icon_image' => '60',
                'icon_title' => '',
                'more_url' => '',
              ),
              4 => 
              array (
                'icon_image' => '59',
                'icon_title' => '',
                'more_url' => '',
              ),
            ),
            'number_of_posts' => '4',
            'display_type' => 'carousel',
            'autoplay' => 'default',
            'navigation' => 'no',
            'pagination' => 'yes',
            'panels_info' => 
            array (
              'class' => 'Carousel_Widget',
              'raw' => false,
              'grid' => 1,
              'cell' => 1,
              'id' => 2,
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
              ),
            ),
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 1,
            'style' => 
            array (
              'class' => '',
              'cell_class' => '',
              'row_css' => '',
              'bottom_margin' => '0px',
              'gutter' => '',
              'padding' => '',
              'row_stretch' => '',
              'background' => '',
              'background_image_attachment' => '0',
              'background_display' => 'tile',
              'border_color' => '',
            ),
          ),
          1 => 
          array (
            'cells' => 2,
            'style' => 
            array (
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 1,
          ),
          1 => 
          array (
            'grid' => 1,
            'weight' => 0.250415973377999978577435058468836359679698944091796875,
          ),
          2 => 
          array (
            'grid' => 1,
            'weight' => 0.7495840266219999659114137102733366191387176513671875,
          ),
        ),
      ),
      'builder_id' => '555b39e99d730',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 3,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '<small>Featured</small> Projects',
      'allpostsbtn' => '',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => '4',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 4,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'no-top-content-padding border-bottom wave-bg',
        'bottom_margin' => '0px',
        'padding' => '60px',
        'row_stretch' => 'full',
        'background' => '#fafafa',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'border-top wave-bg',
        'bottom_margin' => '0px',
        'padding' => '60px',
        'row_stretch' => 'full',
        'background' => '#fafafa',
        'background_display' => 'tile',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'no-bottom-content-padding secondary-color-bg dark-bg no-title-border',
        'bottom_margin' => '0px',
        'padding' => '60px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.66722129783700001581792093929834663867950439453125,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.33277870216299998418207906070165336132049560546875,
    ),
    3 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    4 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
  ),

    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 2///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	$layouts['home2'] = array(
        // We'll add a title field
        'name' => __('Home version 2', 'framework'),
  'widgets' => 
  array (
    0 => 
    array (
      'title' => '',
      'text' => '[icon_box icon_image="fa-globe" title="To make the planet lively" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-info"]',
      'filter' => true,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '[icon_box icon_image="fa-umbrella" title="To save the Rain Water" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-warning"]',
      'filter' => true,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 0,
        'cell' => 1,
        'id' => 1,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '',
      'text' => '[icon_box icon_image="fa-pagelines" title="To make Forests Greener" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel." type="label-success"]',
      'filter' => true,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Text',
        'raw' => false,
        'grid' => 0,
        'cell' => 2,
        'id' => 2,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'title' => 'Products',
      'number' => '5',
      'show' => '',
      'orderby' => 'date',
      'order' => 'desc',
      'hide_free' => 0,
      'show_hidden' => 0,
      'panels_info' => 
      array (
        'class' => 'WC_Widget_Products',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 3,
        'style' => 
        array (
          'class' => 'border-right padding-tb45',
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'height' => '45px',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 4,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'title' => 'Instagram Gallery',
      'username' => '',
      'count' => '6',
      'accessToken' => '',
      'panels_info' => 
      array (
        'class' => 'insta_gallery',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 5,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'title' => 'Cart',
      'hide_if_empty' => 0,
      'panels_info' => 
      array (
        'class' => 'WC_Widget_Cart',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 6,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'title' => '<small>Featured</small>Projects',
      'allpostsbtn' => 'All Projects',
      'allpostsurl' => '#',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => '4',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 7,
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'class' => 'wave-bg no-top-content-padding border-bottom',
        'bottom_margin' => '0px',
        'padding' => '60px',
        'row_stretch' => 'full',
        'background' => '#fafafa',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'class' => 'border-bottom',
        'bottom_margin' => '0px',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'class' => 'secondary-color-bg dark-bg no-bottom-content-padding',
        'bottom_margin' => '0px',
        'padding' => '60px',
        'row_stretch' => 'full',
        'background_image_attachment' => false,
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    1 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    2 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.66722129783700001581792093929834663867950439453125,
    ),
    4 => 
    array (
      'grid' => 1,
      'weight' => 0.33277870216299998418207906070165336132049560546875,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
  ),

    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 3///////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////// 
	
	$layouts['home3'] = array(
        // We'll add a title field
        'name' => __('Home version 3', 'framework'),
       'widgets' => 
  array (
    0 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;">About Us</h1>',
      'text_selected_editor' => 'tmce',
      'autop' => true,
      '_sow_form_id' => '587f57b5c6b3d',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => '61063472-9952-45cb-92ec-fe16727c5fb3',
        'style' => 
        array (
          'background_display' => 'tile',
          'font_color' => '#333333',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
      'text_selected_editor' => 'tmce',
      'autop' => true,
      '_sow_form_id' => '587f5f760a439',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 1,
        'widget_id' => '61063472-9952-45cb-92ec-fe16727c5fb3',
        'style' => 
        array (
          'background_display' => 'tile',
          'font_color' => '#333333',
        ),
      ),
    ),
    2 => 
    array (
      'image' => 869,
      'image_fallback' => '',
      'size' => 'full',
      'align' => 'default',
      'title' => '',
      'title_position' => 'hidden',
      'alt' => '',
      'url' => '',
      'bound' => true,
      '_sow_form_id' => '587f6b1248b37',
      'new_window' => false,
      'full_width' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Image_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 2,
        'widget_id' => '9f88a53d-9b47-4367-92d4-517822ddb4fd',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'categories' => '',
      'number_of_posts' => 3,
      'event_layout_type' => '0',
      'temp_event_columns_layout' => '2',
      '_sow_form_id' => '588066e23716d',
      'panels_info' => 
      array (
        'class' => 'Events_List_Future_Past_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 3,
        'widget_id' => '5b4faac0-50b4-408f-a628-8ead064a9b58',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '588831c76a821',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 4,
        'widget_id' => 'f6562f3f-457e-4112-9529-91b3eabf6752',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><span style="color: #ffffff;">The Best time to <span class="section-heading-superater">plant tree</span> is now</span></h1>',
      'text_selected_editor' => 'tmce',
      'autop' => true,
      '_sow_form_id' => '587f6eeb2d2c3',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 5,
        'widget_id' => '9a5c7edb-79b0-4159-aa05-33930184cc26',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588757466d2ce',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 6,
        'widget_id' => '3e93471e-fee5-4779-a1b3-dea589b9dea1',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588757bc1161e',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 7,
        'widget_id' => 'f6562f3f-457e-4112-9529-91b3eabf6752',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;">Our Latest Project</h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '588055cf2e32e',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 8,
        'widget_id' => '96b9dc00-87f4-406f-bb33-3266b0395a0b',
        'style' => 
        array (
          'padding' => '0px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Posts',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'excerpt_length' => true,
      'read_more_text' => 'Continue reading',
      'listing_layout' => 
      array (
        'layout_type' => 'grid',
        'grid_column' => false,
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '5880575e7bfc3',
      'panels_info' => 
      array (
        'class' => 'Projects_List_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 9,
        'widget_id' => 'abca45e0-6184-43a4-9f71-f87f18b393b4',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'image' => 0,
      'image_fallback' => '',
      'size' => 'full',
      'align' => 'default',
      'title' => '',
      'title_position' => 'hidden',
      'alt' => '',
      'url' => '',
      'bound' => true,
      'full_width' => true,
      '_sow_form_id' => '58806410a8365',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 10,
        'widget_id' => 'f7d0e8a4-72a4-4828-9114-334fdaa1830e',
        'style' => 
        array (
          'padding' => '250px 0px 250px 0px',
          'background_image_attachment' => 931,
          'background_display' => 'parallax',
        ),
      ),
    ),
    11 => 
    array (
      'title' => '',
      'text' => '<h1><span style="color: #9cc900;"><span style="color: #ffffff;">Lorem ipsum</span> dolor <span style="color: #ffffff;">sit amet,</span> <br /><span style="color: #ffffff;">consectetur</span> adipiscing elit.</span></h1><p><span style="color: #ffffff;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p> </p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58806b861544e',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 11,
        'widget_id' => 'dddd903c-b34b-42a6-b50f-48af29b7cd29',
        'style' => 
        array (
          'padding' => '96px 120px 0px 60px',
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5887582aaa6b6',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 12,
        'widget_id' => 'f6562f3f-457e-4112-9529-91b3eabf6752',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;">Our Staff</h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58807a09c6bb2',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 13,
        'widget_id' => '96b9dc00-87f4-406f-bb33-3266b0395a0b',
        'style' => 
        array (
          'padding' => '0px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    14 => 
    array (
      'title' => '',
      'allpostsbtn' => 'Full Staff',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'orderby' => false,
      'show_post_meta' => true,
      'excerpt_length' => true,
      'read_more_text' => 'Read more',
      'listing_layout' => 
      array (
        'layout_type' => 'grid',
        'grid_column' => false,
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '5880787cdd039',
      'panels_info' => 
      array (
        'class' => 'Staff_List_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 14,
        'widget_id' => '86d0c407-8740-4d79-91fc-66c1b77f0bd9',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    15 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '58875903a7338',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 15,
        'widget_id' => 'f6562f3f-457e-4112-9529-91b3eabf6752',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    16 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><span style="color: #333333;">Featured Projects</span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5880b946b4a95',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 16,
        'widget_id' => '52d32b52-04f7-4309-9e81-743e14f3e0d8',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    17 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Projects',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => false,
      '_sow_form_id' => '58808a2a91641',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 17,
        'widget_id' => 'e4998395-66ec-429e-a778-f7b2a41b8c52',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    18 => 
    array (
      'height' => '90px',
      '_sow_form_id' => '5898552fedd6b',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 18,
        'widget_id' => 'f6562f3f-457e-4112-9529-91b3eabf6752',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    19 => 
    array (
      'title' => 'How You Can Help?',
      'text' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p><br />Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58808b20d4c97',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 19,
        'widget_id' => 'b263f69d-727f-4887-a88b-a120be6aa1ae',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    20 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Galleries',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 4,
      'grid_column' => '6',
      '_sow_form_id' => '58809d67c87a7',
      'show_post_meta' => false,
      'filters' => false,
      'show_pagination' => false,
      'panels_info' => 
      array (
        'class' => 'Gallery_Grid_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 1,
        'id' => 20,
        'widget_id' => '32e1ab4c-6505-43a7-8fab-ec94f560207d',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    21 => 
    array (
      'title' => '',
      'text' => '<h3 class="line-bottom mt-0 mt-sm-30">Our <span class="text-theme-colored font-weight-800" style="color: #49cf44;">Mission</span></h3><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p><br />The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><ul><li>Life of the whales</li><li>How to feed the world</li><li>We will miss them</li></ul><h1 style="text-align: center;"><span style="color: #333333;"> </span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5880800b1e37d',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 21,
        'widget_id' => '52d32b52-04f7-4309-9e81-743e14f3e0d8',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    22 => 
    array (
      'image' => 870,
      'image_fallback' => '',
      'size' => 'full',
      'align' => 'right',
      'title' => '',
      'title_position' => 'hidden',
      'alt' => '',
      'url' => '',
      'bound' => true,
      '_sow_form_id' => '5880bd0f20d73',
      'new_window' => false,
      'full_width' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Image_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 1,
        'id' => 22,
        'widget_id' => '4b0a63ea-4ac8-4f4f-86fc-01c04c8ce35b',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '0px 0px 50px 0px',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 931,
        'background_display' => 'parallax',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'gutter' => '0px',
        'row_stretch' => 'full-stretched',
        'background' => '#333c42',
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 933,
        'background_display' => 'parallax',
      ),
    ),
    7 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '40px 0px 40px 0px',
        'background_display' => 'tile',
      ),
    ),
    8 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '90px 0px 50px 0px',
        'row_stretch' => 'full',
        'background' => '#fcfcfc',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.5,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.5,
    ),
    3 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    4 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    5 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    6 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    7 => 
    array (
      'grid' => 5,
      'weight' => 1,
    ),
    8 => 
    array (
      'grid' => 6,
      'weight' => 1,
    ),
    9 => 
    array (
      'grid' => 7,
      'weight' => 0.5,
    ),
    10 => 
    array (
      'grid' => 7,
      'weight' => 0.5,
    ),
    11 => 
    array (
      'grid' => 8,
      'weight' => 0.5,
    ),
    12 => 
    array (
      'grid' => 8,
      'weight' => 0.5,
    ),
  ),
  
    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 4///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	$layouts['home4'] = array(
        // We'll add a title field
        'name' => __('Home version 4', 'framework'),
		'widgets' => 
  array (
    0 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;"><span style="color: #ffffff;">To make the planet lively</span></h2><p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58830caa7cc8f',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '50px 20px 50px 20px',
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;"><span style="color: #ffffff;">To save the Rain Water</span></h2><p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58830eaed2fee',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 1,
        'id' => 1,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '50px 20px 50px 20px',
          'background' => '#292929',
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;"><span style="color: #ffffff;">To make Forests Greener</span></h2><p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58830ef419da8',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 2,
        'id' => 2,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '50px 20px 50px 20px',
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5888499a22c55',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 3,
        'widget_id' => 'b0e8997e-8112-4861-acb6-2e9407641690',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;"><span style="color: #333333;">Our Mission</span></h2><p style="text-align: center;"><span style="color: #333333;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5883100487d63',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 4,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58884cb4d0616',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 5,
        'widget_id' => 'b0e8997e-8112-4861-acb6-2e9407641690',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: left;"><span style="color: #4cadc5;">To keep wildlife existence</span></h1><h3><span style="color: #ffffff;">Lorem ipsum dolor sit amet</span></h3><hr /><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58831396e14a1',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 6,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '30px 30px 30px 30px',
          'background_image_attachment' => 1062,
          'background_display' => 'cover',
        ),
      ),
    ),
    7 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: left;"><span style="color: #5dc269;">To make education for all</span></h1><h3><span style="color: #ffffff;">Lorem ipsum dolor sit amet</span></h3><hr /><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58831699e3b64',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 1,
        'id' => 7,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '30px 30px 30px 30px',
          'background_image_attachment' => 1062,
          'background_display' => 'cover',
        ),
      ),
    ),
    8 => 
    array (
      'categories' => '',
      'number_of_posts' => 3,
      'event_layout_type' => '0',
      'temp_event_columns_layout' => '4',
      '_sow_form_id' => '58831a03b5ae9',
      'panels_info' => 
      array (
        'class' => 'Events_List_Future_Past_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 8,
        'widget_id' => '3d3312f2-4f7d-468c-98f4-ef2af30aa69c',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'image' => 0,
      'image_fallback' => '',
      'size' => 'full',
      'align' => 'default',
      'title' => '',
      'title_position' => 'hidden',
      'alt' => '',
      'url' => '',
      'bound' => true,
      '_sow_form_id' => '588331da6ae7b',
      'new_window' => false,
      'full_width' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Image_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 9,
        'widget_id' => 'b5d938db-8e7e-48a2-b997-d25ad1aeddb7',
        'style' => 
        array (
          'padding' => '350px 0px 350px 0px',
          'background_image_attachment' => 933,
          'background_display' => 'parallax',
        ),
      ),
    ),
    10 => 
    array (
      'title' => '',
      'text' => '<div class="row"><div class="col-md-8 "><h3 class="lead"><span style="color: #46c965;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></h3><div class="row"><div class="col-md-8 "><h1 class="lead"> Where does it <br />come from?</h1></div></div></div></div><p style="text-align: left;"><span style="color: #333333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '588335471161a',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 10,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '120px 80px 0px 30px',
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'text' => 'Read More',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'left',
        'theme' => 'atom',
        'button_color' => '#46c965',
        'text_color' => '#ffffff',
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '58833886430be',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 1,
        'id' => 11,
        'widget_id' => 'b2a4ecc2-ce07-43b3-bafd-bdf654911410',
        'style' => 
        array (
          'padding' => '0px 0px 30px 30px',
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58884acbe5949',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 12,
        'widget_id' => 'b0e8997e-8112-4861-acb6-2e9407641690',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'title' => '',
      'text' => '<h2 class="sc_title sc_title_regular sc_align_center" style="text-align: center;">We use the support of more than 1 million activists<br /> to clean the air and safe rivers</h2>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '588342322bc1d',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 13,
        'widget_id' => 'e64a303d-f066-41e8-b29c-2685e9e6a9f4',
        'style' => 
        array (
          'padding' => '0px 20px 0px 20px',
          'background_display' => 'tile',
        ),
      ),
    ),
    14 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'panels_data' => 
            array (
              'widgets' => 
              array (
                0 => 
                array (
                  'icon' => 'fontawesome-pagelines',
                  'color' => '#46c965',
                  'size' => '60px',
                  'size_unit' => 'px',
                  'alignment' => 'center',
                  'url' => '',
                  '_sow_form_id' => '588349f8ad087',
                  'new_window' => false,
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Icon_Widget',
                    'raw' => false,
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 0,
                    'widget_id' => 'a8975e1f-78b9-4600-a3e4-9aaf4b3f1e1c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => '',
                  'text' => '<h1 style="text-align: center;"><span style="color: #46c965;">360</span></h1><p style="text-align: center;">Projects Realized</p>',
                  'text_selected_editor' => 'tinymce',
                  'autop' => true,
                  '_sow_form_id' => '58834a726f335',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Editor_Widget',
                    'raw' => false,
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 1,
                    'widget_id' => 'c2e88318-bfde-4f5f-b205-abc65eb9d56c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                ),
              ),
              'grids' => 
              array (
                0 => 
                array (
                  'cells' => 1,
                  'style' => 
                  array (
                    'id' => '',
                    'class' => '',
                    'cell_class' => '',
                    'row_css' => '',
                    'bottom_margin' => '',
                    'gutter' => '',
                    'padding' => '40px 20px 20px 20px',
                    'row_stretch' => '',
                    'collapse_order' => '',
                    'background' => '',
                    'background_image_attachment' => '0',
                    'background_display' => 'tile',
                    'border_color' => '',
                  ),
                ),
              ),
              'grid_cells' => 
              array (
                0 => 
                array (
                  'grid' => 0,
                  'weight' => 1,
                ),
              ),
            ),
            'builder_id' => '58834b63e15ef',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Panels_Widgets_Layout',
              'raw' => false,
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'widget_id' => '9e88a2a6-fd92-40ac-b32a-10c2faf28f23',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '#fafafa',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
          1 => 
          array (
            'panels_data' => 
            array (
              'widgets' => 
              array (
                0 => 
                array (
                  'icon' => 'ionicons-android-globe',
                  'color' => '#46c965',
                  'size' => '60px',
                  'size_unit' => 'px',
                  'alignment' => 'center',
                  'url' => '',
                  '_sow_form_id' => '58834b96587e6',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Icon_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 0,
                    'widget_id' => 'a8975e1f-78b9-4600-a3e4-9aaf4b3f1e1c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                  'new_window' => false,
                ),
                1 => 
                array (
                  'title' => '',
                  'text' => '<h1 style="text-align: center;"><span style="color: #46c965;">$ 10,000<br /></span></h1><p style="text-align: center;">Projects Realized</p>',
                  'text_selected_editor' => 'tinymce',
                  'autop' => true,
                  '_sow_form_id' => '58834bf7db68c',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Editor_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 1,
                    'widget_id' => 'c2e88318-bfde-4f5f-b205-abc65eb9d56c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                ),
              ),
              'grids' => 
              array (
                0 => 
                array (
                  'cells' => 1,
                  'style' => 
                  array (
                    'id' => '',
                    'class' => '',
                    'cell_class' => '',
                    'row_css' => '',
                    'bottom_margin' => '',
                    'gutter' => '',
                    'padding' => '40px 20px 20px 20px',
                    'row_stretch' => '',
                    'collapse_order' => '',
                    'background' => '',
                    'background_image_attachment' => '0',
                    'background_display' => 'tile',
                    'border_color' => '',
                  ),
                ),
              ),
              'grid_cells' => 
              array (
                0 => 
                array (
                  'grid' => 0,
                  'weight' => 1,
                ),
              ),
            ),
            'builder_id' => '58834d492b86c',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Panels_Widgets_Layout',
              'grid' => 0,
              'cell' => 1,
              'id' => 1,
              'widget_id' => '9e88a2a6-fd92-40ac-b32a-10c2faf28f23',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '#fafafa',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
          2 => 
          array (
            'panels_data' => 
            array (
              'widgets' => 
              array (
                0 => 
                array (
                  'icon' => 'fontawesome-tree',
                  'color' => '#46c965',
                  'size' => '60px',
                  'size_unit' => 'px',
                  'alignment' => 'center',
                  'url' => '',
                  '_sow_form_id' => '58834c170ae6e',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Icon_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 0,
                    'widget_id' => 'a8975e1f-78b9-4600-a3e4-9aaf4b3f1e1c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                  'new_window' => false,
                ),
                1 => 
                array (
                  'title' => '',
                  'text' => '<h1 style="text-align: center;"><span style="color: #46c965;">100</span></h1><p style="text-align: center;">Projects Realized</p>',
                  'text_selected_editor' => 'tinymce',
                  'autop' => true,
                  '_sow_form_id' => '58834cb702341',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Editor_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 1,
                    'widget_id' => 'c2e88318-bfde-4f5f-b205-abc65eb9d56c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                ),
              ),
              'grids' => 
              array (
                0 => 
                array (
                  'cells' => 1,
                  'style' => 
                  array (
                    'id' => '',
                    'class' => '',
                    'cell_class' => '',
                    'row_css' => '',
                    'bottom_margin' => '',
                    'gutter' => '',
                    'padding' => '40px 20px 20px 20px',
                    'row_stretch' => '',
                    'collapse_order' => '',
                    'background' => '',
                    'background_image_attachment' => '0',
                    'background_display' => 'tile',
                    'border_color' => '',
                  ),
                ),
              ),
              'grid_cells' => 
              array (
                0 => 
                array (
                  'grid' => 0,
                  'weight' => 1,
                ),
              ),
            ),
            'builder_id' => '58834d492e8e9',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Panels_Widgets_Layout',
              'grid' => 0,
              'cell' => 2,
              'id' => 2,
              'widget_id' => '9e88a2a6-fd92-40ac-b32a-10c2faf28f23',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '#fafafa',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
          3 => 
          array (
            'panels_data' => 
            array (
              'widgets' => 
              array (
                0 => 
                array (
                  'icon' => 'typicons-arrow-sync',
                  'color' => '#46c965',
                  'size' => '60px',
                  'size_unit' => 'px',
                  'alignment' => 'center',
                  'url' => '',
                  '_sow_form_id' => '58834cc656817',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Icon_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 0,
                    'widget_id' => 'a8975e1f-78b9-4600-a3e4-9aaf4b3f1e1c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                  'new_window' => false,
                ),
                1 => 
                array (
                  'title' => '',
                  'text' => '<h1 style="text-align: center;"><span style="color: #46c965;">540</span></h1><p style="text-align: center;">Projects Realized</p>',
                  'text_selected_editor' => 'tinymce',
                  'autop' => true,
                  '_sow_form_id' => '58834d34a105c',
                  'panels_info' => 
                  array (
                    'class' => 'SiteOrigin_Widget_Editor_Widget',
                    'grid' => 0,
                    'cell' => 0,
                    'id' => 1,
                    'widget_id' => 'c2e88318-bfde-4f5f-b205-abc65eb9d56c',
                    'style' => 
                    array (
                      'class' => '',
                      'widget_css' => '',
                      'padding' => '',
                      'background' => '',
                      'background_image_attachment' => '0',
                      'background_display' => 'tile',
                      'border_color' => '',
                      'font_color' => '',
                      'link_color' => '',
                    ),
                  ),
                ),
              ),
              'grids' => 
              array (
                0 => 
                array (
                  'cells' => 1,
                  'style' => 
                  array (
                    'id' => '',
                    'class' => '',
                    'cell_class' => '',
                    'row_css' => '',
                    'bottom_margin' => '',
                    'gutter' => '',
                    'padding' => '40px 20px 20px 20px',
                    'row_stretch' => '',
                    'collapse_order' => '',
                    'background' => '',
                    'background_image_attachment' => '0',
                    'background_display' => 'tile',
                    'border_color' => '',
                  ),
                ),
              ),
              'grid_cells' => 
              array (
                0 => 
                array (
                  'grid' => 0,
                  'weight' => 1,
                ),
              ),
            ),
            'builder_id' => '58834d492ec4b',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Panels_Widgets_Layout',
              'grid' => 0,
              'cell' => 3,
              'id' => 3,
              'widget_id' => '9e88a2a6-fd92-40ac-b32a-10c2faf28f23',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '#fafafa',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 4,
            'style' => 
            array (
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          1 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          2 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
          3 => 
          array (
            'grid' => 0,
            'weight' => 0.25,
          ),
        ),
      ),
      'builder_id' => '58834d492b81c',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 14,
        'widget_id' => '250e3f6a-9893-4a12-8861-3cbf0fa06a44',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    15 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58884ad56aa55',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 15,
        'widget_id' => 'b0e8997e-8112-4861-acb6-2e9407641690',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    16 => 
    array (
      'title' => '',
      'text' => '<h1><span style="color: #ffffff;">Our Projects</span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5883580ab3baa',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 16,
        'widget_id' => 'e3532be0-0ee6-4fd5-bdc6-0884fe91bd32',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    17 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Projects',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => false,
      '_sow_form_id' => '58835935b6403',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 17,
        'widget_id' => '30a62159-52f7-4872-8d09-874a820da9ba',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    18 => 
    array (
      'title' => '',
      'text' => '<div class="row"><div class="col-md-8 "><h1 class="lead"><span style="color: #ffffff;">Join us for our Mission</span></h1></div></div>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58835b788e39e',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 18,
        'widget_id' => '3443306e-9926-4aa3-ba7a-2fe94ae871ef',
        'style' => 
        array (
          'padding' => '15px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    19 => 
    array (
      'text' => 'Become a Volunteer',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'right',
        'theme' => 'flat',
        'button_color' => '#ffffff',
        'text_color' => '#000000',
        'hover' => true,
        'font_size' => '1.15',
        'rounding' => '1.5',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '58835e91d1171',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 1,
        'id' => 19,
        'widget_id' => '5913e67f-5824-482b-9173-c141cc190bf9',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'gutter' => '0px',
        'row_stretch' => 'full',
        'background' => '#2f2f2f',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '100px 0px 100px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 875,
        'background_display' => 'parallax',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '40px 0px 40px 0px',
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'gutter' => '0px',
        'row_stretch' => 'full-stretched',
        'background' => '#f9f9f9',
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '100px 0px 100px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 875,
        'background_display' => 'parallax',
      ),
    ),
    7 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '30px 0px 30px 0px',
        'row_stretch' => 'full',
        'background' => '#46c965',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    1 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    2 => 
    array (
      'grid' => 0,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 1,
    ),
    4 => 
    array (
      'grid' => 2,
      'weight' => 0.5,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 0.5,
    ),
    6 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    8 => 
    array (
      'grid' => 4,
      'weight' => 0.5,
    ),
    9 => 
    array (
      'grid' => 5,
      'weight' => 1,
    ),
    10 => 
    array (
      'grid' => 6,
      'weight' => 1,
    ),
    11 => 
    array (
      'grid' => 7,
      'weight' => 0.6999999999999999555910790149937383830547332763671875,
    ),
    12 => 
    array (
      'grid' => 7,
      'weight' => 0.299999999999999988897769753748434595763683319091796875,
    ),
  ),
       
    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 5///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	$layouts['home5'] = array(
        // We'll add a title field
        'name' => __('Home version 5', 'framework'),
       'widgets' => 
  array (
    0 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '58884f5b5c325',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => '8bbdd250-d14e-46e0-aac5-5f7dbc94dae6',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h1 class="section-title" style="text-align: center;"><span style="color: #6aaf08;">W</span>hat <span style="color: #6aaf08;">W</span>e <span style="color: #6aaf08;">O</span>ffer</h1><h3 style="text-align: center;"><span style="color: #575656;">Lorem ipsum dolor sit amet</span></h3><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885d6c9724bc',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 1,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58884f5864451',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 2,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'icon' => 'fontawesome-pagelines',
      'color' => '#6aaf08',
      'size' => '60px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885d7d3f13bc',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 3,
        'widget_id' => '87c3f704-aec6-4fcf-941b-4933727a0670',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;">To keep <span style="color: #6aaf08;">wildlife</span> existence</h2><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885d81a11422',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 4,
        'widget_id' => '0a504284-eff0-4d51-b730-ee93df7109df',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'text' => 'Read More',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'center',
        'theme' => 'flat',
        'button_color' => '#6aaf08',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885d972c825c',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 5,
        'widget_id' => 'bdf70ca5-c5c0-4f26-9f4c-e81e79bb0ada',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'icon' => 'fontawesome-paw',
      'color' => '#6aaf08',
      'size' => '60px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885da920b13c',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 6,
        'widget_id' => '87c3f704-aec6-4fcf-941b-4933727a0670',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;">To make <span style="color: #6aaf08;">education</span> for all</h2><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885da93ea973',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 7,
        'widget_id' => '0a504284-eff0-4d51-b730-ee93df7109df',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'text' => 'Read More',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'center',
        'theme' => 'flat',
        'button_color' => '#6aaf08',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885da9641cae',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 8,
        'widget_id' => 'bdf70ca5-c5c0-4f26-9f4c-e81e79bb0ada',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'icon' => 'icomoon-earth',
      'color' => '#6aaf08',
      'size' => '60px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885daa7560d5',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 9,
        'widget_id' => '87c3f704-aec6-4fcf-941b-4933727a0670',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'title' => '',
      'text' => '<h2 style="text-align: center;">To help <span style="color: #6aaf08;">grow coming</span> birth</h2><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885daa8c9408',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 10,
        'widget_id' => '0a504284-eff0-4d51-b730-ee93df7109df',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'text' => 'Read More',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'center',
        'theme' => 'flat',
        'button_color' => '#6aaf08',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885daaa76088',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 11,
        'widget_id' => 'bdf70ca5-c5c0-4f26-9f4c-e81e79bb0ada',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5888513109ff1',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 12,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'title' => '',
      'text' => '<div class="row"><div class="col-md-8 "><h1 class="lead"><span style="color: #ffffff;">Lorem</span> <span style="color: #6aaf08;">ipsum dolor</span> <span style="color: #ffffff;">sit amet,</span> <br /><span style="color: #ffffff;">consectetur adipiscing elit</span></h1><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</span></p></div></div>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885e0f997256',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 13,
        'widget_id' => '0a504284-eff0-4d51-b730-ee93df7109df',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    14 => 
    array (
      'text' => 'Read More',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'left',
        'theme' => 'flat',
        'button_color' => '#6aaf08',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885e1f10c671',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 14,
        'widget_id' => 'aa8971bf-6f46-4643-9999-eddf08e40d1e',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    15 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588851e87d07d',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 15,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    16 => 
    array (
      'title' => '',
      'text' => '<h1 class="section-title" style="text-align: center;"><span style="color: #6aaf08;">L</span>atest<span style="color: #6aaf08;"> P</span>rojects</h1><h3 style="text-align: center;"><span style="color: #575656;">Lorem ipsum dolor sit amet</span></h3><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885e2c78e034',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 16,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
        ),
      ),
    ),
    17 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Posts',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'excerpt_length' => true,
      'read_more_text' => 'Continue reading',
      'listing_layout' => 
      array (
        'layout_type' => 'grid',
        'grid_column' => false,
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '5885e365135ac',
      'panels_info' => 
      array (
        'class' => 'Projects_List_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 17,
        'widget_id' => '56027db3-c665-438c-9d58-2032b08a7069',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    18 => 
    array (
      'title' => '',
      'text' => '<h1 class="section-title" style="text-align: right;"><span style="color: #6aaf08;">J</span><span style="color: #ffffff;">oin</span> <span style="color: #6aaf08;">O</span><span style="color: #ffffff;">ur</span> <span style="color: #6aaf08;">T</span><span style="color: #ffffff;">eam</span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885e971eb8ce',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 18,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    19 => 
    array (
      'text' => 'Get involved',
      'url' => 'http://import.imithemes.com/gaea/index.php/about-us/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'left',
        'theme' => 'flat',
        'button_color' => '#6aaf08',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885e9bf4ccb5',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 1,
        'id' => 19,
        'widget_id' => 'aa8971bf-6f46-4643-9999-eddf08e40d1e',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    20 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5888548332f73',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 20,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    21 => 
    array (
      'title' => '',
      'text' => '<h2 class="text-uppercase line-bottom-center mt-0" style="text-align: center;"><span style="color: #6aaf08;">P</span>hoto <span style="color: #6aaf08;">G</span>allery</h2><h3 style="text-align: center;"><span style="color: #575656;">Lorem ipsum dolor sit ame</span>t</h3><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885ec28528cb',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 21,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
        ),
      ),
    ),
    22 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Galleries',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 6,
      'grid_column' => '4',
      '_sow_form_id' => '5885edbbd5798',
      'show_post_meta' => false,
      'filters' => false,
      'show_pagination' => false,
      'panels_info' => 
      array (
        'class' => 'Gallery_Grid_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 22,
        'widget_id' => 'c3a3b1f3-bd14-45c1-b091-1b59e6600c2e',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    23 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58885650e62fe',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 23,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    24 => 
    array (
      'title' => '',
      'text' => '<h3 class="text-uppercase line-bottom-center mt-0" style="text-align: center;"><span style="color: #ffffff;">How you can help us</span></h3><h1 class="text-white" style="text-align: center;"><span style="color: #ffffff;">Just call at <span class="text-theme-colored" style="color: #6aaf08;">(02) 537890</span> to make a donation</span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885f1a8aa3d7',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 24,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    25 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588857707343d',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 25,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    26 => 
    array (
      'title' => '',
      'text' => '<h2 class="text-uppercase line-bottom-center mt-0" style="text-align: center;"><span style="color: #6aaf08;">S</span>upporters</h2><h3 style="text-align: center;"><span style="color: #575656;">Lorem ipsum dolor sit ame</span>t</h3><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885f3cfea381',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 26,
        'widget_id' => '5a459a7a-3e31-4871-881a-ba86749b0fcd',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
        ),
      ),
    ),
    27 => 
    array (
      'title' => '',
      'allpostsbtn' => 'Button',
      'allpostsurl' => '',
      'images' => 
      array (
        0 => 
        array (
          'icon_image' => 63,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        1 => 
        array (
          'icon_image' => 62,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        2 => 
        array (
          'icon_image' => 61,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        3 => 
        array (
          'icon_image' => 60,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        4 => 
        array (
          'icon_image' => 59,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
      ),
      'number_of_posts' => 4,
      'display_type' => 'carousel',
      'autoplay' => false,
      'navigation' => 'yes',
      'pagination' => 'no',
      '_sow_form_id' => '5885f3e70e392',
      'panels_info' => 
      array (
        'class' => 'Carousel_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 27,
        'widget_id' => '17d0c30a-844b-41f1-b83a-c45428da8110',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    28 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5888577b222de',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 28,
        'widget_id' => '28170812-c95d-435f-b4cf-964856194d08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    29 => 
    array (
      'map_center' => '',
      'api_key_section' => 
      array (
        'api_key' => '',
        'so_field_container_state' => 'open',
      ),
      'settings' => 
      array (
        'map_type' => 'interactive',
        'width' => '640',
        'height' => '480',
        'zoom' => 12,
        'draggable' => true,
        'so_field_container_state' => 'open',
        'scroll_zoom' => false,
        'disable_default_ui' => false,
        'keep_centered' => false,
      ),
      'markers' => 
      array (
        'marker_at_center' => true,
        'marker_icon' => 0,
        'info_display' => 'click',
        'info_multiple' => true,
        'so_field_container_state' => 'closed',
        'markers_draggable' => false,
        'marker_positions' => 
        array (
        ),
      ),
      'styles' => 
      array (
        'style_method' => 'normal',
        'styled_map_name' => '',
        'raw_json_map_styles' => '',
        'so_field_container_state' => 'closed',
        'custom_map_styles' => 
        array (
        ),
      ),
      'directions' => 
      array (
        'origin' => '',
        'destination' => '',
        'travel_mode' => 'driving',
        'so_field_container_state' => 'closed',
        'avoid_highways' => false,
        'avoid_tolls' => false,
        'waypoints' => 
        array (
        ),
        'optimize_waypoints' => false,
      ),
      '_sow_form_id' => '5886e52cae930',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_GoogleMap_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 29,
        'widget_id' => 'f0d63888-633a-45a1-8e75-0a7ba0e5dcd1',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    30 => 
    array (
      'title' => '',
      'text' => '<h1 class="section-title"><span style="color: #ffffff;">Subcribe for Newsletter</span></h1><p><span style="color: #ffffff;">There are many variations of passages of Lorem Ipsum available but the majority have</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58870b5f755f4',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 10,
        'cell' => 0,
        'id' => 30,
        'widget_id' => '1418b313-ccf0-45fb-a622-5d79c602b63f',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    31 => 
    array (
      'text' => 'Donate Now',
      'url' => 'http://import.imithemes.com/gaea/index.php/donate-now/',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'open',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'left',
        'theme' => 'flat',
        'button_color' => '#ffffff',
        'text_color' => '#6aaf08',
        'hover' => true,
        'font_size' => '1',
        'rounding' => '0.25',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '58870cd280913',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 10,
        'cell' => 1,
        'id' => 31,
        'widget_id' => 'aa8971bf-6f46-4643-9999-eddf08e40d1e',
        'style' => 
        array (
          'padding' => '30px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 3,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '100px 0px 100px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 875,
        'background_display' => 'parallax',
      ),
    ),
    4 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '118px 0px 100px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 941,
        'background_display' => 'parallax',
      ),
    ),
    6 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    7 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '100px 0px 100px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 941,
        'background_display' => 'parallax',
      ),
    ),
    8 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    9 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'row_stretch' => 'full-stretched',
        'background_display' => 'tile',
      ),
    ),
    10 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'padding' => '50px 0px 50px 0px',
        'row_stretch' => 'full',
        'background' => '#6aaf08',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.333333333333333314829616256247390992939472198486328125,
    ),
    4 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    5 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    6 => 
    array (
      'grid' => 4,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
    8 => 
    array (
      'grid' => 5,
      'weight' => 0.5,
    ),
    9 => 
    array (
      'grid' => 6,
      'weight' => 1,
    ),
    10 => 
    array (
      'grid' => 7,
      'weight' => 1,
    ),
    11 => 
    array (
      'grid' => 8,
      'weight' => 1,
    ),
    12 => 
    array (
      'grid' => 9,
      'weight' => 1,
    ),
    13 => 
    array (
      'grid' => 10,
      'weight' => 0.6999999999999999555910790149937383830547332763671875,
    ),
    14 => 
    array (
      'grid' => 10,
      'weight' => 0.299999999999999988897769753748434595763683319091796875,
    ),
  ),
  
    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 6///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	$layouts['home6'] = array(
        // We'll add a title field
        'name' => __('Home version 6', 'framework'),
       'widgets' => 
  array (
    0 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '58884a5876b5a',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong><span style="color: #008000;">MORE PEOPLE</span> <span style="color: #000000;">WORKING WITH US</span></strong></h1><p style="text-align: center;"><span style="color: #808080;">Lorem ipsum dolor sit amet, suspendisse ante integer sed pulvinar a vestibulum, cursus risus felis adipiscing. Etiam fermentum etiam sed sed aliquam, diam nunc, et quis ac praesent tincidunt porttitor felis.</span></p>',
      'text_selected_editor' => 'tmce',
      'autop' => true,
      '_sow_form_id' => '588078b2529d2',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 1,
        'widget_id' => '3ba8a8ed-f68b-4eec-8d55-f82bfee37644',
        'style' => 
        array (
          'padding' => '0px 50px 0px 50px',
          'background_display' => 'tile',
          'font_color' => '#dddddd',
        ),
      ),
    ),
    2 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Projects',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => '4',
      '_sow_form_id' => '588198b2dca38',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 2,
        'widget_id' => '1a8e785f-cdff-41fb-a3f1-c6b0c97b4aa3',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589857561af8e',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 3,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '',
      'text' => '<h1><strong><span style="color: #ffffff;">JOIN OUR</span> <span style="color: #008000;">EVENT</span> <span style="color: #ffffff;">AND FRIENDLY</span> <span style="color: #008000;">SUPPORT</span></strong></h1><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, suspendisse ante integer sed pulvinar a vestibulum, cursus risus felis adipiscing. Etiam fermentum etiam sed sed aliquam, diam nunc, et quis ac praesent tincidunt porttitor felis. Nec risus vestibulum volutpat, velit vivamus et donec commodo, pharetra non habitant adipiscing iaculis, aenean aliquam lorem. At risus iaculis, tellus ante vel tellus<br /></span></p><h3> </h3><h2><span style="color: #ffffff;"><strong>Supports :-</strong></span></h2><ul><li><span style="color: #ffffff;"> Social Support</span></li><li><span style="color: #ffffff;">Forum Support</span></li><li><span style="color: #ffffff;">Email Support</span></li></ul>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '58809ab5b69fc',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 4,
        'widget_id' => 'bed087ad-6c96-4b50-a3bf-a95e23b496a2',
        'style' => 
        array (
          'padding' => '60px 75px 60px 75px',
          'background' => '#000000',
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589857628ead9',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 5,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'title' => '',
            'text' => '<h1><strong><span style="color: #008000;">RECENT <span style="color: #000000;">PROJECT</span></span></strong></h1><p>Lorem ipsum dolor sit amet, suspendisse ante integer sed pulvinar a  cursus risus felis adipiscing.</p>',
            'text_selected_editor' => 'tinymce',
            'autop' => true,
            '_sow_form_id' => '58884d71ea9e5',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Widget_Editor_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'widget_id' => '59f178e1-c596-4ea3-895f-dd0ee57da9ee',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
          1 => 
          array (
            'text' => 'SEE ALL PROJECT',
            'url' => 'http://import.imithemes.com/gaea/index.php/projects-listing/',
            'button_icon' => 
            array (
              'icon_selected' => '',
              'icon_color' => false,
              'icon' => 0,
              'so_field_container_state' => 'closed',
            ),
            'design' => 
            array (
              'width' => false,
              'width_unit' => 'px',
              'align' => 'right',
              'theme' => 'flat',
              'button_color' => '#008000',
              'text_color' => false,
              'hover' => true,
              'font_size' => '1.15',
              'rounding' => '1.5',
              'padding' => '1',
              'so_field_container_state' => 'open',
            ),
            'attributes' => 
            array (
              'id' => '',
              'classes' => '',
              'title' => '',
              'onclick' => '',
              'so_field_container_state' => 'closed',
            ),
            '_sow_form_id' => '58884e5144176',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Widget_Button_Widget',
              'grid' => 0,
              'cell' => 1,
              'id' => 1,
              'widget_id' => '1eae2412-fb54-47fe-933a-9185cfbfed36',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
            'new_window' => false,
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 2,
            'style' => 
            array (
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 0.5,
          ),
          1 => 
          array (
            'grid' => 0,
            'weight' => 0.5,
          ),
        ),
      ),
      'builder_id' => '58884e845b5b4',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 6,
        'widget_id' => '1e16a62d-5e4d-4be3-a890-13f06ea0dc13',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Posts',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'excerpt_length' => true,
      'read_more_text' => 'Continue reading',
      'listing_layout' => 
      array (
        'layout_type' => 'grid',
        'grid_column' => '4',
        'so_field_container_state' => 'open',
      ),
      '_sow_form_id' => '5880aa7749e9d',
      'panels_info' => 
      array (
        'class' => 'Projects_List_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 7,
        'widget_id' => 'e21441ba-aa0e-48b5-b672-219e7835a8cd',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '58884c202743c',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 8,
        'widget_id' => '9e08f70a-fb97-4631-8bd2-763b1a36362c',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><span style="color: #ffffff;"><strong><span style="color: #ffffff;">FROM</span> THE GALLERY</strong></span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5881a460bba55',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 9,
        'widget_id' => '6aef9a8f-59b4-40d4-9332-acebed222141',
        'style' => 
        array (
          'padding' => '0px 0px 0px 0px',
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Galleries',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 10,
      'grid_column' => '3',
      '_sow_form_id' => '5881b2696a715',
      'show_post_meta' => false,
      'filters' => false,
      'show_pagination' => false,
      'panels_info' => 
      array (
        'class' => 'Gallery_Grid_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 10,
        'widget_id' => '26e235d0-c40b-4cf8-810a-ae58450e7f52',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589857765b910',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 11,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong><span style="color: #008000;">POST</span> CAROUSEL</strong></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5881cb6f7e2b3',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 12,
        'widget_id' => '5dc57f8e-7954-4801-8481-7a97e2cf8a66',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'title' => '',
      'posts' => '',
      '_sow_form_id' => '5881bdda2302b',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_PostCarousel_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 13,
        'widget_id' => '1eb4db84-cb2f-42a5-9f1c-401f0889bdff',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    14 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '58985798d3eee',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 14,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    15 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '58985785998ee',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 15,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    16 => 
    array (
      'categories' => '',
      'number_of_posts' => 2,
      'event_layout_type' => '0',
      'temp_event_columns_layout' => '2',
      '_sow_form_id' => '5881afe8a7d09',
      'panels_info' => 
      array (
        'class' => 'Events_List_Future_Past_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 16,
        'widget_id' => 'f54a0872-2fe1-4486-aa0f-1094aec3eef9',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    17 => 
    array (
      'title' => '',
      'number' => 6,
      'show_date' => false,
      'panels_info' => 
      array (
        'class' => 'WP_Widget_Recent_Posts',
        'raw' => false,
        'grid' => 6,
        'cell' => 1,
        'id' => 17,
        'widget_id' => 'a35d2337-3961-4f4d-81c1-b2ef76b6cd45',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    18 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589857c9c0e4c',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 18,
        'widget_id' => '5e3c072b-d29b-4300-8a6d-19857f10f799',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    19 => 
    array (
      'title' => '',
      'text' => '<h1><span style="color: #ffffff;"><strong>PEOPLE SHARING THEIR SUCCESSFUL IDEAS</strong></span></h1><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam aliquet nisi vitae lacus euismod, a egestas ipsum porttitor. Nullam a justo dolor. Integer feugiat pretium neque in scelerisque. Curabitur diam mauris, egestas consectetur diam nec, vestibulum bibendum massa. Nunc at ipsum sed neque pretium mattis ut quis ante. Sed eu dui bibendum, commodo neque eget, laoreet diam. In vel pretium ex. Nulla ullamcorper vel mi eget feugiat. In vel nulla id ligula bibendum luctus sed pellentesque ligula.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5888387df0ccd',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 19,
        'widget_id' => '77f68f53-d343-482c-9404-9a46fba215f6',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    20 => 
    array (
      'map_center' => '',
      'api_key_section' => 
      array (
        'api_key' => '',
        'so_field_container_state' => 'open',
      ),
      'settings' => 
      array (
        'map_type' => 'interactive',
        'width' => '640',
        'height' => '480',
        'zoom' => 12,
        'draggable' => true,
        'so_field_container_state' => 'open',
        'scroll_zoom' => false,
        'disable_default_ui' => false,
        'keep_centered' => false,
      ),
      'markers' => 
      array (
        'marker_at_center' => true,
        'marker_icon' => 0,
        'info_display' => 'click',
        'info_multiple' => true,
        'so_field_container_state' => 'closed',
        'markers_draggable' => false,
        'marker_positions' => 
        array (
        ),
      ),
      'styles' => 
      array (
        'style_method' => 'normal',
        'styled_map_name' => '',
        'raw_json_map_styles' => '',
        'so_field_container_state' => 'closed',
        'custom_map_styles' => 
        array (
        ),
      ),
      'directions' => 
      array (
        'origin' => '',
        'destination' => '',
        'travel_mode' => 'driving',
        'so_field_container_state' => 'closed',
        'avoid_highways' => false,
        'avoid_tolls' => false,
        'waypoints' => 
        array (
        ),
        'optimize_waypoints' => false,
      ),
      '_sow_form_id' => '5881ad059cda0',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_GoogleMap_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 20,
        'widget_id' => 'c8bccaea-846c-44c6-9295-6938ec0c2399',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'gutter' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full-stretched',
        'background' => '#000000',
        'background_image_attachment' => 874,
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'row_stretch' => 'full',
        'background' => '#eaeaea',
        'background_display' => 'tile',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'gutter' => '0px',
        'padding' => '80px 0px 80px 0px',
        'row_stretch' => 'full',
        'background' => '#ffffff',
        'background_image_attachment' => 874,
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background' => '#eaeaea',
        'background_display' => 'parallax',
      ),
    ),
    5 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    7 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'background_display' => 'tile',
      ),
    ),
    8 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '50px 0px 50px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 872,
        'background_display' => 'parallax',
      ),
    ),
    9 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'row_stretch' => 'full-stretched',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.5,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.5,
    ),
    3 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    4 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    5 => 
    array (
      'grid' => 4,
      'weight' => 1,
    ),
    6 => 
    array (
      'grid' => 5,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    8 => 
    array (
      'grid' => 6,
      'weight' => 0.5,
    ),
    9 => 
    array (
      'grid' => 7,
      'weight' => 1,
    ),
    10 => 
    array (
      'grid' => 8,
      'weight' => 1,
    ),
    11 => 
    array (
      'grid' => 9,
      'weight' => 1,
    ),
  ),
	   
    );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////Home version 7///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	
	$layouts['home7'] = array(
        // We'll add a title field
        'name' => __('Home version 7', 'framework'),
       'widgets' => 
  array (
    0 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '5888549150da8',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 0,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    1 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong>SERVICES</strong></h1><h4 style="text-align: center;"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h4>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885aca597d81',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 1,
        'widget_id' => 'adde3108-db57-4c0a-9bea-1f38b37644d5',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    2 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588854d8e7bd7',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 0,
        'cell' => 0,
        'id' => 2,
        'widget_id' => 'cec38422-8110-4cd6-b51e-c899957fa07a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    3 => 
    array (
      'icon' => 'elegantline-gears',
      'color' => '#48adc5',
      'size' => '50px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885af9d6bac8',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 3,
        'widget_id' => '88535dd1-9fcb-467a-b1d2-5d4e71dcbbec',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    4 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885ae974cdd9',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 0,
        'id' => 4,
        'widget_id' => '0dd0faab-6651-4aa4-8b13-4046f1c3e7cd',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    5 => 
    array (
      'icon' => 'elegantline-pencil',
      'color' => '#48adc5',
      'size' => '50px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885b1dda1e26',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 5,
        'widget_id' => '080cc4ff-adf7-4505-bb70-5fc51eeacd08',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    6 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885aebc56f91',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 1,
        'id' => 6,
        'widget_id' => 'eaf81888-4191-4813-ac3f-5cd864d8ec4e',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    7 => 
    array (
      'icon' => 'elegantline-chat',
      'color' => '#48adc5',
      'size' => '50px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885b3dae67c8',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 7,
        'widget_id' => '0444fe40-99be-4701-bf90-b1f816f0d419',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    8 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885aecd69f18',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 2,
        'id' => 8,
        'widget_id' => '15a6445e-7b8d-4944-97d2-7b5775fa3fb2',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    9 => 
    array (
      'icon' => 'elegantline-document',
      'color' => '#48adc5',
      'size' => '50px',
      'size_unit' => 'px',
      'alignment' => 'center',
      'url' => '',
      '_sow_form_id' => '5885b42b336e3',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Icon_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 3,
        'id' => 9,
        'widget_id' => '93d243e8-7426-42d8-9984-a66b47a8358f',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    10 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885aee17b349',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 1,
        'cell' => 3,
        'id' => 10,
        'widget_id' => 'ce2c3024-9923-4326-8b34-70b25f1978bc',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    11 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '5888553fe2feb',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 11,
        'widget_id' => '5a9964d2-6d12-4960-b692-e241cb55c0f5',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    12 => 
    array (
      'title' => '',
      'text' => '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885b6087af7e',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 12,
        'widget_id' => '33d32105-eee0-44ca-b68a-0e2fd42c4190',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    13 => 
    array (
      'text' => 'BECOME A VOLUNTEER',
      'url' => 'https://themeforest.net/user/imithemes/portfolio?ref=imithemes',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'closed',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'center',
        'theme' => 'flat',
        'button_color' => '#48adc5',
        'text_color' => '#ffffff',
        'hover' => true,
        'font_size' => '1.15',
        'rounding' => '1.5',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5885b818c5a2f',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 13,
        'widget_id' => '209c29c9-1418-4c21-96af-55c961550ccd',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    14 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '5898588ea3009',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 2,
        'cell' => 0,
        'id' => 14,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    15 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '5898589c936ed',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 15,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    16 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong>OUR MISSION<br /></strong></h1><h4 style="text-align: center;"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong><br /><br /></h4>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885bbdd44c9b',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 16,
        'widget_id' => '862b9674-a015-483e-b23c-7055a971a187',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    17 => 
    array (
      'panels_data' => 
      array (
        'widgets' => 
        array (
          0 => 
          array (
            'image' => 868,
            'image_fallback' => '',
            'size' => 'full',
            'align' => 'default',
            'title' => '',
            'title_position' => 'hidden',
            'alt' => '',
            'url' => '',
            'bound' => true,
            '_sow_form_id' => '588880e7d9ad1',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Widget_Image_Widget',
              'grid' => 0,
              'cell' => 0,
              'id' => 0,
              'widget_id' => '438579cd-13fb-4546-bec6-73398610d7d1',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'mobile_padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
            'new_window' => false,
            'full_width' => false,
          ),
          1 => 
          array (
            'title' => '',
            'text' => '<h3><strong>Join us for our Mission</strong></h3><p><strong><span style="color: #33cccc;">$ 10000 TO GO</span></strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. In nec imperdiet turpis. Suspendisse quis orci ut orci pulvinar eleifend. Nulla eu mattis ipsum. Integer eget sagittis nulla. Praesent consectetur lacus et maximus eleifend. Integer non lacus dui. Mauris tortor diam, laoreet quis commodo vitae, sodales vel augue. Praesent consectetur lacus et maximus eleifend. Integer non lacus dui. Mauris tortor diam, laoreet quis commodo vitae, sodales vel augue Nulla convallis egestas rhoncus.</p>',
            'text_selected_editor' => 'tinymce',
            'autop' => true,
            '_sow_form_id' => '5885c917aa4a6',
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Widget_Editor_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 1,
              'id' => 1,
              'widget_id' => '4b34fda6-4fdc-48ac-9283-00405f5c03a0',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
          2 => 
          array (
            'text' => 'DONATE NOW',
            'url' => 'http://import.imithemes.com/gaea/index.php/donate-now/',
            'button_icon' => 
            array (
              'icon_selected' => '',
              'icon_color' => false,
              'icon' => 0,
              'so_field_container_state' => 'open',
            ),
            'design' => 
            array (
              'width' => false,
              'width_unit' => 'px',
              'align' => 'left',
              'theme' => 'flat',
              'button_color' => '#48adc5',
              'text_color' => false,
              'hover' => true,
              'font_size' => '1.15',
              'rounding' => '1.5',
              'padding' => '1',
              'so_field_container_state' => 'open',
            ),
            'attributes' => 
            array (
              'id' => '',
              'classes' => '',
              'title' => '',
              'onclick' => '',
              'so_field_container_state' => 'closed',
            ),
            '_sow_form_id' => '5885d5179cd6b',
            'new_window' => false,
            'panels_info' => 
            array (
              'class' => 'SiteOrigin_Widget_Button_Widget',
              'raw' => false,
              'grid' => 0,
              'cell' => 1,
              'id' => 2,
              'widget_id' => 'f39a12dd-6e19-4e26-9be3-b29e64751783',
              'style' => 
              array (
                'class' => '',
                'widget_css' => '',
                'padding' => '',
                'background' => '',
                'background_image_attachment' => '0',
                'background_display' => 'tile',
                'border_color' => '',
                'font_color' => '',
                'link_color' => '',
              ),
            ),
          ),
        ),
        'grids' => 
        array (
          0 => 
          array (
            'cells' => 2,
            'style' => 
            array (
              'id' => '',
              'class' => '',
              'cell_class' => '',
              'row_css' => '',
              'bottom_margin' => '0px',
              'gutter' => '',
              'padding' => '35px 35px 35px 35px',
              'row_stretch' => '',
              'collapse_order' => '',
              'background' => 'transparent',
              'background_image_attachment' => '0',
              'background_display' => 'tile',
              'border_color' => '',
            ),
          ),
        ),
        'grid_cells' => 
        array (
          0 => 
          array (
            'grid' => 0,
            'weight' => 0.34999999999999997779553950749686919152736663818359375,
          ),
          1 => 
          array (
            'grid' => 0,
            'weight' => 0.65000000000000002220446049250313080847263336181640625,
          ),
        ),
      ),
      'builder_id' => '58985c2bed67a',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Panels_Widgets_Layout',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 17,
        'widget_id' => 'db370eb6-a17a-4014-9da2-c59108474f6a',
        'style' => 
        array (
          'background' => '#ffffff',
          'background_display' => 'tile',
        ),
      ),
    ),
    18 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858a6ba2c8',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 3,
        'cell' => 0,
        'id' => 18,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    19 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><span style="color: #ffffff;"><strong>GALLERY</strong></span></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885e7aecd0d5',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 19,
        'widget_id' => '075aaecd-9140-42af-8c43-ee5ea3a67283',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    20 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Galleries',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 8,
      'grid_column' => '3',
      '_sow_form_id' => '5885e7e11e5c7',
      'show_post_meta' => false,
      'filters' => false,
      'show_pagination' => false,
      'panels_info' => 
      array (
        'class' => 'Gallery_Grid_Widget',
        'raw' => false,
        'grid' => 4,
        'cell' => 0,
        'id' => 20,
        'widget_id' => '36c14dc6-3ac7-41f9-a0e8-c9331b8b82f9',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    21 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858b574786',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 21,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    22 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong>SAVE THE WORLD</strong></h1><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam aliquet nisi vitae lacus euismod, a egestas ipsum porttitor. Nullam a justo dolor. Integer feugiat pretium neque in scelerisque. Curabitur diam mauris, egestas consectetur diam nec, vestibulum bibendum massa.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885e17f36b4a',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 22,
        'widget_id' => '8bb676c1-7240-4e41-ba0f-3105f8ca5b7a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    23 => 
    array (
      'title' => '',
      'allpostsbtn' => 'All Projects',
      'allpostsurl' => '',
      'categories' => '',
      'number_of_posts' => 3,
      'show_post_meta' => true,
      'grid_column' => '4',
      '_sow_form_id' => '588841e6bdd83',
      'panels_info' => 
      array (
        'class' => 'Featured_Projects_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 23,
        'widget_id' => '970e2f06-b68d-446b-a0a7-f98769ecbe95',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    24 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858cc4f056',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 5,
        'cell' => 0,
        'id' => 24,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    25 => 
    array (
      'icon' => 'fontawesome-dollar',
      'icon_color' => '#48adc5',
      'icon_size' => 48,
      'icon_image' => 0,
      'number' => 1380089,
      'number_color' => '#333333',
      'text' => 'Amount Raised',
      'text_color' => '#999999',
      '_sow_form_id' => '5885f8fdb0430',
      'panels_info' => 
      array (
        'class' => 'Counter_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 0,
        'id' => 25,
        'widget_id' => '20f95881-f973-48a5-a492-7462e8662577',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    26 => 
    array (
      'icon' => 'fontawesome-heart-o',
      'icon_color' => '#48adc5',
      'icon_size' => 48,
      'icon_image' => 0,
      'number' => 36,
      'number_color' => '#333333',
      'text' => 'Causes',
      'text_color' => '#999999',
      '_sow_form_id' => '5885f8f800f2c',
      'panels_info' => 
      array (
        'class' => 'Counter_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 1,
        'id' => 26,
        'widget_id' => '20f95881-f973-48a5-a492-7462e8662577',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    27 => 
    array (
      'icon' => 'fontawesome-bar-chart',
      'icon_color' => '#48adc5',
      'icon_size' => 48,
      'icon_image' => 0,
      'number' => 1211,
      'number_color' => '#333333',
      'text' => 'Total Member',
      'text_color' => '#999999',
      '_sow_form_id' => '5885f8f6005ee',
      'panels_info' => 
      array (
        'class' => 'Counter_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 2,
        'id' => 27,
        'widget_id' => '20f95881-f973-48a5-a492-7462e8662577',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    28 => 
    array (
      'icon' => 'fontawesome-hand-peace-o',
      'icon_color' => '#48adc5',
      'icon_size' => 48,
      'icon_image' => 0,
      'number' => 61098,
      'number_color' => '#333333',
      'text' => 'People Impacted',
      'text_color' => '#999999',
      '_sow_form_id' => '5885f7a9821dd',
      'panels_info' => 
      array (
        'class' => 'Counter_Widget',
        'raw' => false,
        'grid' => 6,
        'cell' => 3,
        'id' => 28,
        'widget_id' => '20f95881-f973-48a5-a492-7462e8662577',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    29 => 
    array (
      'title' => '',
      'text' => '<h3 class="margin-top-1"><span style="color: #ffffff;">Ready for Mobile, tablets and desktops, at all resolutions <span class="highlight1"><strong>Blackboard</strong></span> is loaded with <span class="morph-fade highlight1 bold morphext"><span class="animated fadeIn">features</span></span>.</span></h3><p><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</span></p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5886fda1244a1',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 0,
        'id' => 29,
        'widget_id' => 'b212da18-ef91-4d79-9aa5-c63b8be07f39',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    30 => 
    array (
      'height' => '30px',
      '_sow_form_id' => '588862a1c233a',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 1,
        'id' => 30,
        'widget_id' => '5ac9bb30-fce5-463a-976d-d72b6e3334b7',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    31 => 
    array (
      'text' => 'SUPPORT ON PROJECT',
      'url' => 'https://themeforest.net/user/imithemes/portfolio?ref=imithemes',
      'button_icon' => 
      array (
        'icon_selected' => '',
        'icon_color' => false,
        'icon' => 0,
        'so_field_container_state' => 'closed',
      ),
      'design' => 
      array (
        'width' => false,
        'width_unit' => 'px',
        'align' => 'right',
        'theme' => 'flat',
        'button_color' => '#48adc5',
        'text_color' => false,
        'hover' => true,
        'font_size' => '1.15',
        'rounding' => '1.5',
        'padding' => '1',
        'so_field_container_state' => 'open',
      ),
      'attributes' => 
      array (
        'id' => '',
        'classes' => '',
        'title' => '',
        'onclick' => '',
        'so_field_container_state' => 'closed',
      ),
      '_sow_form_id' => '5886fd6e8acbc',
      'new_window' => false,
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Button_Widget',
        'raw' => false,
        'grid' => 7,
        'cell' => 1,
        'id' => 31,
        'widget_id' => '09240ea1-e206-4d3d-b6c5-f339bc8928de',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    32 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858e353346',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 32,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    33 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong>LATEST POST</strong></h1>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5886e6f49e531',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 33,
        'widget_id' => '9c498d02-f45a-4d5a-b0f6-5efd2571957e',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    34 => 
    array (
      'title' => '',
      'posts' => '',
      '_sow_form_id' => '58885afb70794',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_PostCarousel_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 34,
        'widget_id' => 'bff50a4f-d0a2-4ef1-a73e-b9195a25d0f8',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    35 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858f081f10',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 8,
        'cell' => 0,
        'id' => 35,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    36 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589858fbc718e',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 36,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    37 => 
    array (
      'title' => '',
      'text' => '<h1 style="text-align: center;"><strong>PARTNER\'S</strong></h1><p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>',
      'text_selected_editor' => 'tinymce',
      'autop' => true,
      '_sow_form_id' => '5885fd6f325ec',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_Editor_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 37,
        'widget_id' => 'b60ccc4b-dfc2-49c6-876b-5edce7d7ff70',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    38 => 
    array (
      'title' => '',
      'allpostsbtn' => 'Button',
      'allpostsurl' => '',
      'images' => 
      array (
        0 => 
        array (
          'icon_image' => 63,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        1 => 
        array (
          'icon_image' => 62,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        2 => 
        array (
          'icon_image' => 60,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        3 => 
        array (
          'icon_image' => 59,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
        4 => 
        array (
          'icon_image' => 61,
          'icon_title' => '',
          'more_url' => '',
          'new_window' => false,
        ),
      ),
      'number_of_posts' => 4,
      'display_type' => 'carousel',
      'autoplay' => false,
      'navigation' => 'yes',
      'pagination' => 'no',
      '_sow_form_id' => '5885fc6b350c2',
      'panels_info' => 
      array (
        'class' => 'Carousel_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 38,
        'widget_id' => '0d3be87d-21b8-43f2-a7c9-e1ccbbafd3e3',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    39 => 
    array (
      'height' => '60px',
      '_sow_form_id' => '589859050b19c',
      'panels_info' => 
      array (
        'class' => 'Spacer_Widget',
        'raw' => false,
        'grid' => 9,
        'cell' => 0,
        'id' => 39,
        'widget_id' => '18554d4d-280f-458a-a75d-f9f8b47f902a',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
    40 => 
    array (
      'map_center' => '',
      'api_key_section' => 
      array (
        'api_key' => '',
        'so_field_container_state' => 'open',
      ),
      'settings' => 
      array (
        'map_type' => 'interactive',
        'width' => '640',
        'height' => '480',
        'zoom' => 12,
        'draggable' => true,
        'so_field_container_state' => 'open',
        'scroll_zoom' => false,
        'disable_default_ui' => false,
        'keep_centered' => false,
      ),
      'markers' => 
      array (
        'marker_at_center' => true,
        'marker_icon' => 0,
        'info_display' => 'click',
        'info_multiple' => true,
        'so_field_container_state' => 'closed',
        'markers_draggable' => false,
        'marker_positions' => 
        array (
        ),
      ),
      'styles' => 
      array (
        'style_method' => 'normal',
        'styled_map_name' => '',
        'raw_json_map_styles' => '',
        'so_field_container_state' => 'closed',
        'custom_map_styles' => 
        array (
        ),
      ),
      'directions' => 
      array (
        'origin' => '',
        'destination' => '',
        'travel_mode' => 'driving',
        'so_field_container_state' => 'closed',
        'avoid_highways' => false,
        'avoid_tolls' => false,
        'waypoints' => 
        array (
        ),
        'optimize_waypoints' => false,
      ),
      '_sow_form_id' => '58885fbb28ced',
      'panels_info' => 
      array (
        'class' => 'SiteOrigin_Widget_GoogleMap_Widget',
        'raw' => false,
        'grid' => 10,
        'cell' => 0,
        'id' => 40,
        'widget_id' => 'a4467ba3-dc3a-4e0d-a41c-ef72824576e8',
        'style' => 
        array (
          'background_display' => 'tile',
        ),
      ),
    ),
  ),
  'grids' => 
  array (
    0 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    1 => 
    array (
      'cells' => 4,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    2 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    3 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background' => '#f8f8f8',
        'background_display' => 'tile',
      ),
    ),
    4 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '80px 0px 80px 0px',
        'row_stretch' => 'full',
        'background_image_attachment' => 874,
        'background_display' => 'tile',
      ),
    ),
    5 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background_display' => 'tile',
      ),
    ),
    6 => 
    array (
      'cells' => 4,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '40px 0px 40px 0px',
        'row_stretch' => 'full',
        'background' => '#f8f8f8',
        'background_display' => 'tile',
      ),
    ),
    7 => 
    array (
      'cells' => 2,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '35px 0px 30px 0px',
        'row_stretch' => 'full',
        'background' => '#ffffff',
        'background_image_attachment' => 874,
        'background_display' => 'tile',
      ),
    ),
    8 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'background_display' => 'tile',
      ),
    ),
    9 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'padding' => '0px 0px 0px 0px',
        'row_stretch' => 'full',
        'background' => '#f8f8f8',
        'background_display' => 'tile',
      ),
    ),
    10 => 
    array (
      'cells' => 1,
      'style' => 
      array (
        'bottom_margin' => '0px',
        'row_stretch' => 'full-stretched',
        'background_display' => 'tile',
      ),
    ),
  ),
  'grid_cells' => 
  array (
    0 => 
    array (
      'grid' => 0,
      'weight' => 1,
    ),
    1 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    2 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    3 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    4 => 
    array (
      'grid' => 1,
      'weight' => 0.25,
    ),
    5 => 
    array (
      'grid' => 2,
      'weight' => 1,
    ),
    6 => 
    array (
      'grid' => 3,
      'weight' => 1,
    ),
    7 => 
    array (
      'grid' => 4,
      'weight' => 1,
    ),
    8 => 
    array (
      'grid' => 5,
      'weight' => 1,
    ),
    9 => 
    array (
      'grid' => 6,
      'weight' => 0.25,
    ),
    10 => 
    array (
      'grid' => 6,
      'weight' => 0.25,
    ),
    11 => 
    array (
      'grid' => 6,
      'weight' => 0.25,
    ),
    12 => 
    array (
      'grid' => 6,
      'weight' => 0.25,
    ),
    13 => 
    array (
      'grid' => 7,
      'weight' => 0.6999999999999999555910790149937383830547332763671875,
    ),
    14 => 
    array (
      'grid' => 7,
      'weight' => 0.299999999999999988897769753748434595763683319091796875,
    ),
    15 => 
    array (
      'grid' => 8,
      'weight' => 1,
    ),
    16 => 
    array (
      'grid' => 9,
      'weight' => 1,
    ),
    17 => 
    array (
      'grid' => 10,
      'weight' => 1,
    ),
  ),
	   
    ); 
	
    return $layouts;

}
add_filter('siteorigin_panels_prebuilt_layouts','imic_prebuilt_pages');
}
?>