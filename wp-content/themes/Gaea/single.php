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
$pageSidebar = get_post_meta(get_the_ID(),'imic_select_sidebar_from_list', true);
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar) || $imic_options['blog_sidebar'] !== '')
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
                    <?php while(have_posts()):the_post(); ?>
                		<div class="entry single-post">
                        <?php if($imic_options['single_show_post_title'] == 1){ ?>
                            <h2 class="title"><?php the_title(); ?></h2>
                      	<?php } ?>
                            <div class="meta-data">
                                <?php if(get_post_type()=='staff')
								{
                                	$job_title = get_post_meta(get_the_ID(), 'imic_staff_position', true);
                              		if(!empty($job_title))
									{
                                		echo '<span><span class="accent-color">'.__(' Designation : ','framework').'</span>'.$job_title.'</span>';
                            		}
								}
								else
								{ ?>
                        		<?php if($imic_options['single_show_post_author'] == 1){ ?>
                                	<span><?php _e('Posted by ','framework'); ?><a href="<?php $post_author_id = get_post_field( 'post_author', get_the_ID() ); echo esc_url(get_author_posts_url($post_author_id)); ?>"><i class="fa fa-user"></i> <?php echo get_the_author_meta( 'display_name', $post_author_id ); ?></a></span>
                                <?php } ?>
                        		<?php if($imic_options['single_show_post_date'] == 1){ ?>
                                	<span><i class="fa fa-calendar"></i><?php _e(' Posted on ','framework'); echo esc_html(get_the_date()); ?></span>
                                <?php } ?>
                        		<?php if($imic_options['single_show_post_cats'] == 1){ ?>
                                	<span><i class="fa fa-archive"></i><?php _e(' Categories: ','framework'); ?><?php the_category(', '); ?></span>
                                <?php } ?>
                        		<?php if($imic_options['single_show_post_comment_icon'] == 1){ ?>
                                	<span><i class="fa fa-comments"></i> <?php comments_popup_link(''.__('No comments yet','framework'), '1', '%', 'comments-link',__('Comments are off for this post','framework')); ?></span>
                                <?php } ?>
                              <?php } ?>
                            </div>
                            <?php if ( '' != get_the_post_thumbnail() && $imic_options['single_show_post_image'] )
								{
									the_post_thumbnail('full',array('class'=>'img-thumbnail post-single-image'));
								}
								$categories = get_the_category(get_the_ID()); 
								$current_post = get_the_ID(); ?>
                                <?php if(get_post_type()=='staff')
								{
									echo '<br>'.imic_social_staff_icon().'<br>';
									if (get_post_meta(get_the_ID(), 'imic_staff_member_phone', true) != '') {
										echo'<p style="color:#777; margin-top:10px; font-size:14px; text-align:left; "><i class="fa fa-phone"></i> '.get_post_meta(get_the_ID(), 'imic_staff_member_phone', true).'</p>';
									}
								}
								?>
                            	<article class="post-content"> 
                                <?php the_content();
								if ($imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['1'] == '1')
								{
									imic_share_buttons();
								}
								 ?>
                            </article>
                        	<?php if($imic_options['single_show_post_cats'] == 1){ ?>
                                <div class="post-tags">
                                    <?php if (has_tag())
                                    {
                                        echo'<div class="post-meta">';
                                        echo'<i class="fa fa-tags"></i> ';
                                        the_tags('', '');
                                        echo'</div>';
                                    } ?>
                                </div>
                           	<?php } ?>
                            <?php endwhile; 
                             if(get_post_type()=='post')
							 {
                            ?>
                        	<?php if($imic_options['single_show_related_posts'] == 1){ ?>
                                <!-- Related Posts -->
                                <div class="related-posts">
                                    <h4 class="title"><?php _e('You might also like','framework'); ?></h4>
                                    <div class="row">
                                    <?php query_posts(array('post_type'=>'post','posts_per_page'=>3,'category_name'=>$categories[0]->slug,'post__not_in' => array($current_post)));
                                                if(have_posts()):while(have_posts()):the_post(); ?>
                                        <div class="col-md-4 related-post format-standard">
                                            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box"><?php if ( '' != get_the_post_thumbnail() ) { the_post_thumbnail('600x400',array('class'=>'img-thumbnail post-thumb')); } ?></a>
                                            <h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
                                            <span class="post-time meta-data"><?php _e('Posted on ','framework'); echo esc_html(get_the_date()); ?></span>
                                        </div>
                                        <?php endwhile; endif; wp_reset_query(); ?>
                                    </div>
                                </div>
                          	<?php } ?>
                            
                        	<?php if($imic_options['single_show_related_posts'] == 1){ ?>
                            	<!-- Post Comments -->
                            	<?php comments_template('', true); } ?> 
                          	<?php } ?>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <?php if(is_active_sidebar($pageSidebar))
					{ ?>
				<div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
				<?php dynamic_sidebar($pageSidebar); ?>
				</div>
				<?php } elseif ($imic_options['blog_sidebar'] !== "") { ?>
                	<div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
				<?php dynamic_sidebar($imic_options['blog_sidebar']); ?>
				</div>
                <?php } ?>
              </div>
            </div>
       	</div>
   	</div>
<?php get_footer(); ?>