<div class="column single-home-event">
	<a href="<?php the_permalink(); ?>">
        <figure class="image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
        </figure>
    </a>    
    <p class="is-size-5-desktop is-size-6-touch">
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </p>
    <p class="is-size-6-desktop is-size-7-touch">
    	<?php 
		$startDate = new DateTime(get_field('start_date'));
		$endDate = new DateTime(get_field('end_date'));
		echo $startDate->format('m/d (D), g:i a') . ' - ' . $endDate->format('m/d (D), g:i a');
		?>
    </p>
</div>