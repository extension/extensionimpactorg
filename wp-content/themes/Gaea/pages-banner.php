<?php 
global $imic_options,$id;
$image = '';
$type = get_post_meta($id,'imic_pages_Choose_slider_display',true);
$height = get_post_meta($id,'imic_pages_slider_height',true);
$color = get_post_meta($id,'imic_pages_banner_color',true);
$color = ($color!='')?$color:'';
$height = ($height!='')?$height:230;
// Static Page Titles
$blogposttitle = $imic_options['blog_posts_title'];
$eventposttitle = $imic_options['events_posts_title'];
$projectposttitle = $imic_options['project_posts_title'];
$staffposttitle = $imic_options['staff_posts_title'];
$wooposttitle = $imic_options['woo_posts_title'];
if($type==2)
{
	$image = get_post_meta($id,'imic_header_image',true);
	$image_src = wp_get_attachment_image_src( $image, 'full', '', array() );
	if(is_array($image_src))
	{
		$image = $image_src[0];
	}
	else
	{	
		$image = $imic_options['header_image']['url'];
	}
}
	$post_type = get_post_type($id);
	$title = '';
	switch($post_type)
	{
		case 'post':
		$title = esc_attr($blogposttitle);
		break;
		case 'event':
		$title = esc_attr($eventposttitle);
		break;
		case 'project':
		$title = esc_attr($projectposttitle);
		break;
		case 'staff':
		$title = esc_attr($staffposttitle);
		break;
		case 'product':
		$title = esc_attr($wooposttitle);
		break;
		default:
		$title = get_the_title($id);
	}	
	
//$title = ($id>0)?get_the_title($id):'Blog';
if($image !== ''){
?>
<div class="page-header" style="background-image:url(<?php echo $image; ?>)">

<?php } else { ?>
<div class="page-header">

<?php } ?>
    	<div class="container">
        	<div class="row">
            
            	<div class="col-md-6 col-sm-6 hidden-xs">
                <?php if(function_exists('bcn_display'))
    			{ ?>
          			<ol class="breadcrumb">
            			<?php bcn_display(); ?>
          			</ol><?php
				} ?>
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-12">
    				<h2><?php echo $title; ?></h2>
                </div>
           	</div>
        </div>
    </div>
<?php
if($color!='')
{ 
	echo '<style type="text/css">' . "\n";
	echo '.page-header{
	background-color:'.esc_attr($color).';
	}';
	echo "</style>" . "\n";
}
echo '<style type="text/css">' . "\n";
echo '.page-header{
	height:'.esc_attr($height).'px;
	min-height:0!important;
}';
if($height <= 50){
	echo '.page-header {overflow:hidden;}
	.page-header h2{padding-top:5px!important;}
	.page-header .breadcrumb{padding-top:15px!important;}
';
}
echo "</style>" . "\n";
$secondary_bar_status = get_post_meta($id,'imic_secondary_bar_type_status',true);
if($secondary_bar_status==1)
{
	$output = '';
	$type = get_post_meta($id,'imic_secondary_bar_type',true);
	$left_title = get_post_meta($id,'imic_secondary_left_title',true);
	$left_url = get_post_meta($id,'imic_secondary_left_url',true);
	$right_title = get_post_meta($id,'imic_secondary_right_title',true);
	$right_url = get_post_meta($id,'imic_secondary_right_url',true);
	$right_btn_icon = $imic_options['sec_bar_btn_icon'];
	
	if($type==0):
	$output .= '<div class="secondary-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">';
				if($left_url==''&&$right_title==''&&$left_title!=''&&$right_url=='')
				{
                	$output .= '<span class="big">'.$left_title.'</span>';
				}
				elseif($left_url!=''&&$right_title==''&&$left_title!=''&&$right_url=='')
				{
					$output .= '<a href="'.esc_url($left_url).'"><span class="big">'.$left_title.'</span></a>';
				}
				elseif($left_title!=''&&$left_url!=''&&$right_title!=''&&$right_url=='')
				{
					$output .= '<a href="'.esc_url($left_url).'"><span class="big">'.$left_title.'</span></a>';
                    $output .= '<i class="fa '.$right_btn_icon.'"></i> '.$right_title;
				}
				elseif($left_title!=''&&$left_url!=''&&$right_title!=''&&$right_url!='')
				{
					$output .= '<a href="'.esc_url($left_url).'"><span class="big">'.$left_title.'</span></a>';
					$output .= '<a href="'.esc_url($right_url).'" class="btn btn-primary btn-lg pull-right"><i class="fa '.$right_btn_icon.'"></i> '.$right_title.'</a>';
				}
				elseif($left_title!=''&&$left_url==''&&$right_title!=''&&$right_url!='')
				{
					$output .= '<span class="big">'.$left_title.'</span>';
					$output .= '<a href="'.esc_url($right_url).'" class="btn btn-primary btn-lg pull-right"><i class="fa '.$right_btn_icon.'"></i> '.$right_title.'</a>';
				}
              	$output .= '</div>
            </div>
        </div>
    </div>';
elseif($type==1):
$menu_ids = get_post_meta($id,'imic_single_page_menu',false);
$pageSidebar = get_post_meta($id,'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar))
{
	$class = 9;  
}
else
{
	$class = 12;  
}
$container_class = ($class==12)?'container':'';
echo '<div class="secondary-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<span class="big">'.$left_title.'</span>
                    <ul class="nav nav-pills pull-right">';
						if (!empty($menu_ids[0]))
						{
							$i=0; foreach($menu_ids[0] as $key=>$value)
							{
								$active_class = ($i==0)?'active':''; 
								$page_id = $value[1]+2648; //To change original ID of page
								echo '<li class="'.$active_class.'"><a href="#page-'.$page_id.'" class="scrollto">'.$value[0].'</a></li>';
								$i++; 
							}
						}
                    echo '</ul>
                </div>
            </div>
        </div>
    </div>';
echo '<div class="main" role="main">
    	<div id="content" class="content full">';
		if($class==9) {
echo '	<div class ="container">
		<div class="row">
		<div class ="col-md-'.$class.'">'; }
		$counter = 0;
		if (!empty($menu_ids[0])) { foreach($menu_ids[0] as $key=>$value)
		{
			$full_width_div_start = ($counter==1)?'<div class="lgray-bg padding-tb45">':'';
			$full_width_div_close = ($counter==1)?'</div>':'';
			$full_width_spacer = ($counter==1)?'<div class="spacer-50"></div>':'';
			$page_id = $value[1]+2648; //To change original ID of page
			echo $full_width_div_start.'<div id="page-'.$page_id.'"><div class="'.$container_class.'">'; 
			$arg = array('post_type'=>'page', 'post__in'=>array($value[1]));
			$pages_posts = new WP_Query($arg);
			if($pages_posts->have_posts()):
			while($pages_posts->have_posts()):
			$pages_posts->the_post();
			the_content();
			endwhile; endif; wp_reset_postdata();
			//$output .= apply_filters('the_content', get_post_field('post_content', $value[1])); 
			echo $full_width_div_close.'</div></div>'.$full_width_spacer; $counter++; } }
			if($class==9)
			{
				echo '</div>';
				if(is_active_sidebar($pageSidebar))
				{
					echo '<div class="col-md-3">';
					ob_start();
					dynamic_sidebar($pageSidebar);
					$output_this = ob_get_contents();
					ob_end_clean();
					echo $output_this;
					echo '</div>';
				}
				echo '</div></div>';
			}
			echo '</div></div>';
			elseif($type==2):
			$content_shortcode = get_post_meta($id,'imic_secondary_shortcode',true);
			$content_shortcode = apply_filters('wpautop', $content_shortcode);
			$content_shortcode = str_replace(']]>', ']]>', $content_shortcode);
			$output .= '<div class="secondary-bar">
			<div class="container"><div class="row">';
			$output .= do_shortcode($content_shortcode);
			$output .= '</div></div></div>';
			endif;
			echo $output;
		}
			?>