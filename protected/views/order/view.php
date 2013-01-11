<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id_order,
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	//array('label'=>'Create Order','url'=>array('create')),
	array('label'=>'Update Order','url'=>array('update','id'=>$model->id_order)),
	//array('label'=>'Delete Order','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_order),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order','url'=>array('admin')),
	array('label'=>'Order History','url'=>array('orderHistory','id'=>$model->id_order)),
);
?>

<h1>View Order #<?php echo $model->id_order; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_order',
		array('name'=>'id_user', 'value'=>$model->user->email),
		array('name'=>'id_order_state', 'value'=>$model->orderState->name),
		'total_price',
		'total_agent_price',
		'invoice_number',
		'date_add',
		'on_agent',
	),
)); ?>


<div>
	<h4>Order Items</h4>
	<div class="view">
		<table>
			<tr>
				<th>Id</th>
				<th>Item Name</th>
				<th>Booking Date</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Extra Price</th>
				<th>Total Price</th>
			</tr>	
	<?php 
		$orderItems = $model->orderItems;
		foreach($orderItems as $orderItem) {
			echo "<tr>";
			echo "  <td>" . CHtml::link("{$orderItem->id_order_item}", array('orderItem','id'=>$orderItem->id_order_item))."</td>" ;
			echo "	<td>{$orderItem->order_item_name}</td>";
			echo "	<td>{$orderItem->on_date}</td>";
			echo "	<td>{$orderItem->product_quantity}</td>";
			echo "	<td>{$orderItem->quantity_price}</td>";
			echo "	<td>{$orderItem->quantity_extra_price}</td>";
			echo "	<td>{$orderItem->total_price}</td>";
			echo "</tr>";			
		}
	?>
	</table>
	</div>
</div>



<div>
	<h4>Order History</h4>
	<div class="view">
		<table>
			<tr>
				<th>Id</th>
				<th>Date</th>
				<th>State</th>
				<th>Comment</th>
			</tr>	
	<?php 
		$orderHistories = $model->orderHistories;
		foreach($orderHistories as $orderHistory) {
			echo "<tr>";
			echo "	<td>{$orderHistory->id_order_history}</td>";
			echo "	<td>{$orderHistory->date_add}</td>";
			echo "	<td>{$orderHistory->orderState->name}</td>";
			echo "	<td>{$orderHistory->comment}</td>";
			echo "</tr>";			
		}
	?>
	</table>
	</div>
</div>
