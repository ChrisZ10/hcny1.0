<?php 
get_header();
?>

<section id="audible-carousel" class="section">
	<div class="container">
		<ul class="carousel-box">
			<li id="audible_bible" class="carousel-item is-active">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_bible.jpg'); ?>">
			</li>
			<li id="audible_pilgrims" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_pilgrim.jpg'); ?>">
			</li>
			<li id="audible_humility" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_humility.jpg'); ?>">
			</li>
			<li id="audible_tongue" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_tongue.jpg'); ?>">
			</li>
			<li id="audible_streams" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_streams.jpg'); ?>">
			</li>
			<li id="audible_pray" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_pray_for_children.jpg'); ?>">
			</li>
			<li id="audible_women" class="carousel-item">
				<img src="<?php echo get_theme_file_uri('/assets/images/audible_women.jpg'); ?>">
			</li>
		</ul>
		<a class="carousel-prev">
			<span class="icon">
				<i class="fas fa-chevron-left fa-3x"></i>
			</span>				
		</a>
		<a class="carousel-next">
			<span class="icon">
				<i class="fas fa-chevron-right fa-3x"></i>
			</span>				
		</a>
	</div>	
</section>

<section id="playlist" class="section">
	<div class="container">
		<?php 
		get_template_part('templates/audible', 'bible');
		get_template_part('templates/audible', 'pilgrims');
		get_template_part('templates/audible', 'humility'); 
		get_template_part('templates/audible', 'tongue');
		get_template_part('templates/audible', 'streams');
		get_template_part('templates/audible', 'pray');
		get_template_part('templates/audible', 'women'); 
		?>
	</div>
</section>

<section id="audible_bible_player" class="section player is-shown">
	<div class="container">
		
		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">創世記 第一章</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/bible/genesis_01.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">

					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>
						
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">00:00</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">04:49</span>
			</div>

		</div>
				
	</div>
</section>

<section id="audible_pilgrims_player" class="section player">
	<div class="container">

		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/the_pilgrims_progress/the_pilgrims_progress_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<section id="audible_humility_player" class="section player">
	<div class="container">

		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/humility/humility_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<section id="audible_tongue_player" class="section player">
	<div class="container">
		
		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/the_tongue/the_tongue_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<section id="audible_streams_player" class="section player">
	<div class="container">

		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/streams/streams_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<section id="audible_pray_player" class="section player">
	<div class="container">

		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/pray_for_children/pray_for_children_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<section id="audible_women_player" class="section player">
	<div class="container">

		<!-- title -->
		<div class="subtitle_box">
			<h3 class="subtitle">簡介</h3>
		</div>

		<!-- control panel -->
		<div class="control_box">
			
			<!-- audio source -->
			<audio class="playing" src="<?php echo get_theme_file_uri('/assets/audios/women/women_intro.mp3'); ?>"></audio>
			
			<!-- loading sign initially on -->
			<div class="status">
				<figure class="image is-32x32">
					<img src="<?php echo get_theme_file_uri('/assets/images/preloader_transparent.gif') ?>">
				</figure>
			</div>

			<!-- controls replacing loading sign when audio is loaded -->
			<div class="controls">				
				<div class="field is-grouped">
					
					<!-- stepback button -->
					<div class="control">
						<a class="button stepback_button"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a>
					</div>
					
					<!-- play button initially pause -->
					<div class="control">
						<a class="button play_button pause"><i class="far fa-play-circle fa-2x"></i></a>
					</div>

					<!-- reset button -->
					<div class="control">
						<a class="button reset_button"><i class="far fa-stop-circle fa-2x"></i></a>
					</div>

					<!-- stepforward button -->
					<div class="control">
						<a class="button stepforward_button"><i class="far fa-arrow-alt-circle-right fa-2x"></i></a>
					</div>

				</div>
			</div>			
		</div> <!-- control panel ends -->

		<!-- progress bar -->
		<div class="progress_container columns is-mobile">
			
			<!-- current time -->
			<div class="column is-2 time_mark_current">
				<span id="current_time" class="is-size-7-mobile">--:--</span>
			</div>

			<div class="column">
				<div class="progress_bar">
					<progress class="progress is-large is-info" min="0" max="100" value="0"></progress>			
				</div>
			</div>

			<!-- duration -->
			<div class="column is-2 time_mark_duration">
				<span id="duration" class="is-size-7-mobile">--:--</span>
			</div>

		</div>

	</div>
</section>

<?php 
wp_footer();
?>

</body>
</html>