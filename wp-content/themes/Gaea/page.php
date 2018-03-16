<?php get_header();
imic_sidebar_position_module();
global $imic_options;
if(is_home())
{
	$id = get_option('page_for_posts');
}
else
{
	$id = get_the_ID();
}
$page_header = get_post_meta($id,'imic_pages_Choose_slider_display',true);
if($page_header==3)
{
	get_template_part( 'pages', 'flex' );
}
elseif($page_header==4)
{
	get_template_part( 'pages', 'nivo' );
}
elseif($page_header==5)
{
	get_template_part( 'pages', 'revolution' );
}
else
{
	get_template_part( 'pages', 'banner' );
}
if($imic_options['sidebar_width'] != ''){
	$ContentWidth = 12 - $imic_options['sidebar_width'];
	$SidebarWidth = $imic_options['sidebar_width'];
}
$pageSidebarWidth = get_post_meta(get_the_ID(),'imic_select_sidebar_width', true);
if($pageSidebarWidth != ''){
	$ContentWidth = 12 - $pageSidebarWidth;
	$SidebarWidth = $pageSidebarWidth;
}
$post_id = get_post($id);
		$content = $post_id->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
if($content!='')
{
?>
    <!-- End Page Header -->
    <div class="main" role="main">
        <div id="content" class="content full">
        <?php 
    $pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
    if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar) || $imic_options['page_sidebar'] !== '')
	{
    	$class = $ContentWidth;
    }
	else
	{
    	$class = 12;  
    }
    echo '<div class ="container">';
    echo '<div class="row">';
    echo '<div class ="col-md-'.$class.'" id="content-col">';
        if(have_posts()):while(have_posts()):the_post();
        the_content();
        endwhile; endif; ?>
    <?php if ($imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['2'] == '1') { ?>
        <?php imic_share_buttons(); ?>
    <?php }
    echo '</div>';
    if(is_active_sidebar($pageSidebar))
	{
    	echo'<div class="col-md-'.$SidebarWidth.' sidebar" id="sidebar-col">';
    	dynamic_sidebar($pageSidebar);
    	echo'</div>';
    } elseif ($imic_options['page_sidebar'] !== "") { ?>
        <div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
    	<?php dynamic_sidebar($imic_options['page_sidebar']); ?>
    	</div>
    <?php } ?>
    </div></div>
            </div>
    </div>
<?php
} get_footer(); ?>