<?php  
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="archive-event" class="section">
	<div class="container">
		<h1 class="title">近期活動</h1>
		<div class="hr"></div>
		<?php 
		$today = date('Ymd');
		$events = new WP_Query(array(
			'post_type' => 'event',
        	'meta_key' => 'start_date_for_sort',
        	'orderby' => 'meta_value_num',
        	'order' => 'ASC',
        	'meta_query' => array(
		        array(
		        	'key' => 'start_date_for_sort',
		            'compare' => '>=',
		            'value' => $today,
		            'type' => 'numeric'
	            )
		    )
		));
		while ($events->have_posts()) {
			$events->the_post();
			get_template_part('templates/single', 'archive-event');
		}
		?>

	</div>
</section>
	</div>
</section>

<?php 
get_footer(); 
?>