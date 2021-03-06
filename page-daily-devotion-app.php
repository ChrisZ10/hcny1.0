<?php 
get_header();
?>

<div id="date-slider" class="section">

	<div class="container">
		
		<h3 class="subtitle">
      		親愛的弟兄姐妹，讓我們每天通過靈修認識、親近、尋求上帝，以祂的話語來餵養我們屬靈的生命；通過讀經、默想和禱告，經歷上帝的同在和引導。
      	</h3>
      	<div class="hr"></div>

      	<div class="buttons">
      		<button id="back-to-current" class="top button">
				今日靈修
			</button>
      	</div>

		<!-- <div class="scrollbar">
			<div class="handle"></div>
		</div> -->

		<div class = 'control'>
			<a id="prev-date">
				<span class="icon">
					<i class="fas fa-chevron-left fa-2x"></i>
				</span>				
			</a>

			<div class="frame">
				<ul class="slidee">
					<?php 				
					// 2020 is leap year (function detecting leap year)
					for ($day = 0; $day<=365; $day++) {
						$year = date('Y');

						generate_date_card(array(
							'year' => $year,
							'day' => $day
						));

					}
					?>
				</ul>
			</div>

			<a id="next-date">
				<span class="icon">
					<i class="fas fa-chevron-right fa-2x"></i>
				</span>				
			</a>
		</div>
	
	</div>

</div>

<div id="single-devotion" class="section">
	<div id="single-devotion-container" class="container is-size-5-desktop is-size-6-tablet">
		<?php 
		
		// display today's daily devotion content
		date_default_timezone_set('America/New_York');
		$today = mktime(0, 0, 0, date('m'), date('d'), date('Y', strtotime('2020-01-01')));
		
		// echo $today;
		
		$posts = new WP_Query(array(
			'category_name' => 'devotion',
			'meta_query' => array(
				array(
					'key' => 'devotion_date',
					'value' => $today
				)
			)
		));

		while ($posts->have_posts()) {
			$posts->the_post();
			the_content();
		}
		?>	
	</div>
</div>
	
<?php
get_footer(); 
?>

</body>
</html>