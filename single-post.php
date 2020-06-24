<?php  
get_header();
get_template_part('templates/home', 'navbar');

while (have_posts()) {
	the_post();
?>

<section id="single-devotion-page" class="section">
	<div class="container">

		<!--<a class="top button" href="<?php echo site_url('/category/devotion'); ?>">查看全部靈修文章</a> -->

		<h1 class="title"><?php the_title(); ?></h1>

		<div class="hr"></div>

		<?php 
		if (get_the_content() != '') {
		?>
			<p class="is-size-6-desktop is-size-7-touch"><?php the_content(); ?></p>
		<?php 
		} 
		?>

	</div>
</section>

<?php 
}
get_footer(); 
?>