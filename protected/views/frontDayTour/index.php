<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAll(array('order' => 'name asc'));
?>
<div id="daytour">
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
	<div id="product_list" class="main_area">
		<table class="table table-bordered">
			<thead>
			<tr>
				<td></td>
				<td>
					<a href="#" class="left_arrow">Left</a>
					Sydney
					<a href="#" class="right_arrow">Right</a>
				</td>
				<th>23 Mon</th>
				<th>24 Tue</th>
				<th>25 Wed</th>
				<th>26 Thu</th>
				<th>27 Fri</th>
				<th>28 Sat</th>
				<th>29 Sun</th>
				<th>30 Mon</th>
				<th>31 Tue</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><a href="#">Happy Tour</a></td>
				<th width="150">Strathfield</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href="#">Happy Tour</a></td>
				<th>Chatswood</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href="#">Happy Tour</a></td>
				<th>Mascot</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href="#">Happy Tour</a></td>
				<th>Homebush</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href="#">Happy Tour</a></td>
				<th>Hornsby</th>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>