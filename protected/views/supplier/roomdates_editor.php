<?php
	$id_product = !empty($_GET['id'])? $_GET['id'] : die;
?>
<!-- 
<script>
$(function() {
	$('.stopsell').on('click', function() {
		//var selected = new Array();
		var selected = {};
		$("input:checked").each(function() {
			//selected.push($(this).attr("id_product_date"));
			selected['bulk_save']['id_product_date'+"["+$(this).attr("id_product_date")+"]"] = $(this).attr("id_product_date");
			selected['bulk_save']['id_product'+"["+$(this).attr("id_product")+"]"] = $(this).attr("id_product");
			selected['bulk_save']['on_date'+"["+$(this).attr("on_date")+"]"] = $(this).attr("on_date");
			selected['bulk_save']['price'+"["+$(this).attr("price")+"]"] = $(this).attr("price");
			selected['bulk_save']['agent_price'+"["+$(this).attr("agent_price")+"]"] = $(this).attr("agent_price");
			selected['bulk_save']['quantity'+"["+$(this).attr("quantity")+"]"] = $(this).attr("quantity");
		});
			
		$.ajax({
			type:"POST",url: <?php echo "'".Yii::app()->request->baseUrl."'"; ?> + "/productDate/BulkSave",data: selected,
				   success:function(data){
					   selected = null;
					   alert("success");
					   location.reload();
				   }
				 });
		});
</script>
 -->
<?php
	$this->breadcrumbs=array(
		'Suppliers'=>'/supplier/index', 'Edit Prices',
	);

	echo CHtml::form("/productDate/BulkSave");
	echo CHtml::hiddenField("id_product", $id_product);
	echo "<h1>Edit Prices</h1>";
	
	echo "<div class=\"right\">";
	echo "Press \"Save\" to update your deals ";
	echo CHtml::resetButton("Cancel");
	echo CHtml::submitButton("Save", array("name"=>"Save"));
	echo "</div>";
?>
	<table>
		<thead>
			<th class="th_center">Date</th>
			<th class="th_center">Advertised Base Rate<br><span class="desc">per night</span></th>
			<th class="th_center">Agent Rate<br><span class="desc">per night</span></th>
			<!-- <th class="th_center">Inclusions<br><span class="desc">(Leave blank for Room Only)</span></th> -->
			<th class="th_center">Allotment</th>
			<!-- <th class="th_center">Number Sold</th> -->
			<th class="th_center">Active Selling</th>
		</thead>
		<tbody>
<?php
	$today = date("Y-m-d");
	
	$year = !empty($_GET['startyear'])? $_GET['startyear'] : date('Y');
	$month = !empty($_GET['startmonth'])? $_GET['startmonth'] : date('m');
	//$end_year = date("Y", strtotime($start_year."-".$start_month."-01 +3 months"));
	//$end_month = date("m", strtotime($start_year."-".$start_month."-01 +3 months"));
	//$totalDays = (strtotime($end_year."-".$end_month."-".$lastdayOfEndMonth) - strtotime($start_year."-".$start_month."-1") / (60 * 60 * 24);
	$how_many_month = 3;
	$outofdate_str = "";
	
	for($i = 1; $i <= $how_many_month; $i++) {
		$lastdayOfMonth = date('t',strtotime($month.'/1/'.$year));
		//echo "lastdayOfMonth: ".$lastdayOfMonth;
		for($row = 1; $row <= $lastdayOfMonth; $row++) {
	
			$fulldateExceptYear = date('D d M', mktime(0, 0, 0, $month, $row, $year));
			$fulldate = date('Y-m-d', mktime(0, 0, 0, $month, $row, $year));
			$date = date('D', mktime(0, 0, 0, $month, $row, $year));
			
			if($today > $fulldate) {
				$outofdate_str = "disabled";
?>
				<tr class="<?php echo $date; ?> outofdate">
		<?php
			} else {
				$outofdate_str = "";
		?>
				<tr class="<?php echo $date; ?>">
		<?php
			}
		?>
		<?php
			$isExist = false;
			foreach ($productdates as $productdate) {
				//echo $productdate->on_date."<br>";
				if($productdate->on_date == $fulldate." 00:00:00") {
					$isExist = true;
					break;
				}
				$count++;
			}
			
			if($isExist) {
		?>
				<td class="" on_date="<?php echo $fulldate; ?>" id_product_date="<?php echo $productdate->id_product_date; ?>"><span><?php echo $fulldateExceptYear; ?></span></td>
				<td><?php echo "$".CHtml::textField("bulk_save[".$fulldate."][price]", number_format($productdate->price, 2), array("style"=>"width: 100px;", "disabled"=>$outofdate_str))?></td>
				<td><?php echo "$".CHtml::textField("bulk_save[".$fulldate."][agent_price]", number_format($productdate->agent_price, 2), array("style"=>"width: 100px;", "disabled"=>$outofdate_str)) ?></td>
				<td><?php echo CHtml::textField("bulk_save[".$fulldate."][quantity]", $productdate->quantity, array("style"=>"width: 100px;", "disabled"=>$outofdate_str)) ?></td>
				<td class="center"><?php echo CHtml::checkBox("bulk_save[".$fulldate."][is_active]", $productdate->active, array("disabled"=>$outofdate_str, "class"=>"stopsell")); ?></td>
				<?php echo CHtml::hiddenField("bulk_save[".$fulldate."][id_product_date]", $productdate->id_product_date, array("disabled"=>$outofdate_str)); ?>
				<?php echo CHtml::hiddenField("bulk_save[".$fulldate."][on_date]", $productdate->on_date, array("disabled"=>$outofdate_str)); ?>
		<?php
			} else {
		?>
				<td class="" on_date="<?php echo $fulldate; ?>" id_product_date=""><span><?php echo $fulldateExceptYear; ?></span></td>
				<td><?php echo "$".CHtml::textField("bulk_save[".$fulldate."][price]", "", array("style"=>"width: 100px;", "disabled"=>$outofdate_str)) ?></td>
				<td><?php echo "$".CHtml::textField("bulk_save[".$fulldate."][agent_price]", "", array("style"=>"width: 100px;", "disabled"=>$outofdate_str)) ?></td>
				<td><?php echo CHtml::textField("bulk_save[".$fulldate."][quantity]", "", array("style"=>"width: 100px;", "disabled"=>$outofdate_str)) ?></td>
				<td class="center"><?php echo CHtml::checkBox("bulk_save[".$fulldate."][is_active]", false, array("disabled"=>$outofdate_str, "class"=>"stopsell")); ?></td>
				<?php echo CHtml::hiddenField("bulk_save[".$fulldate."][id_product_date]", "", array("disabled"=>$outofdate_str)); ?>
				<?php echo CHtml::hiddenField("bulk_save[".$fulldate."][on_date]", $fulldate, array("disabled"=>$outofdate_str)); ?>
		<?php
			}
		?>
		</tr>
<?php
		}
		
		$tmpYear = $year;
		$tmpMonth = $month;
		$year = date("Y", strtotime($tmpYear."-".$tmpMonth."-01 +1 months"));
		$month = date("m", strtotime($tmpYear."-".$tmpMonth."-01 +1 months"));
	}
?>
		</tbody>
	</table>
<?php
	echo "<div class=\"right\">";
	echo "Press \"Save\" to update your deals ";
	echo CHtml::resetButton("Cancel");
	echo CHtml::submitButton("Save", array("name"=>"Save"));
	echo "</div>";
	
	echo CHtml::endForm();
?>