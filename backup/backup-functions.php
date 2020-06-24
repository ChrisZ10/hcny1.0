<?php 

require get_theme_file_path('/inc/search-route.php');

function add_files() {

	// load css files
	wp_enqueue_style('bulma', get_template_directory_uri() . '/css/bulma.min.css');
	wp_enqueue_style('custom_font', 'https://fonts.googleapis.com/css?family=Noto+Sans+TC');
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', NULL, microtime());

	//load js files
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('form-js', get_template_directory_uri() . '/js/form.js', array('jquery'), microtime(), true);
	wp_localize_script('form-js', 'ajax_obj', array(
		'url' => admin_url('admin-ajax.php'),
		'site_url' => site_url()
	));
	
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/app.js', NULL, microtime(), true);
	wp_localize_script('main-js', 'theme_file', array(
		'uri' => get_template_directory_uri(),
		'site_url' => site_url()
	));
	
	wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCbRnhNO-Nh2aIWKg99DzdCc_e3L7M7rUs');
	wp_enqueue_script('acf-map', get_template_directory_uri() . '/js/acf-map.js', NULL, microtime(), true);
	
	/*wp_enqueue_script('search', get_template_directory_uri() . '/js/modules/Search.js', NULL, microtime(), true);
	wp_localize_script('search', 'site_data', array(
		'site_url' => site_url()
	));*/
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

//find church
function search_by_church_name() {
	$name = $_POST['name'];
	
	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');
	
	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}
	
	//$query = 'SELECT * FROM `churches` WHERE `church_name` LIKE ' . '"%' . $name . '%"';
	$query = 'SELECT * 
			  FROM churches ch
			  	   INNER JOIN contacts co ON ch.church_id = co.church_id
			  	   INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	   INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			  WHERE ch.church_name LIKE ' . '"%' . $name . '%" ' . 
			  'OR ch.english_name LIKE ' . '"%' . $name . '%" 
			  ORDER BY ch.church_name ASC, sc.time ASC';

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
	wp_die();
}

function search_by_church_zip() {
	$zip = $_POST['zip'];
	
	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');
	
	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}
	
	//$query = 'SELECT * FROM `churches` WHERE `church_name` LIKE ' . '"%' . $name . '%"';
	$query = 'SELECT * 
			  FROM churches ch
			  	   INNER JOIN contacts co ON ch.church_id = co.church_id
			  	   INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	   INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			  WHERE ch.zip = ' . '"' . $zip . '" 
			  ORDER BY ch.church_name ASC, sc.time ASC';

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
	wp_die();
}

function search_by_church_city() {
	$city = $_POST['city'];
	
	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');
	
	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}
	
	//$query = 'SELECT * FROM `churches` WHERE `church_name` LIKE ' . '"%' . $name . '%"';
	$query = 'SELECT * 
			  FROM churches ch
			  	   INNER JOIN contacts co ON ch.church_id = co.church_id
			  	   INNER JOIN churches_schedules cs ON co.church_id = cs.church_id
			  	   INNER JOIN schedules sc ON cs.schedule_id = sc.schedule_id
			  WHERE ch.city LIKE ' . '"%' . $city . '%" 
			  ORDER BY ch.church_name ASC, sc.time ASC';

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
	wp_die();
}

function search_by_church_time() {
	$day = $_POST['day'];
	$time_input = $_POST['time'];
	$time = date('H:i:s', strtotime($time_input));
	
	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');	

	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}

	//echo json_encode($time);
	
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
			   WHERE sc.time = ' . '"' . $time . '")
			  ORDER BY ch.church_name ASC, sc.time ASC';
			   //WHERE sc.day = ' . '"' . $day . '"' . 'AND sc.time = ' . '"' . $time . '"' . '")';

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
	wp_die();
}

function search_by_church_language() {
	$language = $_POST['language'];
	
	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');
	
	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}
	
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
			   WHERE sc.language = ' . '"' . $language . '") 
			   ORDER BY ch.church_name ASC, sc.time ASC';
	
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
	wp_die();
}

/*function update_ln() {
	$email = isset($_POST['em'])? $_POST['em'] : 'Null';
	$last_name = isset($_POST['ln'])? $_POST['ln'] : 'Null';
	$feedback = array($email, $last_name);

	$user = get_user_by('email', $email);
	$user_id = (int)$user->ID;
	array_push($feedback, $user_id);
	update_user_meta($user_id, 'last_name', $last_name);

	echo json_encode($feedback);	
	wp_die();
}

function update_fn() {
	$email = isset($_POST['em'])? $_POST['em'] : 'Null';
	$first_name = isset($_POST['fn'])? $_POST['fn'] : 'Null';
	$feedback = array($email, $first_name);

	$user = get_user_by('email', $email);
	$user_id = (int)$user->ID;
	array_push($feedback, $user_id);
	update_user_meta($user_id, 'first_name', $first_name);

	echo json_encode($feedback);	
	wp_die();
}

function update_zip() {
	$email = isset($_POST['em'])? $_POST['em'] : 'Null';
	$zip = $_POST['zip'];
	$feedback = array($email, $zip);

	if (empty($_POST['zip'])) {
		array_push($feedback, 'empty zip');
	} else {
		//check zip code validity
		$regex = '/^\d{5}$/';
		if (!preg_match($regex, $_POST['zip'])) {
			array_push($feedback, 'invalid zip');
		} else {
			$zip_num = intval($_POST['zip']);
			if ($zip_num < 501 OR $zip_num > 99950) {
				array_push($feedback, 'invalid zip');
			} else {
				$user = get_user_by('email', $email);
				$user_id = (int)$user->ID;
				array_push($feedback, $user_id);
				update_user_meta($user_id, 'zip', $zip);
			}
		} 
	}

	echo json_encode($feedback);	
	wp_die();
}

function create_requested_ride() {
	//echo json_encode('test');
	$last_name = isset($_POST['ln'])? $_POST['ln'] : 'null';
	$first_name = isset($_POST['fn'])? $_POST['fn'] : 'null';
	$chinese_name = isset($_POST['cn'])? $_POST['cn'] : 'null';
	$event_name = isset($_POST['event'])? $_POST['event'] : 'null';
	$arrival_time = isset($_POST['time'])? $_POST['time'] : 'null';
	$arrival_time_display = str_replace("T", " ", $arrival_time);
	$arrival_time_display = str_replace("-", "/", $arrival_time_display);	
	$number_of_seats = isset($_POST['seats'])? $_POST['seats'] : 'null';
	$city = isset($_POST['city'])? $_POST['city'] : 'null';
	$street = isset($_POST['st'])? $_POST['st'] : 'null';
	$cross_street = isset($_POST['crst'])? $_POST['crst'] : 'null';

	$success = true;
	if ($last_name == 'null' OR $first_name == 'null' OR $chinese_name == 'null' OR
		$event_name == 'null' OR $arrival_time == 'null' OR $number_of_seats == 'null' OR
		$city == 'null' OR $street == 'null' OR $cross_street == 'null') {
		$success = false;
	}

	$post_status = 'publish';
    $post_author = get_current_user_id();
    $post_title = '計劃' . $arrival_time_display . '到達，參加' . $event_name . 
    			  '，出發地點：' . $city . '，' . $street . '，與' . $cross_street . '交匯，' .
    			  '需要座位：' . $number_of_seats . '個';
    $role = 'carpool requester';

    $post_arr = array(
    	'post_title' => $post_title,
    	'post_content' => '', //should be comment in the form
    	'post_status' => $post_status,
    	'post_author' => $post_author,
    	'post_type' => 'ride',
    	'meta_input' => array(
    		'last_name' => $last_name,
    		'first_name' => $first_name,
    		'chinese_name' => $chinese_name,
    		'event_name' => $event_name,
    		'arrival_time' => $arrival_time,
    		'role' => $role,
    		'number_of_seats' => $number_of_seats,
    		'city' => $city,
    		'street' => $street,
    		'cross_street' => $cross_street
    	)
    );

    $post_id = wp_insert_post($post_arr);

   	echo json_encode($post_id);
	wp_die();
}*/

/*function custom_registration_form() {
	$ln = !empty($_POST['ln'])? $_POST['ln'] : '';
	$fn = !empty($_POST['fn'])? $_POST['fn'] : '';
	$zip = !empty($_POST['zip'])? $_POST['zip'] : '';
	?>
	<p>
		<label for="ln">
			Last Name<br>
			<input type="text" id="ln" name="ln" value="<?php echo esc_attr($ln); ?>" class="input">
		</label>
		<label for="fn">
			First Name<br>
			<input type="text" id="fn" name="fn" value="<?php echo esc_attr($fn); ?>" class="input">
		</label>
		<label for="zip">
			Zip Code<br>
			<input type="text" id="zip" name="zip" value="<?php echo esc_attr($zip); ?>" class="input">
		</label>
	</p>
	<?php
}

function custom_user_register($user_id) {
	if (!empty($_POST['ln']) AND !empty($_POST['fn']) AND !empty($_POST['zip'])) {
		$update_data = array(
			'last_name' => $_POST['ln'],
			'first_name' => $_POST['fn'],
			'zip' => $_POST['zip']
		);
		foreach ($update_data as $key => $value) {
            update_user_meta($user_id, $key, $value);
        }
	}
}

function custom_admin_user_register($user_id) {
	if (!empty($_POST['zip'])) {
		update_user_meta($user_id, 'zip', $_POST['zip']);
	}
}

function custom_admin_registration_form($operation) {
	if ($operation != 'add-new-user')
		return;
	$zip = !empty($_POST['zip'])? $_POST['zip'] : '';
	?>
	<h3>Personal Information</h3>
	<table class="form-table">
		<tr>
			<th>
				<label for="zip">Zip Code</label>
				<span class="description">(required)</span>
			</th>
			<td>
				<input type="text" id="zip" name="zip" value="<?php echo esc_attr($zip); ?>" class="input">
			</td>
		</tr>
	</table>
	<?php
}

function custom_user_profile_update_errors($errors, $update, $user) {
	if (empty($_POST['zip'])) {
		$errors->add('zip_error', '<strong>ERROR</strong>: Please enter your zip code');
	} else {
		//check zip code validity
		$regex = '/^\d{5}$/';
		if (!preg_match($regex, $_POST['zip'])) {
			$errors->add('zip_error', '<strong>ERROR</strong>: Your zip code should be a 5-digit number');
		} else {
			$zip_num = intval($_POST['zip']);
			if ($zip_num < 501 OR $zip_num > 99950) {
				$errors->add('zip_error', '<strong>ERROR</strong>: Please enter a valid US zip code');
			}
		}
	}
}

function custom_registration_errors($errors, $sanitized_user_login, $user_email) {
	//check emptiness
	if (empty($_POST['ln'])) {
		$errors->add('ln_error', '<strong>ERROR</strong>: Please enter your last name');
	}
	if (empty($_POST['fn'])) {
		$errors->add('fn_error', '<strong>ERROR</strong>: Please enter your first name');
	}
	if (empty($_POST['zip'])) {
		$errors->add('zip_error', '<strong>ERROR</strong>: Please enter your zip code');
	} else {
		//check zip code validity
		$regex = '/^\d{5}$/';
		if (!preg_match($regex, $_POST['zip'])) {
			$errors->add('zip_error', '<strong>ERROR</strong>: Your zip code should be a 5-digit number');
		} else {
			$zip_num = intval($_POST['zip']);
			if ($zip_num < 501 OR $zip_num > 99950) {
				$errors->add('zip_error', '<strong>ERROR</strong>: Please enter a valid US zip code');
			}
		}
	}
	return $errors;
}

function show_additional_profile_fields($user) {
	?>
	<h3>Personal Information</h3>
	<table class="form-table">
		<tr>
			<th><label for="zip">Zip Code</label></th>
			<td>
				<input type="text" id="zip" name="zip" value="<?php echo esc_html(get_the_author_meta('zip', $user->ID)); ?>" class="input">
			</td>
		</tr>
	</table>
	<?php
}

function custom_user_update($user_id) {
	if (empty($_POST['zip'])) {
		$errors->add('zip_error', '<strong>ERROR</strong>: Please enter your zip code');
	} else {
		//check zip code validity
		$regex = '/^\d{5}$/';
		if (!preg_match($regex, $_POST['zip'])) {
			$errors->add('zip_error', '<strong>ERROR</strong>: Your zip code should be a 5-digit number');
		} else {
			$zip_num = intval($_POST['zip']);
			if ($zip_num < 501 OR $zip_num > 99950) {
				$errors->add('zip_error', '<strong>ERROR</strong>: Please enter a valid US zip code');
			}
		}
	}
	update_user_meta($user_id, 'zip', $_POST['zip']);
}*/

/*function add_book() {
	
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$authors = $_POST['title'];
	$year = $_POST['year'];
	$copies = $_POST['copies'];
	$avail = $_POST['avail'];
	$summary = $_POST['summary'];

	include(get_template_directory() . '/db/config.php');
	include(get_template_directory() . '/db/open.php');

	//echo $conn_status;

	if ($conn->connect_errno) {
    	printf("connection failed: %s", $conn->connect_error);
    	exit();
	}

	$query = 'INSERT INTO 
	 		 `books`(`isbn`, `title`, `authors`, `year`, `copies`, `availability`, `summary`) 
	 		 VALUES("' . $isbn . 
	 		 	'", "' . $title . 
	 		 	'", "' . $authors . 
	 		 	'", "' . $year . 
	 		 	'", "' . $copies .
	 		 	'", "' . $avail . 
	 		 	'", "' . $summary . '")';
	//echo json_encode($query);
	$result = $conn->query($query);
	
	include(get_template_directory() . '/db/close.php');

	if ($result) {
		echo json_encode('book successfully added');
	} else {
		echo json_encode('adding book failed');
	}
	
	wp_die();
}*/

add_action('wp_enqueue_scripts', 'add_files'); 
add_action('after_setup_theme', 'add_features');
add_action('wp_loaded', 'no_admin_bar');
add_action('admin_init', 'redirect_subscribers_to_homepage');
add_action('login_enqueue_scripts', 'login_css');

//load ajax callback function
//add_action('wp_ajax_update_ln', 'update_ln');
//add_action('wp_ajax_update_fn', 'update_fn');
//add_action('wp_ajax_update_zip', 'update_zip');
//add_action('wp_ajax_create_requested_ride', 'create_requested_ride');
//add_action('wp_ajax_add_book', 'add_book');
add_action('wp_ajax_search_by_church_name', 'search_by_church_name');
add_action('wp_ajax_nopriv_search_by_church_name', 'search_by_church_name');
add_action('wp_ajax_search_by_church_zip', 'search_by_church_zip');
add_action('wp_ajax_nopriv_search_by_church_zip', 'search_by_church_zip');
add_action('wp_ajax_search_by_church_city', 'search_by_church_city');
add_action('wp_ajax_nopriv_search_by_church_city', 'search_by_church_city');
add_action('wp_ajax_search_by_church_language', 'search_by_church_language');
add_action('wp_ajax_nopriv_search_by_church_language', 'search_by_church_language');
add_action('wp_ajax_search_by_church_time', 'search_by_church_time');
add_action('wp_ajax_nopriv_search_by_church_time', 'search_by_church_time');

//custom user fields
/*add_action('register_form', 'custom_registration_form');
add_action('user_register', 'custom_user_register');
add_action('edit_user_created_user', 'custom_admin_user_register');
add_action('user_new_form', 'custom_admin_registration_form');
add_action('user_profile_update_errors', 'custom_user_profile_update_errors', 10, 3 );
add_action('show_user_profile', 'show_additional_profile_fields');
add_action('edit_user_profile', 'show_additional_profile_fields');
add_action('edit_user_profile_update', 'custom_user_update');*/

add_filter('login_headerurl', 'headerurl');
add_filter('login_headertitle', 'headertitle');
add_filter('registration_errors', 'custom_registration_errors', 10, 3);
add_filter('acf/fields/google_map/api', 'map_Key');

//disable the-event-calendar built-in styles
// add_action('wp_enqueue_scripts', 'deregister_tribe_styles');

// function deregister_tribe_styles() {
// 	wp_deregister_style('tribe-events-full-pro-calendar-style');
// 	wp_deregister_style('tribe-events-full-calendar-style');

// 	wp_deregister_style('tribe-events-pro-calendar-style');
// 	wp_deregister_style('tribe-events-calendar-style');
// }

?>