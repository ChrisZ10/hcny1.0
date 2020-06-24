<?php  
get_header();
get_template_part('templates/home', 'navbar');

while (have_posts()) {
	the_post();
	
	//get the photos
	$photos = acf_photo_gallery('photos', get_the_id());
	//print_r($photos);
	?>

<section id="single-gallery" class="section">

	<div class="container">

		<div class="btn">
			<a href="<?php echo get_post_type_archive_link('gallery'); ?>">查看全部相冊</a>
		</div>

		<h1 class="title"><?php the_title(); ?></h1>
		<div class="hr"></div>

		<div class="grid">

			<!-- width of .grid-sizer used for columnWidth -->
			<div class="grid-sizer"></div>

			<?php 

			$src = get_theme_file_uri('/assets/images/placeholder.jpg');

			// loop through the photos
			foreach ($photos as $photo) {
				
				// masonry layout depending on the ratings
				if (get_field('photos_stars', $photo['id']) == '5') {
					echo '<div class="grid-item grid-item-lg">';
				}
				else {
					echo '<div class="grid-item">';
				}
				
					echo '<figure class="image">';
						$prefix = explode( $photo['title'], $photo['full_image_url'] )[0];
						$datasrc = $prefix . $photo['title'] . '-1024x683.jpg';						
						echo '<img class="lazy" src="' . $src . '" data-src="' . $datasrc . '">';
					echo '</figure>';
				echo '</div>';
			}
			?>

		</div> <!-- grid ends -->

		<!-- photo modal -->
		<div id="photo" class="modal">
  			<div id="photo-bg" class="modal-background"></div>
  			<div class="modal-content"></div>
  			<button id="photo-close" class="modal-close is-large" aria-label="close"></button>
		</div>

		<!-- back-to-top button -->
		<a id="btt-button">
			<span class="icon">
				<i class="fas fa-chevron-circle-up fa-3x"></i>
			</span>
		</a>

	</div> <!-- container ends -->

</section>

<?php 
}
get_footer(); 
?>