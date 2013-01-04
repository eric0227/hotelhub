<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));

$urlSingleBed = Yii::app()->request->baseUrl . "/images/bed-s.gif";
$urlDoubleBed = Yii::app()->request->baseUrl . "/images/bed-d.gif";

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
		const DURATION = 20;	// show 14 days;
		
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
		
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontCarRental/products", "get", array("id"=>"prev_navi", "name"=>"prev_navi"));
		echo CHtml::hiddenField("id_supplier", $id_supplier);
		echo CHtml::hiddenField("country", $country);
		echo CHtml::hiddenField("destination", $destination);
		echo CHtml::hiddenField("start_date", date("m/d/Y",strtotime($start_year."-".$start_month."-".$start_day." ".$prev_alt_diff." days")));
		
		if(isset($_REQUEST['id_product'])) {
			echo CHtml::hiddenField("id_product", $_REQUEST['id_product']);
		}
		echo CHtml::endForm();
		
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontCarRental/products", "get", array("id"=>"next_navi", "name"=>"next_navi"));
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
		
		if(isset($_REQUEST['id_product'])) {
			$search[id_product] = $_REQUEST['id_product'];
			$product = Product::model()->findByPk($_REQUEST['id_product']);
			$supplier = $product->supplier;
			
			// add room
			//$roomList[] = Room::model()->findByPk($_REQUEST['id_product']);
		}
		$items = Search::findAllHotelRoom($search);
		
		//print_r($items);
		echo CHtml::beginForm(Yii::app()->request->baseUrl."/frontCarRental/order", "post", array("id"=>"order", "name"=>"order"));

		if(!isset($supplier) && isset($id_supplier)) {
			$supplier = Supplier::model()->findByPk($id_supplier);
		}
		
		$rowCount = 0;
		foreach($items as $item) {
			if($rowCount % TOT_ROW_NUM == 0) {
	?>
	
<?php if(isset($supplier)) {?>
	<div class="supplier-title">
		<h1 class="section"><?php echo $supplier->title ?></h1>
	</div>
<?php } ?>
	<div id="accommodation_list">
		<div class="supplier-images">
	<?php
		if(isset($supplier)) { 
			$images = $supplier->supplierImages;
			foreach($images as $image) {
				echo "<a href='".$image->getLink('large')."' ><img class='supplier_img' src='".$image->getLink('medium')."' /></a>";
			}
		} 
		if(isset($product)) {
			$images = $product->productImages;
			foreach($images as $image) {
				echo "<a href='".$image->getLink('large')."' ><img class='supplier_img' src='".$image->getLink('medium')."' /></a>";
			}
		}
	?>
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
					<?php
						if($item->id_product != "") {
							
							// add hotelList
							$roomList[] = Room::model()->findByPk($item->id_product);
					?>
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/frontCarRental/view/<?php echo $item->id_product; ?>">
							<?php echo $item->name; ?>
						</a>
					<?php
						} else {
					?>
					<?php 
							echo $item->name;
						}
					?>
					</td>	
					<td class="rate">
						<div>AUD</div>
					</td>
				<!-- 
					<td>
						<div><?php echo CHtml::textField("booking[$item->id_product]['cnt']", '1', array('class'=>'span1'))?></div>
					</td>
				-->	
					<?php
						for($i = 1; $i <= DURATION; $i++) {
							$date = date('D', mktime(0, 0, 0, $month, $day, $year));
							$curr_date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $month, $day, $year));
							
							if($item->date_info[$curr_date]->out_of_stock != "1") {
								if($date == "Sat" || $date == "Sun") {
									echo "<td class=\"weekend\">";
									if($item->date_info[$curr_date]->price != "") {
										//echo CHtml::checkBox("booking[$item->id_product][$curr_date]", false, array('value'=>$item->date_info[$curr_date]->price))."<br>";
										echo CHtml::checkBox("booking[$item->id_product][$curr_date]", false, array('value'=>$item->date_info[$curr_date]->id_product_date))."<br>";
										$price = number_format($item->date_info[$curr_date]->price, 0);
										
										if(Yii::app()->user->isAgent()) {
											$agent_price = number_format($item->date_info[$curr_date]->agent_price, 0);
											$price = $price . "<br><span class='agent-price'>(".$agent_price.")</span>";
										}
										
										echo $price;
									}
									echo "</td>";
								} else {
									echo "<td class=\"weekday\">";
									if($item->date_info[$curr_date]->price != "") {
										//echo CHtml::checkBox("booking[$item->id_product][$curr_date]", false, array('value'=>$item->date_info[$curr_date]->price))."<br>";
										echo CHtml::checkBox("booking[$item->id_product][$curr_date]", false, array('value'=>$item->date_info[$curr_date]->id_product_date))."<br>";
										$price = number_format($item->date_info[$curr_date]->price, 0);
										
										if(Yii::app()->user->isAgent()) {
											$agent_price = number_format($item->date_info[$curr_date]->agent_price, 0);
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
		echo '<button class="btn btn-success" style="width:48%" onClick="book(); return false;">BOOK</button>';
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

<?php if(isset($supplier)) {?>
<br><br><br>
<div id="hotel_table">
<h2 class="section">Car Retal details</h2>
	<div id="supplier_address">
		<div class="map">
			<img src="<?php echo Yii::app()->request->baseUrl?>/images/map-icon2.png" />
		</div>
		<div class="address">
		  	<?php echo $supplier->user->addressDefault->toString() ?>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="short_promotional_blurb">
		<?php echo $supplier->short_promotional_blurb  ?>
	</div>
	<div class="property_details">
		<?php echo $supplier->property_details  ?>
	</div>
	<div class="business_facilities">
		<?php echo $supplier->business_facilities  ?>
	</div>

<?php foreach($roomList as $room) { 
		$product = $room->product;		
?>
	<div class="room_table">
		<div class="room_main">
			<div class="room_title"><h1> <?php echo $product->name ?></h1> </div>
			<div class="room_description_short"> <?php echo $product->description_short ?>  </div>
			<div class="room_description"> <?php echo $product->description ?>  </div>
			<div class="room_booking">
				
			</div>
		</div>
		<div class="room_option">
			<div class="facilities">
				<h1>Options</h1>
				<ul>
				<?php
					foreach($room->getAllAttributes() as $info) {
						foreach($info['attributeItem'] as $item){
							if(in_array($item['id_attribute_item'], $info['selectedAttributeItemIds'])){
								echo '<li>';
								echo $item['item'];
								echo '</li>';
							}
						}
					}
				?>
				</ul>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
<?php } ?>	
</div>

<?php }?>