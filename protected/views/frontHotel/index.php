<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAll(array('order' => 'name asc'));
?>
<script type="text/javascript">
	$(function(){
		hotel.combine('#country', '#destination');
	});
</script>
<div>
	<form action="<?php echo Yii::app()->request->baseUrl ?>/fronthotel/" method="POST" class="form-inline" id="advanced_search">
	<input type="hidden" id="id_country" name="id_country" value="" />
	<input type="hidden" id="id_destination" name="id_destination" value="" />
	<div class="control-group">
		<label class="control-label" for="keyword">Search Keyword</label>
		<input type="text" id="keyword" name="keyword" class="span2"/>
		<label class="control-label" for="country">Country</label>
		<select id="country" name="country" class="span2">
			<?php foreach($countryList as $country): ?>
			<option value="<?php echo $country->id_country ?>"><?php echo $country->name ?></option>
			<?php endforeach; ?>
		</select>
		<label class="control-label" for="destination">Destination</label>
		<select id="destination" name="destination" class="span2"></select>
	</div>
	<div class="control-group odd">
		<label class="control-label" for="date">Check-In</label>
		<input type="text" id="date" name="date" class="span2 date_input"/>
		<label class="control-label" for="day">Day</label>
		<select id="day" name="day" class="span2">
			<option value="Nights">Nights</option>
			<option value="Daytime">Daytime</option>
		</select>
		<label class="control-label" for="min_rice">Min. Price/night</label>
		<input type="text" id="min_price" name="min_price" class="span2"/>
		<label class="control-label" for="max_price">Max. Price/night</label>
		<input type="text" id="max_price" name="max_price" class="span2"/>
	</div>
	<div class="control-group">
		<label class="control-label" for="number_of_guests">Number of Guests</label>
		<select id="number_of_guests" name="number_of_guests">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
		</select>
		<button class="btn btn-success" type="submit" onclick="return hotel.submit();">Search</button>
	</div>
	</form>
	
	<div id="accommodation_list">
	<table class="table table-bordered">
		<tr class="date">
			<td colspan="2">&nbsp;</td>
			<th>
				<a class="prev">Prev</a>
				Fri
				<b>30</b>
				<span>Nov</span>
			</th>
			<th>
				Sat
				<b>1</b>
				<span>Dec</span>
			</th>
			<th>
				Sun
				<b>2</b>
				<span>Dec</span>
			</th>
			<th>
				Mon
				<b>3</b>
				<span>Dec</span>
			</th>
			<th>
				Tue
				<b>4</b>
				<span>Dec</span>
			</th>
			<th>
				Wed
				<b>5</b>
				<span>Dec</span>
			</th>
			<th>
				Thu
				<b>6</b>
				<span>Dec</span>
			</th>
			<th>
				Fri
				<b>7</b>
				<span>Dec</span>
			</th>
			<th>
				Sat
				<b>8</b>
				<span>Dec</span>
			</th>
			<th>
				Sun
				<b>9</b>
				<span>Dec</span>
			</th>
			<th>
				Mon
				<b>10</b>
				<span>Dec</span>
			</th>
			<th>
				Tue
				<b>11</b>
				<span>Dec</span>
			</th>
			<th>
				Wed
				<b>12</b>
				<span>Dec</span>
			</th>
			<th>
				Thu
				<b>13</b>
				<span>Dec</span>
				<a class="next">Next</a>
			</th>
		</tr>
		<tr>
			<td class="hotel span4">
				<a href="#">The Hotel Name</a>
			</td>
			<td class="rate">
				AUS--
			</td>
			<!-- ## The days starts from here ## -->
			<td class="weekday">100</td>
			<td class="weekend">100</td>
			<td class="weekend sold">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekend">100</td>
			<td class="weekend">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<td class="weekday">100</td>
			<!-- ## The days ends until here ## -->
		</tr>
	</table>
	</div>
</div>