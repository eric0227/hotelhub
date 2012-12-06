<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAll(array('order' => 'name asc'));
?>
<div id="attraction">
	<div id="side">
		<div id="left_select_country">
			<div class="select_btn_group seperate">
				<a class="select_btn">
					Australia
					<span class="caret"></span>
				</a>
				<ul>
					<?php foreach($countryList as $country): ?>
					<li><a href="#"><?php echo $country->name ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="block">
				<ul class="list">
					<li>
						<a href="#">Sydney</a>
						<span class="badge badge-info pull-right">8</span>
					</li>
					<li>
						<a href="#">Gold cost</a>
						<span class="badge badge-info pull-right">5</span>
					</li>
					<li>
						<a href="#">Cains</a>
						<span class="badge badge-info pull-right">2</span>
					</li>
				</ul>
			</div>
		</div>
		<div id="left_googlemap">
			
		</div>
	</div>
	<div id="attraction_list" class="main_area">
		<h1>Sydney</h1>
		<table class="table table-bordered">
			<tr>
				<th></th>
				<td></td>
			</tr>
			<tr>
				<th></th>
				<td></td>
			</tr>
		</table>
	</div>
</div>