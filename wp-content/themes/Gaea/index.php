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
$pageSidebarWidth = get_post_meta($id,'imic_select_sidebar_width', true);
if($pageSidebarWidth != ''){
	$ContentWidth = 12 - $pageSidebarWidth;
	$SidebarWidth = $pageSidebarWidth;
}
$pageSidebar = get_post_meta($id,'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar) || $imic_options['blog_archive_sidebar'] !== '')
{
	$class = $ContentWidth;
}
else
{
	$class = 12;  
}
$ArchiveTitle = $imic_options['blog_archive_title'];
$TagTitle = $imic_options['blog_tags_title'];
if(is_archive()||is_tag())
{
	echo '<div class="secondary-bar">
	<div class="container">
	<div class="row">
	<div class="col-md-12">';
	if(is_tag()) {
	echo '<span class="big">'.esc_attr($TagTitle).' ', single_tag_title( '', false ) .'</span>'; }
	elseif(is_archive()) {
	echo '<span class="big">'.esc_attr($ArchiveTitle).' ', single_cat_title( '', false ) .'</span>'; }
	echo '</div>
	</div>
	</div>
	</div>';
}
?>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
    		<div class="container">
            	<div class="row">
                	<div class="col-md-<?php echo $class; ?>" id="content-col">
                    	<?php if($imic_options['blog_layout'] == 0){ ?>
							<?php if(have_posts()): ?>
                                <ul class="posts-listing">
                                    <?php while(have_posts()):the_post(); ?>
                                        <li id="post-<?php the_ID(); ?>" <?php post_class('post-list-item format-standard'); ?>>
                                            <div class="row">
                                            <?php $post_class = 12; if ( '' != get_the_post_thumbnail() && $imic_options['archive_show_post_image'] ) 
                                            { $post_class = 7; ?>
                                                <div class="col-md-5">
                                                	<?php if($imic_options['archive_show_post_lightbox'] == 1){
														$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
														$url = $thumb['0'];
														$ThumbUrl = $url;
													} else {
														$ThumbUrl = get_permalink(get_the_ID());
													} ?>
                                                    <a href="<?php echo esc_url($ThumbUrl); ?>" class="media-box" <?php if($imic_options['archive_show_post_lightbox'] == 1){?>data-rel="prettyPhoto"<?php } ?>><?php the_post_thumbnail('600x400',array('class'=>'img-thumbnail post-thumb')); ?></a>
                                                </div><?php 
                                            } ?>
                                                <div class="col-md-<?php echo $post_class; ?>">
                                                    <?php if($imic_options['archive_show_post_title'] == 1){ ?><h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3><?php } ?>
                                                <div class="meta-data"><?php if($imic_options['archive_show_post_author'] == 1){ ?><?php _e('Posted by ','framework'); ?><a href="<?php $post_author_id = get_post_field( 'post_author', get_the_ID() ); echo esc_url(get_author_posts_url($post_author_id)); ?>"><?php echo get_the_author_meta( 'display_name', $post_author_id ); ?></a><?php } ?><?php if($imic_options['archive_show_post_date'] == 1){ ?><?php _e(' on ','framework'); echo esc_attr(get_the_date()); ?><?php } ?></div>
                                                <?php $excerptLength = $imic_options['archive_show_post_content_length']; ?>
                                                    <?php if($imic_options['archive_show_post_excerpt'] == 1){ ?>
                                                        <?php if($imic_options['archive_excerpt_strip_html'] == 1){ ?>
                                                    		<p class="post-excerpt"><?php echo strip_tags(content($excerptLength)); ?></p>
                                                        <?php } else { ?>
                                                    		<div class="post-excerpt"><?php echo content($excerptLength); ?></div>
                                                        <?php } ?>
                                                   	<?php } ?>
                                                    <?php wp_link_pages( array(
                                                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'imic-framework' ) . '</span>',
                                                                    'after'       => '</div>',
                                                                    'link_before' => '<span>',
                                                                    'link_after'  => '</span>',
                                                                ) ); ?>
                                                    <?php if($imic_options['archive_show_post_cats'] == 1){ ?><div class="meta-data"><i class="fa fa-archive"></i> <?php the_category(', '); ?></div><?php } ?>
                                                    <?php if($imic_options['archive_show_post_readmore'] == 1){ ?><br><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-sm btn-default"><?php _e('Continue reading','framework'); ?> <i class="fa fa-long-arrow-right"></i></a><?php } ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                    </ul>
                                    <?php else : ?>
                                        <div class="alert alert-warning fade in"><?php _e('There is no posts to display.','framework'); ?></div>
                                    <?php endif; ?>
                        	<?php } else { ?>
								<?php if(have_posts()): ?>
                                    <ul class="grid-holder col-3 posts-grid">
                                        <?php while(have_posts()):the_post(); ?>
                                        <li class="grid-item format-standard">
                                            <div class="grid-item-inner">
                                            <?php if ( '' != get_the_post_thumbnail() && $imic_options['archive_show_post_image'] )
                                                { ?>
                                                <?php if($imic_options['archive_show_post_lightbox'] == 1){
														$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
														$url = $thumb['0'];
														$ThumbUrl = $url;
													} else {
														$ThumbUrl = get_permalink(get_the_ID());
													} ?>
                                                <a href="<?php echo esc_url($ThumbUrl); ?>" class="media-box" <?php if($imic_options['archive_show_post_lightbox'] == 1){?>data-rel="prettyPhoto"<?php } ?>> <?php the_post_thumbnail('800x600'); ?></a><?php
                                                } ?>
                                                <div class="grid-content">
                                                    <?php if($imic_options['archive_show_post_title'] == 1){ ?><h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3><?php } ?>
                                                    <div class="meta-data"><?php if($imic_options['archive_show_post_author'] == 1){ ?><?php _e('Posted by ','framework'); ?><a href="<?php $post_author_id = get_post_field( 'post_author', get_the_ID() ); echo esc_url(get_author_posts_url($post_author_id)); ?>"><?php echo get_the_author_meta( 'display_name', $post_author_id ); ?></a><?php } ?><?php if($imic_options['archive_show_post_date'] == 1){ ?><?php _e(' on ','framework'); echo esc_attr(get_the_date()); ?><?php } ?></div>
                                                <?php $excerptLength = $imic_options['archive_show_post_content_length']; ?>
                                                    <?php if($imic_options['archive_show_post_excerpt'] == 1){ ?>
                                                        <?php if($imic_options['archive_excerpt_strip_html'] == 1){ ?>
                                                    		<p class="post-excerpt"><?php echo strip_tags(content($excerptLength)); ?></p>
                                                        <?php } else { ?>
                                                    		<div class="post-excerpt"><?php echo content($excerptLength); ?></div>
                                                        <?php } ?>
                                                   	<?php } ?>
                                                    <?php if($imic_options['archive_show_post_cats'] == 1){ ?><div class="meta-data"><i class="fa fa-archive"></i> <?php the_category(', '); ?></div><?php } ?>
                                                    <?php if($imic_options['archive_show_post_readmore'] == 1){ ?><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-sm btn-default"><?php _e('Continue reading','framework'); ?> <i class="fa fa-long-arrow-right"></i></a><?php } ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php else : ?>
                                        <div class="alert alert-warning fade in"><?php _e('There is no posts to display.','framework'); ?></div>
                                    <?php endif; ?>
                            <?php } ?>
                        <!-- Pagination -->
                        <?php if (function_exists('imic_pagination'))
							{
								imic_pagination();
							}
							else
							{ 
								next_posts_link( 'Older Entries', $the_query->max_num_pages );
								previous_posts_link( 'Newer Entries' ); } ?>
                   	</div>
                    <!-- Start Sidebar -->
                    <?php if(is_active_sidebar($pageSidebar)) { ?>
                    <div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
                        <?php dynamic_sidebar($pageSidebar); ?>
               	</div>
                <?php } elseif ($imic_options['blog_archive_sidebar'] !== "") { ?>
                    <div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
                    <?php dynamic_sidebar($imic_options['blog_archive_sidebar']); ?>
                    </div>
                <?php } ?>
            </div>
	</div>
       	</div>
   	</div>
<?php get_footer(); ?>