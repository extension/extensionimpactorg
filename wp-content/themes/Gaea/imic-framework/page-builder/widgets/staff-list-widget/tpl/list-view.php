<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$read_more_text = wp_kses_post($instance['read_more_text']);
$grid_column = (!empty($instance['grid_column']))? $instance['grid_column'] : 4 ;
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 3 ;
$order = wp_kses_post($instance['orderby']);
$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
$allpostsurl = sow_esc_url($instance['allpostsurl']);
if ($order == "no") {
	$orderby = "ID";
	$sort_order = "DESC";
} elseif ($order == "yes") {
	$orderby = "menu_order";
	$sort_order = "ASC";
}
?>
<?php query_posts( array ( 'post_type' => 'staff', 'staff-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts, 'orderby' => $orderby, 'order' => $sort_order ) );
if(have_posts()):
if(!empty($instance['title'])){ ?>
<?php if(!empty($instance['allpostsurl'])){ ?><a href="<?php echo $allpostsurl; ?>" class="btn btn-default pull-right"><?php echo $allpostsbtn; ?></a><?php } ?>
<h2 class="title">
<?php echo $post_title; ?>
</h2>
<?php }
?>
<?php while(have_posts()) : the_post();
$custom = get_post_custom(get_the_ID());
echo '<div class="staff-item">
	<div class="row">';
									$post_col = 12; $post_sm_col = 12; if ( '' != get_the_post_thumbnail() ) { $post_col = 7; $post_sm_col = 6;
                                    echo '<div class="col-md-5 col-sm-6">'.
                                    	get_the_post_thumbnail(get_the_ID(),'600x400',array('class'=>'img-thumbnail')).'
                                    </div>'; }
                                    echo '<div class="col-md-'.$post_col.' col-sm-'.$post_sm_col.'">
                                    	<h3><a data-toggle="modal" data-target="#team-modal-'.(get_the_ID()+2648).'" href="#" class="">'.get_the_title().'</a></h3>';
										if($instance['show_post_meta']){
                                    	echo '<span class="meta-data">'.get_post_meta(get_the_ID(),'imic_staff_position',true).'</span>
                        				'.imic_social_staff_icon().'';
										
									   if (get_post_meta(get_the_ID(), 'imic_staff_member_phone', true) != '') {
											echo '<p style="width:auto; background:none; color:#777; margin-top:10px; font-size:16px; display:block; text-align:left; width:100%"><i class="fa fa-phone"></i> '.get_post_meta(get_the_ID(), 'imic_staff_member_phone', true).'</p>';
										}
										}
                                       	if($instance['excerpt_length']){ echo'<p class="post-excerpt">'.the_excerpt().'</p>'; }
										if($read_more_text!=""){
          									echo'<a href="'.esc_url(get_permalink(get_the_ID())).'" class="btn btn-sm btn-default continue-reading-link">'.$read_more_text.'<i class="fa fa-long-arrow-right"></i></a>';
          								}
                                    echo '</div>
                                </div>
                            </div>';
				echo '<div class="modal fade" id="team-modal-'.(get_the_ID()+2648).'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title" id="myModalLabel">'.get_the_title().'</h3>
                          </div>
                            <div class="modal-body">
                                <div class="staff-item">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                    	'.get_the_post_thumbnail(get_the_ID(),'600x400',array('class'=>'img-thumbnail')).'
                                    </div>
                                    <div class="col-md-7 col-sm-6">
                                    	<span class="meta-data">'.get_post_meta(get_the_ID(),'imic_staff_position',true).'</span>
										'.imic_social_staff_icon().'';
									   if (get_post_meta(get_the_ID(), 'imic_staff_member_phone', true) != '') {
											$output.='<p style="width:auto; background:none; color:#777; margin-top:10px; font-size:16px; display:block; text-align:left; width:100%"><i class="fa fa-phone"></i> '.get_post_meta(get_the_ID(), 'imic_staff_member_phone', true).'</p>';
										};
                                        $post_id = get_post(get_the_ID());
											$content = $post_id->post_content;
											$content = apply_filters('the_content', $content);
											$content = str_replace(']]>', ']]>', $content);
                                    echo ''.$content.'</div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>'; ?>
<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>