<a href="<?php the_permalink(); ?>">
<div id="single-category-devotion" class="card">
	<div class="card-image">
		<figure class="image is-3by2">
      		<img src="<?php echo get_the_post_thumbnail_url(); ?>">
    	</figure>
	</div>
	<div class="card-content">
		<p class="card-title is-size-5-desktop is-size-6-touch">
			<?php echo get_the_title(); ?>
		</p>
	</div>
</div>
</a>