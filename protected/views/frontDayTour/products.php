<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));

?>
<script type="text/javascript">
	$(function(){
		hotel.combine('#country', '#destination');
	});

	function book() {
		var checkedCnt = $('#order input[type=checkbox]:checked').length;
		if(checkedCnt == 0) {
			alert("<?php echo Yii::t('front', 'Please select the dates you wish to book.')?>");
		} else {
			$('#order').submit();
		}
	}
</script>


<script type="text/javascript">
	$(function(){
		$('.supplier-images a, .main-image').fancybox({
			overlayOpacity:0.8,
			overlayColor:'#000',
			speedIn:500,
			speedOut:500
		});
	});
</Script>


<div>

	<?php
		$roomList = array();
		
		const TOT_ROW_NUM = 100;
		const DURATION = 14;	// show 14 days;
		
		$id_supplier = isset($_GET['id_supplier']) ? $_GET['id_supplier'] : (isset($_REQUEST['id_supplier']) ? $_REQUEST['id_supplier'] : 0);
		$country = isset($_GET['country']) ? $_GET['country'] : (isset($_REQUEST['country']) ? $_REQUEST['country'] : 0);
		$destination = isset($_GET['destination']) ? $_GET['destination'] : (isset($_REQUEST['destination']) ? $_REQUEST['destination'] : 0);
		$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : (isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("m/d/Y"));

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
		
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontDayTour/products", "get", array("id"=>"prev_navi", "name"=>"prev_navi"));
		echo CHtml::hiddenField("id_supplier", $id_supplier);
		echo CHtml::hiddenField("country", $country);
		echo CHtml::hiddenField("destination", $destination);
		echo CHtml::hiddenField("start_date", date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." ".$prev_alt_diff." days")));
		
		if(isset($_REQUEST['id_product'])) {
			echo CHtml::hiddenField("id_product", $_REQUEST['id_product']);
		}
		echo CHtml::endForm();
		
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontDayTour/products", "get", array("id"=>"next_navi", "name"=>"next_navi"));
		echo CHtml::hiddenField("id_supplier", $id_supplier);
		echo CHtml::hiddenField("country", $country);
		echo CHtml::hiddenField("destination", $destination);
		echo CHtml::hiddenField("start_date", date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." +6 days")));
		
		if(isset($_REQUEST['id_product'])) {
			echo CHtml::hiddenField("id_product", $_REQUEST['id_product']);
		}
		
		echo CHtml::endForm();
		
		//$items = array("1", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4", "2", "3", "4");
		
		$search = array(
			'id_supplier'=>$id_supplier,
			'country'=>$country,
			'destination'=>$destination,
			'start_date'=>$start_year."-".$start_month."-".$start_day,
			'last_date'=>$lastday,
			'search_text'=>$_REQUEST['search_text']
		);
		
		$items = SearchProduct::findAllProduct($search);
		
		//print_r($search);
		//print_r($items);
		
		//print_r($items);
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontDayTour/order", "post", array("id"=>"order", "name"=>"order"));
		
		$rowCount = 0;
		foreach($items as $item) {
			
			$search['id_product'] = $items['id_product'];
			$product_date = SearchProduct::findAllProductDate($search);
			
			//print_r($product_date);
			
			if($rowCount % TOT_ROW_NUM == 0) {
	?>
	
	<div id="accommodation_list">
		<div class="supplier-images">
		</div>
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

						<a href="<?php echo Yii::app()->request->baseUrl; ?>/frontDayTour/view/<?php echo $item['id_product']; ?>">
							<?php echo $item['name']; ?>
						</a>
				
					</td>	
					<td class="rate">
						<div>AUD</div>
					</td>
				
					<?php
						for($i = 1; $i <= DURATION; $i++) {
							$date = date('D', mktime(0, 0, 0, $month, $day, $year));
							$curr_date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $month, $day, $year));
							
							//print_r($product_date[$curr_date]);
							
							if($product_date[$curr_date]['out_of_stock'] != "1") {
								if($date == "Sat" || $date == "Sun") {
									echo "<td class=\"weekend\">";
									if($product_date[$curr_date]['price'] != "") {
									
										$price = number_format($product_date[$curr_date]['price'], 0);
										
										if(Yii::app()->user->isAgent()) {
											$agent_price = number_format($product_date[$curr_date]['agent_price'], 0);
											$price = $price . "<br><span class='agent-price'>(".$agent_price.")</span>";
										}
										
										echo $price;
									}
									echo "</td>";
								} else {
									echo "<td class=\"weekday\">";
									if($product_date[$curr_date]['price'] != "") {
										
										$price = number_format($product_date[$curr_date]['price'], 0);
										
										if(Yii::app()->user->isAgent()) {
											$agent_price = number_format($product_date[$curr_date]['agent_price'], 0);
											$price = $price . "<br><span class='agent-price'>(".$agent_price.")</span>";
										}
										
										echo $price;
									}
									echo "</td>";
								}
							} else {
								echo "<td class=\"soldout\">SOLD</td>";
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
		
		//echo CHtml::submitButton("Book Now");
		echo '<div style="display:inline-block; width:300px;">';
		echo '<div class="btn-container">';
		//echo '<button class="btn btn-success" style="width:48%" onClick="book(); return false;">BOOK</button>';
		//echo '<button class="btn" style="margin-left:5px;width:48%" onclick="history.back(-1)">Cancel</button>';
		echo '</div>';
		echo '</div>';
		echo CHtml::endForm();
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
