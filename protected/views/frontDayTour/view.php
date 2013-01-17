<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$coverImage = $product->getCoverImage();

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
		<h2 class="room-name"><?php echo $product->name ?>
			<img class="map-icon" src="<?php echo Yii::app()->request->baseUrl; ?>/images/map-icon.png"  style="width:60px;" />
		</h2>
	</div>
	<div class="room-info">
		<div class="map" >
			<script type="text/javascript">
				$(function () {
				    $('#google-map').modalPopLite({ openButton: '.map-icon', isModal: false });
				});
			</script>
			<div id="google-map" >
				<?php 
					Yii::import('ext.EGMap.*');
					 
					$gMap = new EGMap();
					$gMap->setWidth(1050);
					$gMap->setHeight(600);
					$gMap->zoom = 16;
					 
					$address_str = $product->address->toString();
					 
					// Create geocoded address
					$geocoded_address = new EGMapGeocodedAddress($address_str);
					$geocoded_address->geocode($gMap->getGMapClient());
					 
					// Center the map on geocoded address
					 $gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());
					 
					// Add marker on geocoded address
					$gMap->addMarker(
					     new EGMapMarker($geocoded_address->getLat(), $geocoded_address->getLng())
					);
					 
					$gMap->renderMap();
					
				?>
			</div>
		</div>
		<div class="left-columns">
			<a rel="image_group" href="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" class="main-image">
				<img src="<?php echo isset($coverImage) ? $coverImage->getLink('large') : '' ?>" alt="" style="width:250px;height:250px" />
			</a>
			<div class="order-form">
				<span class="rating">
			<?php for($i = 0; $i < $product->grade_level; $i++) { ?>		
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
			<?php } ?>
				</span>
				<br>
<?php //if(!$car->product->isDateProduct()) { ?>				
				<span class="price">
					<?php echo number_format($product->price,2) ?>
					<?php if(Yii::app()->user->isAgent()) {?>
						<br>
						(<?php echo number_format($product->agent_price,2) ?>)
					<?php }?>
				</span>
				<div style="clear:both"></div>
			<!--  	<div> Quantity : <?php echo $product->quantity - $product->getSoldQuantity() ?> </div> -->
<?php //} ?>					
				<div class="btn-container">
					<button class="btn btn-success" style="width:48%" onClick="location.href='<?php echo Yii::app()->request->baseUrl ?>/frontDayTour/order?id_product=<?php echo $product->id_product?>'">BUY</button>
					<button class="btn" style="margin-left:5px;width:48%" onclick="history.back(-1)">Cancel</button>
				</div>
			</div>
		</div>
		<div class="right-columns">
		
			<div class="room-images">
							
				<?php foreach($product->productImages as $image):?>
					<a rel="image_group" href="<?php echo $image->getLink('large') ?>"><img src="<?php echo $image->getLink('medium') ?>" alt="<?php echo $image->image_title ?>" style="width:75px;height:75px" /></a>
				<?php endforeach; ?>
			</div>
			<div class="greeting">
				<?php echo $product->description_short ?>
			</div>
			
			<div class="greeting">
				<?php echo $product->description ?>
			</div>
		</div>
	</div>
</div>