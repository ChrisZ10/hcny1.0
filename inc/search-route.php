<?php 

	add_action('rest_api_init', 'search');

	function search() {
		register_rest_route('hcny/v1', 'search', array(
			'methods' => WP_REST_SERVER::READABLE,
			'callback' => 'search_results'
		));
	}

	function search_results($data) {
		$search = new WP_Query(array(
			'post_type' => array('post', 'page', 'event', 'message'),
			's' => sanitize_text_field($data['keyword'])
		));

		$results = array(
			'pages' => array(),
			'events' => array(),
			'messages' => array()
		);

		while ($search->have_posts()) {
			$search->the_post();
			if (get_post_type() == 'page') {
				array_push($results['pages'], array(
					'title' => get_the_title(),
					'permalink' => get_the_permalink()
				));
			} else if (get_post_type() == 'event') {
				array_push($results['events'], array(
					'title' => get_the_title(),
					'permalink' => get_the_permalink()
				));
			} else if (get_post_type() == 'message') {
				array_push($results['messages'], array(
					'title' => get_the_title(),
					'permalink' => get_the_permalink()
				));
			}			
		}

		return $results;
	}

?>