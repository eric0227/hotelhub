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
		$('.month_navi').on('click', function() {
			//alert($(this).attr("year")+"-"+$(this).attr("month"));
			//$.get("./index.php", { year: $(this).attr("year"), month: $(this).attr("month") } );
			//var cnt = $(this).val();
			//var strHtml = "";
			//for(var i = 1; i <= cnt; i++) {
			//	strHtml += "<option value=\"" + i + "\">" + i + "</option>";
			//}

			//$('#Room_guests_included_price').html(strHtml);
		});
	});
</script>
<div>
	<div class="button">ADD NEW ROOM</div>
	<div class="button">ADD IMAGE</div>
</div>
<div class="cb"></div>

<!-- <h1>Suppliers</h1> -->

<div class="supplier_details">
	
	<?php
		$models = Room::model()->findAll();
		foreach ($models as $model) {
			echo "<div class=\"h4_blue\">";
			echo "<h4 class=\"blue\">".$model->room_name."</h4>";
	?>
	</div>
	<div class="blue_line">
	</div>
	<div class="tap_area">
		STANDARD ROOM
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
		Add Image | Delete
	</div>
	<div class="details_area">
		<table>
			<thead>
				<?php
					//$year = "2012";
					//$month = "12";
					//echo $selected_month.".".$selected_year;
					$lastday = date('t',strtotime($selected_month.'/1/'.$selected_year));
					$date = "";
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
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('D', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							echo "<td class=\"white\">".($i)."</td>";
						}
					?>
				</tr>
				<tr>
					<?php
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('D', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							echo "<td class=\"green\">".($i)."</td>";
						}
					?>
				</tr>
				<tr>
					<?php
						for($i = 1; $i <= $lastday; $i++) {
							$date = date('D', mktime(0, 0, 0, $selected_month, $i, $selected_year));
							echo "<td class=\"green\">".($i)."</td>";
						}
					?>
				</tr>
				<tr>
					<?php
						for($i = 1; $i <= $lastday; $i++) {
							echo "<td class=\"white\">".CHtml::checkBox($i)."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
		} 
	?>
</div>
<?php
/* 
$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
 */
?>
