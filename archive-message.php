<?php  
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="archive-message" class="section">
	<div class="container">
		<h1 class="title">家事報告</h1>
		<div class="hr"></div>
		<?php 
		$messages = new WP_Query(array(
			'post_type' => 'message',
        	'orderby' => 'post_date',
        	'order' => 'DESC'
		));
		while ($messages->have_posts()) {
			$messages->the_post();
			get_template_part('templates/single', 'archive-message');
		}
		?>
	</div>
</section>

<?php 
get_footer(); 
?>