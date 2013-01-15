<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
//$countryList = Country::model()->findAll(array('order' => 'name asc'));
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));
?>
<script type="text/javascript">

	$(function(){
		hotel.setBaseUrl("<?php echo Yii::app()->request->baseUrl ?>");
		hotel.combine('#country', '#destination');
		$('#country option[value=non-select]').attr('selected', true);
	});

		
</script>
<div id="left_columns">
	<form action="<?php echo Yii::app()->request->baseUrl; ?>/frontHotel/suppliers" method="get" id="search_form">
		<input type="text" name="search_text" id="search_text" placeholder="Enter Search keywrods here" />
		<input type="image" class="search_submit_btn" src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/search_btn.png" /> 
	</form>
	<div id="find_accommodation_index">
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/frontHotel/suppliers" method="get" name="find_accommodation_form" id="find_accommodation_form" class="form">
			<input type="hidden" id="id_country" name="id_country" value=""/>
			<input type="hidden" id="id_destination" name="id_destination" value=""/>
			<div class="row">
				<select name="country" id="country" class="span4">
					<option value="">Country</option>
					<?php foreach($countryList as $country): ?>
					<option value="<?php echo $country->id_country ?>"><?php echo $country->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<select name="destination" id="destination" class="span4">
					<option value="">Destination</option>
				</select>
			</div>
			<div class="row">
				<input type="text" name="include_date" id="include_date" placeholder="Check-In" class="date_input span4" />
			</div>
			<div class="row center">
				<input type="submit" value="Search Accommodation" onclick="return hotel.submit();" />
			</div>
		</form>
	</div>
</div>
<div id="right_columns">
	<div id="special_products">
		<h1><span>DOY's</span> Special</h1>
		<div class="special_product_list">
<?php 	
		foreach($specialModels as $model) {
			$coverImg = $model->supplier->getCoverImage();
			if(isset($coverImg)) {
				$image = $coverImg->getLink('medium');
			}
			
?>		
		<div class="item" onClick="location='<?php echo Yii::app()->request->baseUrl.'/frontHotel/products?id_supplier='. $model->supplier->id_supplier ?>'">
				<span class="decoration"></span>
				<img src="<?php echo  $image ?>" class="pull-left" />
				<div class="detail">
					<header>
						<h4 class="name"><?php echo $model->supplier->title ?> </h4>
						<h6 class="location">Location | <?php echo $model->supplier->user->addressDefault->destination->name ?> </h6>
						<div class="displayed_right pull-right">
							<span class="reputation">
						<?php for($i = 0; $i < $model->supplier->grade_level; $i++) { ?>		
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
						<?php } ?>
							</span>
							<span class="price"><?php //echo number_format($model->product->price, 2) ?></span>
						</div>
					</header>
					<p>
						<?php //echo $model->suppler->description_short ?>
					</p>
				</div>
			</div>
<?php 	}?>
		</div>
	</div>
</div>