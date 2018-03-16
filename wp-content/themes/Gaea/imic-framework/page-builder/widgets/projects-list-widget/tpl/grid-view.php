<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
?>
<?php query_posts( array ( 'post_type' => 'project', 'project-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts ) );
if(have_posts()):
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php } ?>
<div class="row">
<ul class="isotope-grid posts-grid">
<?php while(have_posts()) : the_post();
echo '<li class="grid-item col-md-'.$layout_type['column'].' col-sm-6 post format-standard">'; ?>
<div class="grid-item-inner">
<?php if ( '' != get_the_post_thumbnail() ) { ?>
	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box"> <?php the_post_thumbnail('800x600'); ?></a><?php } ?>
	<div class="grid-content">
		<h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
		<?php if($instance['show_post_meta']){ ?><div class="meta-data"><?php _e('Posted on ','framework'); echo esc_attr(date_i18n(get_option('date_format'))); ?></div><?php } ?>
		<?php if($instance['excerpt_length']){ ?><p class="post-excerpt"><?php the_excerpt(); ?></p><?php } ?>
          <?php if($read_more_text!=""){ ?>
          <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-sm btn-default continue-reading-link"><?php echo $read_more_text; ?><i class="fa fa-long-arrow-right"></i></a>
          <?php } ?>
	</div>
</div>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>
<?php endif; ?>