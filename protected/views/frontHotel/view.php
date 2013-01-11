<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<script type="text/javascript">
	$(function(){
		$('.room-images a, .main-image').fancybox({
			overlayOpacity:0.8,
			overlayColor:'#000',
			speedIn:500,
			speedOut:500
		});
	});
</Script>
<div id="room-details">
	<div class="room-names">
		<h2 class="room-name"><?php echo $room->product->name ?>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/map-icon.png"  style="width:60px;" />
		</h2>
	</div>
	<div class="room-info">
		<div class="map">
			
		</div>
		<div class="left-columns">
			<a rel="image_group" href="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" class="main-image">
				<img src="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" alt="" style="width:250px;height:250px" />
			</a>
			<div class="order-form">
				<span class="rating">
			<?php for($i = 0; $i < $room->product->grade_level; $i++) { ?>		
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
			<?php } ?>
				</span>
				<br>
<?php //if(!$room->product->isDateProduct()) { ?>				
				<span class="price">
					<?php echo number_format($room->product->price,2) ?>
					<?php if(Yii::app()->user->isAgent()) {?>
						<br>
						(<?php echo number_format($room->product->agent_price,2) ?>)
					<?php }?>
				</span>
				<div style="clear:both"></div>
			<!--  	<div> Quantity : <?php echo $room->product->quantity - $room->product->getSoldQuantity() ?> </div> -->
<?php //} ?>					
				<div class="btn-container">
					<button class="btn btn-success" style="width:48%" onClick="location.href='<?php echo Yii::app()->request->baseUrl ?>/frontHotel/products?id_product=<?php echo $room->product->id_product?>'">BOOK</button>
					<button class="btn" style="margin-left:5px;width:48%" onclick="history.back(-1)">Cancel</button>
				</div>
			</div>
		</div>
		<div class="right-columns">
		
			<div class="room-images">
				<?php foreach($supplierImages as $image):?>
					<a rel="image_group" href="<?php echo $image->getLink('large') ?>"><img src="<?php echo $image->getLink('medium') ?>" alt="<?php echo $image->image_title ?>" style="width:75px;height:75px" /></a>
				<?php endforeach; ?>
			
				<?php foreach($roomImages as $image):?>
				<!--	<a href="<?php echo $image->getLink('large') ?>"><img src="<?php echo $image->getLink('medium') ?>" alt="<?php echo $image->image_title ?>" style="width:75px;height:75px" /></a>
				-->
				<?php endforeach; ?>
			</div>
			<div class="greeting">
				<?php echo $room->product->description_short ?>
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
								for($i = 0; $i < $bedding['single_num']; $i++){
									echo '<img src="'.Yii::app()->request->baseUrl.'/images/bed-s.gif" />&nbsp;&nbsp;&nbsp;';
								}
							}
							
							if($bedding['double_num'] > 0){
								for($i = 0; $i < $bedding['double_num']; $i++){
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