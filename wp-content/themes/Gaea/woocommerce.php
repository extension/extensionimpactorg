<?php 
get_header();
global $imic_options;
imic_sidebar_position_module();
if($imic_options['sidebar_width'] != ''){
	$ContentWidth = 12 - $imic_options['sidebar_width'];
	$SidebarWidth = $imic_options['sidebar_width'];
}
$pageSidebarWidth = get_post_meta(get_the_ID(),'imic_select_sidebar_width', true);
if($pageSidebarWidth != ''){
	$ContentWidth = 12 - $pageSidebarWidth;
	$SidebarWidth = $pageSidebarWidth;
}
$pageSidebar = get_post_meta($id,'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar) || $imic_options['woocommerce_sidebar'] !== '') {
	$class = $ContentWidth;
}else{
	$class = 12;  
}
if(is_product_category()) {
	wp_enqueue_script('imic_jquery_flexslider');
	$term_taxonomy=get_query_var('taxonomy');
	$cat_id = get_queried_object()->term_id;
	$cat_image = get_option($term_taxonomy . $cat_id . "_image_term_id");
	$woo_image = ($cat_image!='')?$cat_image:$imic_options['header_image']['url'];
	$wooposttitle = $imic_options['woo_archive_title']; ?>
	<div class="page-header" style="background-image:url(<?php echo $woo_image; ?>)">
			<div class="container">
				<div class="row">
				
					<div class="col-md-6 col-sm-6 hidden-xs">
					<?php if(function_exists('bcn_display'))
		{ ?>
						<ol class="breadcrumb">
							<?php bcn_display(); ?>
						</ol><?php } ?>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2><?php echo esc_attr($wooposttitle); ?></h2>
					</div>
				</div>
			</div>
		</div>
<?php } else {
if(is_home()) { $id = get_option('page_for_posts'); }
else { $id = get_the_ID(); }
$page_header = get_post_meta($id,'imic_pages_Choose_slider_display',true);
if($page_header==3) {
	get_template_part( 'pages', 'flex' );
}
elseif($page_header==4) {
	get_template_part( 'pages', 'nivo' );
}
elseif($page_header==5) {
	get_template_part( 'pages', 'revolution' );
}
else {
	get_template_part( 'pages', 'banner' );
}
}
 ?>
	<div class="main" role="main">
<div id="content" class="content full">
<div class="container">
    <div class="row">
        <div class="col-md-<?php echo $class; ?>" id="content-col"> 
            <?php woocommerce_content(); imic_pagination(); ?>
        </div>
        <?php if(is_active_sidebar($pageSidebar))
		{
			echo'<div class="col-md-'.$SidebarWidth.' sidebar" id="sidebar-col">';
			dynamic_sidebar($pageSidebar);
			echo'</div>';
		} elseif ($imic_options['woocommerce_sidebar'] !== "") { ?>
			<div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
			<?php dynamic_sidebar($imic_options['woocommerce_sidebar']); ?>
			</div>
		<?php } ?>
        <!-- End Sidebar -->
    </div>
</div>
</div>
</div>
<?php get_footer(); ?>