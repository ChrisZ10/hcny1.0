<?php 
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="find-church-banner" class="hero is-medium">
  	<div class="hero-body">
    	<div class="container">
      		<img src="<?php echo get_theme_file_uri('/assets/images/title_find_church.png'); ?>">
    	</div>
  	</div>
</section>

<a id="btt-button">
	<span class="icon">
		<i class="fas fa-chevron-circle-up fa-3x"></i>
	</span>
</a>

<?
get_template_part('templates/form', 'find-church');
get_template_part('templates/section', 'church-results');

get_footer(); 
?>