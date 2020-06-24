<?php 

function add_files() {
	
	// load css files
	wp_enqueue_style('bulma', get_template_directory_uri() . '/css/bulma.min.css');
	wp_enqueue_style('custom_font', 'https://fonts.googleapis.com/css?family=Noto+Sans+TC');
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', NULL, microtime());

	// load js files
	wp_enqueue_script('jquery');

	// third-party js files
	wp_enqueue_script('jquery-masonry');
	wp_enqueue_script('yall-js', get_template_directory_uri() . '/js/yall.min.js');
	wp_enqueue_script('imagesLoaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js');
	wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCbRnhNO-Nh2aIWKg99DzdCc_e3L7M7rUs');
	wp_enqueue_script('acf-map', get_template_directory_uri() . '/js/acf-map.js');
	wp_enqueue_script('sly-js', get_template_directory_uri() . '/js/sly.js');	
	
	// own js files
	wp_enqueue_script('form-js', get_template_directory_uri() . '/js/form.js', array('jquery'), microtime(), true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/app.js', array('jquery'), microtime(), true);
	wp_enqueue_script('audible-js', get_template_directory_uri() . '/js/audible.js', array('jquery'), microtime(), true);
	wp_enqueue_script('devotion-js', get_template_directory_uri() . '/js/devotion.js', array('jquery'), microtime(), true);
	
	wp_localize_script('form-js', 'ajax_obj', array(
		'url' => admin_url('admin-ajax.php'),
		'site_url' => site_url()
	));		
	wp_localize_script('main-js', 'theme_file', array(
		'uri' => get_template_directory_uri(),
		'site_url' => site_url()
	));
	wp_localize_script('devotion-js', 'ajax_obj', array(
		'url' => admin_url('admin-ajax.php'),
		'site_url' => site_url()
	));

}

function wpb_image_editor_default_to_gd( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );
    return $editors;
}

function add_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}

function no_admin_bar() {
	show_admin_bar(false);
}

function map_key($api) {
	$api['key'] = 'AIzaSyCbRnhNO-Nh2aIWKg99DzdCc_e3L7M7rUs';
	return $api;
}

function generate_cell_group_card($args) {
?>
	<div class="card cell-group">
  		<header class="card-header">
    		<p class="card-header-title">
      			<?php echo $args['title']; ?>
    		</p>
  		</header>
	  	<div class="card-content">
	    	<div class="content">
	    		<p class="is-size-6">
	    			<span class="icon is-small"><i class="fas fa-calendar-day"></i></span><?php echo $args['day']; ?><br>
	    			<span class="icon is-small"><i class="fas fa-clock"></i></span><?php echo $args['time']; ?><br>
	    			<span class="icon is-small"><i class="fas fa-user"></i></span>組長 <?php echo $args['leader']; ?><br>
	    			<span class="icon is-small"><i class="fas fa-phone"></i></span><a href="tel:" + <?php echo $args['tel']; ?>><?php echo $args['tel']; ?></a>
	    		</p>
	      	</div>
	  	</div>
	</div>
<?php
}

function index_today() {
	date_default_timezone_set('America/New_York');
	$date = new DateTime('now');
	return (int)($date->format('z'));
}

function generate_date_card($args) {
	
	date_default_timezone_set('America/New_York');
	$date = DateTime::createFromFormat('Y z', $args['year'] . ' ' . strval($args['day']));

	echo '<li class="button" '; 
	
	// valid: 3/25 - 3/26 (function detecting which day has daily devotion associated)
	if ($args['day'] < 84 || $args['day'] > index_today()) {
		echo 'disabled>';
	} else {
		echo '>';
	}
		
	$month = $date->format('m');
	$day = $date->format('d');
	$weekday = strtoupper($date->format('D'));
		
	if ($month[0] == '0')
		$month = $month[1];
		
	if ($day[0] == '0')
		$day = $day[1];
			
	echo $weekday . '<br>';
	echo $month . '月' . $day . '日'; 
		
	echo '</li>'; 	
}

function redirect_subscribers_to_homepage() {
	$user = wp_get_current_user();
	if (count($user->roles) == 1 AND $user->roles[0] != 'administrator' AND !defined('DOING_AJAX')) {		
		wp_redirect(site_url('/'));
		exit;
	}
}

function headerurl() {
	return site_url('/');
}
function headertitle() {
	return '歡迎來到紐約豐收靈糧堂';
}

function login_css() {
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', NULL, microtime());
}

function find_church() {
	$keyword = $_GET['keyword'];
	$zip = $_GET['zip'];
	$city = $_GET['city'];
	$area = $_GET['area'];
	$day = $_GET['day'];
	$time = $_GET['time'];
	$lan = $_GET['lan'];
	$nested_query = false;

	if (!empty($keyword)) {
		$query = '(ch.church_name LIKE "%' . $keyword . '%" OR ch.church_name_sc LIKE "%' . $keyword . '%" OR ch.english_name LIKE "%' . $keyword . '%")';
	}
	if (!empty($zip)) {
		if (!empty($keyword)) {
			$query .= ' AND ch.zip = "' . $zip . '"';
		} else {
			$query .= 'ch.zip = "' . $zip . '"';
		}
	}
	if ($city != 'none') {
		if (!empty($keyword) OR !empty($zip)) {
			$query .= ' AND ch.city LIKE "%' . $city . '%"';
		} else {
			$query .= 'ch.city LIKE "%' . $city . '%"';
		}
	}
	if ($area != 'none') {
		if (!empty($keyword) OR !empty($zip) OR $city != 'none') {
			$query .= ' AND ch.area LIKE "%' . $area . '%"';
		} else {
			$query .= 'ch.area LIKE "%' . $area . '%"';
		}
	}
	if ($day != 'none') {
		$nested_query = true;
		if (!empty($keyword) OR !empty($zip) OR $city != 'none' OR $area != 'none') {
			$query .= ' AND sc.day = "' . $day . '"';
		} else {
			$query .= 'sc.day = "' . $day . '"';
		}
	}
	if ($time != 'none') {
		$nested_query = true;
		switch($time) {
			case 'slot1':
				$time1 = date('H:i:s', strtotime('09:00:00'));
				$time_query = 'sc.time < "' . $time1 . '"';
				break;
			case 'slot2':
				$time1 = date('H:i:s', strtotime('09:00:00'));
				$time2 = date('H:i:s', strtotime('11:00:00'));
				$time_query = '(sc.time >= "' . $time1 . '" AND sc.time <= "' . $time2 . '")';
				break;
			case 'slot3':
				$time1 = date('H:i:s', strtotime('11:00:00'));
				$time2 = date('H:i:s', strtotime('13:00:00'));
				$time_query = '(sc.time >= "' . $time1 . '" AND sc.time <= "' . $time2 . '")';
				break;
			case 'slot4':
				$time1 = date('H:i:s', strtotime('13:00:00'));
				$time2 = date('H:i:s', strtotime('15:00:00'));
				$time_query = '(sc.time >= "' . $time1 . '" AND sc.time <= "' . $time2 . '")';
				break;
			case 'slot5':
				$time1 = date('H:i:s', strtotime('15:00:00'));
				$time2 = date('H:i:s', strtotime('17:00:00'));
				$time_query = '(sc.time >= "' . $time1 . '" AND sc.time <= "' . $time2 . '")';
				break;
			case 'slot6':
				$time1 = date('H:i:s', strtotime('17:00:00'));
				$time_query = 'sc.time > "' . $time1 . '"';
				break;
		}
		//$time = date('H:i:s', strtotime($time));
		if (!empty($keyword) OR !empty($zip) OR $city != 'none' OR $area != 'none' OR $day != 'none') {
			$query .= ' AND ' . $time_query;
		} else {
			$query .= $time_query;
		}
	}
	if ($lan != 'none') {
		$nested_query = true;
		if (!empty($keyword) OR !empty($zip) OR $city != 'none' OR $area != 'none' OR $day != 'none' OR $time != 'none') {
			$query .= ' AND sc.language = "' . $lan . '"';
		} else {
			$query .= 'sc.language = "' . $lan . '"';
		}
	}

	if (!$nested_query) {
		$query = 'SELECT * 
		          FROM churches ch
			  	  	  INNER JOIN contacts co ON ch.church_id = co.church_id
			  	  	  INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	   	  INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			      WHERE ' . $query;
	} else {
		$query = 'SELECT *
	          	  FROM churches ch
			  	  	  INNER JOIN contacts co ON ch.church_id = co.church_id
			  	  	  INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	  	  INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			      WHERE ch.church_id IN
			     (SELECT ch.church_id 
			   	  FROM churches ch
			  	  	  INNER JOIN contacts co ON ch.church_id = co.church_id
			  	   	  INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	   	  INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			   	  WHERE ' . $query . ')';
	}

	$query .= ' ORDER BY ch.church_name ASC, sc.time ASC';

	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');	
	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}
	$result = $conn->query($query);
	$church_results = array();	
	if (mysqli_num_rows($result) > 0) {
		$previous = array(
			'church_id' => 0
		);
		$index = -1;
		while($row = mysqli_fetch_assoc($result)) {
			if ($row['church_id'] != $previous['church_id']) {
				array_push($church_results, array(
					'church_name' => $row['church_name'],
					'english_name' => $row['english_name'],
					'website' => $row['website'],
					'street' => $row['street'],
					'city' => $row['city'],
					'state' => $row['state'],
					'zip' => $row['zip'],
					'contact_name' => $row['contact_name'],
					'title' => $row['title'],
					'phone' => $row['phone'],
					'schedule' => array(
						array(
							$row['day'], $row['time'], $row['language']
						)
					)
				));
				$index++;
			} //if-statement ends
			else {
				if ($row['day'] != $previous['day'] OR $row['time'] != $previous['time'] OR $row['language'] != $previous['language']) { //add schedule
					array_push($church_results[$index]['schedule'], array(
						$row['day'], $row['time'], $row['language']
					));
				}
			} //else-statement ends			
			$previous = $row;			
		} //while-loop ends
	} //if-statement ends
	include(get_template_directory() . '/db/close.php');

	echo json_encode($church_results);
	//echo json_encode($query);
	//echo json_encode(array($keyword, $type, $day, $time, $lan));
	wp_die();
}

//create extra field to acf-photo-gallery called "stars"
function my_extra_gallery_fields( $args, $attachment_id, $field ){
    $args['stars'] = array(
    	'type' => 'text', 
    	'label' => 'Stars', 
    	'name' => 'stars', 
    	'value' => get_field($field . '_stars', $attachment_id) 
    );
    return $args;
}
add_filter( 'acf_photo_gallery_image_fields', 'my_extra_gallery_fields', 10, 3 );

function find_post() {
	
	$index = $_GET['index'];

	$results = array();

	// this year is 2020
	date_default_timezone_set('America/New_York');
	$date = DateTime::createFromFormat('Y z', '2020' . ' ' . strval($index));
	$date = $date->format('Ymd');

	$posts = new WP_Query(array(
		'category_name' => 'devotion',
		'meta_query' => array(
			array(
				'key' => 'devotion_date',
				'value' => $date
			)
		)
	));

	while ($posts->have_posts()) {
		$posts->the_post();
		array_push($results, array(
			'content' => get_the_content()
		));
		
	}
	
	echo json_encode($results);
	wp_die();
	
}

function check_domain() {
	
	if (strpos($_SERVER['REQUEST_URI'], '?from=singlemessage') !== false ||
		strpos($_SERVER['REQUEST_URI'], '?from=groupmessage') !== false ||
		strpos($_SERVER['REQUEST_URI'], '?from=timeline') !== false) {
		if (strpos($_SERVER['REQUEST_URI'], 'daily-devotion') !== false) {
			
			$uri = urldecode($_SERVER['REQUEST_URI']);			
			$new_uri = $uri . '';
			$new_uri = str_replace(['?from=singlemessage', '?from=groupmessage', '?from=timeline'], '', $new_uri);
			//echo $new_uri;
			wp_redirect(site_url($new_uri));
		} else {
			wp_redirect(site_url('/'));
		}		
	}

}

function remove_trash() {
	
	if (strpos($_SERVER['REQUEST_URI'], '&from=singlemessage') !== false ||
		strpos($_SERVER['REQUEST_URI'], '&from=groupmessage') !== false ||
		strpos($_SERVER['REQUEST_URI'], '&from=timeline') !== false) {
		if (strpos($_SERVER['REQUEST_URI'], 'daily-devotion') !== false) {
			
			$uri = urldecode($_SERVER['REQUEST_URI']);			
			$new_uri = $uri . '';
			$new_uri = str_replace(['&from=singlemessage', '&from=groupmessage', '&from=timeline'], '', $new_uri);
			//echo $new_uri;
			wp_redirect(site_url($new_uri));
		} else {
			wp_redirect(site_url('/'));
		}		
	}

}

// life hooks
add_action('wp_enqueue_scripts', 'add_files'); 
add_action('after_setup_theme', 'add_features');
add_action('wp_loaded', 'no_admin_bar');
add_action('admin_init', 'redirect_subscribers_to_homepage');
add_action('login_enqueue_scripts', 'login_css');
add_action('wp_ajax_find_church', 'find_church');
add_action('wp_ajax_nopriv_find_church', 'find_church');
add_action('wp_ajax_find_post', 'find_post');
add_action('wp_ajax_nopriv_find_post', 'find_post');
add_action('after_setup_theme', 'check_domain');
add_action('wp', 'remove_trash');

// filter hooks
add_filter('login_headerurl', 'headerurl');
add_filter('login_headertitle', 'headertitle');
add_filter('registration_errors', 'custom_registration_errors', 10, 3);
add_filter('acf/fields/google_map/api', 'map_Key');
add_filter('wp_image_editors', 'wpb_image_editor_default_to_gd');

?>