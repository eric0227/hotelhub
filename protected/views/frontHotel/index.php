<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i>Holidoy Hotel</i></h1>

<script type="text/javascript">

var findData = {
	'id_country':null,
	'id_destination':null,
};

$(function() {
	$("#country-list").delegate("li", "click", function() {
		findData.id_country = $(this).attr("data");
		findData.id_destination = null;

		$("#country-list > li").removeClass("list-selected");
		$(this).addClass("list-selected");

		displayDestinationList(findData.id_country);
	});

	$("#destination-list").delegate("li", "click", function() {
		findData.id_destination = $(this).attr("data");
		
		$("#destination-list > li").removeClass("list-selected");
		$(this).addClass("list-selected");
		
	});
});

function displayDestinationList(id_country) {
	// ajax
	$.post(
		'destination/ajaxList',
		{'id_country':id_country},
		function(data){
			$("#destination-list").html(data);
		}
	);
}

function searchAccommodation() {
	alert(findData.id_country + "," + findData.id_destination);
}

</script>

<div id="find_accommodation">
	<div class="country">
	<?php 
		$countryList = Country::model()->findAll();
		echo '<h2>Country</h2>';
		echo '<ul id="country-list">';
		foreach($countryList as $country) {
			echo '<li data="'.$country->id_country.'">';
			echo $country->name;
			echo '</li>';
		}
		echo '</ul>';
	?>
	</div>
	
	<div class="destination">
		<h2>Destination</h2>
		<ul id="destination-list" class="destination-list">
		</ul>
	</div>
	<div style="clear:both"></div>
	<div > <input type="button" value="Search" onclick="searchAccommodation();" /> </div>
</div>