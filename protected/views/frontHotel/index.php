<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));
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
		<label class="control-label" for="date">Check-In</label>
		<input type="text" id="date" name="date" class="span2 date_input"/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button class="btn btn-primary" type="submit" onclick="return hotel.submit();">Search</button>
	</div>
	
	</form>
	
	<?php
		const TOT_ROW_NUM = 12;
		const DURATION = 20;	// show 14 days;
		
		$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : 0;
		$destination = isset($_REQUEST['destination']) ? $_REQUEST['destination'] : 0;
		$start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("m/d/Y");
		$include_date = isset($_REQUEST['include_date']) ? $_REQUEST['include_date'] : $start_date;

		//echo "include_date:".$include_date."<br>";
		$recvDate = explode("/", $include_date);
		$include_date_month = $recvDate[0];
		$include_date_day = $recvDate[1];
		$include_date_year = $recvDate[2];
		
		
		$date1 = $start_date;
		$date2 = $include_date;
		
		$ts1 = strtotime($date1);
		$ts2 = strtotime($date2);
		
		$seconds_diff = $ts2 - $ts1;
		
		//echo floor($seconds_diff/3600/24);
		
		if(floor($seconds_diff/3600/24) > 5) {
			$start_date = date("m/d/Y",strtotime($include_date_month."/".$include_date_day."/".$include_date_year." -4 days"));
		}
		
		$recvStartDate = explode("/", $start_date);
		$start_month = $recvStartDate[0];
		$start_day = $recvStartDate[1];
		$start_year = $recvStartDate[2];
		
		$lastday = date("Y-m-d",strtotime($start_year."-".$start_month."-".$start_day." +".(DURATION-1)." days"));
		//echo "lastday:".$lastday."<br>";

		$date1 = date("m/d/Y");
		$date2 = date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." -6 days"));
		
		$ts1 = strtotime($date1);
		$ts2 = strtotime($date2);
		
		$seconds_diff = $ts2 - $ts1;
		
		$prev_alt_diff = floor($seconds_diff/3600/24);
		//echo "prev_alt_diff:".$prev_alt_diff;
		if(floor($seconds_diff/3600/24) <= 0) {
			$prev_alt_diff = -6 - $prev_alt_diff;
		} else {
			$prev_alt_diff = -6;
		}
		
		$prev_alt = date("d M",strtotime($start_year."-".$start_month."-".$start_day." ".$prev_alt_diff." days"))." - ".date("d M",strtotime($start_year."-".$start_month."-".$start_day." +".(DURATION+$prev_alt_diff-1)." days"));
		$next_alt = date("d M",strtotime($start_year."-".$start_month."-".$start_day." +6 days"))." - ".date("d M",strtotime($start_year."-".$start_month."-".$start_day." +".(DURATION-1+6)." days"));
		
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontHotel/", "post", array("id"=>"prev_navi", "name"=>"prev_navi"));
		echo CHtml::hiddenField("country", $country);
		echo CHtml::hiddenField("destination", $destination);
		echo CHtml::hiddenField("start_date", date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." ".$prev_alt_diff." days")));
		echo CHtml::endForm();

		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontHotel/", "post", array("id"=>"next_navi", "name"=>"next_navi"));
		echo CHtml::hiddenField("country", $country);
		echo CHtml::hiddenField("destination", $destination);
		echo CHtml::hiddenField("start_date", date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." +6 days")));
		echo CHtml::endForm();
		
		//$items = array("1", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4");
		$items = Search::findAllHotel($country, $destination, $start_year."-".$start_month."-".$start_day, $lastday);
		//print_r($items);
		$rowCount = 0;
		foreach($items as $item) {
			if($rowCount % TOT_ROW_NUM == 0) {
	?>
	<div id="accommodation_list">
		<table class="table table-bordered">
			<thead>
				<tr class="date">
					<td colspan="2">&nbsp;</td>
					<?php
						$month = $start_month;
						$day = $start_day;
						$year = $start_year;
	
						$date = "";
						
						for($i = 1; $i <= DURATION; $i++) {
							$date = date('D', mktime(0, 0, 0, $month, $day, $year));
							if($date == "Sat" || $date == "Sun") {
								if($i == 1) {
									echo "<th class=\"weekend\"><a id=\"a_prev\" class=\"prev\" title=\"".$prev_alt."\">Prev</a>".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span></th>";
								} else if($i == DURATION) {
									echo "<th class=\"weekend\">".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span><a id=\"a_next\" class=\"next\" title=\"".$next_alt."\">Next</a></th>";
								} else {
									echo "<th class=\"weekend\">".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span></th>";
								}
							} else {
								if($i == 1) {
									echo "<th><a id=\"a_prev\" class=\"prev\" title=\"".$prev_alt."\">Prev</a>".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span></th>";
								} else if($i == DURATION) {
									echo "<th>".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span><a id=\"a_next\" class=\"next\" title=\"".$next_alt."\">Next</a></th>";
								} else {
									echo "<th>".$date."<b>".($day)."</b><span>".date("M", mktime(0, 0, 0, $month, $day, $year))."</span></th>";
								}
							}
							
							$nextday = date("d",strtotime($year."-".$month."-".$day." +1 days"));
							$nextmonth = date("m",strtotime($year."-".$month."-".$day." +1 days"));
							$nextyear = date("Y",strtotime($year."-".$month."-".$day." +1 days"));
							$day = $nextday;
							$month = $nextmonth;
							$year = $nextyear;
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php
			}
			?>
			<?php
				//var_dump($items);
				$month = $start_month;
				$day = $start_day;
				$year = $start_year;
			?>
				<tr>
					<td class="hotel span4">
					<?php
						if($item->id_supplier != "") {
							echo CHtml::link($item->title, array("view", "id_supplier"=>$item->id_supplier, "start_date"=>$start_date, "country"=>$country, "destination"=>$destination)); 
						} else {
					?>
					<?php 
							echo $item->title;
						}
					?>
					</td>
					<td class="rate">AUD</td>
					<?php
						for($i = 1; $i <= DURATION; $i++) {
							$date = date('D', mktime(0, 0, 0, $month, $day, $year));
							$curr_date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $month, $day, $year));
							
							if($date == "Sat" || $date == "Sun") {
								echo "<td class=\"weekend\">";
								if($item->date_info[$curr_date]->price != "") {
									$price = number_format($item->date_info[$curr_date]->price, 0);
									echo CHtml::link($price, array("view", "id_supplier"=>$item->id_supplier, "start_date"=>$start_date, "country"=>$country, "destination"=>$destination));
								}
								echo "</td>";
							} else {
								echo "<td class=\"weekday\">";
								if($item->date_info[$curr_date]->price != "") {
									$price = number_format($item->date_info[$curr_date]->price, 0);
									echo CHtml::link($price, array("view", "id_supplier"=>$item->id_supplier, "start_date"=>$start_date, "country"=>$country, "destination"=>$destination));
								}
								echo "</td>";
							}

							$nextday = date("d",strtotime($year."-".$month."-".$day." +1 days"));
							$nextmonth = date("m",strtotime($year."-".$month."-".$day." +1 days"));
							$nextyear = date("Y",strtotime($year."-".$month."-".$day." +1 days"));
							$day = $nextday;
							$month = $nextmonth;
							$year = $nextyear;
						} 
					?>
				</tr>
		<?php
			if($rowCount == TOT_ROW_NUM-1) {
				$rowCount = 0;
		?>
			</tbody>
		</table>
	</div>
	<?php
			} else {
				$rowCount++;
			}
		}
		
		if($rowCount != TOT_ROW_NUM-1) {
			echo "</tbody></table></div>";
		}
	?>
</div>
<script type="text/javascript">
	$('#a_prev').on('click', function(){
		$('#prev_navi').submit();
	});

	$('#a_next').on('click', function(){
		$('#next_navi').submit();
	});
</script>