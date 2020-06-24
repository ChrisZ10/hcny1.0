<section id="home-banner" class="hero is-large">
    <!-- banner content -->
    <div class="hero-body">
        <div class="container">
            <div class="flex-item">
            	<img src="<?php echo get_theme_file_uri('/assets/images/slogan.png'); ?>">
            	<div class="buttons">
            		<div class="field has-addons">
	  					<p class="control">
	    					<a class="button" href="<?php echo get_post_meta(747, 'chinese_live_stream', true); ?>" target="_blank">
                            <!-- <a class="button" href="<?php //echo get_theme_file_uri('/assets/docs/20200308.pdf'); ?>" download> -->
	      						<span class="icon is-small">
	        						<i class="fas fa-rss"></i>
	      						</span>
	      						<span>主日直播</span>
	    					</a>
	  					</p>
					  	<p class="control">
					    	<a class="button" href="<?php echo get_post_meta(747, 'sunday_service_playlist', true); ?>" target="_blank">
					      		<span class="icon is-small">
					        		<i class="fas fa-play-circle"></i>
					      		</span>
					      		<span>主日視頻</span>
					    	</a>
					  	</p>
					</div>
            	</div>          	          	
            </div>
        </div>
    </div>
</section>