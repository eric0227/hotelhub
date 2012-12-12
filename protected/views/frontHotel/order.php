<?php
	//var_dump($_POST);
	$recv_booking_datas = isset($_POST['booking']) ? $_POST['booking'] : array();
	$book_datas = array();
	$before_id_product = "";
	$id_product_array = array();
	
	echo CHtml::beginForm("/front/UserPayment", "post");
	
	foreach ($recv_booking_datas as $k => $v1) {
		foreach ($v1 as $k2 => $v2) {
			echo $k.", ".$k2.", ".$v2."<br>";
			if($before_id_product != $k) {
				$book_data = Search::newHotelInfo();
				$book_data->id_product = $k;
				array_push($id_product_array, $book_data->id_product);
				$book_data->date_info = array();
				
				$date_info = Search::newDateInfo();
				$date_info->on_date = $k2;
				array_push($book_datas, $book_data);
				
				$book_data->date_info[$date_info->on_date] = $date_info;
				echo CHtml::hiddenField("id_product_array[]", $book_data->id_product);
				echo CHtml::hiddenField("id_product_date_array[$v2]", $book_data->id_product);
			} else {
				$date_info = Search::newDateInfo();
				$date_info->on_date = $k2;
				
				$book_data->date_info[$date_info->on_date] = $date_info;
				echo CHtml::hiddenField("id_product_date_array[$v2]", $book_data->id_product);
			}

			$before_id_product = $k;
		}
	}
	
	//var_dump($book_datas);
	
	$urlSingleBed = Yii::app()->request->baseUrl . "/images/bed-s.gif";
	$urlDoubleBed = Yii::app()->request->baseUrl . "/images/bed-d.gif";
	
	$items = Search::findInfoHotelRoom($id_product_array);
	//var_dump($items);
?>
	<h2>Book & Pay Securely</h2>
	<div id="order_list">
	<?php
		foreach($items as $item) { 
	?>
		<h3><?php echo $item->name; ?></h3>
		<div id="room_list">
			<span>How many guests?</span><br>
			<span>
				Rates are for <?php echo $item->guests_included_price; ?> people.
				Extra adults $<?php echo number_format($item->adults_extra, 2); ?>.
				Extra children $<?php echo number_format($item->children_extra, 2); ?>.
				The room caters for a maximum of <?php echo $item->adults_maxnum; ?> adult(s),
				and a maximum of <?php echo $item->children_maxnum; ?> child(ren) but cannot exceed <?php echo $item->guests_tot_room_cap; ?> guests in total.</span>
			<div>
				<table>
					<tr>
						<td>Room :</td>
						<?php
							$adults_max = array();
							for($num = 0; $num <= $item->adults_maxnum; $num++) {
								array_push($adults_max, $num);
							} 
						?>
						<td>Number of Adults:<?php echo CHtml::dropDownList("adults_num[$item->id_product]", "", $adults_max); ?></td>
						<?php
							$children_max = array();
							for($num = 0; $num <= $item->children_maxnum; $num++) {
								array_push($children_max, $num);
							} 
						?>
						<td>Children (<?php echo $item->children_years; ?>yrs and under):<?php echo CHtml::dropDownList("children_num[$item->id_product]", "", $children_max); ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Bedding Configuration</td>
						<td>
							<?php
								$i = 1;
								foreach($item->bed_info as $bed) {
									echo "<div style='float:left;'>";
									echo CHtml::radioButton("options[$item->id_product]", ($i==1 ? true : false), array("value"=>$bed->id_bedding))."Option ".$i++;
									echo "<br>";
									for($j = 0; $j < $bed->single_num; $j++) {
										echo CHtml::image($urlSingleBed);
									}
									for($j = 0; $j < $bed->double_num; $j++) {
										echo CHtml::image($urlDoubleBed);
									}
									echo "<br>".($bed->double_num != 0 ? $bed->double_num." Double(s)" : "");
									echo " ".($bed->single_num != 0 ? $bed->single_num." Single(s)" : "");
									echo "</div>";
								}
							?>
						</td>
					</tr>
				</table>
			</div>
	<?php
		}
	?>
			<div>
				<span>Selected your dates by checking the boxes before page</span><br>
				<div>All rates are TAX inclusive and per Room listed in Australian Dollars ($)</div>
				<table>
					<thead>
						<th></th>
						<th>Date</th>
						<th>Base Rate</th>
						<th>Extras</th>
						<th>Total</th>
						<th>Inclusions</th>
					</thead>
					<tbody>
						<?php
							foreach($items as $item) {
						?>
						<tr>
							<td>
								<?php echo $item->name; ?>
							</td>
							<td>
								<?php echo $item->name; ?>
							</td>
						</tr>
						<?php 
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="order_form">
			<span>Complete your guest details and click 'Pay Now'</span><br>
			<span>These are the details the supplier will use to identify you at check in. All compulsory information.</span>
			<table>
			<?php
				foreach($items as $item) { 
			?>
				<tr>
					<td><?php echo $item->name; ?>, Guest :</td>
					<td>
						<?php echo "First name:".CHtml::textField("firstname[$item->id_product]")."<br>"; ?>
						<?php echo "Last name:".CHtml::textField("lastname[$item->id_product]"); ?>
					</td>
					<td>This is the person who will be staying. They will require photo ID to check-in.</td>
				</tr>
			<?php
				}
			
				if(Yii::app()->user->isGuest) {
					$model = new User();
					/*
					echo "<tr>";
					echo "<td>".CHtml::label("First Name:", "firstname")."</td>";
					echo "<td>".CHtml::activeTextField($model, "firstname")."</td>";
					echo "</tr>";
				
					echo "<tr>";
					echo "<td>".CHtml::label("Last Name:", "lastname")."</td>";
					echo "<td>".CHtml::activeTextField($model, "lastname")."</td>";
					echo "</tr>";
					*/
					echo "<tr>";
					echo "<td>".CHtml::label("Email:", "email")."</td>";
					echo "<td>".CHtml::activeTextField($model, "email")."</td>";
					echo "</tr>";
				
					echo "<tr>";
					echo "<td>".CHtml::label("Create a password:", "passwd")."</td>";
					echo "<td>".CHtml::activePasswordField($model, "passwd")."</td>";
					echo "</tr>";
				
					echo "<tr>";
					echo "<td>".CHtml::label("Confirm your password:", "repeat_passwd")."</td>";
					echo "<td>".CHtml::activePasswordField($model, "repeat_passwd")."</td>";
					echo "</tr>";
				
					echo CHtml::hiddenField("is_guest", "1");
				} else {
					$model = User::model()->findByPk(Yii::app()->user->id_user);
				
					echo "<tr>";
					echo "<td>".CHtml::label("First Name:", "firstname")."</td>";
					echo "<td>".CHtml::activeTextField($model, "firstname")."</td>";
					echo "</tr>";
				
					echo "<tr>";
					echo "<td>".CHtml::label("Last Name:", "lastname")."</td>";
					echo "<td>".CHtml::activeTextField($model, "lastname")."</td>";
					echo "</tr>";
				
					echo "<tr>";
					echo "<td>".CHtml::label("Email:", "email")."</td>";
					echo "<td>".CHtml::activeTextField($model, "email")."</td>";
					echo "</tr>";
				
					echo CHtml::hiddenField("id_user", $model->id_user);
				} 
			?>
			</table>
		</div>

		<?php echo CHtml::submitButton("Pay Now"); ?>
		<?php echo CHtml::endForm(); ?>
	</div>
	