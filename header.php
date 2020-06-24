<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head() ?>
</head>

<?php  
	global $wp;
	$current_url = home_url($wp->request);
	if (strpos($current_url, 'daily-devotion-app') !== false) {
		echo '<body>';
	} else if (strpos($current_url, 'audible-app') !== false) {
		echo '<body class="is-clipped">';
	} else {
		echo '<body class="has-navbar-fixed-top is-clipped">';
	}
?>
