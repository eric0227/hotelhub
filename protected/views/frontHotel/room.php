<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$main_image_path = Yii::app()->request->baseUrl.$images[0]['image_path'].'/'.$images[0]['id_image'].'_large.gif';
?>
<script type="text/javascript">
	$(function(){
		$('.room-images a, .main-image').fancybox();
	});
</Script>
<div id="room-details">
	<div class="room-names">
		<h2 class="room-name"><?php echo $room->product->name ?></h2>
	</div>
	<div class="room-info">
		<div class="left-columns">
			<a href="<?php echo $main_image_path ?>" class="main-image">
				<img src="<?php echo $main_image_path ?>" alt="" width="260" height="250" />
			</a>
			<div class="order-form">
				<span class="rating">
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
					<img src="<?php echo Yii::app()->request->baseUrl ?>/images/front/star.png" />
				</span>
				<div class="btn-container">
					<button class="btn btn-success" style="width:48%">BOOK</button>
					<button class="btn" style="margin-left:5px;width:48%" onclick="location='<?php echo Yii::app()->request->baseUrl ?>/frontHotel'">Cancel</button>
				</div>
			</div>
		</div>
		<div class="right-columns">
			<div class="room-images">
				<?php
					foreach($images as $image):
					$main_image_path = Yii::app()->request->baseUrl.$image['image_path'].'/'.$image['id_image'].'_large.jpg';
					$thumbnail_image_path = Yii::app()->request->baseUrl.$image['image_path'].'/'.$image['id_image'].'_small.jpg';
				?>
					<a href="<?php echo $main_image_path ?>"><img src="<?php echo $thumbnail_image_path ?>" alt="<?php echo $image['title'] ?>" style="width:75px;height:75px" /></a>
				<?php endforeach; ?>
			</div>
			<div class="greeting">
				<?php echo $room->product->description ?>
			</div>
			<div class="facilities">
				<h1>Facilities</h1>
				<ul>
				<?php 
					foreach($attributes as $info) {
						foreach($info['attributeItem'] as $item){
							if(in_array($item['id_attribute_item'], $info['selectedAttributeItemIds'])){
								echo '<li>';
								echo $item['item'];
								echo '</li>';
							}
						}
					}
				?>
				</ul>
			</div>
			<div class="bedding">
				<h1>Bedding configuration</h1>
				<div>
					<?php 
						foreach($room->beddings as $bedding){
							if($bedding['single_num'] > 0){
								for($i = 0; $i <= $bedding['single_num']; $i++){
									echo '<img src="'.Yii::app()->request->baseUrl.'/images/bed-s.gif" />&nbsp;&nbsp;&nbsp;';
								}
							}
							
							if($bedding['double_num'] > 0){
								for($i = 0; $i <= $bedding['double_num']; $i++){
									echo '<img src="'.Yii::app()->request->baseUrl.'/images/bed-d.gif" />&nbsp;&nbsp;&nbsp;';
								}
							}
							
							echo "<br/>";
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>