<?php
$post_title = wp_kses_post($instance['title']);
$next_events = imic_recur_events('past',"",'');
$the_categories = wp_kses_post($instance['categories']);
$numberPosts = wp_kses_post($instance['number_of_posts']);
query_posts( array ( 'post_type' => 'event', 'event-category' => ''. $the_categories .'', 'posts_per_page' => $numberPosts ) );
if(have_posts()): ?>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-1">
                	<h4><?php echo $post_title; ?></h4>
                    <ul class="passed-events angles">
                    <?php krsort($next_events); $total = 1; foreach($next_events as $key=>$value)
					{
						$date_converted=date('Y-m-d',$key );
                		$custom_event_url= imic_query_arg($date_converted,$value); ?>
                    	<li><a href="<?php echo esc_url($custom_event_url); ?>"><?php echo get_the_title($value); ?></a></li>
						<?php if (++$total > $numberPosts)
                        {
                            break;
                        }
                    } ?>
                    </ul>
                </div>
            </div>
        </div>
	<?php endif; wp_reset_query(); ?>