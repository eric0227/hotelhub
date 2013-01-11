<?php
$this->breadcrumbs=array(
	'Suppliers',
);
/*
$this->menu=array(
	array('label'=>'Create Supplier','url'=>array('create')),
	array('label'=>'Manage Supplier','url'=>array('admin')),
);
*/
?>
<script> 
	$(function() {
		$('.active').on('click', function() {
			//var selected = new Array();
			var selected = {};
			$("input:checked").each(function() {
				//selected.push($(this).attr("id_product_date"));
				if($(this).attr("id_product_date") != 0) {
					selected['id_product_date'+"["+$(this).attr("id_product_date")+"]"] = $(this).attr("id_product_date");
				}
			});
			
			$.ajax({type:"POST",url: <?php echo "'".Yii::app()->request->baseUrl."'"; ?> + "/productDate/Active",data: selected,
				   success:function(data){
					   selected = null;
					   alert("success");
					   location.reload();
				   }
				 });
		});

		$('.inactive').on('click', function() {
			//var selected = new Array();
			var selected = {};
			$("input:checked").each(function() {
				//selected.push($(this).attr("id_product_date"));
				if($(this).attr("id_product_date") != 0) {
					selected['id_product_date'+"["+$(this).attr("id_product_date")+"]"] = $(this).attr("id_product_date");
				}
			});
			
			$.ajax({type:"POST",url: <?php echo "'".Yii::app()->request->baseUrl."'"; ?> + "/productDate/Inactive",data: selected,
				   success:function(data){
					   selected = null;
					   alert("success");
					   location.reload();
				   }
				 });
		});
	});
</script>
<form>
<div>
	<a href="<?php echo CController::createUrl('room/create'); ?>"><div class="button" id="add_new_room"></div></a>
	<a href=""><div class="button active" active="1" id="btn_blank">START SELL</div></a>
	<a href=""><div class="button inactive" active="0" id="btn_blank">STOP SELL</div></a>
</div>
<div class="cb"></div>

<!-- <h1>Suppliers</h1> -->

<div class="supplier_details">
	
	<?php
		$models = Room::model()->findAllByAttributes(array('id_supplier'=>Yii::app()->user->id_user));
		foreach ($models as $model) {
			$product = $model->product;
			echo "<div class=\"h4_blue\">";
			echo "<h4 class=\"blue\">".$product->name."</h4>";
	?>
	</div>
	<div class="blue_line">
	</div>
	<div class="cb"></div>
	<div class="tap_area">
		<?php
			$code = Code::model()->findByPk($model->room_code);
			echo $code->name;
		?>
	</div>
	<div class="calendar_nav_area">
		<span>
			<?php
				$start_year = !empty($_GET['startyear'])? $_GET['startyear'] : date('Y');
				$start_month = !empty($_GET['startmonth'])? $_GET['startmonth'] : date('m');
				$selected_year = !empty($_GET['year'])? $_GET['year'] : date('Y');
				$selected_month = !empty($_GET['month'])? $_GET['month'] : date('m');
				$year = $start_year;
				$month = $start_month;
				//$year = 2012;
				//$month = 7;
				
				$previous_year = date("Y", strtotime($year."-".$month."-01 -1 months"));
				$previous_month = date("m", strtotime($year."-".$month."-01 -1 months"));
				
				echo CHtml::link("◀", "index?year=".$selected_year."&month=".$selected_month."&startyear=".$previous_year."&startmonth=".$previous_month, array('class'=>'month_navi','year'=>$previous_year, 'month'=>$previous_month));
				if($selected_year == $year && $selected_month == $month) {
					echo CHtml::link(date("M",strtotime($year."-".$month."-01 +0 months")), "index?year=".$year."&month=".$month."&startyear=".$start_year."&startmonth=".$start_month, array('class'=>'month_navi selected_month'));
				} else {
					echo CHtml::link(date("M",strtotime($year."-".$month."-01 +0 months")), "index?year=".$year."&month=".$month."&startyear=".$start_year."&startmonth=".$start_month, array('class'=>'month_navi'));
				}
				$next_year = date("Y", strtotime($year."-".$month."-01 +1 months"));
				$next_month = date("m", strtotime($year."-".$month."-01 +1 months"));
				$startyear2 = $next_year;
				$startmonth2 = $next_month;
				for($i = 1; $i <= 5; $i++) {
					$year = $next_year;
					$month = $next_month;
					if($selected_year == $year && $selected_month == $month) {
						echo " / ".CHtml::link(date("M",strtotime($year."-".$month."-01 +0 months")), "index?year=".$year."&month=".$month."&startyear=".$start_year."&startmonth=".$start_month, array('class'=>'month_navi selected_month'));
					} else {
						echo " / ".CHtml::link(date("M",strtotime($year."-".$month."-01 +0 months")), "index?year=".$year."&month=".$month."&startyear=".$start_year."&startmonth=".$start_month, array('class'=>'month_navi'));
					}
					$next_year = date("Y", strtotime($year."-".$month."-01 +1 months"));
					$next_month = date("m", strtotime($year."-".$month."-01 +1 months"));
				}

				echo CHtml::link("▶", "index?year=".$selected_year."&month=".$selected_month."&startyear=".$startyear2."&startmonth=".$startmonth2, array('class'=>'month_navi'));
			?>
		</span>
	</div>
	<div class="button_area">
	<script>
		function goPage(url) {
			location.href = url;
		}
	</script>
		<?php //echo CHtml::button('Room Image', array('submit' =>array(Yii::app()->request->baseUrl . '/imageProduct/index', array('id_product'=>$model->id_product)))); ?>
		<?php //echo CHtml::button('Room Image', array('onclick' => 'goPage("'.Yii::app()->request->baseUrl . '/imageProduct/index?id_product='.$model->id_product.'")')); ?>
		<?php echo CHtml::button('Edit Price', array('submit' =>Yii::app()->request->baseUrl . '/supplier/dates_editor/'.$model->id_product)); ?>
	</div>
	<div class="cb"></div>
	<div class="details_area">
		<!-- 1~15 of Month -->
		<table>
			<thead>
				<?php
					//$year = "2012";
					//$month = "12";
					//echo $selected_month.".".$selected_year;
					$lastday = date('t',strtotime($selected_month.'/1/'.$selected_year));
					$date = "";
					$today = date("Y-m-d 00:00:00");
					
					echo "<th class=\"dateHeading\"></th>";
					for($i = 1; $i <= $lastday; $i++) {
						$date = date('D', mktime(0, 0, 0, $selected_month, $i, $selected_year));
						if($date == "Sat" || $date == "Sun") {
							echo "<th class=\"dateHeading weekends\"><span>	".$date."</span><br/>".($i)."</th>";
						} else {
							echo "<th class=\"dateHeading\"><span>	".$date."</span><br/>".($i)."</th>";
						}
					}
					
					
				?>
			</thead>
			<tbody>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Price</td>";
					
						$fromdate = date('Y-m-d', mktime(0, 0, 0, $selected_month, 1, $selected_year));
						$todate = date('Y-m-d', mktime(0, 0, 0, $selected_month, 31, $selected_year));
						$product_date_items = ProductDate::model()->findAll(array("condition"=>"id_product=".$model->id_product
							." AND on_date BETWEEN '".$fromdate."' AND '".$todate."'"));
						
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							$colour_class = "yellow";
							if($result->active == "0") {
								$colour_class = "inactive";
							}
							
							if($today > $date) {
								$outofdate_str = " disabled";
							} else {
								$outofdate_str = "";
							}
							
							if($result->price != "") {
								echo "<td class=\"".$colour_class.$outofdate_str."\">".(number_format($result->price, 2))."</td>";
							} else {
								echo "<td class=\"".$colour_class.$outofdate_str."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Agent<br>Price</td>";
						
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
								
							$colour_class = "green";
							if($result->active == "0") {
								$colour_class = "inactive";
							}
							
							if($today > $date) {
								$outofdate_str = " disabled";
							} else {
								$outofdate_str = "";
							}
							
							if($result->agent_price != "") {
								echo "<td class=\"".$colour_class.$outofdate_str."\">".(number_format($result->agent_price, 2))."</td>";
							} else {
								echo "<td class=\"".$colour_class.$outofdate_str."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Quantity</td>";
						
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							$colour_class = "green";
							if($result->active == "0") {
								$colour_class = "inactive";
							}
							
							if($today > $date) {
								$outofdate_str = " disabled";
							} else {
								$outofdate_str = "";
							}
							
							if($result->quantity != "") {
								echo "<td class=\"".$colour_class.$outofdate_str."\">".($result->quantity)."</td>";
							} else {
								echo "<td class=\"".$colour_class.$outofdate_str."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\"></td>";
						
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							if($today > $date) {
								$outofdate_str = " disabled";
							} else {
								$outofdate_str = "";
							}
							
							if($result->id_product_date != "") {
								echo "<td class=\"white".$outofdate_str."\">".CHtml::checkBox('id_product_date[]', false, array("disabled"=>$outofdate_str, 'class'=>'activecheckbox','id_product_date'=>$result->id_product_date,'date'=>$date))."</td>";
							} else {
								echo "<td class=\"white".$outofdate_str."\">".CHtml::checkBox('id_product_date[]', false, array("disabled"=>$outofdate_str, 'class'=>'activecheckbox','id_product_date'=>0,'date'=>$date))."</td>";
							}
						}
					?>
				</tr>
			</tbody>
		</table>
		
		<!-- 17~last day of Month -->
		<!-- 
		<table>
			<thead>
				<?php
					//$year = "2012";
					//$month = "12";
					//echo $selected_month.".".$selected_year;
					$lastday = date('t',strtotime($selected_month.'/1/'.$selected_year));
					$date = "";
					echo "<th class=\"dateHeading\"></th>";
					for($i = 17; $i <= $lastday; $i++) {
						$date = date('D', mktime(0, 0, 0, $selected_month, $i, $selected_year));
						if($date == "Sat" || $date == "Sun") {
							echo "<th class=\"dateHeading weekends\"><span>	".$date."</span><br/>".($i)."</th>";
						} else {
							echo "<th class=\"dateHeading\"><span>	".$date."</span><br/>".($i)."</th>";
						}
					}
				?>
			</thead>
			<tbody>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Price</td>";
						
						$fromdate = date('Y-m-d', mktime(0, 0, 0, $selected_month, 1, $selected_year));
						$todate = date('Y-m-d', mktime(0, 0, 0, $selected_month, 31, $selected_year));
						$product_date_items = ProductDate::model()->findAll(array("condition"=>"id_product=".$model->id_product
							." AND on_date BETWEEN '".$fromdate."' AND '".$todate."'"));
						
						for($i = 17; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							$colour_class = "white";
							if($result->active == "0") {
							$colour_class = "inactive";
							}

							if($result->price != "") {
								echo "<td class=\"".$colour_class."\">".(number_format($result->price, 2))."</td>";
							} else {
								echo "<td class=\"".$colour_class."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Agent<br>Price</td>";
						
						for($i = 17; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							$colour_class = "green";
							if($result->active == "0") {
								$colour_class = "inactive";
							}

							if($result->agent_price != "") {
								echo "<td class=\"".$colour_class."\">".(number_format($result->agent_price, 2))."</td>";
							} else {
								echo "<td class=\"".$colour_class."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\">Quantity</td>";
						
						for($i = 17; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							$colour_class = "green";
							if($result->active == "0") {
								$colour_class = "inactive";
							}

							if($result->quantity != "") {
								echo "<td class=\"".$colour_class."\">".($result->quantity)."</td>";
							} else {
								echo "<td class=\"".$colour_class."\"></td>";
							}
						}
					?>
				</tr>
				<tr>
					<?php
						echo "<td class=\"tipcolumn\"></td>";
						
						for($i = 17; $i <= $lastday; $i++) {
							$date = date('Y-m-d 00:00:00', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							$result = "";
							foreach($product_date_items as $product_date_item) {
								if($product_date_item->on_date == $date) {
									$result = $product_date_item;
								}
							}
							
							if($result->id_product_date != "") {
								echo "<td class=\"white\">".CHtml::checkBox('id_product_date[]', false, array('class'=>'activecheckbox',id_product_date=>$result->id_product_date,'date'=>$date))."</td>";
							} else {
								echo "<td class=\"white\">".CHtml::checkBox('id_product_date[]', false, array('class'=>'activecheckbox','id_product_date'=>0,'date'=>$date))."</td>";
							}
						}
					?>
				</tr>
			</tbody>
		</table>
		 -->
	</div>
	<div class="cb"></div>
	<div class="imagelist">
	<?php
		//$imgModels = $supplier->supplierImages;
		//echo "id_product: ".$model->id_product."<br>";
		$imgModels = Product::model()->findByPk($model->id_product)->productImages;
		//print_r($imgModels);
		foreach ($imgModels as $imgModel) {
			//echo CHtml::image($imgModel->image_path."/".$imgModel->id_image."_medium.jpg");
			echo CHtml::image($imgModel->getLink('medium'));
		}
	?>
	</div>
	<div class="cb"></div>
	<?php
		}
	?>
</div>
</form>
<?php
/* 
$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
 */
?>
