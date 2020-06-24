<div class="container single-archive-message">
	<figure class="image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
    </figure>
    <div class="content">
    	<h3 class="subtitle"><?php the_title(); ?></h3>
    	<p class="is-size-6-desktop is-size-7-touch">
    		由
    		<?php the_author(); ?>
    		在
    		<?php echo get_the_date('Y/m/d') ?>
    		發佈
    	</p>
		<div class="btn">
			<a href="<?php the_permalink(); ?>">具體細節</a>
		</div>		
    </div>   
</div>