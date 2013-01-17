
<?php
	$product = Product::model()->findByPk($_REQUEST['id_product']);
	$items[] =  $product;
	
	echo CHtml::beginForm(Yii::app()->request->baseUrl . "/front/userPayment", "post", array('id'=>'book_form'));
?>
	<h2>Pay Securely</h2>
	<div id="order_list">
		<div id="order_form">
			<span>Complete your guest details and click 'Pay Now'</span><br>
			<span>These are the details the supplier will use to identify you at check in. All compulsory information.</span>
			<table>
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$totalPrice = 0;
				foreach($items as $item) {
					$totalPrice = $totalPrice + $item->price;
			?>
					<tr>
						<td><?php echo $item->name; ?></td>
						<td>$<?php echo number_format($item->price, 2) ?></td>
						<td><?php echo "1" ?></td>
						<td>$<?php echo number_format($item->price, 2) ?></td>
					</tr>
					
			<?php } ?>
					<tr>
						<td colspan="3" style="font-size:18px; text-align:right; font-weight:bole"> Total: </td>
						<td style="font-size:18px; text-align:left; font-weight:bole"> $<?php echo number_format($totalPrice, 2) ?> </td>
					</tr>	
				</tbody>
			</table>
			<table>
			<?php

				if(Yii::app()->user->isGuest) {
					$model = new User();

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

		<?php //echo CHtml::submitButton("Pay Now"); ?>
		<?php 
			echo '<div style="display:inline-block; width:500px;">';
			echo '<div class="btn-container">';
			echo '<button type="submit" class="btn btn-success" style="width:48%" >Pay Now</button>';
			//echo '<button class="btn" style="margin-left:5px;width:48%" onclick="history.back(-1)">Cancel</button>';
			echo '</div>';
			echo '</div>';
		?>
		
		<?php echo CHtml::endForm(); ?>
	</div>
	