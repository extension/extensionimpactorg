<?php
if (!defined('ABSPATH'))
exit; // Exit if accessed directly
define('ImicFrameworkPath', dirname(__FILE__));
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/*
* Here you include files which is required by theme
*/
require_once(ImicFrameworkPath . '/imic-theme-functions.php');
/* Taxonomy Fields
==================================================*/
require_once(ImicFrameworkPath . '/term_color_picker.php');
require_once(ImicFrameworkPath . '/extra_category_field.php');
/* META BOX FRAMEWORK
================================================== */
require_once(ImicFrameworkPath . '/meta-box/meta-box.php');
require_once(ImicFrameworkPath . '/meta-boxes.php');
require_once(ImicFrameworkPath . '/meta-box/meta-box-show-hide/meta-box-show-hide.php');
/* SHORTCODES
 ================================================== */
require_once (ImicFrameworkPath . '/shortcodes.php');
/* MEGA MENU
	================================================== */  
require_once(ImicFrameworkPath . '/imic-megamenu/imic-megamenu.php');
/* CUSTOM POST TYPES
================================================== */
require_once(ImicFrameworkPath . '/custom-post-types/gallery-type.php');
require_once(ImicFrameworkPath . '/custom-post-types/staff-type.php');
require_once(ImicFrameworkPath . '/custom-post-types/project-type.php');
require_once(ImicFrameworkPath . '/custom-post-types/event-type.php');
/* PLUGIN INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/tgm/plugin-includes.php');
/* WIDGETS INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/widgets/upcoming_events.php');
require_once(ImicFrameworkPath . '/widgets/selected_post.php');
require_once(ImicFrameworkPath . '/widgets/custom_category.php');
require_once(ImicFrameworkPath . '/widgets/twitter_feeds/twitter_feeds.php');
require_once(ImicFrameworkPath . '/widgets/InstaGram/insta_gallery.php');
require_once(ImicFrameworkPath . '/widgets/team_widget.php');
require_once(ImicFrameworkPath . '/widgets/latest_gallery.php');
/* Woocommerce INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/imic-woocommerce.php');
/* LOAD STYLESHEETS
================================================== */
if (!function_exists('imic_enqueue_styles'))
{
	function imic_enqueue_styles()
	{
		global $imic_options;
		$theme_info = wp_get_theme();
			wp_register_style('imic_bootstrap', IMIC_THEME_PATH . '/css/bootstrap.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_bootstrap_theme', IMIC_THEME_PATH . '/css/bootstrap-theme.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_fontawesome', IMIC_THEME_PATH . '/css/font-awesome.min.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_animations', IMIC_THEME_PATH . '/css/animations.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_gfont1', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic', array(), NULL, 'all');
			wp_register_style('imic_gfont2', '//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700', array(), NULL, 'all');
			wp_register_style('imic_main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_prettyPhoto', IMIC_THEME_PATH . '/vendor/prettyphoto/css/prettyPhoto.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_owl1', IMIC_THEME_PATH . '/vendor/owl-carousel/css/owl.carousel.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_owl2', IMIC_THEME_PATH . '/vendor/owl-carousel/css/owl.theme.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_magnific_popup', IMIC_THEME_PATH . '/vendor/magnific-popup/magnific-popup.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_colors', IMIC_THEME_PATH . '/colors/' . $imic_options['theme_color_scheme'], array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_fullcalendar_css', IMIC_THEME_PATH . '/vendor/fullcalendar/fullcalendar.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_fullcalendar_print', IMIC_THEME_PATH . '/vendor/fullcalendar/fullcalendar.print.css', array(), $theme_info->get( 'Version' ), 'print');
			wp_register_style('imic_nivo_default', IMIC_THEME_PATH . '/vendor/nivoslider/themes/default/default.css', array(), $theme_info->get( 'Version' ), 'all');
			wp_register_style('imic_nivo_slider', IMIC_THEME_PATH . '/vendor/nivoslider/nivo-slider.css', array(), $theme_info->get( 'Version' ), 'all');
        	wp_register_style('imic_rtl_css', IMIC_THEME_PATH . '/rtl.css', array(), $theme_info->get( 'Version' ), 'all');
			//**Enqueue STYLESHEETPATH**//
			wp_enqueue_style('imic_bootstrap');
			wp_enqueue_style('imic_bootstrap_theme');
			wp_enqueue_style('imic_animations');
			wp_enqueue_style('imic_fontawesome');
			$heading_font_family = (isset($imic_options['headings_font_family']['font-family']))?$imic_options['headings_font_family']['font-family']:'';
			$body_font_family = (isset($imic_options['body_font_family']['font-family']))?$imic_options['body_font_family']['font-family']:'';
			if ($heading_font_family == '')
			{
				wp_enqueue_style('imic_gfont1');
			}
			if ($body_font_family == '')
			{
				wp_enqueue_style('imic_gfont2');
			}
			wp_enqueue_style('imic_main');
			wp_enqueue_style('imic_prettyPhoto');
			wp_enqueue_style('imic_magnific_popup');
			if ($imic_options['enable_rtl'] == 1)
			{
				wp_enqueue_style('imic_rtl_css');
			}
			if ($imic_options['theme_color_type'][0] == 0)
			{
				wp_enqueue_style('imic_colors');
			}
			
			//**End Enqueue STYLESHEETPATH**//
	}
		add_action('wp_enqueue_scripts', 'imic_enqueue_styles', 99);
}
if (!function_exists('imic_enqueue_scripts'))
{
    function imic_enqueue_scripts()
	{
		global $imic_options;
		$theme_info = wp_get_theme();
        $sticky_menu = $imic_options['enable-header-stick'];
		$gmap_api_key = (isset($imic_options['google_map_api']))?$imic_options['google_map_api']:'';
        //**register script**//
		wp_register_script('imic_jquery_modernizr', IMIC_THEME_PATH . '/js/modernizr.js', 'jquery', $theme_info->get( 'Version' ));
		wp_register_script('imic_jquery_prettyphoto', IMIC_THEME_PATH . '/vendor/prettyphoto/js/prettyphoto.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_helper_plugins', IMIC_THEME_PATH . '/js/helper-plugins.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_bootstrap', IMIC_THEME_PATH . '/js/bootstrap.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_init', IMIC_THEME_PATH . '/js/init.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_google_map','//maps.google.com/maps/api/js?sensor=false&key='.$gmap_api_key,array(),$theme_info->get( 'Version' ),true);
		wp_register_script('imic_event_gmap', IMIC_THEME_PATH . '/js/event_gmap.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_waypoints', IMIC_THEME_PATH . '/js/waypoints.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_owl_carousel', IMIC_THEME_PATH . '/vendor/owl-carousel/js/owl.carousel.min.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_owl_carousel_init', IMIC_THEME_PATH . '/vendor/owl-carousel/js/owl.carousel.init.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_flexslider', IMIC_THEME_PATH . '/vendor/flexslider/js/jquery.flexslider.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_jquery_countdown', IMIC_THEME_PATH . '/vendor/countdown/js/jquery.countdown.min.js', array(), $theme_info->get( 'Version' ), true);
		//wp_register_script('imic_fullcalendar_ui', IMIC_THEME_PATH . '/vendor/fullcalendar/jquery-ui.custom.min.js', array(), '', true);
		wp_register_script('imic_fullcalendar', IMIC_THEME_PATH . '/vendor/fullcalendar/fullcalendar.min.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_gcal', IMIC_THEME_PATH . '/vendor/fullcalendar/gcal.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_magnific_gallery', IMIC_THEME_PATH . '/vendor/magnific-popup/jquery.magnific-popup.min.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_calender_events', IMIC_THEME_PATH . '/js/calender_events.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_sg', IMIC_THEME_PATH . '/js/sg.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_nivo_slider', IMIC_THEME_PATH . '/vendor/nivoslider/jquery.nivo.slider.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_gmap', IMIC_THEME_PATH . '/js/googleMap.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_header', IMIC_THEME_PATH . '/js/header.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_print_ticket', IMIC_THEME_PATH . '/js/print-ticket.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_event_pay', IMIC_THEME_PATH . '/js/event_pay.js', array(), $theme_info->get( 'Version' ), true);
		wp_register_script('imic_calender_updated', IMIC_THEME_PATH . '/vendor/fullcalendar/lib/moment.min.js', array(), $theme_info->get( 'Version' ), false);
        //**End register script**//
        //**Enqueue script**//
		wp_enqueue_script('imic_calender_updated');
		wp_enqueue_script('imic_jquery_modernizr');
		wp_enqueue_script('jquery');
		wp_enqueue_script('imic_jquery_prettyphoto');
		wp_enqueue_script('imic_jquery_helper_plugins');
		wp_enqueue_script('imic_jquery_bootstrap');
        wp_enqueue_script('imic_jquery_init');
		if($imic_options['enable-header-stick']==1)
		{ 
			wp_enqueue_script('imic_header');
		}
        wp_localize_script('imic_jquery_init','urlajax_gaea', array('sticky'=>$sticky_menu,'countdown'=>$imic_options['enable_countdown'],'animations'=>isset($imic_options['enable_countdown'])));
		if(isset($imic_options['enable_countdown']) && $imic_options['enable_countdown']==1)
		{ 
			wp_enqueue_script('imic_jquery_countdown'); 
			wp_localize_script('imic_jquery_countdown', 'upcoming_data', array('c_time' =>time()));
		}
        if (is_singular() && comments_open() && get_option('thread_comments'))
		{
            wp_enqueue_script('comment-reply');
        }
        //**End Enqueue script**//
    }
    add_action('wp_enqueue_scripts', 'imic_enqueue_scripts');
}
/* LOAD BACKEND SCRIPTS
  ================================================== */
function imic_admin_scripts()
{
     wp_register_script('imic-admin-functions', IMIC_THEME_PATH . '/js/imic_admin.js', 'jquery', NULL, TRUE);
     wp_enqueue_script('imic-admin-functions');
     if(isset($_REQUEST['taxonomy']))
	 {
		  wp_register_script('imic-upload', IMIC_THEME_PATH . '/js/imic-upload.js', 'jquery', NULL, TRUE);
		  wp_enqueue_media();
		  wp_enqueue_script('imic-upload');
  	}
}
add_action('admin_init', 'imic_admin_scripts');
/* LOAD BACKEND STYLE
  ================================================== */
function imic_admin_styles()
{
    add_editor_style(IMIC_THEME_PATH . '/css/editor-style.css');
	add_editor_style(IMIC_THEME_PATH . '/css/font-awesome.min.css');
    echo '<style>.imic-image-select-repeatable-bg-image{width:50px;}#upload_category_button,#upload_category_button_remove{width:auto !important;}</style>';
}
add_action('admin_head', 'imic_admin_styles');
/* LOAD Page Builder Prebuilt Pages
  ================================================== */
require_once(ImicFrameworkPath . '/page-builder/page-builder.php');
?>