<?php
/*
Template Name: Blog Masonry
*/
get_header();
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
$pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar) || $imic_options['page_sidebar'] !== '')
{
	$class = $ContentWidth;
}
else
{
	$class = 12;  
}
?>
	<div class="main" role="main">
    	<div id="content" class="content full">
    		<div class="container">
            	<div class="row">
                	<div class="col-md-<?php echo $class; ?>" id="content-col">
						<div class="page-content"><?php the_content(); ?></div>
                        <ul class="grid-holder col-3 posts-grid">
                        <?php $post_category = get_post_meta($id,'imic_advanced_post_taxonomy',true);
							if(!empty($post_category))
							{
								$post_categories= get_category($post_category);
								$post_category= $post_categories->slug; }
								$paged = (get_query_var('paged'))?get_query_var('paged'):1;
								query_posts(array('post_type'=>'post','category_name' => $post_category,'paged'=>$paged));
								if(have_posts()):while(have_posts()):the_post(); ?>
                            	<li class="grid-item format-standard">
                                <div class="grid-item-inner">
                                <?php if ( '' != get_the_post_thumbnail() )
									{ ?>
                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box"> <?php the_post_thumbnail('800x600'); ?></a><?php
									} ?>
                                    <div class="grid-content">
                                        <h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
                                        <div class="meta-data"><?php _e('Posted by ','framework'); ?><a href="<?php $post_author_id = get_post_field( 'post_author', get_the_ID() ); echo esc_url(get_author_posts_url($post_author_id)); ?>"><?php echo get_the_author_meta( 'display_name', $post_author_id ); ?></a><?php _e(' on ','framework'); echo esc_attr(get_the_date()); ?></div>
                                        <?php echo imic_excerpt(); ?>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; else: ?>
                            <li class="grid-item format-standard">
                                <div class="grid-item-inner">
                                    <div class="grid-content">
                                        <h3 class="post-title"><?php _e('No Posts to display','framework'); ?></h3>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <?php imic_pagination(); wp_reset_query(); ?>
                   	</div>
                    <?php if(is_active_sidebar($pageSidebar))
						{ ?>
                            <!-- Sidebar -->
                            <div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
                                <?php dynamic_sidebar($pageSidebar); ?>
                            </div>
                    <?php
						} elseif ($imic_options['page_sidebar'] !== "") { ?>
                        <div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
                        <?php dynamic_sidebar($imic_options['page_sidebar']); ?>
                        </div>
                    <?php } ?>
               	</div>
            </div>
       	</div>
   	</div>
<?php get_footer(); ?>