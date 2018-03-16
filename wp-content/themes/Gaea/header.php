<!DOCTYPE html>
<!--// OPEN HTML //-->
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <?php
        $options = get_option('imic_options');
        /** Theme layout design * */
        $bodyClass = ($options['site_layout'] == 'boxed') ? ' boxed' : '';
        $style='';
       if($options['site_layout'] == 'boxed')
	   {
            if (!empty($options['upload-repeatable-bg-image']['id']))
			{
            	$style = ' style="background-image:url(' . $options['upload-repeatable-bg-image']['url'] . '); background-repeat:repeat; background-size:auto;"';
        	}
			else if (!empty($options['full-screen-bg-image']['id']))
			{
            	$style = ' style="background-image:url(' . $options['full-screen-bg-image']['url'] . '); background-repeat: no-repeat; background-size:cover;"';
        	}
           	else if(!empty($options['repeatable-bg-image']))
			{
            	$style = ' style="background-image:url(' . get_template_directory_uri() . '/images/patterns/' . $options['repeatable-bg-image'] . '); background-repeat:repeat; background-size:auto;"';
        	}
        }
        ?>
        <!--// SITE META //-->
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- Mobile Specific Metas
        ================================================== -->
<?php if ($options['switch-responsive'] == 1){ ?>
	<?php if ($options['switch-zoom-pinch'] == 1){ ?>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
   	<?php } else { ?>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <?php } ?>
            <meta name="format-detection" content="telephone=no">
<?php } ?>
        <!--// PINGBACK & FAVICON //-->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (isset($options['custom_favicon']) && $options['custom_favicon'] != "")
		{ ?>
        	<link rel="shortcut icon" href="<?php echo $options['custom_favicon']['url']; ?>"><?php
        }
		if (isset($options['iphone_icon']) && $options['iphone_icon'] != "")
		{ ?>
        	<link rel="apple-touch-icon-precomposed" href="<?php echo $options['iphone_icon']['url']; ?>"><?php
        }
		if (isset($options['iphone_icon_retina']) && $options['iphone_icon_retina'] != "")
		{ ?>
        	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $options['iphone_icon_retina']['url']; ?>"><?php
        }
		if (isset($options['ipad_icon']) && $options['ipad_icon'] != "")
		{ ?>
        	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $options['ipad_icon']['url']; ?>"><?php
        }
		if (isset($options['ipad_icon_retina']) && $options['ipad_icon_retina'] != "")
		{ ?>
        	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $options['ipad_icon_retina']['url']; ?>"><?php
        }
        $offset = get_option('timezone_string');
		if($offset=='')
		{
			$offset = "Australia/Melbourne";
		}
		date_default_timezone_set($offset);
        ?>
        <!-- CSS
        ================================================== -->
        <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" media="screen"><![endif]-->
        <?php if(isset($options['enable_transitions']) && $options['enable_transitions']==0) { ?> <script type="text/javascript">jQuery('html').addClass('no-csstransitions');</script><?php } ?>
        <?php //  WORDPRESS HEAD HOOK 
         wp_head(); ?>
         <?php $SpaceBeforeHead = $options['space-before-head'];
			echo $SpaceBeforeHead;
		 ?>
    </head>
    <!--// CLOSE HEAD //-->
    <?php $HeaderLayout = 'header-v'.$options['header_layout']; ?>
    <body <?php body_class($bodyClass); echo $style;  ?>>
        <!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<?php
   // Page Style Options
	if(is_home()) { $id = get_option('page_for_posts'); }
	else { $id = get_the_ID(); }
	$content_top_padding = get_post_meta($id,'imic_content_padding_top',true);
	$content_bottom_padding = get_post_meta($id,'imic_content_padding_bottom',true);
	$content_width = get_post_meta($id,'imic_content_width',true);
	$page_header_show = get_post_meta($id,'imic_page_header_show_hide',true);
	$page_social_show = get_post_meta($id,'imic_pages_social_show',true);
	$page_breadcrumb_show = get_post_meta($id,'imic_pages_breadcrumb_show',true);
	$page_title_show = get_post_meta($id,'imic_pages_title_show',true);
	$page_body_bg_color = get_post_meta($id,'imic_pages_body_bg_color',true);
	$page_body_bg_image = get_post_meta($id,'imic_pages_body_bg_image',true);
	$page_body_bg_image_src = wp_get_attachment_image_src( $page_body_bg_image, 'full', '', array() );
	$page_body_bg_size = get_post_meta($id,'imic_pages_body_bg_wide',true);
	if($page_body_bg_size==0){
		$page_body_bg_size_result = 'auto';
		$page_body_bg_size_attachment = 'scroll';
	}else{
		$page_body_bg_size_result = 'cover';
		$page_body_bg_size_attachment = 'fixed';
	}
	$page_body_bg_repeat = get_post_meta($id,'imic_pages_body_bg_repeat',true);
	$page_content_bg_color = get_post_meta($id,'imic_pages_content_bg_color',true);
	$page_content_bg_image = get_post_meta($id,'imic_pages_content_bg_image',true);
	$page_content_bg_image_src = wp_get_attachment_image_src( $page_content_bg_image, 'full', '', array() );
	$page_content_bg_size = get_post_meta($id,'imic_pages_content_bg_wide',true);
	if($page_content_bg_size==0){
		$page_content_bg_size_result = 'auto';
		$page_content_bg_size_attachment = 'scroll';
	}else{
		$page_content_bg_size_result = 'cover';
		$page_content_bg_size_attachment = 'fixed';
	}
	$page_content_bg_repeat = get_post_meta($id,'imic_pages_content_bg_repeat',true);
	
	echo '<style type="text/css">';
		if($page_header_show == 2){
			echo'.page-header{display:none;}';	
		}else{
			echo'.page-header{display:block;}';		
		}
		if($page_social_show == 2){
			echo'.share-bar{display:none;}';	
		}else{
			echo'.share-bar{display:block;}';		
		}
		if($page_breadcrumb_show == 2){
			echo'.page-header .breadcrumb{display:none;}';	
		}else{
			echo'.page-header .breadcrumb{display:block;}';		
		}
		if($page_title_show == 2){
			echo'.page-header h2{display:none;}';	
		}else{
			echo'.page-header h2{display:block;}';		
		}
		echo '.content{';
			if($content_top_padding != ''){ echo 'padding-top:'.esc_attr($content_top_padding).'px;'; }
			if($content_bottom_padding != ''){ echo 'padding-bottom:'.esc_attr($content_bottom_padding).'px;'; }
		echo '}';
		if($content_width != ''){
		echo '
		.content .container{
			width:'.esc_attr($content_width).';
		}';
		}
		echo 'body.boxed{';
			if($page_body_bg_color != ''){ echo 'background-color:'.esc_attr($page_body_bg_color).';';}
			if($page_body_bg_image != ''){ echo 'background-image:url('.esc_attr($page_body_bg_image_src[0]).')!important;';}
			if($page_body_bg_image != ''){ echo 'background-size:'.esc_attr($page_body_bg_size_result).'!important;';}
			if($page_body_bg_image != ''){ echo 'background-repeat:'.esc_attr($page_body_bg_repeat).'!important;';}
			if($page_body_bg_image != ''){ echo 'background-attachment:'.esc_attr($page_body_bg_size_attachment).'!important;';}
		echo '}
		.content{';
			if($page_content_bg_color != ''){ echo 'background-color:'.esc_attr($page_content_bg_color).';';}
			if($page_content_bg_image != ''){ echo 'background-image:url('.esc_attr($page_content_bg_image_src[0]).');';}
			if($page_content_bg_image != ''){ echo 'background-size:'.esc_attr($page_content_bg_size_result).';';}
			if($page_content_bg_image != ''){ echo 'background-repeat:'.esc_attr($page_content_bg_repeat).';';}
			if($page_content_bg_image != ''){ echo 'background-attachment:'.esc_attr($page_content_bg_size_attachment).';';}
		echo '}';
	echo '</style>';
?>
<div class="body <?php echo $HeaderLayout; ?>"> 
	<!-- Start Site Header -->
    <?php $menu_locations = get_nav_menu_locations(); ?>
	<header class="site-header">
    	<?php if ($options['enable-top-bar'] == 1): ?>
    	<div class="top-header hidden-xs">
        	<div class="container">
            <div class="row">
            <div class="col-md-6 col-sm-6 top-header-left">
            <?php if($options['enable_countdown']==1)
				{ 
             		$next_event_time="";
			        $next_event_post_id="";
					$events = imic_recur_events('future','',''); 
					ksort($events); 
					foreach($events as $key=>$value)
					 { 
					    $next_event_time = $key;
					    $next_event_post_id = $value;
						$event_url = imic_query_arg(date('Y-m-d', $key), $value);
						break;
					 } ?>
                    <?php if(!empty($next_event_time))
						{ ?>
                        <a href="<?php echo esc_url($event_url); ?>">
                    		<div class="upcoming-event-bar">
                        		<h4><i class="fa fa-calendar"></i><?php _e(' Next Event','framework'); ?></h4>
                            	<div id="counter" class="counter" data-date="<?php echo $next_event_time; ?>">
                                    <div class="timer-col"> <span id="days"></span><span class="timer-type"><?php _e('d','framework'); ?></span></div>
                                    <div class="timer-col"> <span id="hours"></span><span class="timer-type"><?php _e('h','framework'); ?></span></div>
                                    <div class="timer-col"> <span id="minutes"></span><span class="timer-type"><?php _e('m','framework'); ?></span></div>
                                    <div class="timer-col"> <span id="seconds"></span><span class="timer-type"><?php _e('s','framework'); ?></span></div>
                            </div>
                        </div>
                         </a>
                    <?php 
						}
					}
					else
					{
						echo '<div class="top-custom-text">';
						echo $options['header_left_text'];	
						echo '</div>';
					}
					 	echo '</div>'; 
						echo '<div class="col-md-6 col-sm-6 top-header-right">';
						if (!empty($menu_locations['top-menu']))
						{
                    		wp_nav_menu(array('theme_location' => 'top-menu', 'container' => '','items_wrap' => '<ul id="%1$s" class="top-menu">%3$s</ul>'));
						}
						echo '<ul class="social-links social-links-lighter">';
						$socialSites = $options['header_social_links'];
						foreach ($socialSites as $key => $value)
						{
							if (filter_var($value, FILTER_VALIDATE_URL))
							{
                      			echo '<li><a href="' . $value . '" target="_blank"><i class="fa ' . $key . '"></i></a></li>';
							}
						}
                        echo '</ul></div>';  ?>
                </div>
           	</div>
       	</div>
        <?php endif; ?>
        <?php if ($options['header_layout'] == 1): ?>
    	<div class="lower-header">
        	<div class="container for-navi">
            	<h1 class="logo">
                  	<?php
                         global $imic_options;
                         if (!empty($imic_options['logo_upload']['url']))
						 {
                         	echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo"></a>';
                         }
						 else
						 {
                            echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                         }
                     ?>
                     <?php
                         if (!empty($imic_options['retina_logo_upload']['url']))
						 {
                         	echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['retina_logo_upload']['url'] . '" alt="Logo" width="' . $options['retina_logo_width'] .'" height="' . $options['retina_logo_height'] .'"></a>';
                         }
						 elseif (!empty($imic_options['logo_upload']['url']))
						 {
                 	        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo" width="' . $options['retina_logo_width'] .'" height="' . $options['retina_logo_height'] .'"></a>';
                         }
						 else
						 {
                         	echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                         }
                           	?>
                </h1>
                <?php if ($imic_options['enable-search'] == 1)
				{
                    imic_search_button_header();
                } ?>
                <?php if ($imic_options['enable-cart'] == 1)
				{
                   echo imic_cart_button_header();
                } ?>
                    <?php if (!empty($menu_locations['primary-menu'])) { ?>
                    <!-- Main Navigation -->
                    	<nav class="main-navigation">
                    		<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new imic_mega_menu_walker)); ?>
                    	</nav>
                        <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i> <?php if(isset($imic_options['mobile_menu_text'])){ echo $imic_options['mobile_menu_text']; } ?></a>
                    <?php } ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($options['header_layout'] == 2): ?>
    	<div class="lower-header">
        	<div class="container for-navi">
                    	<h1 class="logo">
                        	<?php
                                    global $imic_options;
                                    if (!empty($imic_options['logo_upload']['url'])) {
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo"></a>';
                                    } else {
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                                    }
                                    ?>
                                    <?php
                                    global $imic_options;
                                    if (!empty($imic_options['retina_logo_upload']['url'])) {
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['retina_logo_upload']['url'] . '" alt="Logo" width="' . $imic_options['retina_logo_width'] .'" height="' . $imic_options['retina_logo_height'] .'"></a>';
                                    } elseif (!empty($imic_options['logo_upload']['url'])) {
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo" width="' . $imic_optionsimic_options['retina_logo_width'] .'" height="' . $imic_options['retina_logo_height'] .'"></a>';
                                    } else {
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                                    }
                           	?>
                        </h1>
                <?php if ($imic_options['enable-search'] == 1)
				{
                    imic_search_button_header();
                } ?>
                <?php if ($imic_options['enable-cart'] == 1)
				{
                   echo imic_cart_button_header();
                } ?>
              	<?php if (!empty($menu_locations['primary-menu'])) 
				{ ?>
                	<!-- Main Navigation -->
                    <nav class="main-navigation">
                        <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new imic_mega_menu_walker)); ?>
                    </nav>
                    <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i> <?php if(isset($imic_options['mobile_menu_text'])){ echo $imic_options['mobile_menu_text']; } ?></a>
           <?php } ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($options['header_layout'] == 3): ?>
    	<div class="lower-header">
        	<div class="container for-navi">
                    	<h1 class="logo">
                        	<?php
                                    global $imic_options;
                                    if (!empty($imic_options['logo_upload']['url']))
									{
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo"></a>';
                                    }
									else
									{
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="default-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                                    }
                                    ?>
                                    <?php
                                    global $imic_options;
                                    if (!empty($imic_options['retina_logo_upload']['url']))
									{
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['retina_logo_upload']['url'] . '" alt="Logo" width="' . $imic_options['retina_logo_width'] .'" height="' . $imic_options['retina_logo_height'] .'"></a>';
                                    }
									elseif (!empty($imic_options['logo_upload']['url']))
									{
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $imic_options['logo_upload']['url'] . '" alt="Logo" width="' . $imic_options['retina_logo_width'] .'" height="' . $imic_options['retina_logo_height'] .'"></a>';
                                    }
									else
									{
                                        echo '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" class="retina-logo theme-blogname">'. get_bloginfo('name') .'</a>';
                                    }
                           	?>
                        </h1>
                <ul class="social-links social-links-lighter pull-right">
                    <?php $socialSites = $options['header_social_links'];
						foreach ($socialSites as $key => $value)
						{
							if (filter_var($value, FILTER_VALIDATE_URL))
							{
								echo '<li><a href="' . $value . '" target="_blank"><i class="fa ' . $key . '"></i></a></li>';
							}
						} ?>
                </ul>
            </div>
        </div>
        <!-- Full Width Menu -->
        <div class="full-width-menu accent-bg">
        	<div class="container">
            	<!-- Mobile Menu Trigger Icon -->
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i> <?php if(isset($options['mobile_menu_text'])){ echo $options['mobile_menu_text']; } ?></a>
                <?php if ($imic_options['enable-search'] == 1)
				{
                    imic_search_button_header();
                } ?>
                <?php if ($imic_options['enable-cart'] == 1)
				{
                   echo imic_cart_button_header();
                } ?>
              	<?php if (!empty($menu_locations['primary-menu']))
				{ ?>
                	<!-- Main Navigation -->
                    <nav class="main-navigation">
                        <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new imic_mega_menu_walker)); ?>
                    </nav>
          <?php } ?>
           	</div>
    	</div>
        <?php endif; ?>
	</header>
	<!-- End Site Header -->