<?php
    $event_layout = wp_kses_post($instance['event_layout_type']);
    $event_column = $instance['temp_event_columns_layout'];
    $number = $instance['number_of_posts'];
	$event_category = wp_kses_post($instance['categories']);
 ?>
    <?php
		if($event_layout=='0')
	{
	wp_enqueue_script('event_ajax', IMIC_THEME_PATH . '/js/event_ajax.js', '', '', true);
	wp_localize_script('event_ajax', 'urlajax', array('ajaxurl' => admin_url('admin-ajax.php')));
	$currentEventTime = date('Y-m');
		$prev_month = date('Y-m', strtotime('-1 month', strtotime($currentEventTime)));
		$next_months = date('Y-m', strtotime('+1 month', strtotime($currentEventTime)));
		$today = date('Y-m-d');
		$stop_date = date('Y-m-t');
		$current_end_date = date('Y-m-d H:i:s', strtotime($stop_date . ' + 1 day'));
		$sinc = 1;				  
				  $currentTime = date('Y-m-d G:i');
				  query_posts(array(
								'post_type' => 'event',
								'event-category' => $event_category,
								'meta_key' => 'imic_event_start_dt',
								'meta_query' => array(
										'relation' => 'AND',
										array(
											'key' => 'imic_event_frequency_end',
											'value' => $today,
											'compare' => '>='
										),
										array(
											'key' => 'imic_event_start_dt',
											'value' => $current_end_date,
											'compare' => '<'
										)
								),
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'posts_per_page' => -1
							)
				  ); $count = 0;
				  $events = array();
				  $sinc = 1;
				  $count = 0;
				  if(have_posts())
				  { 
					while (have_posts()):the_post();
					$eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
        			$frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
					$frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
					$frequency_active = get_post_meta(get_the_ID(),'imic_event_frequency_type',true);
					$frequency_type = get_post_meta(get_the_ID(),'imic_event_frequency_type',true);
					$frequency_month_day = get_post_meta(get_the_ID(),'imic_event_day_month',true);
					$frequency_week_day = get_post_meta(get_the_ID(),'imic_event_week_day',true);
        			if ($frequency_active > 0)
					{
            			$frequency_count = $frequency_count;
        			}
					else
					{
						$frequency_count = 0;
					}
        			$seconds = $frequency * 86400;
        			$fr_repeat = 0;
        			while ($fr_repeat <= $frequency_count)
					{
						$eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
						$eventDate = strtotime($eventDate);
						if($frequency_type==1||$frequency_type==0)
						{
							if($frequency==30)
							{
								$eventDate = strtotime("+".$fr_repeat." month", $eventDate);
							}
						else
						{
							$new_date = $seconds * $fr_repeat;
							$eventDate = $eventDate + $new_date;
						}
					}
					else
					{
						$eventTime = date('G:i',$eventDate);
						$eventDate = strtotime( date('Y-m-1',$eventDate) );
						if($fr_repeat==0)
						{
							$fr_repeat = $fr_repeat+1;
						}
					$eventDate = strtotime("+".$fr_repeat." month", $eventDate);
					$next_month = date('F',$eventDate);
					$next_event_year = date('Y',$eventDate);
					//echo $next_month;
					$eventDate = date('Y-m-d '.$eventTime, strtotime($frequency_month_day.' '.$frequency_week_day.' of '.$next_month.' '.$next_event_year));
					//echo $eventDate;
					$eventDate = strtotime($eventDate);
				}
			
					if(($eventDate > strtotime($currentTime)) && ($eventDate >= strtotime($today))&& ($eventDate <= strtotime($current_end_date)))
					{
						$events[$eventDate+$sinc] = get_the_ID();
						$sinc++; $count++;
					}
					$fr_repeat++;
				} 
						endwhile; 
			} wp_reset_query();
?>
						<div class="events-listing" id="ajax_events">
                            <div class="listing-header">
                                <h2 class="title "><?php _e('Monthly Events','framework'); ?> <label class="label label-primary"><?php echo date_i18n('F', strtotime($currentEventTime)); ?></label></h2>
                                
                                <nav class="nav-np">
                                    <a href="javascript:" class="upcomingEvents" rel="" id="<?php echo $prev_month; ?>"><i class="fa fa-angle-left"></i></a>
                    					<a href="javascript:" class="upcomingEvents" rel="" id="<?php echo $next_months; ?>"><i class="fa fa-angle-right"></i></a>
                                </nav>
                            </div>
                            <ul class="upcoming-events listing-content">
                            <?php 
								if(!empty($events))
								{
									ksort($events); foreach($events as $key=>$value)
									{
										$date_converted=date('Y-m-d',$key );
                						$custom_event_url= imic_query_arg($date_converted,$value);
										$style = ''; ?>
                            			<li>
                                    	<a href="<?php echo esc_url($custom_event_url); ?>" class="event-details-btn"><i class="fa fa-angle-right"></i></a>
                                		<?php if ( '' != get_the_post_thumbnail($value) )
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
                               	</li><?php
                                }
							}
							else
							{ ?>
                                <li class="item event-item">	
			  <div class="event-detail">
                        <h4><?php _e("Sorry, there are no events for this month.","framework"); ?></h4>
                      </div>
                    </li><?php } ?>
                            	</ul>
</div>
<?php
} 
elseif($event_layout=='2')
{
	wp_enqueue_script('event_ajax', IMIC_THEME_PATH . '/js/event_ajax.js', '', '', true);
	wp_localize_script('event_ajax', 'urlajax', array('ajaxurl' => admin_url('admin-ajax.php')));
	$event_count = get_post_meta(get_the_ID(),'imic_events_count',true);
	$event_count = ($event_count!='')?$event_count:10;
	if($event_category!='')
	{
		$event_categories= get_term_by('id',$event_category,'event-category');
		if(!empty($event_categories))
		{
			$event_category= $event_categories->slug;
		}
	}
	$events = imic_recur_events('future','',$event_category);
	?>
						<div class="events-listing" id="ajax_events">
                            <div class="listing-header">
                            	<a href="javascript:" class="pastevents btn btn-default pull-right btn-sm" rel="<?php echo $event_category; ?>" id="past-<?php echo $event_count; ?>"><?php _e('Past','framework'); ?></a>
                                <h2 class="title "><?php _e('Future Events','framework'); ?></h2>
                            </div>
                            <ul class="upcoming-events listing-content">
                            <?php 
								if(!empty($events))
								{ 
									$total = 1;
									ksort($events); foreach($events as $key=>$value)
									{ 
										$date_converted=date('Y-m-d',$key );
                						$custom_event_url= imic_query_arg($date_converted,$value);
										$style = ''; ?>
                            			<li>
                                    		<a href="<?php echo esc_url($custom_event_url); ?>" class="event-details-btn"><i class="fa fa-angle-right"></i></a>
                                			<?php if ( '' != get_the_post_thumbnail($value) )
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
                                    <?php $address = get_post_meta($value,'imic_event_address2',true); if($address!='')
									{
										?>
                                    		<p class="event-location"><i class="fa fa-map-marker"></i> <?php echo $address; ?></p><?php
									} ?>
                                    	</div>
                               		</li><?php if($total++>=$event_count)
									{
										break;
									}
								}
							}
							else
							{ ?>
                                <li class="item event-item">	
                                    <div class="event-detail">
                	                    <h4><?php _e("Sorry, there are no events for this month.","framework"); ?></h4>
 				                     </div>
                    			</li><?php } ?>
                           	</ul>
						</div>
<?php
}
else
{ ?>
            <ul class="grid-holder col-<?php echo $event_column; ?> events-grid">
            <?php $events = imic_recur_events('future','',$event_category); ksort($events);
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$count = 1;
				$saiji = 1;
				$perPage = $number;
				$paginate = 1;
				if($paged>1)
				{
					$paginate = ($paged-1)*$perPage; $paginate = $paginate+1;
				}
				$TotalEvents = count($events);
				if($TotalEvents%$perPage==0)
				{
					$TotalPages = $TotalEvents/$perPage;
				}
				else
				{
					$TotalPages = $TotalEvents/$perPage;
					$TotalPages = $TotalPages+1;
				}
foreach($events as $key=>$value): $date_converted=date('Y-m-d',$key );
                $custom_event_url= imic_query_arg($date_converted,$value);
				if($count==$paginate&&$saiji<=$perPage) { $paginate++; $saiji++;
				 ?>
                <li class="grid-item format-standard">
                        <div class="grid-item-inner"> <?php if ( '' != get_the_post_thumbnail($value) )
						{
							echo '<a href="'.esc_url($custom_event_url).'" class="media-box">'.get_the_post_thumbnail($value,'full').'</a>';
						}
						$address1 = get_post_meta($value,'imic_event_address1',true);
						$address2 = get_post_meta($value,'imic_event_address2',true); ?>
                        <ul class="info-cols clearfix">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo date_i18n(get_option('date_format'), $key); ?>"><i class="fa fa-calendar"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo date_i18n(get_option('time_format'), $key); ?>"><i class="fa fa-clock-o"></i></a></li><?php if($address2!='') { ?>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $address2; ?>"><i class="fa fa-map-marker"></i></a></li><?php } if($address1!='') { ?>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo $address1; ?>"><i class="fa fa-flag"></i></a></li><?php } ?>
                        </ul>
                        <div class="grid-content">
                            <h3><a href="<?php echo esc_url($custom_event_url); ?>"><?php echo get_the_title($value); ?></a></h3>
                            <?php $page_data = get_page( $value );
									$excerpt = strip_tags($page_data->post_excerpt);
									echo $excerpt; ?>
                        </div>
                    </div>
                  </li><?php
				 } $count++; endforeach; ?>
                  </ul><?php imic_pagination($TotalPages,$perPage,'Default','past'); ?>
<?php } ?>