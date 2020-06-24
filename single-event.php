<?php  
get_header();
get_template_part('templates/home', 'navbar');
while (have_posts()) {
	the_post();
?>

<section id="single-event" class="section">
	<div class="container">
		<div class="btn">
			<a href="<?php echo get_post_type_archive_link('event'); ?>">查看全部活動</a>
		</div>
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="hr"></div>
		<div class="btn">
			<?php 
			$location = get_field('map_location');
			$location_google = str_replace(' ', '+', $location['address']);
			//date_default_timezone_set('America/New_York');
			$startDate = new DateTime(get_field('start_date'));
			$endDate = new DateTime(get_field('end_date'));
			$startDate_timestamp = $startDate->getTimestamp();
			$endDate_timestamp = $endDate->getTimestamp();
			$startDate_google = date('Ymd\THis', $startDate_timestamp);
			$endDate_google = date('Ymd\THis', $endDate_timestamp);
			if (wp_is_mobile()) {
				$gc_url = 'https://calendar.google.com/calendar/gp#~calendar:view=e&bm=1';
			} else {
				$gc_url = 'https://www.google.com/calendar/render?action=TEMPLATE';
			}
			$gc_url .= '&text=' . get_the_title() .
					   '&dates=' . $startDate_google . '/' . $endDate_google .
					   '&ctz=America/New_York' .
					   '&details=' . get_the_content() .
					   '&location=' . $location_google .
					   '&sf=true&output=xml';
			?>
			
		</div>
		<div>
			<figure class="image">
	        	<img src="<?php echo get_the_post_thumbnail_url(); ?>">
	    	</figure>
		</div>
		<?php 
		if (get_the_content() != '') {
		?>
			<h3 class="subtitle"><span>活動介紹：</span></h3>
			<p class="is-size-6-desktop is-size-7-touch"><?php the_content(); ?></p>
		<?php 
		} 
		?>
		<h3 class="subtitle"><span>活動時間：</span></h3>
		<p class="is-size-6-desktop is-size-7-touch">
			<?php 
            echo $startDate->format('m/d (D), g:i a') . ' 至 ' . $endDate->format('m/d (D), g:i a');
			?>
		</p>
		<h3 class="subtitle"><span>活動地點：</span></h3>
		<p class="is-size-6-desktop is-size-7-touch">
			<?php 
			$name = get_field('location_name');
			echo $name . '<br>';
			echo $location['address'];
			?>
		</p>
		<div class="acf-map">
			<?php $location = get_field('map_location'); ?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
		      	<?php echo $location['address']; ?>
		    </div>
	    </div>
	    <?php
	    $poster = get_field('poster'); 
	    if ($poster) {
	    	//print_r($poster['url']);
	    ?>	
	    	<h3 class="subtitle">活動海報：</h3>
	    	<figure class="image">
	        	<img src="<?php echo $poster['url']; ?>">
	    	</figure>
		    <div class="btn">
				<a href="<?php echo $poster['url']; ?>" download>下載海報</a>
			</div>
	    <?php	
	    }

	    $presentation = get_field('presentation');
	    if ($presentation) {
	    	//print_r($presentation);
	    ?>
	    	<h3 class="subtitle">活動PPT：</h3>
		    <embed src="<?php echo $presentation; ?>" type="application/pdf">
		    <div class="btn">
				<a href="<?php echo $presentation; ?>" download>下載PPT</a>
			</div>
	    <?php 	
	    }
	    ?>	    
	</div>
</section>

<?php 
}
get_footer(); 
?>