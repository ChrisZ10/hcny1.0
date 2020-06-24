<?php  
get_header();
get_template_part('templates/home', 'navbar');
while (have_posts()) {
	the_post();
?>

<section id="single-message" class="section">
	<div class="container">
		<div class="btn">
			<a href="<?php echo get_post_type_archive_link('message'); ?>">查看全部消息</a>
		</div>
		<h1 class="title"><?php the_title(); ?></h1>
		<div class="hr"></div>
		<div>
			<figure class="image">
	        	<img src="<?php echo get_the_post_thumbnail_url(); ?>">
	    	</figure>
		</div>
		<?php 
		if (get_the_content() != '') {
		?>
			<p class="is-size-6-desktop is-size-7-touch"><?php the_content(); ?></p>
	    <?php	
	    }
	    ?>
	    <hr>
	    <p class="is-size-6-desktop is-size-7-touch">
    		由
    		<?php the_author(); ?>
    		在
    		<?php echo get_the_date('Y/m/d') ?>
    		發佈
    	</p>	    
	</div>
</section>

<?php 
}
get_footer(); 
?>