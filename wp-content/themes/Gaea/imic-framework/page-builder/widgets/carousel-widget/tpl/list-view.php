<?php
$post_title = wp_kses_post($instance['title']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
if($numberPosts == 1){
	$liwidth = 100;
}elseif($numberPosts == 2){
	$liwidth = 50;
}elseif($numberPosts == 3){
	$liwidth = 33.33;
}elseif($numberPosts == 4){
	$liwidth = 25;
}else{
	$liwidth = 20;
}
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
?>
<?php
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php } ?>
<script>
jQuery(function() {
	// apply matchHeight to each item container's items
	jQuery('.partner-logos').each(function() {
		jQuery(this).find('li').matchHeight({
			//property: 'min-height'
		});
	});
});
</script>
<ul class="partner-logos">
<?php foreach( $instance['images'] as $i => $image ) : ?>
<?php
if( !empty($image['icon_image']) ) {
	$attachment = wp_get_attachment_image_src($image['icon_image']);
	if(!empty($attachment)) {
		?><li style="width:<?php echo $liwidth; ?>%"><?php if(!empty( $image['more_url'] )){ ?><a href="<?php echo sow_esc_url( $image['more_url'] ); ?>" <?php echo ( $image['new_window'] ? 'target="_blank"' : '' ); ?>><?php } ?><img src="<?php echo sow_esc_url($attachment[0]); ?>" alt=""><?php if(!empty( $image['more_url'] )){ ?></a><?php } ?>
        <?php if(!empty($image['icon_title'])) : ?>
            <h5>
                <?php echo wp_kses_post( $image['icon_title'] ) ?>
            </h5>
        <?php endif; ?>
        </li><?php
	}
} ?>
<?php endforeach; ?>
</ul>