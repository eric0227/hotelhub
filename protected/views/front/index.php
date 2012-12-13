<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
//$countryList = Country::model()->findAll(array('order' => 'name asc'));
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));
?>
<script type="text/javascript">
	$(function(){
		hotel.combine('#country', '#destination');
	});
</script>
<div id="left_columns">
	<form action="search" method="post" id="search_form">
		<input type="text" name="search_text" id="search_text" placeholder="Enter Search keywrods here" />
		<input type="image" class="search_submit_btn" src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/search_btn.png" /> 
	</form>
	<div id="find_accommodation_index">
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/frontHotel" method="get" name="find_accommodation_form" id="find_accommodation_form" class="form">
			<input type="hidden" id="id_country" name="id_country" value=""/>
			<input type="hidden" id="id_destination" name="id_destination" value=""/>
			<div class="row">
				<select name="country" id="country" class="span4">
					<option value="non-select">Country</option>
					<?php foreach($countryList as $country): ?>
					<option value="<?php echo $country->id_country ?>"><?php echo $country->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<select name="destination" id="destination" class="span4">
					<option value="non-select">Destination</option>
				</select>
			</div>
			<div class="row">
				<input type="text" name="include_date" id="include_date" placeholder="Cehck-In" class="date_input span4" />
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
			<div class="item">
				<span class="decoration"></span>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/sample_product_image.jpg" class="pull-left" />
				<div class="detail">
					<header>
						<h4 class="name">Sample Hotel</h4>
						<h6 class="location">Location | Sydney CBD</h6>
						<div class="displayed_right pull-right">
							<span class="reputation">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
							</span>
							<span class="price">$650</span>
						</div>
					</header>
					<p>
						This is sample text to show you how your website looks like. Please note that the actual website may not look exactly the same. Please feel free to discuss with our friendly
					</p>
				</div>
			</div>
			<div class="item">
				<span class="decoration"></span>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/sample_product_image.jpg" class="pull-left" />
				<div class="detail">
					<header>
						<h4 class="name">Sample Hotel</h4>
						<h6 class="location">Location | Sydney CBD</h6>
						<div class="right">
							<span class="reputation">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
							</span>
							<span class="price">$650</span>
						</div>
					</header>
					<p>
						This is sample text to show you how your website looks like. Please note that the actual website may not look exactly the same. Please feel free to discuss with our friendly
					</p>
				</div>
			</div>
			<div class="item">
				<span class="decoration"></span>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/sample_product_image.jpg" class="pull-left" />
				<div class="detail">
					<header>
						<h4 class="name">Sample Hotel</h4>
						<h6 class="location">Location | Sydney CBD</h6>
						<div class="right">
							<span class="reputation">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
							</span>
							<span class="price">$650</span>
						</div>
					</header>
					<p>
						This is sample text to show you how your website looks like. Please note that the actual website may not look exactly the same. Please feel free to discuss with our friendly
					</p>
				</div>
			</div>
			<div class="item">
				<span class="decoration"></span>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/sample_product_image.jpg" class="pull-left" />
				<div class="detail">
					<header>
						<h4 class="name">Sample Hotel</h4>
						<h6 class="location">Location | Sydney CBD</h6>
						<div class="right">
							<span class="reputation">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/star.png" />
							</span>
							<span class="price">$650</span>
						</div>
					</header>
					<p>
						This is sample text to show you how your website looks like. Please note that the actual website may not look exactly the same. Please feel free to discuss with our friendly
					</p>
				</div>
			</div>
		</div>
	</div>
</div>