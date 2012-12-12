<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

print_r($room);
?>
<script type="text/javascript">
	$(function(){
		$('#viewhotel .room-images a').fancybox();
	});
</Script>
<div id="room-details">
	<div class="room-names">
		<h1 class="hotel-name"><?php  ?></h1>
		<h2 class="room-name"><?php echo $room->product->name ?></h2>
	</div>
	<div class="room-info">
		<div class="left-columns">
			<a href="#" class="main-image">
				<img src="./" alt="" width="260" height="250" />
			</a>
			<div class="order-form">
				<span class="rating">
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
				</span>
				<span class="price">$250</span>
				<div class="btn-container">
					<button class="btn btn-success" style="width:48%">BOOK</button>
					<button class="btn" style="margin-left:5px;width:48%">Cancel</button>
				</div>
			</div>
		</div>
		<div class="right-columns">
			<div class="room-images">
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
				<a href="#"><img src="./" alt="" width="75" height="75" /></a>
			</div>
			<div class="greeting">
				This is sample text to show you how your website looks like.
			</div>
			<div class="facilities">
				<h1>Facilities</h1>
				<ul>
					<li>Air Conditional</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
					<li>DVD Player</li>
				</ul>
			</div>
			<div class="bedding">
				<h1>Bedding configuration</h1>
				<div>
					1 Bed
				</div>
			</div>
		</div>
	</div>
</div>