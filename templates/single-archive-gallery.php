<div class="column is-one-third album">

<a href="<?php the_permalink(); ?>">

<div class="card">
    
    <div class="card-image">
        <figure class="image">
		    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
		</figure>
	</div>

	<div class="content">
	    <h3 class="is-size-5-desktop is-size-6-touch name"><?php the_title(); ?></h3>       
	</div>
		    
</div>

</a>

</div>