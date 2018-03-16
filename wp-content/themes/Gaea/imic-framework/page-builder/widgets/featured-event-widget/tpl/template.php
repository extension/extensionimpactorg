<?php
$post_title = wp_kses_post($instance['title']);
$featured_events = imic_recur_events("future","yes",'');
$event_category = wp_kses_post($instance['categories']);
wp_enqueue_script('imic_jquery_flexslider');
query_posts( array ( 'post_type' => 'event', 'event-category' => ''. $the_categories .'') );
if(have_posts()): ?>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-5">
                	<h4><?php echo $post_title; ?></h4>
                    <div class="flexslider featured-events" data-arrows="yes" data-style="slide" id="featured-events">
                        <ul class="upcoming-events slides">
                           <?php ksort($featured_events); foreach($featured_events as $key=>$value)
						   {
							   $date_converted=date('Y-m-d',$key );
						   		$style = '';
                				$custom_event_url= imic_query_arg($date_converted,$value); ?>
                            	<li><?php if ( '' != get_the_post_thumbnail($value) )
								{
									echo get_the_post_thumbnail($value,'80x80',array('class'=>'img-thumbnail event-thumb'));
								}
								else
								{
									$style = "style=\"opacity:1;\"";
								} ?>
                                <span class="event-date" <?php echo $style; ?>>
                                    <span class="day"><?php echo esc_attr(date_i18n('d', $key)); ?></span>
                                    <span class="monthyear"><?php echo esc_attr(date_i18n('M, ', $key)); echo esc_attr(date_i18n('y', $key)); ?></span>
                                </span>
                                <div class="event-excerpt">
                                    <div class="event-cats meta-data"><?php echo get_the_term_list($value, 'event-category', '', ', ', '' ); ?></div>
                                    <h5 class="event-title"><a href="<?php echo esc_url($custom_event_url); ?>"><?php echo get_the_title($value); ?></a></h5>
                                    <?php $address = get_post_meta($value,'imic_event_address2',true); if($address!='') { ?>
                                    <p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $address; ?></p><?php } ?>
                                </div>
                            </li><?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; wp_reset_query(); ?>