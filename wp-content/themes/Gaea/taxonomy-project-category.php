<?php
get_header();
imic_sidebar_position_module();
global $imic_options;
$term_taxonomy=get_query_var('taxonomy');
$cat_id = get_queried_object()->term_id;
$cat_image = get_option($term_taxonomy . $cat_id . "_image_term_id");
$project_image = ($cat_image!='')?$cat_image:$imic_options['header_image']['url'];
$projectposttitle = $imic_options['project_archive_title'];
if($imic_options['sidebar_width'] != ''){
	$ContentWidth = 12 - $imic_options['sidebar_width'];
	$SidebarWidth = $imic_options['sidebar_width'];
}
?>
<div class="page-header" style="background-image:url(<?php echo $project_image; ?>)">
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
    				<h2><?php echo esc_attr($projectposttitle); ?></h2>
                </div>
           	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="double-border"></div>
    <!-- Secondary Header -->
    <div class="secondary-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<span class="big"><?php __('Project List for: ','framework'); echo get_queried_object()->name; ?></span>
              	</div>
            </div>
        </div>
    </div>
    <!-- Start Body Content -->
    <?php  if(is_active_sidebar('page-sidebar') || $imic_options['project_archive_sidebar'] != '')
		{
			$class = $ContentWidth;
		}
		else
		{
			$class = 12;
		} ?>
  	<div class="main" role="main">
    	<div id="content" class="content full">
    		<div class="container">
            	<div class="row row-padding">
                	<div class="col-md-<?php echo $class; ?>" id="content-col">
                        <h2 class="title"><?php _e('Projects','framework'); ?></h2>
                        <ul class="posts-listing">
                        <?php if(have_posts()):while(have_posts()):the_post(); ?>
                            <li class="post-list-item format-standard">
                                <div class="row">
                                    <div class="col-md-5">
                                    <?php if ( '' != get_the_post_thumbnail() )
								{ ?>
                                        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box"><?php the_post_thumbnail('800x534',array('class'=>'img-thumbnail post-thumb')); ?></a><?php
								} ?>
                                    </div>
                                    <div class="col-md-7">
                                        <h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
                                        <span class="post-time meta-data"><?php echo esc_attr(date_i18n(get_option('date_format'))); ?></span>
                                        <?php echo imic_excerpt(); ?>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; endif; ?>
                        </ul>
                        <!-- Pagination -->
                        <?php imic_pagination(); ?>
                   	</div>
                    <!-- Start Sidebar -->
                    <?php if ($imic_options['project_archive_sidebar'] !== "") { ?>
        				<div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
    						<?php dynamic_sidebar($imic_options['project_archive_sidebar']); ?>
    					</div>
    				<?php }
					elseif(is_active_sidebar('page-sidebar'))
					{ ?>
                    	<div class="col-md-<?php echo $SidebarWidth; ?> sidebar right-sidebar" id="sidebar-col">
                    		<?php dynamic_sidebar('page-sidebar'); ?>
                    	</div>
                    <?php
					} ?>
               	</div>
            </div>
       	</div>
   	</div>
<?php get_footer(); ?>