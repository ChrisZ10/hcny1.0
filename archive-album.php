<?php  
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="gallery-banner" class="hero is-medium">
  	<div class="hero-body">
    	<div class="container">
      		<img src="<?php echo get_theme_file_uri('/assets/images/title_gallery.png'); ?>">
    	</div>
  	</div>
</section>

<section id="archive-gallery" class="section">
	<div class="container">
		
		<?php
		$galleries = new WP_Query(array(
			'post_type' => 'gallery',
    		'orderby' => 'post_date',
    		'order' => 'DESC'
		));
		?>

		<div class="columns is-multiline is-variable is-5">

		<?php
		while ($galleries->have_posts()) {
			$galleries->the_post();
			get_template_part('templates/single', 'archive-gallery');
		}
		?>

		</div>

	</div>
</section>

<?php 
get_footer(); 
?>