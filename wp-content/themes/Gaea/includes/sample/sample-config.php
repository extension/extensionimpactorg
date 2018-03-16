<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */
if (!class_exists('Redux_Framework_sample_config')) {
load_theme_textdomain('imic-framework-admin', IMIC_FILEPATH . '/language');
    class Redux_Framework_sample_config {
        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;
        public function __construct() {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }
        public function initSettings() {
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();
            // Set the default arguments
            $this->setArguments();
            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();
            // Create the sections and fields
            $this->setSections();
            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }
            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }
        /**
          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.
         * */
        function compiler_action($options, $css) {
            //echo '<h1>The compiler hook has run!</h1>';
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }
              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }
        /**
          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.
          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons
         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'imic-framework-admin'),
                'desc' => __('<p>Did you know that IMIC Framework sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$imic_options</strong></p>', 'imic-framework-admin'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );
            return $sections;
        }
        /**
          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;
            return $args;
        }
        /**
          Filter hook for filtering the default value of any given field. Very useful in development mode.
         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = __('Testing filter hook!','framework');
            return $defaults;
        }
        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);
                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }
        public function setSections() {
            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();
            if (is_dir($sample_patterns_path)) :
                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();
                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {
                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;
            ob_start();
            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';
            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'imic-framework-admin'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','imic-framework-admin'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','imic-framework-admin'); ?>" />
                <?php endif; ?>
                <h4><?php echo $this->theme->display('Name'); ?></h4>
                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'imic-framework-admin'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'imic-framework-admin'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'imic-framework-admin') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'imic-framework-admin') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'imic-framework-admin'), $this->theme->parent()->display('Name'));
            }
            ?>
                </div>
            </div>
            <?php
            $item_info = ob_get_contents();
            ob_end_clean();
            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }
			load_theme_textdomain('imic-framework-admin', IMIC_FILEPATH . '/language');
			$defaultLogo = get_template_directory_uri().'/images/logo.png';
			$defaultAdminLogo = get_template_directory_uri().'/images/logo@2x.png';
			$defaultBannerImages = get_template_directory_uri().'/images/page-header1.jpg';
			$defaultFavicon = '';
			$default_favicon = get_template_directory_uri() . '/images/favicon.ico';
			$default_iphone = get_template_directory_uri() . '/images/apple-iphone.png';
			$default_iphone_retina = get_template_directory_uri() . '/images/apple-iphone-retina.png';
			$default_ipad = get_template_directory_uri() . '/images/apple-ipad.png';
			$default_ipad_retina = get_template_directory_uri() . '/images/apple-ipad-retina.png';
            // ACTUAL DECLARATION OF SECTIONS
	$this->sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('General', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'enable_maintenance',
            'type' => 'switch',
            'title' => __('Enable Maintenance', 'imic-framework-admin'),
            'subtitle' => __('Enable the theme in maintenance mode. Logged in users would be able to see the website and visitors will see a Maintenance mode message.', 'imic-framework-admin'),
            "default" => '0',
            'on' => __('Enabled', 'imic-framework-admin'),
            'off' => __('Disabled', 'imic-framework-admin'),
        ),
        array(
            'id' => 'enable_backtotop',
            'type' => 'switch',
            'title' => __('Enable Back To Top', 'imic-framework-admin'),
            'subtitle' => __('Enable the back to top button that appears in the bottom right corner of the screen.', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'enable_transitions',
            'type' => 'switch',
            'title' => __('CSS3 Animations', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable CSS animation transitions', 'imic-framework-admin'),
            "default" => '1',
        ),
        array(
            'id' => 'enable_rtl',
            'type' => 'switch',
            'title' => __('Enable RTL', 'imic-framework-admin'),
            'subtitle' => __('If you are using wordpress for RTL languages then you should enable this option.', 'imic-framework-admin'),
            "default" => 0,
        ),
       array(
            'id' => 'tracking-code',
            'type' => 'ace_editor',
            'title' => __('Tracking Code', 'imic-framework-admin'),
            'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. DO NOT INCLUDE OPENING AND CLOSING SCRIPT TAG IN THE CODE.', 'imic-framework-admin'),
			'default' => '',
        ),
       array(
            'id' => 'space-before-head',
            'type' => 'ace_editor',
            'title' => __('Space before closing head tag', 'imic-framework-admin'),
            'subtitle' => __('Add your code before closing head tag', 'imic-framework-admin'),
			'default' => '',
        ),
       array(
            'id' => 'space-before-body',
            'type' => 'ace_editor',
            'title' => __('Space before closing body tag', 'imic-framework-admin'),
            'subtitle' => __('Add your code before closing body tag', 'imic-framework-admin'),
			'default' => '',
        ),
    )
);
$this->sections[] = array(
    'icon' => 'el-icon-website',
    'icon_class' => 'icon-large',
    'title' => __('Responsive', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'switch-responsive',
            'type' => 'switch',
            'title' => __('Enable Responsive', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable the responsive behaviour of the theme', 'imic-framework-admin'),
            "default" => 1,
        ),
        array(
            'id' => 'switch-zoom-pinch',
            'type' => 'switch',
            'title' => __('Enable Zoom on mobile devices', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable zoom pinch behaviour on touch devices', 'imic-framework-admin'),
            "default" => 0,
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-screen',
    'title' => __('Layout', 'imic-framework-admin'),
    'fields' => array(
        array(
			'id'=>'site_layout',
			'type' => 'image_select',
			'compiler'=>true,
			'title' => __('Site Layout', 'imic-framework-admin'), 
			'subtitle' => __('Select the layout type', 'imic-framework-admin'),
			'options' => array(
					'wide' => array('alt' => 'Wide', 'img' => get_template_directory_uri().'/images/wide.png'),
					'boxed' => array('alt' => 'Boxed', 'img' => get_template_directory_uri().'/images/boxed.png')
			),
			'default' => 'wide',
		),
		array(
			'id'=>'repeatable-bg-image',
			'type' => 'image_select',
			'required' => array('site_layout','equals','boxed'),
			'title' => __('Repeatable Background Images', 'imic-framework-admin'), 
			'subtitle' => __('Select image to set in background.', 'imic-framework-admin'),
			'options' => array(
				'pt1.png' => array('alt' => 'pt1', 'img' => get_template_directory_uri().'/images/patterns-t/pt1.png'),
				'pt2.png' => array('alt' => 'pt2', 'img' => get_template_directory_uri().'/images/patterns-t/pt2.png'),
				'pt3.png' => array('alt' => 'pt3', 'img' => get_template_directory_uri().'/images/patterns-t/pt3.png'),
				'pt4.png' => array('alt' => 'pt4', 'img' => get_template_directory_uri().'/images/patterns-t/pt4.png'),
				'pt5.png' => array('alt' => 'pt5', 'img' => get_template_directory_uri().'/images/patterns-t/pt5.png'),
				'pt6.png' => array('alt' => 'pt6', 'img' => get_template_directory_uri().'/images/patterns-t/pt6.png'),
				'pt7.png' => array('alt' => 'pt7', 'img' => get_template_directory_uri().'/images/patterns-t/pt7.png'),
				'pt8.png' => array('alt' => 'pt8', 'img' => get_template_directory_uri().'/images/patterns-t/pt8.png'),
				'pt9.png' => array('alt' => 'pt9', 'img' => get_template_directory_uri().'/images/patterns-t/pt9.png'),
				'pt10.png' => array('alt' => 'pt10', 'img' => get_template_directory_uri().'/images/patterns-t/pt10.png'),
				'pt11.jpg' => array('alt' => 'pt11', 'img' => get_template_directory_uri().'/images/patterns-t/pt11.png'),
				'pt12.jpg' => array('alt' => 'pt12', 'img' => get_template_directory_uri().'/images/patterns-t/pt12.png'),
				'pt13.jpg' => array('alt' => 'pt13', 'img' => get_template_directory_uri().'/images/patterns-t/pt13.png'),
				'pt14.jpg' => array('alt' => 'pt14', 'img' => get_template_directory_uri().'/images/patterns-t/pt14.png'),
				'pt15.jpg' => array('alt' => 'pt15', 'img' => get_template_directory_uri().'/images/patterns-t/pt15.png'),
				'pt16.png' => array('alt' => 'pt16', 'img' => get_template_directory_uri().'/images/patterns-t/pt16.png'),
				'pt17.png' => array('alt' => 'pt17', 'img' => get_template_directory_uri().'/images/patterns-t/pt17.png'),
				'pt18.png' => array('alt' => 'pt18', 'img' => get_template_directory_uri().'/images/patterns-t/pt18.png'),
				'pt19.png' => array('alt' => 'pt19', 'img' => get_template_directory_uri().'/images/patterns-t/pt19.png'),
				'pt20.png' => array('alt' => 'pt20', 'img' => get_template_directory_uri().'/images/patterns-t/pt20.png'),
				'pt21.png' => array('alt' => 'pt21', 'img' => get_template_directory_uri().'/images/patterns-t/pt21.png'),
				'pt22.png' => array('alt' => 'pt22', 'img' => get_template_directory_uri().'/images/patterns-t/pt22.png'),
				'pt23.png' => array('alt' => 'pt23', 'img' => get_template_directory_uri().'/images/patterns-t/pt23.png'),
				'pt24.png' => array('alt' => 'pt24', 'img' => get_template_directory_uri().'/images/patterns-t/pt24.png'),
				'pt25.png' => array('alt' => 'pt25', 'img' => get_template_directory_uri().'/images/patterns-t/pt25.png'),
				'pt26.png' => array('alt' => 'pt26', 'img' => get_template_directory_uri().'/images/patterns-t/pt26.png'),
				'pt27.png' => array('alt' => 'pt27', 'img' => get_template_directory_uri().'/images/patterns-t/pt27.png'),
				'pt28.png' => array('alt' => 'pt28', 'img' => get_template_directory_uri().'/images/patterns-t/pt28.png'),
				'pt29.png' => array('alt' => 'pt29', 'img' => get_template_directory_uri().'/images/patterns-t/pt29.png'),
				'pt30.png' => array('alt' => 'pt30', 'img' => get_template_directory_uri().'/images/patterns-t/pt30.png')
				)
		),	
		array(
			'id'=>'upload-repeatable-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => __('Upload Repeatable Background Image', 'imic-framework-admin')
		),
		array(
			'id'=>'full-screen-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => __('Upload Full Screen Background Image', 'imic-framework-admin')
		),	
		array(
            'id' => 'site_width',
            'type' => 'text',
            'title' => __('Site width in pixels. DO NOT PUT px HERE', 'imic-framework-admin'),
            'subtitle' => __('Width of the site container.', 'imic-framework-admin'),
            'default' => '1040'
        ),
		
    ),
);

$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Content', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
		array(  'id' => 'content_background',
				'type' => 'background',
				'background-color'=> true,
				'output' => array('.content'),
				'title' => __('Content area Background', 'framework'),
    			'subtitle' => __('Background color or image for the content area. This works for both boxed or wide layouts.', 'imic-framework-admin'),
				'default' => array(
					'background-color' => '#ffffff'
				)
		),
		array(
			'id'       => 'content_padding',
			'type'     => 'spacing',
			'units'    => array('px'),
			'mode'	   => 'padding',
			'left'	   => false,
			'right'	   => false,
			'output'   => array('.content'),
			'title'    => __('Top and Bottom padding for content area', 'framework'),
			'subtitle' => __('Enter top and bottom padding for content area. Default is 50px/50px', 'framework'),
			'default'            => array(
			'padding-top'     => '50px',
			'padding-bottom'  => '50px',
			'units'          => 'px',
			),
		),
		array(
			'id'       => 'content_min_height',
			'type'     => 'text',
			'title'    => __('Minimum Height for Content area', 'framework'),
			'subtitle' => __('Enter minimum height for the page content area. DO NOT PUT px HERE. Default is 400', 'framework'),
			'default'  => '400'
		),
        array(
			'id'=>'content_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => __('100% Content Width', 'imic-framework-admin'), 
			'subtitle' => __('Check this box to set the content area to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'imic-framework-admin'),
			'default' => '0',
		),

	)
);
$this->sections[] = array(
    'icon' => 'el-icon-chevron-up',
    'title' => __('Header', 'imic-framework-admin'),
    'desc' => __('These are the options for the header.', 'imic-framework-admin'),
    'fields' => array(
        array(
    		'id' => 'header_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => __('Header Layout','imic-framework-admin'), 
			'subtitle' => __('Select a Header Design', 'imic-framework-admin'),
    			'options' => array(
					'1' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerLayout/header-1.jpg'),
    				'2' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerLayout/header-2.jpg'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerLayout/header-3.jpg'),
    				),
    		'default' => '1'
    	),
		array(  'id' => 'header_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.lower-header'),
				'title' => __('Header(Logo Area) Translucent Background Color', 'imic-framework-admin'),
				'subtitle'=> __('Default: rgba(255, 255, 255, 0.9)','imic-framework-admin'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
				'default'   => array(
					'color'     => '#ffffff',
					'alpha'     => .9
				),
		),
		array(  'id' => 'header_background',
				'type' => 'background',
				'background-color'=> false,
				'output' => array('.lower-header'),
				'title' => __('Header(Logo Area) Background Image', 'framework'),
    			'subtitle' => __('Background image for the header.', 'imic-framework-admin')
		),
        array(
            'id' => 'full_width_header',
            'type' => 'checkbox',
			'required' => array('header_layout','!=','1'),
            'title' => __('100% Header Width', 'imic-framework-admin'),
            'subtitle' => __('Check this box to set header width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'header_dropshadow',
            'type' => 'checkbox',
			'required' => array('header_layout','=','1'),
            'title' => __('Header Drop Shadow', 'imic-framework-admin'),
            'subtitle' => __('Uncheck to disable drop shadow on header. Check to enable.', 'imic-framework-admin'),
            "default" => 1,
        ),
		array(
            'id' => 'header_border_radius',
            'type' => 'text',
			'required' => array('header_layout','=','1'),
            'title' => __('Header Border Radius', 'imic-framework-admin'),
			'subtitle' => __('Enter the value for border radius on header bottom.', 'imic-framework-admin'),
            'desc' => __('DO NOT PUT px HERE. Ex: 5', 'imic-framework-admin'),
            'default' => '5'
        ),
        array(
			  'id' => 'header_social_links',
			  'type' => 'sortable',
			  'label' => true,
			  'compiler'=>true,
			  'title' => __('Social Links', 'imic-framework-admin'),
			  'desc' => __('Enter the social links and sort to active and display according to sequence in header.', 'imic-framework-admin'),
			  'options' => array(
				  'fa-facebook-square' => 'facebook',
				  'fa-twitter-square' => 'twitter',
				  'fa-pinterest' => 'pinterest',
				  'fa-google-plus' => 'google',
				  'fa-youtube' => 'youtube',
				  'fa-instagram' => 'instagram',
				  'fa-vimeo-square' => 'vimeo',
				  'fa-rss' => 'rss',
				  'fa-dribbble' => 'dribbble',
				  'fa-dropbox' => 'dropbox',
				  'fa-bitbucket' => 'bitbucket',
				  'fa-flickr' => 'flickr',
				  'fa-foursquare' => 'foursquare',
				  'fa-github' => 'github',
				  'fa-gittip' => 'gittip',
				  'fa-linkedin' => 'linkedin',
				  'fa-pagelines' => 'pagelines',
				  'fa-skype' => 'skype',
				  'fa-tumblr' => 'tumblr',
				  'fa-vk' => 'vk'
				  ),
		  	)
		),
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Sticky Header', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable-header-stick',
            'type' => 'switch',
            'title' => __('Enable Sticky Header', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable Sticky header behaviour of the theme', 'imic-framework-admin'),
            "default" => 1,
        ),
		array(
            'id' => 'sticky_header_height',
            'type' => 'text',
            'title' => __('Header height when its sticky. DO NOT PUT px HERE.', 'imic-framework-admin'),
            'desc' => __('The logo in sticky header will be of this height as well.', 'imic-framework-admin'),
            'default' => '60'
        ),
        array(
            'id' => 'header-stick-tablets',
            'type' => 'switch',
            'title' => __('Enable Sticky Header on Tablets', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable Sticky header on scroll on Tablets', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'header-stick-mobiles',
            'type' => 'switch',
            'title' => __('Enable Sticky Header on Mobiles', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable Sticky header on scroll on Mobiles', 'imic-framework-admin'),
            "default" => 0,
        ),
		array(  'id' => 'sticky_header_background_alpha',
				'type' => 'color_rgba',
				'required' 	=> array('header_layout','!=','3'),
				'output' => array('background-color' => '.is-sticky .lower-header'),
				'title' => __('Sticky Header(Logo Area) Translucent Background Color', 'imic-framework-admin'),
				'subtitle'=> __('Default: rgba(255, 255, 255, 0.9)','imic-framework-admin'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
				'default'   => array(
					'color'     => '#ffffff',
					'alpha'     => .9
				),
		),
		array(  'id' => 'sticky_header_background',
				'type' => 'background',
				'background-color'=> false,
				'required' 	=> array('header_layout','!=','3'),
				'output' => array('.is-sticky .lower-header'),
				'title' => __('Sticky Header(Logo Area) Background Image', 'framework'),
    			'subtitle' => __('Background color or image for the header.', 'imic-framework-admin')
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Top Bar', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable-top-bar',
            'type' => 'switch',
            'title' => __('Enable Top Bar', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable top bar just above your main header', 'imic-framework-admin'),
            "default" => 1,
        ),
		array(
            'id' => 'enable_countdown',
            'type' => 'switch',
            'title' => __('Enable Event Countdown', 'imic-framework-admin'),
            'subtitle' => __('Enable event countdown in header sitewide.', 'imic-framework-admin'),
            "default" => 1,
        ),
		array(
            'id' => 'header_left_text',
			'required' => array('enable_countdown','equals','0'),
            'type' => 'text',	
            'title' => __('Custom Text', 'imic-framework-admin'),
            'desc' => __('Enter custom text instead of countdown.', 'imic-framework-admin'),
			'default' => '',
        ),
		array(  'id' => 'topbar_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.top-header'),
				'title' => __('Topbar Background Color', 'imic-framework-admin'),
				'subtitle'=> __('Default: #292929', 'imic-framework-admin'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
				'default'   => array(
					'color'     => '#292929',
					'alpha'     => 1
				),
		),
		array(
            'id' => 'topbar_height',
            'type' => 'text',
            'title' => __('Height of TopBar', 'imic-framework-admin'),
            'desc' => __('Button links and social icons line height will take this as their line height value. DO NOT PUT px HERE.', 'imic-framework-admin'),
            'default' => '37'
        ),
        array(
			'id'          => 'topbar_typo',
			'type'        => 'typography',
			'title'       => __('TopBar left typography', 'framework'),
			'subtitle'       => __('', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => false,
			'text-transform'=> true,
			'letter-spacing' => true,
			'output'      => array('.top-header-left, .top-custom-text, .upcoming-event-bar h4,.timer-col #days, .timer-col #hours, .timer-col #minutes, .timer-col #seconds'),
			'units'       =>'px',
		),
		array(
			'id'       => 'event_counters_border',
			'type'     => 'border',
			'title'    => __('Upcoming event counter separator border', 'framework'),
			'output'   => array('.counter .timer-col, .upcoming-event-bar h4'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => true,
			'bottom' 	   => false,
			'default'  => array(
				'border-color'  => '#3D474C',
				'border-style'  => 'solid',
				'border-width' => '1px',
			)
		),
        array(
			'id'          => 'topbar_social_size',
			'type'        => 'text',
			'title'       => __('TopBar Social Icons font size', 'framework'),
			'subtitle'       => __('DO NOT PUT px HERE', 'framework'),
			'default' => '18'
		),
		array(
			'id'       => 'top_social_link_color',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('TopBar Social Icons Link Color', 'framework'),
			'desc'     => __('Set the social icons links color, hover, active.', 'framework'),
			'output'   => array('.top-header .social-links li a'),
		),
		array(
			'id'       => 'top_social_link_color_v3',
			'type'     => 'link_color',
			'required' => array('header_layout','equals','3'),
			'title'    => __('TopBar Social Icons Link Color', 'framework'),
			'desc'     => __('Set the social icons links color, hover, active.', 'framework'),
			'output'   => array('.header-v3 .lower-header .social-links a'),
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Inner page header', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'header_image',
            'type' => 'media',
            'url' => true,
            'title' => __('Header Image', 'imic-framework-admin'),
            'desc' => __('Default header image for post types.', 'imic-framework-admin'),
            'subtitle' => __('Set this image as default header image for all Page/Post/Event/Sermons/Gallery.', 'imic-framework-admin'),
            'default' => array('url' => ''),
        ),
		array(
            'id' => 'inner_header',
            'type' => 'background',
			'output'   => array('.page-header'),
            'title' => __('Default Color or Image for Inside pages/posts', 'imic-framework-admin'),
            'desc' => __('Default header for all post types, pages. This will override all single header banner image/color set.', 'imic-framework-admin'),
        ),
		array(
            'id' => 'inner_header_height',
            'type' => 'text',
            'title' => __('Default height for inside page header', 'imic-framework-admin'),
            'desc' => __('DO NOT PUT px HERE.', 'imic-framework-admin'),
            'subtitle' => __('Default page header height for inner pages. It will override individual page header heights.', 'imic-framework-admin'),
			'default' => ''
        ),
		array(
			'id'       => 'page_header_border',
			'type'     => 'border',
			'title'    => __('Inside page border bottom', 'framework'),
			'output'   => array('.page-header'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true,
		),
        array(
            'id' => 'show_page_title',
            'type' => 'checkbox',
            'title' => __('Show page title', 'imic-framework-admin'),
            'subtitle' => __('Uncheck to hide page title from header. Check to enable.', 'imic-framework-admin'),
            "default" => 1,
        ),
        array(
			'id'          => 'page_title_typo',
			'type'        => 'typography',
			'title'       => __('Page title typography', 'framework'),
			'subtitle'       => __('', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'font-family' => true,
			'font-style'  => true,
			'font-weight' => true,
			'preview' 	  => true,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => false,
			'text-transform'=> true,
			'letter-spacing' => true,
			'output'      => array('.page-header h2'),
			'units'       =>'px',
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-upload',
    'title' => __('Logo', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => __('Upload Logo', 'imic-framework-admin'),
            'subtitle' => __('Upload site logo to display in header.', 'imic-framework-admin'),
            'default' => array('url' => $defaultLogo, 'height' => 41),
        ),
        array(
            'id' => 'retina_logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => __('Upload Logo for Retina Devices', 'imic-framework-admin'),
            'desc' => __('Retina Display is a marketing term developed by Apple to refer to devices and monitors that have a resolution and pixel density so high – roughly 300 or more pixels per inch', 'imic-framework-admin'),
            'subtitle' => __('Upload site logo to display in header.', 'imic-framework-admin'),
            'default' => array('url' => $defaultAdminLogo),
        ),
		array(
            'id' => 'retina_logo_width',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Width for Retina Logo', 'imic-framework-admin'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'imic-framework-admin'),
            'default' => '211'
        ),
		array(
            'id' => 'retina_logo_height',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Height for Retina Logo', 'imic-framework-admin'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'imic-framework-admin'),
            'default' => '41'
        ),
	)
);

$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Admin Logo', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_admin_login_logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Custom admin login logo', 'imic-framework-admin'),
            'compiler' => 'true',
            'desc' => __('Upload a 254 x 95px image here to replace the WP admin login screen logo.', 'imic-framework-admin'),
            'subtitle' => __('', 'imic-framework-admin'),
            'default' => array('url' => $defaultLogo),
        )
	)
);

$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Favicon Options', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_favicon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Custom favicon', 'imic-framework-admin'),
            'desc' => __('Upload a image that will represent your website favicon', 'imic-framework-admin'),
            'default' => array('url' => $default_favicon),
        ),
        array(
            'id' => 'iphone_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPhone Icon', 'imic-framework-admin'),
            'desc' => __('Upload Favicon for Apple iPhone (57px x 57px)', 'imic-framework-admin'),
            'default' => array('url' => $default_iphone),
        ),
        array(
            'id' => 'iphone_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPhone Retina Icon', 'imic-framework-admin'),
            'desc' => __('Upload Favicon for Apple iPhone Retina Version (114px x 114px)', 'imic-framework-admin'),
            'default' => array('url' => $default_iphone_retina),
        ),
        array(
            'id' => 'ipad_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPad Icon', 'imic-framework-admin'),
            'desc' => __('Upload Favicon for Apple iPad (72px x 72px)', 'imic-framework-admin'),
            'default' => array('url' => $default_ipad),
        ),
        array(
            'id' => 'ipad_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPad Retina Icon Upload', 'imic-framework-admin'),
            'desc' => __('Upload Favicon for Apple iPad Retina Version (144px x 144px)', 'imic-framework-admin'),
            'default' => array('url' => $default_ipad_retina),
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-tasks',
    'title' => __('Menu', 'imic-framework-admin'),
    'desc' => __('These are the options for the menu.', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'enable-search',
            'type' => 'switch',
            'title' => __('Enable search with menu', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable search icon next to your main menu to open search form', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'enable-cart',
            'type' => 'switch',
            'title' => __('Enable cart with menu', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable cart icon next to your main menu to open cart', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'directions_arrows',
            'type' => 'checkbox',
            'title' => __('Direction arrows with menu label', 'imic-framework-admin'),
            'subtitle' => __('Uncheck to disable arrows that appear with menu text which is having dropdown. Check to enable.', 'imic-framework-admin'),
            "default" => 1,
        ),
        array(
            'id' => 'nav_items_spacing',
            'type' => 'text',
            'title' => __('Space between nav items', 'imic-framework-admin'),
            'subtitle' => __('Enter space between each nav item. DON NOT PUT px HERE with number. Default is 24', 'imic-framework-admin'),
        ),
		array(
			'id'       => 'main_nav_link',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('Main Navigation Link Color', 'framework'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'framework'),
			'output'   => array('.main-navigation > ul > li > a'),
		),
		array(
			'id'       => 'fw_main_nav_link',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Main Navigation Link Color', 'framework'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'framework'),
			'output'   => array('.full-width-menu .main-navigation > ul > li > a'),
		),
		array(
            'id' => 'fw_menu_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','=','3'),
			'output' => array('.full-width-menu'),
            'title' => __('Background color the navigation bar', 'imic-framework-admin'),
            'desc' => __('Background color set for the full width main navigation in header style 3.', 'imic-framework-admin'),
        ),
		array(
            'id' => 'dd_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','!=','3'),
			'output' => array('.main-navigation > ul > li ul'),
            'title' => __('Background color for dropdown menus', 'imic-framework-admin'),
            'desc' => __('Background color set for the dropdowns of main navigation.', 'imic-framework-admin'),
        ),
		array(
            'id' => 'fw_dd_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','=','3'),
			'output' => array('.full-width-menu .main-navigation > ul > li ul'),
            'title' => __('Background color for dropdown menus', 'imic-framework-admin'),
            'desc' => __('Background color set for the dropdowns of main navigation.', 'imic-framework-admin'),
			'default' => array(
					'background-color' => '#ffffff'
				)
        ),
        array(
            'id' => 'dd_arrows',
            'type' => 'checkbox',
            'title' => __('Arrow on Dropdowns', 'imic-framework-admin'),
            'subtitle' => __('Uncheck to disable arrow that appear in top of DropDown div.  Check to enable.', 'imic-framework-admin'),
            "default" => 1,
        ),
        array(
            'id' => 'dd_dropshadow',
            'type' => 'checkbox',
            'title' => __('Dropdowns Drop Shadow', 'imic-framework-admin'),
            'subtitle' => __('Uncheck to disable drop shadow on dropdown div. Check to enable.', 'imic-framework-admin'),
            "default" => 1,
        ),
		array(
            'id' => 'dd_border_radius',
            'type' => 'text',
            'title' => __('Dropdowns Border Radius', 'imic-framework-admin'),
			'subtitle' => __('Enter the value for border radius on dropdowns div bottom.', 'imic-framework-admin'),
            'desc' => __('DO NOT PUT px HERE. Ex: 4', 'imic-framework-admin'),
            'default' => '4'
        ),
		array(
			'id'       => 'dd_item_border',
			'type'     => 'border',
			'title'    => __('Dropdown links border bottom', 'framework'),
			'output'   => array('.main-navigation > ul > li > ul li > a'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'dd_item_spacing',
			'type'     => 'spacing',
			'title'    => __('Dropdown links spacing', 'framework'),
			'output'   => array('.main-navigation > ul > li > ul li > a'),
			'mode' 	   => 'padding',
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '10', 
						'padding-right'   => '20', 
						'padding-bottom'  => '10', 
						'padding-left'    => '20',
						'units'          => 'px', 
					)
		),
		array(
			'id'       => 'dd_item_link_color',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('Dropdown links color', 'framework'),
			'output'   => array('.main-navigation > ul > li > ul li > a')
		),
		array(
			'id'       => 'fw_dd_item_link_color',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Dropdown links color', 'framework'),
			'output'   => array('.full-width-menu .main-navigation > ul > li > ul li > a')
		),
		array(
			'id'       => 'mm_padding',
			'type'     => 'spacing',
			'title'    => __('Megamenu block spacing', 'framework'),
			'output'   => array('.main-navigation .megamenu-container'),
			'mode' 	   => 'padding',
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '25', 
						'padding-right'   => '25', 
						'padding-bottom'  => '25', 
						'padding-left'    => '25',
						'units'          => 'px', 
					)
		),
		array(
			'id'       => 'mm_column_title',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Column Title', 'framework'),
			'output'   => array('.main-navigation .megamenu-container .megamenu-sub-title')
		),
		array(
			'id'       => 'mm_column_title_border',
			'type'     => 'border',
			'title'    => __('Megamenu Column Title border bottom', 'framework'),
			'output'   => array('.main-navigation .megamenu-container .megamenu-sub-title'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'mm_typography',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Text Typography', 'framework'),
			'output'   => array('.main-navigation .megamenu-container')
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Mobile menu', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'mobile_menu_icon',
            'type'        => 'typography',
			'required' 	=> array('header_layout','!=','3'),
			'title'       => __('Mobile Menu Font', 'framework'),
			'line-height' => false,
			'output'      => array('#menu-toggle'),
			'units'       =>'px',
            'default' => array(
             	'font-size' => '20px',
				'color' => '#555555',
              ),
        ),
        array(
            'id' => 'fw_mobile_menu_icon',
            'type'        => 'typography',
			'required' 	=> array('header_layout','=','3'),
			'title'       => __('Mobile Menu Font', 'framework'),
			'line-height' => false,
			'output'      => array('.header-v3 #menu-toggle'),
			'units'       =>'px',
            'default' => array(
             	'font-size' => '20px',
				'color' => '#555555',
              ),
        ),
		array(
            'id' => 'mobile_menu_text',
            'type' => 'text',
            'title' => __('Show text with mobile menu icon', 'imic-framework-admin'),
            'subtitle' => __('Enter text you want to show next to mobile menu icon. Keep it short and sweet. Eg: Menu', 'imic-framework-admin'),
			'default'=> ''
        ),
		array(
            'id' => 'mobile_menu_bg',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
            'title' => __('Background color for mobile menu dropdown', 'imic-framework-admin'),
            'desc' => __('Background color set for mobile menu dropdown.', 'imic-framework-admin'),
        ),
		array(
			'id'       => 'mobile_menu_link_color',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('Mobile menu links color', 'framework'),
		),
		array(
			'id'       => 'fw_mobile_menu_link_color',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Mobile menu links color', 'framework'),
		),
		array(
			'id'       => 'mobile_dd_item_border',
			'type'     => 'border',
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('Mobile menu links border bottom', 'framework'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'fw_mobile_dd_item_border',
			'type'     => 'border',
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Mobile menu links border bottom', 'framework'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'mobile_dd_item_spacing',
			'type'     => 'spacing',
			'title'    => __('Mobile menu links spacing', 'framework'),
			'mode' 	   => 'padding',
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '10', 
						'padding-right'   => '20', 
						'padding-bottom'  => '10', 
						'padding-left'    => '20',
						'units'          => 'px', 
					)
		),
		array(
			'id'       => 'mobile_dd_text_align',
			'type'     => 'button_set',
			'title'    => __('Mobile menu links align', 'framework'),
			'desc'     => __('Choose the text alignment for the mobile menu links', 'framework'),
			'options' => array(
				'left' => 'Left', 
				'center' => 'Center', 
				'right' => 'Right'
			 ), 
			'default' => 'left'
		)
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-minus',
    'title' => __('Secondary Bar', 'imic-framework-admin'),
    'desc' => __('These are the options for the inside page secondary bar that comes below page header.', 'imic-framework-admin'),
    'fields' => array(	
		array(
            'id' => 'sec_bar_bg',
            'type' => 'background',
			'output' => array('.secondary-bar'),
            'title' => __('Background color/image', 'imic-framework-admin'),
            'desc' => __('Choose background color or image for the secondary bar.', 'imic-framework-admin')
        ),
		array(
			'id'       => 'sec_bar_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Top/Bottom padding', 'framework'),
            'desc' => __('Enter top and bottom spacing for the secondary bar. DO NOT ENTER px HERE.', 'imic-framework-admin'),
			'mode' 	   => 'padding',
			'output' => array('.secondary-bar'),
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '20', 
						'padding-bottom'  => '20', 
						'units'          => 'px', 
					)
		),
        array(
            'id' => 'sec_bar_typo',
            'type'        => 'typography',
			'title'       => __('Secondary Bar title typography', 'framework'),
			'line-height' => false,
			'output'      => array('.secondary-bar span.big'),
			'units'       =>'px',
        ),
        array(
            'id' => 'sec_bar_btn_bg',
            'type'        => 'background',
			'title'       => __('Secondary Bar button Background Color', 'framework'),
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output'      => array('.secondary-bar .btn'),
        ),
		array(
			'id'       => 'sec_bar_btn_color',
			'type'     => 'link_color',
			'title'    => __('Secondary Bar button text color', 'framework'),
            'desc' => __('These settings will apply to button text color', 'imic-framework-admin'),
			'output'      => array('.secondary-bar .btn'),
		),
		array(
			'id'       => 'sec_bar_btn_icon',
			'type'     => 'text',
			'title'    => __('Secondary Bar button icon', 'framework'),
            'desc' => __('Enter the Font Awesome icon class for the button on secondary bar. Leave blank to hide the icon. Find icon classes here: http://fontawesome.io/cheatsheet/', 'imic-framework-admin'),
			'default' => 'fa-heart-o',
		),
    ),
);
$this->sections[] = array(
    'icon' => 'el-icon-chevron-down',
    'title' => __('Footer', 'imic-framework-admin'),
    'desc' => __('<p class="description">These are the options for the footer.</p>', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'full_width_footer',
            'type' => 'checkbox',
            'title' => __('100% Footer Width', 'imic-framework-admin'),
            'subtitle' => __('Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'imic-framework-admin'),
            "default" => 0,
        ),
        array(
            'id' => 'footer_top_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Widgets Area', 'imic-framework-admin'),
        ),
		array(
    		'id' => 'footer_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => __('Footer Layout', 'imic-framework-admin'), 
			'subtitle' => __('Select the footer layout for widgeted area', 'imic-framework'),
    			'options' => array(
					'12' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-1.png'),
    				'6' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-2.png'),
    				'4' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-3.png'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-4.png'),
					'2' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-5.png'),
    							),
    		'default' => '3'
    	),	
        array(
			'id'          => 'tfooter_bg',
			'type'        => 'background',
			'title'       => __('Footer widget area background', 'framework'),
			'subtitle'    => __('Default: #2F2F2F', 'framework'),
			'output'      => array('.site-top-footer'),
		),
		array(
			'id'       => 'footer_top_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer widgets area Top/Bottom padding', 'framework'),
            'desc' => __('Enter top and bottom spacing for the footer widget area. DO NOT ENTER px HERE.', 'imic-framework-admin'),
			'mode' 	   => 'padding',
			'output' => array('.site-top-footer'),
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '40', 
						'padding-bottom'  => '40', 
						'units'          => 'px', 
					)
		),
        array(
			'id'          => 'tfooter_border',
			'type'        => 'border',
			'title'       => __('Footer widgets area border top', 'framework'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-top-footer'),
		),
        array(
			'id'          => 'widgettitle_typo',
			'type'        => 'typography',
			'color' 		  => false,
			'text-transform' => true,
			'title'       => __('Footer widgets title typography', 'framework'),
			'output'      => array('.footer-widget .widgettitle'),
		),
        array(
			'id'          => 'widgettitle_color',
			'type'        => 'color',
			'title'       => __('Footer widgets title color', 'framework'),
			'subtitle'    => __('Default: #cccccc', 'framework'),
			'output'      => array('.footer-widget .widgettitle'),
		),
        array(
			'id'          => 'tfwidget_typo',
			'type'        => 'typography',
			'color' 		  => false,
			'text-transform' => true,
			'title'       => __('Footer widgets area text typography', 'framework'),
			'output'      => array('.site-top-footer'),
		),
        array(
			'id'          => 'tfooter_color',
			'type'        => 'color',
			'title'       => __('Footer widgets area text color', 'framework'),
			'subtitle'    => __('Default: #8A8A8A', 'framework'),
			'output'      => array('.site-top-footer'),
		),
        array(
			'id'          => 'tfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer widgets area links color', 'framework'),
			'subtitle'    => __('Default: #cccccc', 'framework'),
			'output'      => array('.site-top-footer a'),
			'default'     => array(),
		),
        array(
            'id' => 'footer_bottom_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Copyrights Area', 'imic-framework-admin'),
        ),
        array(
            'id' => 'footer_bottom_enable',
            'type' => 'checkbox',
            'title' => __('Enable Footer copyrights area', 'imic-framework-admin'),
            'desc' => __('Uncheck to disabled footer copyrights area that shows below the footer widgets area.', 'imic-framework-admin'),
			'default' => 1
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'textarea',
            'title' => __('Footer Copyright Text', 'imic-framework-admin'),
            'subtitle' => __(' Enter Copyright Text', 'imic-framework-admin'),
            'default' => __('All Rights Reserved', 'imic-framework-admin')
        ),
        array(
			'id'          => 'bfooter_bg',
			'type'        => 'background',
			'title'       => __('Footer copyrights area background', 'imic-framework-admin'),
			'subtitle'    => __('Default: #292929', 'imic-framework-admin'),
			'output'      => array('.site-bottom-footer'),
		),
		array(
			'id'       => 'footer_bottom_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer copyrights area Top/Bottom padding', 'imic-framework-admin'),
            'desc' => __('Enter top and bottom spacing for the footer copyrights area. DO NOT ENTER px HERE.', 'imic-framework-admin'),
			'mode' 	   => 'padding',
			'output' => array('.site-bottom-footer'),
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '20', 
						'padding-bottom'  => '20', 
						'units'          => 'px', 
					)
		),
        array(
			'id'          => 'bfooter_border',
			'type'        => 'border',
			'title'       => __('Footer copyrights area border top', 'framework'),
			'subtitle'    => __('Default: 1 solid #252525', 'framework'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-bottom-footer'),
		),
        array(
			'id'          => 'bfwidget_typo',
			'type'        => 'typography',
			'color' 		  => false,
			'text-transform' => true,
			'title'       => __('Footer copyrights area text typography', 'framework'),
			'output'      => array('.site-bottom-footer'),
		),
        array(
			'id'          => 'bfooter_color',
			'type'        => 'color',
			'title'       => __('Footer copyrights area text color', 'framework'),
			'subtitle'    => __('Default: #666666', 'framework'),
			'output'      => array('.site-bottom-footer, .site-bottom-footer p'),
		),
        array(
			'id'          => 'bfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer copyrights area links color', 'framework'),
			'subtitle'    => __('Default: #cccccc', 'framework'),
			'output'      => array('.site-bottom-footer a'),
		),
    ),
);
$this->sections[] = array(
    'icon' => 'el-icon-indent-left',
    'title' => __('Sidebars', 'imic-framework-admin'),
    'fields' => array(
        array(
    		'id' => 'sidebar_position',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => __('Sidebar position','imic-framework-admin'), 
			'subtitle' => __('Select the Global Sidebar Position. Can be overridden by page sidebar settings.', 'imic-framework-admin'),
    			'options' => array(
    				'2' => array('title' => 'Left', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
					'1' => array('title' => 'Right', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
    				),
    		'default' => '1'
    	),
		array(
            'id' => 'sidebar_width',
            'type' => 'button_set',
            'title' => __('Sidebar Width', 'imic-framework-admin'),
			'subtitle' => __('Select global width for sidebars.', 'imic-framework-admin'),
            'desc' => __('Width of sidebars from the total site width.', 'imic-framework-admin'),
			'options' => array(
					'4' => __('One Third','imic-framework-admin'),
					'3' => __('One Fourth','imic-framework-admin'),
					'6' => __('One Half','imic-framework-admin')
				),
            'default' => '3'
        ),
		array(
			'id'       => 'page_sidebar',
			'type'     => 'select',
			'title'    => __('Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'blog_sidebar',
			'type'     => 'select',
			'title'    => __('Blog Posts Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all single posts.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'blog_archive_sidebar',
			'type'     => 'select',
			'title'    => __('Blog Posts Archive/Category Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all blog posts category/archive pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_sidebar',
			'type'     => 'select',
			'title'    => __('Event Posts Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all single event posts.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_archive_sidebar',
			'type'     => 'select',
			'title'    => __('Event Posts Archive/Category Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all event posts category/archive pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'project_sidebar',
			'type'     => 'select',
			'title'    => __('Project Posts Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all single project posts.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'project_archive_sidebar',
			'type'     => 'select',
			'title'    => __('Project Posts Archive/Category Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on all project posts category/archive pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'search_sidebar',
			'type'     => 'select',
			'title'    => __('Search Page Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on search result page.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'author_sidebar',
			'type'     => 'select',
			'title'    => __('Author Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on author pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'woocommerce_sidebar',
			'type'     => 'select',
			'title'    => __('Woocommerce Archive/Category Pages Sidebar', 'imic-framework-admin'), 
			'desc'     => __('Select sidebar that will display on Woocommerce category/archive pages.', 'imic-framework-admin'),
			'data'  => 'sidebars',
			'default'  => '',
		),
	),
);
$this->sections[] = array(
    'icon' => 'el-icon-share',
    'title' => __('Social Sharing', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'switch_sharing',
            'type' => 'switch',
            'title' => __('Social Sharing Options', 'imic-framework-admin'),
            'subtitle' => __('Enable/Disable theme default social sharing buttons for posts/events/sermons/causes single pages', 'imic-framework-admin'	
			),
            "default" => 1,
       		),
		 array(
			'id'=>'sharing_style',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Share Buttons Style', 'imic-framework-admin'), 
			'subtitle' => __('Choose the style of share button icons', 'imic-framework-admin'),
			'options' => array(
					'0' => __('Rounded','imic-framework-admin'),
					'1' => __('Squared','imic-framework-admin'),
					'2' => __('Naked','imic-framework-admin')
				),
			'default' => '0',
			),
		 array(
			'id'=>'sharing_color',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Share Buttons Color', 'imic-framework-admin'), 
			'subtitle' => __('Choose the color scheme of the share button icons', 'imic-framework-admin'),
			'options' => array(
					'0' => __('Brand Colors','imic-framework-admin'),
					'1' => __('Theme Color','imic-framework-admin'),
					'2' => __('GrayScale','imic-framework-admin')
				),
			'default' => '0',
			),
		array(
			'id'       => 'share_icon',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => __('Social share options', 'redux-framework-demo'),
			'subtitle' => __('Click on the buttons to disable/enable share buttons', 'imic-framework-admin'),
			'options'  => array(
				'1' => 'Facebook',
				'2' => 'Twitter',
				'3' => 'Google',
				'4' => 'Tumblr',
				'5' => 'Pinterest',
				'6' => 'Reddit',
				'7' => 'Linkedin',
				'8' => 'Email',
				'9' => 'VKontakte'
			),
			'default' => array(
				'1' => '1',
				'2' => '1',
				'3' => '1',
				'4' => '1',
				'5' => '1',
				'6' => '1',
				'7' => '1',
				'8' => '1',
				'9' => '0'
			)
		),
		array(
			'id'       => 'share_links_alt',
			'type'     => 'section',
			'indent' => true,
			'title'    => __('Sharing links alt/title text', 'imic-framework-admin'),
		),
		array(
			'id'       => 'share_post_types',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => __('Select share buttons for post types', 'imic-framework-admin'),
			'subtitle'     => __('Uncheck to disable for any type', 'imic-framework-admin'),
			'options'  => array(
				'1' => 'Posts',
				'2' => 'Pages',
				'3' => 'Events',
				'4' => 'Projects',
				'5' => 'Gallery Archives'
			),
			'default' => array(
				'1' => '1',
				'2' => '1',
				'3' => '1',
				'4' => '1',
				'5' => '1'
			)
		),
		array(
            'id' => 'facebook_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Facebook share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Facebook share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Share on Facebook'
        ),
		array(
            'id' => 'twitter_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Twitter share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Twitter share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Tweet'
        ),
		array(
            'id' => 'google_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Google Plus share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Google Plus share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Share on Google+'
        ),
		array(
            'id' => 'tumblr_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Tumblr share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Tumblr share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Post to Tumblr'
        ),
		array(
            'id' => 'pinterest_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Pinterest share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Pinterest share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Pin it'
        ),
		array(
            'id' => 'reddit_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Reddit share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Reddit share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Submit to Reddit'
        ),
		array(
            'id' => 'linkedin_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Linkedin share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Linkedin share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Share on Linkedin'
        ),
		array(
            'id' => 'email_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Email share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the Email share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Email'
        ),
		array(
            'id' => 'vk_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for vk share icon', 'imic-framework-admin'),
            'subtitle' => __('Text for the vk share icon browser tooltip.', 'imic-framework-admin'),
            'default' => 'Share on vk'
        ),
		array(
			'id'       => 'share_links_styling',
			'type'     => 'section',
			'indent' => true,
			'title'    => __('Sharing icons styling', 'imic-framework-admin'),
		),
		array(
			'id'       => 'share_before_icon',
			'type'     => 'checkbox',
			'title'    => __('Show sharing icon before the sharing icons', 'imic-framework-admin'),
			'default' => 1
		),
		array(
			'id'       => 'share_before_text',
			'type'     => 'text',
			'title'    => __('Enter title to show before the sharing icons', 'imic-framework-admin'),
			'default' => ''
		),
		array(
			'id'       => 'share_before_typo',
			'type'     => 'typography',
			'title'    => __('Share before text/icon typography', 'imic-framework-admin'),
			'output'   => array('.share-buttons .share-title'),
			'default' => array(
				'line-height' => '30px'
			)
		),
		array(
			'id'       => 'share_icons_box_size',
			'type'     => 'dimensions',
			'title'    => __('Share icons box size', 'imic-framework-admin'),
			'output'   => array('.share-buttons > li > a'),
			'default' => array(
				'height' => '28px',
				'width' => '28px'
			)
		),
		array(
			'id'       => 'share_icons_font_size',
			'type'     => 'typography',
			'title'    => __('Share icons font size', 'imic-framework-admin'),
			'desc'    => __('Keep line height same as height of icon boxes set above', 'imic-framework-admin'),
			'font-weight' => false,
			'font-family' => false,
			'font-style' => false,
			'text-align' => false,
			'preview' => false,
			'color' => false,
			'output'   => array('.share-buttons > li > a'),
			'default' => array(
				'line-height' => '28px',
				'font-size' => '14px'
			)
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-brush',
    'title' => __('Color Scheme', 'imic-framework-admin'),
    'fields' => array(
		 array(
			'id'=>'theme_color_type',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Global color schemeX', 'imic-framework-admin'), 
			'subtitle' => __('Select your global color scheme', 'imic-framework-admin'),
			'options' => array(
					'0' => __('Pre-Defined Color Schemes','imic-framework-admin'),
					'1' => __('Custom Color','imic-framework-admin')
				),
			'default' => '0',
		),
        array(
            'id' => 'theme_color_scheme',
            'type' => 'select',
			'required' => array('theme_color_type','equals','0'),
            'title' => __('Theme Color Scheme', 'imic-framework-admin'),
            'subtitle' => __('Select your global color scheme', 'imic-framework-admin'),
            'options' => array('color1.css' => 'color1.css', 'color2.css' => 'color2.css', 'color3.css' => 'color3.css', 'color4.css' => 'color4.css', 'color5.css' => 'color5.css', 'color6.css' => 'color6.css', 'color7.css' => 'color7.css', 'color8.css' => 'color8.css', 'color9.css' => 'color9.css', 'color10.css' => 'color10.css','color11.css' => 'color11.css','color12.css' => 'color12.css'),
            'default' => 'color1.css',
        ),	
		array(
			'id'=>'primary_theme_color',
			'type' => 'color',
			'required' => array('theme_color_type','equals','1'),
			'title' => __('Primary Theme Color', 'imic-framework-admin'), 
			'subtitle' => __('Pick a primary color for the template.', 'imic-framework-admin'),
			'validate' => 'color',
			),
			array(
			'id'=>'secondary_theme_color',
			'type' => 'color',
			'required' => array('theme_color_type','equals','1'),
			'title' => __('Secondary Theme Color', 'imic-framework-admin'), 
			'subtitle' => __('Pick a secondary color for the template.', 'imic-framework-admin'),
			'validate' => 'color',
			),
    ),
);
$this->sections[] = array(
    'icon' => 'el-icon-font',
    'title' => __('Typography', 'imic-framework-admin'),
	'desc' => __(' Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Typography Options or click the small cross signs in each select field/delete text from input fields to reset them.', 'imic-framework-admin'),
    'fields' => array(
        array(
			'id'          => 'body_font_family',
			'type'        => 'typography',
			'title'       => __('Body font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('body'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for body text.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto Slab', 
				'google'      => true,
				'font-weight' => '300'
			),
		),
        array(
			'id'          => 'headings_font_family',
			'type'        => 'typography',
			'title'       => __('Headings font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('h1, h2, h3, h4, h5, h6, .fact'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for H1-H6 heading tags.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto Slab', 
				'google'      => true,
				'font-weight' => '400'
			),
		),
        array(
			'id'          => 'h2_small_font_family',
			'type'        => 'typography',
			'title'       => __('Sub text font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('h2 small, p.lead, .event-ticket .event-location, .label, .titleb, .meta-data, .basic-link, .cart-module-items, .upcoming-events .event-date, .upcoming-events-footer a, .project-overlay, .page-header .breadcrumb, .single-event-info .day, .single-event-info .time, .projects-grid .project-cat, .gallery-grid .gallery-cat, .widget_twitter_feeds li span.date, .number-block, .tp-caption .h1, .tp-caption .h2, .tp-caption .h4'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for H2 heading tag small sub text line in block headings of homepage.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto', 
				'google'      => true,
				'font-weight' => '400'
			),
		),
        array(
			'id'          => 'h4_font_family',
			'type'        => 'typography',
			'title'       => __('H4 font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('h4'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for H4 heading tag. This is separately defined because its been used at several places differently like in footer widgets title.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto', 
				'google'      => true,
				'font-weight' => ''
			),
		),
        array(
			'id'          => 'menu_font_family',
			'type'        => 'typography',
			'title'       => __('Navigation font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('.main-navigation > ul > li, .top-menu li'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for navigations of the website including main navigation and top navigation.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto', 
				'google'      => true,
				'font-weight' => '700'
			),
		),
        array(
			'id'          => 'buttons_font_family',
			'type'        => 'typography',
			'title'       => __('Buttons font typography', 'framework'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
			'font-size'	  => false,
			'line-height' => false,
			'letter-spacing' => true,
			'output'      => array('.btn, .event-register-block, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .widget input[type="button"], .widget input[type="reset"], .widget input[type="submit"], .wpcf7-form .wpcf7-submit, .tp-caption.theme-slider-button a'),
			'units'       =>'px',
			'subtitle'    => __('Choose typography option for all the buttons of the website.', 'framework'),
			'default'     => array(
				'font-family' => 'Roboto', 
				'google'      => true,
				'font-weight' => '700'
			),
		),
	),
);
$this->sections[] = array(
    'icon' => 'el-icon-fontsize',
    'title' => __('Font Sizes', 'imic-framework-admin'),
	'desc' => __(' Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Font Size Options or delete text from input fields to reset them.', 'imic-framework-admin'),
    'fields' => array(
        array(
			'id'          => 'body_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for body text', 'framework'),
			'subtitle'    => __('Default font size: 14px | Default line height: 23px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('body'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h1_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H1 heading', 'framework'),
			'subtitle'    => __('Default font size: 30px | Default line height: 38px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h1'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h2_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H2 heading', 'framework'),
			'subtitle'    => __('Default font size: 24px | Default line height: 32px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h2'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h3_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H3 heading', 'framework'),
			'subtitle'    => __('Default font size: 18px | Default line height: 24px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h3'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h4_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H4 heading', 'framework'),
			'subtitle'    => __('Default font size: 16px | Default line height: 22px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h4'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h5_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H5 heading', 'framework'),
			'subtitle'    => __('Default font size: 14px | Default line height: 18px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h5'),
			'units'       =>'px',
		),
        array(
			'id'          => 'h6_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for H6 heading', 'framework'),
			'subtitle'    => __('Default font size: 12px | Default line height: 18px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('h6'),
			'units'       =>'px',
		),
        array(
			'id'          => 'fwidget_font_size',
			'type'        => 'typography',
			'title'       => __('Font size and Line height for footer widget title', 'framework'),
			'subtitle'    => __('Default font size: 11px | Default line height: 22px', 'framework'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'font-style' => false,
			'font-weight' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
			'font-size'	  => true,
			'line-height' => true,
			'letter-spacing' => false,
			'output'      => array('.footer-widget .widgettitle'),
			'units'       =>'px',
		),
	),
);
$this->sections[] = array(
    'icon' => 'el-icon-pencil',
	'id'   => 'Blog',
    'title' => __('Blog', 'imic-framework-admin'),
    'desc' => __('These are options for the blog posts on blog page template, posts page, blog posts archive/category pages', 'imic-framework-admin'),
    'fields' => array(
		array(
            'id' => 'blog_posts_title',
            'type' => 'text',
            'title' => __('Enter page title for Blog posts single Pages', 'imic-framework-admin'),
            'default' => 'Blog',
        ),
		array(
            'id' => 'blog_archive_title',
            'type' => 'text',
            'title' => __('Enter secondary bar title for Blog archive Pages', 'imic-framework-admin'),
            'default' => 'Archives:',
        ),
		array(
            'id' => 'blog_tags_title',
            'type' => 'text',
            'title' => __('Enter secondary bar title for Blog Tag Pages', 'imic-framework-admin'),
            'default' => 'Tag Archives:',
        ),
		 array(
			'id'=>'blog_layout',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Choose blog posts layout', 'imic-framework-admin'), 
			'subtitle' => __('Blog posts layout for site posts page and blog posts category/archive pages', 'imic-framework-admin'),
			'options' => array(
					'0' => __('List','imic-framework-admin'),
					'1' => __('Grid','imic-framework-admin')
				),
			'default' => '0',
		),
		array(
            'id' => 'archive_show_post_title',
            'type' => 'checkbox',
            'title' => __('Check to display post title on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_show_post_author',
            'type' => 'checkbox',
            'title' => __('Check to display post author on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_show_post_date',
            'type' => 'checkbox',
            'title' => __('Check to display post date on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_show_post_cats',
            'type' => 'checkbox',
            'title' => __('Check to display post categories on blog pages', 'imic-framework-admin'),
            'default' => 0,
        ),
		array(
            'id' => 'archive_show_post_image',
            'type' => 'checkbox',
            'title' => __('Check to display post featured image on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_show_post_lightbox',
            'type' => 'checkbox',
            'title' => __('Check to link featured image to big image in lightbox on blog pages', 'imic-framework-admin'),
            'default' => 0,
        ),
		array(
            'id' => 'archive_show_post_excerpt',
            'type' => 'checkbox',
            'title' => __('Check to display post excerpt on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_excerpt_strip_html',
            'type' => 'checkbox',
            'title' => __('Check to strip html from excerpt on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'archive_show_post_content_length',
            'type' => 'text',
            'title' => __('Insert the number of words you want to show in the post excerpts.', 'imic-framework-admin'),
            'default' => 30,
        ),
		array(
            'id' => 'archive_show_post_readmore',
            'type' => 'checkbox',
            'title' => __('Check to display read more button on blog pages', 'imic-framework-admin'),
            'default' => 1,
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
	'id'   => 'Blog-Single',
    'title' => __('Single Blog Posts', 'imic-framework-admin'),
    'desc' => __('These are options for the single post page template', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'single_show_post_title',
            'type' => 'checkbox',
            'title' => __('Check to display post title on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_post_author',
            'type' => 'checkbox',
            'title' => __('Check to display post author on single post page', 'imic-framework-admin'),
            'default' => 0,
        ),
		array(
            'id' => 'single_show_post_date',
            'type' => 'checkbox',
            'title' => __('Check to display post date on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_post_comment_icon',
            'type' => 'checkbox',
            'title' => __('Check to display comments count on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_post_cats',
            'type' => 'checkbox',
            'title' => __('Check to display post categories on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_post_image',
            'type' => 'checkbox',
            'title' => __('Check to display post featured image on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_post_tags',
            'type' => 'checkbox',
            'title' => __('Check to display post tags on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_related_posts',
            'type' => 'checkbox',
            'title' => __('Check to display related posts block on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'single_show_comments',
            'type' => 'checkbox',
            'title' => __('Check to display comments block on single post page', 'imic-framework-admin'),
            'default' => 1,
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-calendar',
	'id'   => 'Events',
    'title' => __('Events', 'imic-framework-admin'),
    'fields' => array(
		array(
            'id' => 'countdown_timer',
            'type' => 'select',
            'title' => __('Events Display Time', 'imic-framework-admin'),
            'subtitle' => __('Select till what time events will be displayed on the site: End Time/Start Time', 'imic-framework-admin'),
            'options' => array('0' => 'Start Time', '1' => 'End Time'),
            'default' => '0',
        ),
		array(
            'id' => 'events_posts_title',
            'type' => 'text',
            'title' => __('Enter page title for Event posts single Pages', 'imic-framework-admin'),
            'default' => 'Events',
        ),
		array(
            'id' => 'events_archive_title',
            'type' => 'text',
            'title' => __('Enter page title for Event archive Pages', 'imic-framework-admin'),
            'default' => 'Events Listing',
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
	'id'   => 'Events_Options',
	'subsection' => true,
    'title' => __('Single Events', 'imic-framework-admin'),
    'fields' => array(
        array(
			'id'=>'get_directions',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Get Directions Link', 'imic-framework-admin'), 
			'subtitle' => __('Select what the Get Directions Link do on Single Event page', 'imic-framework-admin'),
			'options' => array(
					'0' => __('Map in PopUp','imic-framework-admin'),
					'1' => __('Directions Google Map page','imic-framework-admin')
				),
			'default' => '1',
		),
	)
	
);
$this->sections[] = array(
    'icon' => 'el-icon-ok',
    'title' => __('Events Calendar', 'imic-framework-admin'),
	'subsection' => true,
    'fields' => array(
		array(
		'id'=>'calendar_header_view',
		'type' => 'image_select',
		'compiler'=>true,
		'title' => __('Calendar Header View','imic-framework-admin'), 
		'subtitle' => __('Select the view for your calendar header', 'imic-framework-admin'),
			'options' => array(
				1 => array('title' => '', 'img' => get_template_directory_uri().'/images/calendarheaderLayout/header-1.jpg'),
				2 => array('title' => '', 'img' => get_template_directory_uri().'/images/calendarheaderLayout/header-2.jpg'),
				),
		'default' => 1
		),
		array(
            'id' => 'calendar_event_limit',
            'type' => 'text',	
            'title' => __('Limit of Events', 'imic-framework-admin'),
            'desc' => __('Enter a number to limit number of events to show maximum in a single day block of calendar and remaining in a small popover(Default is 4)', 'imic-framework-admin'),
			'default' => '4',
        ),
        array(
            'id' => 'calendar_month_name',
            'type' => 'textarea',	
			'row' => 2,
            'title' => __('Calendar Month Name', 'imic-framework-admin'),
            'desc' => __('Insert month name in local language by comma seperated to display on event calender like: January,February,March,April,May,June,July,August,September,October,November,December', 'imic-framework-admin'),
			'default' => 'January,February,March,April,May,June,July,August,September,October,November,December',
        ),
		array(
            'id' => 'calendar_month_name_short',
            'type' => 'textarea',	
			'row' => 2,
            'title' => __('Calendar Month Name Short', 'imic-framework-admin'),
            'desc' => __('Insert month name short in local language by comma seperated to display on event calender like: Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec', 'imic-framework-admin'),
			'default' => 'Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec',
        ),
		array(
            'id' => 'calendar_day_name',
            'type' => 'textarea',	
			'row' => 2,
            'title' => __('Calendar Day Name', 'imic-framework-admin'),
            'desc' => __('Insert day name in local language by comma seperated to display on event calender like: Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'imic-framework-admin'),
			'default' => 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ),
		array(
            'id' => 'calendar_day_name_short',
            'type' => 'textarea',
			'row' => 2,	
            'title' => __('Calendar Day Name Short', 'imic-framework-admin'),
            'desc' => __('Insert day name short in local language by comma seperated to display on event calender like: Sun,Mon,Tue,Wed,Thu,Fri,Sat', 'imic-framework-admin'),
			'default' => 'Sun,Mon,Tue,Wed,Thu,Fri,Sat',
        ),
		array(
			'id'       => 'event_feeds',
			'type'     => 'checkbox',
			'title'    => __('Show WP Events', 'imic-framework-admin'),
			'desc'     => __('Check if you want to show WP Native Events in Calendar.', 'imic-framework-admin'),
			'default'  => '1'// 1 = on | 0 = off
		),
		array(
            'id' => 'google_feed_key',
            'type' => 'text',	
            'title' => __('Google Calendar API Key', 'imic-framework-admin'),
            'desc' => __('Enter Google Calendar Feed API Key.', 'imic-framework-admin'),
			'default' => '',
        ),
		array(
            'id' => 'google_feed_id',
            'type' => 'text',	
            'title' => __('Google Calendar ID', 'imic-framework-admin'),
            'desc' => __('Enter Google Calendar ID.', 'imic-framework-admin'),
			'default' => '',
        ),
		array(
			'id'=>'event_default_color',
			'type' => 'color',
			'title' => __('Event Color', 'imic-framework-admin'), 
			'subtitle' => __('Pick a default bg color for Events on calendar.', 'imic-framework-admin'),
			'validate' => 'color',
			'default' => ''
			),
			array(
			'id'=>'recurring_event_color',
			'type' => 'color',
			'title' => __('Recurring Event Color', 'imic-framework-admin'), 
			'subtitle' => __('Pick a bg color for recurring Events on calendar.', 'imic-framework-admin'),
			'validate' => 'color',
			'default' => ''
			),
    ),
);
$this->sections[] = array(
    'icon' => 'el-icon-calendar',
	'id'   => 'Projects',
    'title' => __('Projects', 'imic-framework-admin'),
    'fields' => array(
		array(
            'id' => 'project_posts_title',
            'type' => 'text',
            'title' => __('Enter page title for Event posts single Pages', 'imic-framework-admin'),
            'default' => 'Projects',
        ),
		array(
            'id' => 'project_archive_title',
            'type' => 'text',
            'title' => __('Enter page title for Event archive Pages', 'imic-framework-admin'),
            'default' => 'Projects Listing',
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-user',
	'id'   => 'Staff_Options',
    'title' => __('Staff', 'imic-framework-admin'),
    'fields' => array(
		array(
            'id' => 'staff_posts_title',
            'type' => 'text',
            'title' => __('Enter page title for Staff posts single Pages', 'imic-framework-admin'),
            'default' => 'Staff',
        ),
        array(
			'id'=>'staff_details_link',
			'type' => 'checkbox',
			'title' => __('Link staff posts', 'imic-framework-admin'), 
			'subtitle' => __('Check if you wish to link staff title and thumbnail to its details.', 'imic-framework-admin'),
			'default' => 1,
		),
        array(
			'id'=>'staff_details_link_type',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => __('Link type', 'imic-framework-admin'), 
			'subtitle' => __('Select from modal window or single page for the staff posts title/thumb.', 'imic-framework-admin'),
			'options' => array(
					'0' => __('Details in PopUp','imic-framework-admin'),
					'1' => __('Single staff page','imic-framework-admin')
				),
			'default' => '0',
		),
        array(
			'id'=>'staff_thumb_link',
			'type' => 'checkbox',
			'title' => __('Staff thumbnail link', 'imic-framework-admin'), 
			'subtitle' => __('Check if you wish to link staff post thumbnail to big image in popup.', 'imic-framework-admin'),
			'default' => 0,
		),
        array(
			'id'=>'staff_show_position',
			'type' => 'checkbox',
			'title' => __('Show staff job title/position', 'imic-framework-admin'), 
			'subtitle' => __('Check if you wish to show job title or position in the staff posts list.', 'imic-framework-admin'),
			'default' => 1,
		),
		array(
            'id' => 'staff_show_post_excerpt',
            'type' => 'checkbox',
            'title' => __('Check to display post excerpt on staff posts', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'staff_excerpt_strip_html',
            'type' => 'checkbox',
            'title' => __('Check to strip html from excerpt on staff posts', 'imic-framework-admin'),
            'default' => 1,
        ),
		array(
            'id' => 'staff_show_post_content_length',
            'type' => 'text',
            'title' => __('Insert the number of words you want to show in the post excerpts.', 'imic-framework-admin'),
            'default' => 30,
        ),
		array(
            'id' => 'staff_show_post_readmore',
            'type' => 'checkbox',
            'title' => __('Check to display read more button on staff posts', 'imic-framework-admin'),
            'default' => 0,
        ),
		array(
            'id' => 'staff_show_post_readmore_label',
            'type' => 'text',
			'required' => array('staff_show_post_readmore','equals',1),
            'title' => __('Enter button text for staff posts read more link', 'imic-framework-admin'),
            'default' => 'Read more',
        ),
	)
	
);
$this->sections[] = array(
    'icon' => 'el-icon-calendar',
	'id'   => 'WooCommerce',
    'title' => __('WooCommerce', 'imic-framework-admin'),
    'fields' => array(
		array(
            'id' => 'woo_posts_title',
            'type' => 'text',
            'title' => __('Enter page title for single product Pages', 'imic-framework-admin'),
            'default' => 'Products',
        ),
		array(
            'id' => 'woo_archive_title',
            'type' => 'text',
            'title' => __('Enter page title for product archive Pages', 'imic-framework-admin'),
            'default' => 'Products',
        ),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-map-marker',
    'title' => __('Map API', 'imic-framework-admin'),
    'fields' => array(
		array(
			'id'       => 'google_map_api',
			'type'     => 'text',
			'title'    => __('Google Maps API Key', 'imic-framework-admin'), 
			'desc'     => __('Enter your Google Maps API key in here. This will be used for all maps in the theme i.e. Map banner, Event maps. <a href="https://support.imithemes.com/forums/topic/how-to-get-google-maps-api/" target="_blank">See Guide about how to get your API Key</a>', 'imic-framework-admin'),
		),
	)
);
$this->sections[] = array(
    'icon' => 'el-icon-css',
    'title' => __('Custom CSS/JS', 'imic-framework-admin'),
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => __('CSS Code', 'imic-framework-admin'),
            'subtitle' => __('Paste your CSS code here.', 'imic-framework-admin'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => '',
            'default' => "#header{\nmargin: 0 auto;\n}"
        ),
        array(
            'id' => 'custom_js',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => __('JS Code', 'imic-framework-admin'),
            'subtitle' => __('Paste your JS code here.', 'imic-framework-admin'),
            'mode' => 'javascript',
            'theme' => 'chrome',
            'desc' => '',
            'default' => "jQuery(document).ready(function(){\n\n});"
        )
    ),
);
$this->sections[] = array(
		  'title' => __('Import / Export', 'imic-framework-admin'),
		  'desc' => __('Import and Export your Theme Framework settings from file, text or URL.', 'imic-framework-admin'),
		  'icon' => 'el-icon-refresh',
		  'fields' => array(
			  array(
				  'id' => 'opt-import-export',
				  'type' => 'import_export',
				 'title' => __('Import Export','imic-framework-admin'),
				  'subtitle' => __('Save and restore your Theme options','imic-framework-admin'),
				  'full_width' => false,
			  ),
		  ),
	  ); 
                       if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon'      => 'el-icon-book',
                    'title'     => __('Documentation', 'imic-framework-admin'),
                    'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }
        public function setHelpTabs() {
            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'imic-framework-admin'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'imic-framework-admin')
            );
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'imic-framework-admin'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'imic-framework-admin')
            );
            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'imic-framework-admin');
        }
        /**
          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {
            $theme = wp_get_theme(); // For use with some settings. Not necessary.
            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'imic_options',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Theme Options', 'imic-framework-admin'),
                'page_title'        => __('IMIC Options', 'imic-framework-admin'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyDzJyslYLbuwBAqc_UTRokHKAY1ZaXrotk', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => '57',                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => false,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE
                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );
            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/imithemes',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/imithemes',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p>Did you know that we sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'imic-framework-admin'), $v);
            } else {
                //$this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'imic-framework-admin');
            }
            // Add content after the form.
            //$this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'imic-framework-admin');
        }
    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}
/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;
/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation
          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */
        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;