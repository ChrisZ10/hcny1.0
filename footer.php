<?php

global $wp;
$current_url = home_url($wp->request);
if (strpos($current_url, 'audible-app') === false && strpos($current_url, 'daily-devotion-app') === false) {
    get_template_part('templates/home', 'footer');
}

wp_footer(); 
?>

</body>
</html>