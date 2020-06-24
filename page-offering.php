<?php 
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="offering-banner" class="hero is-medium">
  	<div class="hero-body">
    	<div class="container">
      		<img src="<?php echo get_theme_file_uri('/assets/images/title_offering.png'); ?>">
      		<!-- <h1 class="title"><?php //the_title(); ?></h1> -->
    	</div>
  	</div>
</section>

<section id="offering-text" class="section">
	<div class="container">
		<h3 class="subtitle">
      		萬軍之耶和華說：你們要將當納的十分之一全然送入倉庫，使我家有糧，以此試試我，是否為你們敞開天上的窗戶，傾福與你們，甚至無處可容。（瑪拉基書 3章10節）
      	</h3>
      	<div class="hr"></div>
      	<div class="columns">
      		
            <div class="column">
      			<div class="subtitle has-text-centered">個人支票</div>
                <p class="is-size-6">
                    <strong>支票抬頭</strong>：HCNY<br>
                    <strong>附註</strong>：經常費/建堂/宣教/感恩/其它特別奉獻<br>
                    <strong>郵寄地址</strong>：<br>
                    Harvest Church of New York<br>
                    54-47 Little Neck Parkway, Little Neck, NY 11362<br><br>
                    請註明您的姓名、住址及聯繫方式，我們將會把奉獻收據寄給您，可以用作抵稅證明。  
                </p>
      		</div>
      		
            <div class="column">
                <div class="subtitle has-text-centered">PayPal Giving Fund</div>
                <figure class="offering_btn image">
                    <a href="https://www.paypal.com/fundraiser/charity/1339592" target="_blank">
                        <img src="<?php echo get_theme_file_uri('/assets/images/paypal.png'); ?>">
                    </a>
                </figure>
                <p class="is-size-6">
                    如果您有PayPal賬戶，請通過PayPal Giving Fund進行奉獻。
                </p>
            </div>
      		
            <div class="column">                
                <div class="subtitle has-text-centered">網上奉獻</div>
                <figure class="offering_btn image">
                    <a href="https://arisingpay.com/hcny" target="_blank">
                        <img src="<?php echo get_theme_file_uri('/assets/images/offering_btn.png'); ?>">
                    </a>
                </figure>
                <p class="is-size-6">
                    如果您沒有PayPal賬戶，請通過由ArisingPay搭建的教會網上奉獻平台進行奉獻。
                </p>
            </div>

            <div class="column">
      			<div class="subtitle has-text-centered">Amazon Smile</div>
                <figure class="offering_btn image">
                    <a href="https://smile.amazon.com/ch/11-3637191" target="_blank">
                        <img src="<?php echo get_theme_file_uri('/assets/images/amazon_smile.png'); ?>">
                    </a>
                </figure>
                <p class="is-size-6">
                    通過<a href="https://smile.amazon.com/ch/11-3637191" target="_blank">smile.amazon.com</a>購物，您可以支持紐約豐收靈糧堂的事工。當您使用該鏈接進入Amazon購物時，Amazon會將您 所購買物品價格的0.5%捐贈給紐約豐收靈糧堂。
                </p>
      		</div>
      	</div>
	</div>
</section>

<?php
get_footer(); 
?>