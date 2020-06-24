<div class="container single-archive-event">
	<a href="<?php the_permalink(); ?>">
        <figure class="image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
        </figure>
    </a>
    <div class="content">
    	<h3 class="subtitle"><?php the_title(); ?></h3>
		<p class="is-size-6-desktop is-size-7-touch">
			時間：
			<?php 
            //date_default_timezone_set('America/New_York');
			$startDate = new DateTime(get_field('start_date'));
			$endDate = new DateTime(get_field('end_date'));
			echo $startDate->format('m/d (D), g:i a') . ' 至 ' . $endDate->format('m/d (D), g:i a');
			?>
		</p>
		<p class="is-size-6-desktop is-size-7-touch">
			地點：
			<?php 
			$name = get_field('location_name');
			$location = get_field('map_location');
			echo $name . '<br>';
			echo $location['address'];
			?>
		</p>
		<div class="btn">
			<a href="<?php the_permalink(); ?>">具體細節</a>
		</div>		
    </div>   
</div>

