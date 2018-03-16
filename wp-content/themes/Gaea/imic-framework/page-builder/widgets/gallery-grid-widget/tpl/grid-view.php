<?php
wp_enqueue_script( 'imic_jquery_flexslider' );
wp_enqueue_script('imic_magnific_gallery');
wp_enqueue_script('imic_sg');
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$grid_column = (!empty($instance['grid_column']))? $instance['grid_column'] : 4 ;
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
?>
<?php query_posts( array ( 'post_type' => 'gallery', 'gallery-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts, 'paged' => get_query_var('paged') ) );
if(have_posts()):
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php }
if($instance['filters']){ ?>
        <ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
			<?php $gallery_cats = get_terms("gallery-category");?>
                  <li data-option-value="*" class="active"><a href="#"><i class="fa fa-th"></i> <?php _e('All','framework'); ?></a></li>
              <?php foreach($gallery_cats as $gallery_cat) { ?>
                  <li data-option-value=".<?php echo $gallery_cat->slug; ?>"><a href="#"><?php echo $gallery_cat->name; ?></a></li>
              <?php } ?>
            </ul>
            <div class="spacer-20"></div>
<?php } ?>
<div class="row">
<?php if($instance['filters']){ ?>
<ul class="sort-destination gallery-grid" data-sort-id="gallery">
<?php } else { ?>
<ul class="isotope-grid gallery-grid">
<?php } ?>
<?php while(have_posts()) : the_post();
$thumb_id=get_post_thumbnail_id(get_the_ID());
$post_format_temp =get_post_format();
if (has_post_thumbnail() || ((count($image_data) > 0)&&($post_format_temp=='gallery'))):
$post_format =!empty($post_format_temp)?$post_format_temp:'image';
$term_slug = get_the_terms(get_the_ID(), 'gallery-category');
echo '<li class=" grid-item col-md-'.$grid_column.' col-sm-6 format-'.$post_format.' ';
	if (!empty($term_slug)) {
	foreach ($term_slug as $term) {
	  echo $term->slug.' ';
	}
	} ?>">
	<?php switch (get_post_format()) {
	case 'image': ?>
	<div class="grid-item-inner">
	<?php if ( '' != get_the_post_thumbnail() ) { 
			$image_id = get_post_thumbnail_id(get_the_ID()); 
			$image = wp_get_attachment_image_src($image_id,'full',''); ?>
		<a href="<?php echo esc_url($image[0]); ?>" data-rel="prettyPhoto" class="media-box">
			<?php the_post_thumbnail('800x600'); ?>
			<?php if($instance['show_post_meta']){ ?><span class="gallery-cat"><?php the_title(); ?></span><?php } ?>
		</a><?php } ?>
	</div>
	<?php 
	break;
	case 'gallery': ?>
	<div class="grid-item-inner media-box">
	<?php $image_data=  get_post_meta(get_the_ID(),'imic_gallery_images',false);
	echo imic_gallery_flexslider(get_the_ID());     
	if (count($image_data) > 0) {
	echo'<ul class="slides">';
	foreach ($image_data as $custom_gallery_images) {
	$large_src = wp_get_attachment_image_src($custom_gallery_images, '1000x800');
	echo'<li class="item"><a href="' . $large_src[0] . '" data-rel="prettyPhoto[' . get_the_title() . ']">';
	echo wp_get_attachment_image($custom_gallery_images, '800x600');
	if($instance['show_post_meta']){ echo '<span class="gallery-cat">'.get_the_title().'</span>'; };
	echo'</a></li>';
	}
	echo'</ul>'; } echo '</div>'; ?>
	</div>
	<?php break;
	case 'link':
	$link_url = get_post_meta(get_the_ID(),'imic_gallery_link_url',true);
	if (!empty($link_url)) {
	echo '<a href="' . $link_url . '" target="_blank" class="media-box">';
	the_post_thumbnail('800x600');
	if($instance['show_post_meta']){ echo '<span class="gallery-cat">'.get_the_title().'</span>'; };
	echo'</a>';
	}
	break;
	case 'video':
	$video_url = get_post_meta(get_the_ID(),'imic_gallery_video_url',true);
	if (!empty($video_url)) {
	echo '<a href="' . $video_url . '" data-rel="prettyPhoto" class="media-box">';
	the_post_thumbnail('800x600');
	if($instance['show_post_meta']){ echo '<span class="gallery-cat">'.get_the_title().'</span>'; };
	echo'</a>';
	}
	break;
	default:
	if(!empty($thumb_id)){
	$large_src_i = wp_get_attachment_image_src($thumb_id, '1000x800');
	echo'<a href="' . $large_src_i[0] . '" data-rel="prettyPhoto" class="media-box">';
	the_post_thumbnail('800x600');
	if($instance['show_post_meta']){ echo '<span class="gallery-cat">'.get_the_title().'</span>'; };
	echo'</a>';
	}
	break;
	} ?>
</li>
<?php endif; endwhile; ?>
</ul>
</div>

<?php if(!empty($instance['show_pagination'])){
	echo '<div class="pagination">';
	imic_pagination(); 
	echo '</div>';
} ?>
<?php endif; wp_reset_query(); ?>