<section id="schedule" class="section">
	<div class="container">
		<nav class="level">
			<div class="level-item has-text-centered">
				<nav class="level">			
					<!--
					<div class="level-item has-text-centered">
						<div class="schedule-box">
			      			<p class="is-size-6">中文第一堂</p>
			      			<p class="is-size-6"><strong>09:00AM - 10:00AM</strong></p>
			    		</div>
					</div>			
					-->
					<div class="level-item has-text-centered">
						<?php //home page id = 355 ?>
						<a href="<?php echo get_post_meta(747, 'chinese_live_stream', true); ?>" target="_blank">
							<div class="schedule-box">
				      			<p class="is-size-6">中文堂線上聚會</p>
				      			<p class="is-size-6"><strong>10:30AM - 11:45AM</strong></p>
				    		</div>
			    		</a>
					</div>			
					
					<div class="level-item has-text-centered">
						<a href="<?php echo get_post_meta(747, 'english_live_stream', true); ?>" target="_blank">
							<div class="schedule-box">
				      			<p class="is-size-6">英文堂線上聚會</p>
				      			<p class="is-size-6"><strong>10:30AM - 11:45AM</strong></p>
				    		</div>
			    		</a>
					</div>		
				</nav>
			</div>
		</nav>		
	</div>
</section>

<section id="watch" class="section">
	<div class="container">
		
		<h1 class="title">主日信息</h1>
		<div class="hr"></div>
		
		<div class="outer columns">
			
			<!-- left column -->
			<div class="outer column">
				
				<!-- sunday sermon video -->
				<img class="video-loader" data-youtube-id="h6Qb2FS2ulk" src="<?php echo get_template_directory_uri() . '/assets/images/sermon_20210328.jpg'; ?>">

				<!-- description -->
				<p class="subtitle">
					士師記（四）：痛失愛女 | 蕭慕道牧師 | 3月28日
				</p>
				<p class="desc outer is-size-6-desktop is-size-7-touch">
					<!-- description -->
				</p>

			</div> <!-- left column ends -->

			<!-- right column -->
			<div class="outer column">
				
				<!-- first row -->
				<div>					
					<div class="inner columns">
						
						<!-- first row inner left column -->
						<div class="inner column">
							
							<!-- previous sunday sermon video -->							
							<img class="video-loader" data-youtube-id="5fvKHfVdySI" src="<?php echo get_template_directory_uri() . '/assets/images/sermon_20210321.jpg'; ?>">

						</div>

						<!-- first row inner right column -->
						<div class="inner column description">
							
							<!-- highlight video -->							
							<img class="video-loader" data-youtube-id="dvFzIWW3GuI" src="<?php echo get_template_directory_uri() . '/assets/images/biblecopy.jpg'; ?>">
							
						</div>

					</div>
				</div> <!-- right column first row ends --> 

				<!-- second row -->
				<div>
					<div class="inner columns">
						
						<!-- second row inner left column -->
						<div class="inner column">
							
							<!-- highlight series 1 -->
							<a href="https://www.youtube.com/watch?v=ZpqpjPwiWYk&list=PL3BMsMGanxj35g6txKt8g1h7PMu5yBvfc" target="_blank">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/core_value.jpg'; ?>">
							</a>

						</div>

						<!-- second row inner right column -->
						<div class="inner column description">
							
							<!-- highlight series 2 -->
							<a href="https://www.youtube.com/watch?v=6SXQPh8uXvY&list=PL3BMsMGanxj2pQNp9nwPgmddratX6eGuF" target="_blank">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/psalm_review.jpg'; ?>">
							</a>

						</div>

					</div>	
				</div>

				<a class="button" href="https://www.youtube.com/watch?v=XdQxUHPGDck&list=PL3BMsMGanxj0nepGkOXqgHW-GVlYkW89b" target="_blank">查看更多精彩視頻</a>				

			</div> <!-- right column ends -->

		</div> <!-- outer columns end -->

		<!-- modal -->
		<div id="video" class="modal">
  			<div id="video-bg" class="modal-background"></div>
  			<div class="modal-content">
  				<div class="video-container"></div>
  			</div>
  			<button id="video-close" class="modal-close is-large" aria-label="close"></button>
		</div>

	</div>	<!-- container ends -->
</section> <!-- #watch section ends -->

<section id="map" class="section">
	<div class="container is-fluid">
		<iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.7975636925185!2d-73.72692568473082!3d40.76647697932598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c289e7f3b941e3%3A0x768ac52fe97e8ae6!2s54-47+Little+Neck+Pkwy%2C+Flushing%2C+NY+11362!5e0!3m2!1sen!2sus!4v1552089143472" allowfullscreen></iframe>
	</div>
</section>

<section id="transportation" class="section">
	<div class="container">
		<h1 class="title">交通信息</h1>
		<div class="hr"></div>
		<div class="columns">
			<div class="column">
				<p class="is-size-6">
					<span class="icon"><i class="fas fa-phone"></i></span>
					交通車聯絡人 蔣弟兄
					<a href="tel:347-654-6838">347-654-6838</a>
				</p>
				<table class="table is-narrow is-fullwidth">
					<thead>
						<tr>
							<th>時間</th>
							<th>上車地點</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>08:00AM</td>
							<td>45-25 Kissena Blvd</td>
						</tr>
						<tr>
							<td>08:10AM</td>
							<td>Kissena Blvd & Barclay Ave</td>
						</tr>
						<tr>
							<td>08:20AM</td>
							<td>45-25 Kissena Blvd</td>
						</tr>
						<tr>
							<td>09:00AM</td>
							<td>45-25 Kissena Blvd</td>
						</tr>
						<tr>
							<td>09:10AM</td>
							<td>Kissena Blvd & Barclay Ave</td>
						</tr>
						<tr>
							<td>09:50AM</td>
							<td>144-30 Roosevelt Ave</td>
						</tr>
						<tr>
							<td>10:00AM</td>
							<td>172nd St & 48th Ave</td>
						</tr>
						<tr>
							<td>10:10AM</td>
							<td>193rd St & 48th Ave</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="column">
				<p class="is-size-6">
					<span class="icon"><i class="fas fa-map-marker-alt"></i></span>從法拉盛地區來教會的弟兄姐妹和慕道朋友，建議您使用公共交通工具：
				</p>
				<p class="is-size-6">
					<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
					您可以乘坐<span>Q17</span>在<span>Upotia Pkwy</span>或者<span>188 St轉乘Q30</span>
				</p>
				<p class="is-size-6">
					<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
					或乘坐<span>Q27</span>在<span>Springfield Blvd</span>轉乘<span>Q30</span>
				</p>
				<p class="is-size-6">
					<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
					如果您乘坐<span>Q12</span>，請在倒數第二站<span>Chase Bank</span>轉角處下車，步行10分鐘即可到達
				</p>
			</div>
		</div>
	</div>
</section>

<section id="events" class="section">
	<div class="container">
		<div class="columns">
  			<div class="column">
  				<h1 class="title">近期活動</h1>
  				<div class="hr"></div>
  				<p class="is-size-5-desktop is-size-6-touch">
  					查看教會近期的精彩活動
  				</p>
  				<div class="btn">
					<a href="<?php echo get_post_type_archive_link('event'); ?>">查看全部活動</a>
				</div>
  			</div>
  			<?php 
  			$today = date('Ymd');
  			$events = new WP_Query(array(
    			'posts_per_page' => ($args['num'])? $args['num'] : 3,
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
				get_template_part('templates/single', 'home-event');
			}
			wp_reset_query();
  			?>
  		</div>
	</div>
</section>

<section id="messages" class="section">
	<div class="container">
		<div class="columns">
  			<div class="column">
  				<h1 class="title">家事報告</h1>
  				<div class="hr"></div>
  				<p class="is-size-5-desktop is-size-6-touch">
  					了解教會最新的消息動態
  				</p>
  				<div class="btn">
					<a href="<?php echo get_post_type_archive_link('message'); ?>">查看全部消息</a>
				</div>
  			</div>
  			<?php 
  			
  			$messages = new WP_Query(array(
    			'posts_per_page' => ($args['num'])? $args['num'] : 3,
      			'post_type' => 'message',
        		'orderby' => 'post_date',
        		'order' => 'DESC'
    		));
    		while ($messages->have_posts()) {
				$messages->the_post();
				get_template_part('templates/single', 'home-message');
			}
			wp_reset_query();
  			?>
  		</div>
	</div>
</section>

<section id="audible-showroom" class="section">
	<div class="container">
		<h1 class="title to-audible">
			<span class="icon"><i class="fas fa-headphones-alt"></i></span>
			磐石有聲事工
		</h1>
		<p class="is-size-5-desktop is-size-6-touch">
  			2002年，蕭慕道牧師有感華人教會界缺少高品質的有聲聖經，遂發起籌備磐石有聲事工。由豐收靈糧堂的弟兄姐妹組成錄製團隊。先後錄製有聲書約20種，參加播音錄著者有王濤峰、潘李莉芳等。其中重要的產品包括：和合本有聲聖經、荒漠甘泉（配樂）、天路歷程、為兒女的屬靈品格禱告、女人的咒詛與祝福、遊子吟、慕安德烈靈修系列及聖誕專輯等。豐收磐石有聲事工本著對信仰的執著，採用專業數碼設備、嚴格反復校對，力求內容沒有錯誤瑕疵。所有產品均在美國申請專利。豐收磐石有聲事工曾向中國及東南亞等多個地區的教會和福音機構輸送和合本有聲聖經CD及聖經播放器，其中豐收磐石版的和合本有聲聖經是目前世界上流傳最廣，使用人數最多的中文聖經音源。目前已收錄在紐約豐收靈糧堂網站的有聲讀物如下：
  		</p>
  		<div class="buttons">
  			<div class="select-box to-audible">聖經中文和合本</div>
  			<div class="select-box to-audible">荒漠甘泉</div>
  			<div class="select-box to-audible">天路歷程</div>
  			<div class="select-box to-audible">謙卑</div>
  			<div class="select-box to-audible">神話語的權能</div>
  			<div class="select-box to-audible">為孩子屬靈品格禱告</div>
  			<div class="select-box to-audible">女人的咒詛與祝福</div>
  		</div>
	</div>
</section>

<!-- <section id="photowall" class="section">
	<a class="button is-size-1-tablet is-size-3-mobile" href="<?php echo get_post_type_archive_link('album'); ?>">圖片集錦</a>
</section> -->
