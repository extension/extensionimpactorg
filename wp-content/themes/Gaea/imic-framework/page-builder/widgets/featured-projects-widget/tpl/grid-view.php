<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$grid_column = (!empty($instance['grid_column']))? $instance['grid_column'] : 4 ;
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 3 ;
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
?>
<?php
query_posts( array ( 'post_type' => 'project', 'project-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts ) );
if(have_posts()):
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php }  ?>
<div class="row">
<?php while(have_posts()) : the_post(); ?>
    <div class="col-md-<?php echo $grid_column; ?> col-sm-6 format-standard">
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="featured-project-block media-box">
            <?php if ( '' != get_the_post_thumbnail() ) { the_post_thumbnail('600x400',array('class'=>'featured-image')); } ?>
            <span class="project-overlay">
                <span class="project-title"><?php the_title(); ?></span>
                <?php if($instance['show_post_meta']){ ?><span class="project-cat"><?php echo imic_custom_taxonomies_terms_links(get_the_ID()); ?></span><?php } ?>
            </span>
        </a>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>