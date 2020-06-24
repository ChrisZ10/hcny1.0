<?php 
get_header();
get_template_part('templates/home', 'navbar');
?>

<section id="cell-group-banner" class="hero is-medium">
  	<div class="hero-body">
    	<div class="container">
      		<img src="<?php echo get_theme_file_uri('/assets/images/title_cell_group.png'); ?>">
      		<!-- <h1 class="title"><?php //the_title(); ?></h1> -->
    	</div>
  	</div>
</section>

<section id="cell-group-text" class="section">
	<div class="container">
		<h3 class="subtitle">
      		主耶穌說：“凡勞苦擔重擔的人，可以到我這裡來，我就使你們得安息。”他也說：“我就是生命的糧，到我這裡來的必定不餓，信我的永遠不渴。”
      		<br><br>
      		紐約豐收靈糧堂是一間小組教會，弟兄姊妹除了主日在教會聚會之外，還設立了許多小組，透過每週固定聚會，彼此在靈命上扶持，並致力於福音外展，領人歸主。
      	</h3>
      	<div class="hr"></div>
      	<div class="tabs is-medium">
  			<ul>
    			<li id="mon" class="is-active" onclick="daySelected(event);"><a>週一</a></li>
    			<li id="tue" onclick="daySelected(event);"><a>週二</a></li>
    			<li id="wed" onclick="daySelected(event);"><a>週三</a></li>
    			<!-- <li id="thu" onclick="daySelected(event);"><a>週四</a></li> -->
    			<li id="fri" onclick="daySelected(event);"><a>週五</a></li>
    			<li id="sat" onclick="daySelected(event);"><a>週六</a></li>
    			<li id="sun" onclick="daySelected(event);"><a>週日</a></li>
  			</ul>
		</div>
		<div class="container mon cell-groups is-shown">
			<?php generate_cell_group_card(array(
				'title' => '恩典小組',
				'day' => '週一',
				'time' => '07:30PM',
				'leader' => '徐靜姐妹',
				'tel' => '347-542-2497'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '週一小組',
				'day' => '週一',
				'time' => '08:00PM',
				'leader' => '張曉華弟兄',
				'tel' => '646-288-5730'
			)); ?>
		</div>
		<div class="container tue cell-groups is-hidden">
			<?php generate_cell_group_card(array(
				'title' => '愛樂小組',
				'day' => '週二',
				'time' => '10:00AM',
				'leader' => '謝聖賢弟兄',
				'tel' => '347-528-4768'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '恩雨小組',
				'day' => '週二',
				'time' => '06:30PM',
				'leader' => '宋含香姐妹',
				'tel' => '718-808-5003'
			)); ?>
		</div>
		<div class="container wed cell-groups is-hidden">
			<?php generate_cell_group_card(array(
				'title' => '迦勒小組（長輩）',
				'day' => '單週三',
				'time' => '10:00AM',
				'leader' => '林台英傳道',
				'tel' => '347-791-0105'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '姐妹小組',
				'day' => '雙週三',
				'time' => '10:00AM',
				'leader' => '樊娉姐妹',
				'tel' => '347-399-5101'
			)); ?>
		</div>
		<!-- <div class="container thu cell-groups is-hidden"></div> -->
		<div class="container fri cell-groups is-hidden">
			<?php generate_cell_group_card(array(
				'title' => 'MG小組（法拉盛）',
				'day' => '週五',
				'time' => '10:00AM',
				'leader' => '王阿錯姐妹',
				'tel' => '718-687-9133'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '嗎哪小組',
				'day' => '週五',
				'time' => '07:00PM',
				'leader' => '王勤姐妹',
				'tel' => '917-373-3670'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '飛揚小組（貝賽）',
				'day' => '週五',
				'time' => '07:30PM',
				'leader' => '李學振弟兄',
				'tel' => '646-645-7292'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '長島大頸小組（一）',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => '謝貴伯弟兄',
				'tel' => '516-582-3691'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '長島大頸小組（二）',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => '孫有煒弟兄',
				'tel' => '917-768-7267'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '貝賽小組',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => '余新建弟兄',
				'tel' => '917-915-3386'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '法拉盛小組',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => '孫健姐妹',
				'tel' => '917-216-8917'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '新鮮草原小組',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => '古鴻謀弟兄',
				'tel' => '917-749-5678'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Queens(Adults)',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Richard',
				'tel' => '718-688-2719'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Long Island(Adults)',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Jack',
				'tel' => '646-207-0028'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Harvest Disciples',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Fred',
				'tel' => '516-450-1710'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Everlasting Life(7-12 Grades)',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Thomas',
				'tel' => '718-640-0135'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Light of the World(4-6 Grades)',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Melissa',
				'tel' => '516-430-8707'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => 'Power Club(K-3 Grades)',
				'day' => '週五',
				'time' => '08:00PM',
				'leader' => 'Vicky',
				'tel' => '347-605-1111'
			)); ?>
		</div>
		<div class="container sat cell-groups is-hidden">
			<?php generate_cell_group_card(array(
				'title' => '弟兄小組',
				'day' => '雙週六',
				'time' => '08:30AM',
				'leader' => '談天行弟兄',
				'tel' => '516-365-1884'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '飛揚小組（法拉盛）',
				'day' => '週六',
				'time' => '07:00PM',
				'leader' => '馮雯姐妹',
				'tel' => '646-287-2436'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '活石小組',
				'day' => '週六',
				'time' => '08:00PM',
				'leader' => '曹孜敏弟兄',
				'tel' => '718-795-8988'
			)); ?>
			<?php generate_cell_group_card(array(
				'title' => '豐盛小組',
				'day' => '週六',
				'time' => '08:00PM',
				'leader' => '楊約瑟弟兄',
				'tel' => '917-770-7752'
			)); ?>
		</div>
		<div class="container sun cell-groups is-hidden">
			<?php generate_cell_group_card(array(
				'title' => '親子小組',
				'day' => '第二主日',
				'time' => '05:00PM',
				'leader' => '季賽峰弟兄',
				'tel' => '917-689-6943'
			)); ?>
		</div>
	</div>
</section>

<section id="online-cell" class="section">
	<div class="container">
		<h3 class="subtitle">
			在疫情蔓延的非常時期，教會決定在中文堂新成立16個網路細胞小組。希望目前沒有加入小組的弟兄姐妹和朋友踴躍參加小組，找到一個屬靈的“小家”，使教會在非常時期成為保護的方舟，成為屬靈的遮蓋。
		</h3>
		<div class="hr"></div>
		<table class="table is-fullwidth is-hoverable">
			<thead>
				<tr>
					<th>新成立的16個網路小組組長名單</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>曾二郎牧師：929-300-8971</td>
				</tr>
				<tr>
					<td>楊重芬傳道 ：917-687-3128</td>
				</tr>
				<tr>
					<td>葉昆建傳道 ：347-515-6177</td>
				</tr>
				<tr>
					<td>林台英傳道 ：347-791-0105</td>
				</tr>
				<tr>
					<td>蕭師母 ：347-510-7689</td>
				</tr>
				<tr>
					<td>高曉宇 ：917-349-1711</td>
				</tr>
				<tr>
					<td>John Shen ：718-207-2738</td>
				</tr>
				<tr>
					<td>Amy Cheng ：917-678-3955</td>
				</tr>
				<tr>
					<td>Mark Lin ：347-617-5592</td>
				</tr>
				<tr>
					<td>褚簡妮 ：917-575-8759</td>
				</tr>
				<tr>
					<td>談鷹 ：347-972-1851</td>
				</tr>
				<tr>
					<td>黃亦華（福州語）：917-460-5642</td>
				</tr>
				<tr>
					<td>慎廣蘭：718-380-7704</td>
				</tr>
				<tr>
					<td>林倩（粵語1）：917-561-2526</td>
				</tr>
				<tr>
					<td>James Tam（粵語2）：646-413-2729</td>
				</tr>
				<tr>
					<td>陳燕（溫州語）：646-229-7720</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>

<?php
get_footer(); 
?>