<?php
if (!is_user_logged_in()) {
	wp_redirect(esc_url(site_url('/')));
}
$user = wp_get_current_user();
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="profile-banner" class="hero is-medium">
	<div class="hero-body">
    	<div class="container">
      		<img src="<?php echo get_theme_file_uri('/assets/images/title_profile.png'); ?>">
      		<!-- <h1 class="title"><?php //the_title(); ?></h1> -->
    	</div>
  	</div>
</section>

<section id="profile-content" class="section">
	<div class="container">
		<h1 class="title"><span><?php echo $user->user_login; ?></span>&nbsp;個人信息</h1>
		<div class="hr"></div>
		<div class="field">
  			<label class="label">姓氏</label>
  			<div class="field is-grouped">
  				<div class="control">
	    			<input id="ln" class="input" value="<?php echo $user->user_lastname ?>" disabled>
	  			</div>
	  			<div class="control">
	    			<a id="edit_ln" class="button"><i class="fas fa-pen"></i></a>
	  			</div>
  			</div> 			
  		</div>
  		<div class="field">
  			<label class="label">名字</label>
  			<div class="field is-grouped">
	  			<div class="control">
	    			<input id="fn" class="input" value="<?php echo $user->user_firstname ?>" disabled>
	  			</div>
	  			<div class="control">
	    			<a id="edit_fn" class="button"><i class="fas fa-pen"></i></a>
	  			</div>
  			</div>
  		</div>
  		<div class="field">
  			<label class="label">郵箱</label>
  			<div class="control">
    			<input id="em" class="input" value="<?php echo $user->user_email ?>" disabled>
  			</div>
  		</div>
        <div class="field">
            <label class="label">郵編</label>
            <div class="field is-grouped">
                <div class="control">
                    <input id="zip" class="input" value="<?php echo $user->zip ?>" disabled>
                </div>
                <div class="control">
                    <a id="edit_zip" class="button"><i class="fas fa-pen"></i></a>
                </div>
            </div>
        </div>
	</div>
</section>

<?php
get_footer(); 
?>