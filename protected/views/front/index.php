<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAll(array('order' => 'name asc'));
?>
<script type="text/javascript">
	$(function(){
		$('.date_input').datepicker();
	});

	var findData = {
		'id_country':null,
		'id_destination':null,
	};

	$(function() {
		$("#country").live("change", function(event) {
			findData.id_country = $(this).val();
			findData.id_destination = null;
			displayDestinationList(findData.id_country);
		});

		$("#state").live("change", function() {
			findData.id_destination = $(this).attr("data");
		});
	});

	function displayDestinationList(id_country) {
		// ajax
		$.post(
			'destination/ajaxList',
			{'id_country':id_country},
			function(data){
				var nullOption = "<option>there is no data</option>";
				var result = (data == '') ? nullOption : data ;
				$("#suburb").html(result);
			}
		);
	}

	function searchAccommodation() {
		var message = (findData.id_country == null) ? 'no result' : findData.id_country;
		alert(message);
		return false;
	}
</script>
<div id="left_columns">
	<form action="search" method="post" id="search_form">
		<input type="text" name="search_text" id="search_text" placeholder="Enter Search keywrods here" />
		<input type="image" class="search_submit_btn" src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/search_btn.png" /> 
	</form>
	<div id="find_accommodation_index">
		<form action="search/accommodation" method="post" name="find_accommodation_form" id="find_accommodation_form" class="form">
			<div class="row">
				<select name="country" id="country" class="span4">
					<option value="non-select">Country</option>
					<?php foreach($countryList as $country): ?>
					<option value="<?php echo $country->id_country ?>"><?php echo $country->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<select name="state" id="state" class="span4">
					<option value="non-select">State</option>
				</select>
			</div>
			<div class="row">
				<select name="suburb" id="suburb" class="span4">
					<option value="non-select">City / Suburb</option>
				</select>
			</div>
			<div class="row">
				<input type="text" name="date" id="date" placeholder="Cehck In" class="date_input span2" />
				<select name="day" id="day" class="span2" style="margin-left: 23px;">
					<option value="Nights">Nights</option>
				</select>
			</div>
			<div class="row">
				<input type="text" name="min_price" id="min_price" class="span2" placeholder="Min. Price/night"></input>
				<span class="hyphen">-</span>
				<input type="text" name="max_price" id="max_price" class="span2" placeholder="Max. Price/night"></input>
			</div>
			<div class="row" style="margin: 0 0 5px 0;">
				<select name="number_of_guests" id="number_of_guests" class="span4">
					<option value="0">Numnber of Guests</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="row rating">
				<label>Guest Rating</label>
				<span class="reputation"></span>
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