<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
?>
<?php query_posts( array ( 'post_type' => 'project', 'project-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts ) );
if(have_posts()) : 
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php } ?>
<ul class="posts-listing">
<?php while(have_posts()) : the_post(); ?>
<li id="post-<?php the_ID(); ?>" <?php post_class('post-list-item format-standard'); ?>>
  <div class="row">
<?php $post_class = 12; if ( '' != get_the_post_thumbnail() ) { $post_class = 7; ?>
      <div class="col-md-5">
          <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box"><?php the_post_thumbnail('600x400',array('class'=>'img-thumbnail post-thumb')); ?></a>
      </div><?php } ?>
      <div class="col-md-<?php echo $post_class; ?>">
          <h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></a></h3>
      <?php if($instance['show_post_meta']){ ?><span class="post-time meta-data"><?php _e('Posted on ','framework'); echo esc_html(get_the_date()); ?></span><?php } ?>
          <?php if($instance['excerpt_length']){ ?><p class="post-excerpt"><?php the_excerpt(); ?></p><?php } ?>
          <?php wp_link_pages( array(
                          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'imic-framework' ) . '</span>',
                          'after'       => '</div>',
                          'link_before' => '<span>',
                          'link_after'  => '</span>',
                      ) ); ?>
          <?php if($read_more_text!=""){ ?>
          <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-sm btn-default continue-reading-link"><?php echo $read_more_text; ?><i class="fa fa-long-arrow-right"></i></a>
          <?php } ?>
      </div>
  </div>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>
<?php endif; ?>