<nav id="home-navbar" class="navbar is-fixed-top" role="navigation">	
	<!-- logo -->			
	<div class="navbar-brand">
		<a class="navbar-item logo" href="<?php echo site_url(); ?>">紐約豐收靈糧堂</a>
		<a class="navbar-item" onclick="open_weixin();"><span class="icon"><i class="fab fa-weixin"></i></a>
		<a class="navbar-item" href="https://www.youtube.com/user/HarvestChurchofNY" target="_blank"><span class="icon"><i class="fab fa-youtube"></i></span></a>
		<a class="navbar-item" href="https://www.facebook.com/godloveshcny" target="_blank"><span class="icon"><i class="fab fa-facebook"></i></span></a>
		<!-- <a class="navbar-item" href="<?php //echo site_url('/library'); ?>"><span class="icon"><i class="fas fa-book-reader"></i></span></a> -->
		<!-- weixin modal -->
		<div id="weixin" class="modal">
  			<div class="modal-background" onclick="close_weixin();"></div>
  			<div class="modal-content">
    			<div class="card">
    				<div class="card-content">
    					紐約豐收靈糧堂微信公眾號二維碼<br>
    					HCNY Wechat Official Account QR Code
    				</div>
    				<div class="card-image">
    					<figure class="image">
    						<img src="<?php echo get_theme_file_uri('/assets/images/qrcode.bmp'); ?>">
    					</figure>
    				</div>
    			</div>
  			</div>
  			<button class="modal-close is-large" aria-label="close" onclick="close_weixin();"></button>
		</div>	
		<!-- burger menu -->
		<a role="button" class="navbar-burger" data-target="collapsible-navbar">
	  		<span aria-hidden="true"></span>
	  		<span aria-hidden="true"></span>
	  		<span aria-hidden="true"></span>
		</a>
	</div>
	<!-- main menu -->	
	<div id="collapsible-navbar" class="navbar-menu">
		<div class="navbar-end">
			<a class="navbar-item" href="<?php echo site_url('/about-us'); ?>">教會介紹</a>
			<a class="navbar-item" href="<?php echo site_url('/daily-devotion'); ?>">每日靈修</a>
			<a class="navbar-item" href="<?php echo site_url('/cell-group'); ?>">細胞小組</a>
			<a class="navbar-item" href="<?php echo get_post_type_archive_link('event'); ?>">近期活動</a>
			<a class="navbar-item" href="<?php echo get_post_type_archive_link('message'); ?>">家事報告</a>
			<a class="navbar-item" href="<?php echo site_url('/offering'); ?>">奉獻</a>
			<?php 			
			if (is_user_logged_in()) {
				$currentUser = wp_get_current_user();
				if (in_array('media_manager', (array)$currentUser->roles)) {
				?>
					<a class="navbar-item" href="https://calendar.google.com/calendar/embed?src=hcnyweb%40gmail.com&ctz=America%2FNew_York" target="_blank">大堂排期</a>
				<?php	
				/*}
				if (in_array('librarian', (array)$currentUser->roles)) {*/
				?>
					<!-- <a class="navbar-item" href="<?php //echo site_url('/library-system'); ?>">Library System</a> -->
				<?php	
				}
				echo '<a class="navbar-item user">' . $currentUser->user_login .'</a>';
				echo '<a class="navbar-item user" href="' . wp_logout_url() .'">登出</a>';
			} else {
				echo '<a class="navbar-item user" href="' . site_url('/wp-login.php') . '">登錄</a>';
			}
			?>
		</div>
	</div>
	<!-- weixin modal -->
</nav>