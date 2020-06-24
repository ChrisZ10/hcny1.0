<?php  
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="category-devotion" class="section">
	<div class="container">
		
		<a class="top button" href="<?php echo site_url('/daily-devotion'); ?>">返回每日靈修頁面</a>

		<h1 class="title">全部靈修文章</h1>
	
		<div class="hr"></div>

		<?php 
		$posts = new WP_Query(array(
			'category_name' => 'devotion',
			'meta_key' => 'devotion_date',
		    'orderby' => 'meta_value_num',
		    'order' => 'ASC',
            'posts_per_page' => -1
		));

		while ($posts->have_posts()) {
			$posts->the_post();
			get_template_part('templates/single', 'category-devotion');
		}
		?>

	</div>	
</section>

<?php 
get_footer(); 
?>