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
		<h2 class="room-name"><?php echo $car->product->name ?>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/map-icon.png"  style="width:60px;" />
		</h2>
	</div>
	<div class="room-info">
		<div class="map">
			
		</div>
		<div class="left-columns">
			<a href="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" class="main-image">
				<img src="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" alt="" style="width:250px;height:250px" />
			</a>
			<div class="order-form">
				<span class="rating">
			<?php for($i = 0; $i < $car->product->grade_level; $i++) { ?>		
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
			<?php } ?>
				</span>
				<br>
<?php //if(!$car->product->isDateProduct()) { ?>				
				<span class="price">
					<?php echo number_format($car->product->price,2) ?>
					<?php if(Yii::app()->user->isAgent()) {?>
						<br>
						(<?php echo number_format($car->product->agent_price,2) ?>)
					<?php }?>
				</span>
				<div style="clear:both"></div>
			<!--  	<div> Quantity : <?php echo $car->product->quantity - $car->product->getSoldQuantity() ?> </div> -->
<?php //} ?>					
				<div class="btn-container">
					<button class="btn btn-success" style="width:48%" onClick="location.href='<?php echo Yii::app()->request->baseUrl ?>/frontHotel/products?id_product=<?php echo $car->product->id_product?>'">BOOK</button>
					<button class="btn" style="margin-left:5px;width:48%" onclick="history.back(-1)">Cancel</button>
				</div>
			</div>
		</div>
		<div class="right-columns">
		
			<div class="room-images">
				<?php foreach($supplierImages as $image):?>
					<a href="<?php echo $image->getLink('large') ?>"><img src="<?php echo $image->getLink('medium') ?>" alt="<?php echo $image->image_title ?>" style="width:75px;height:75px" /></a>
				<?php endforeach; ?>
			
				<?php foreach($carImages as $image):?>
					<a href="<?php echo $image->getLink('large') ?>"><img src="<?php echo $image->getLink('medium') ?>" alt="<?php echo $image->image_title ?>" style="width:75px;height:75px" /></a>
				<?php endforeach; ?>
			</div>
			<div class="greeting">
				<?php echo $car->product->description_short ?>
			</div>
			
			<div class="greeting">
				<?php echo $car->product->description ?>
			</div>
			<div class="facilities">
				<h1>Options</h1>
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
				<h1>Configuration</h1>
				
			</div>
		</div>
	</div>
</div>