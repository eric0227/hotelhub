<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id_order=>array('view','id'=>$model->id_order),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	//array('label'=>'Create Order','url'=>array('create')),
	array('label'=>'View Order','url'=>array('view','id'=>$model->id_order)),
	array('label'=>'Manage Order','url'=>array('admin')),
);
?>

<h1>Update Order History <?php echo $model->id_order; ?></h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_order_state', OrderState::items()); ?>

	<?php echo $form->textAreaRow($model,'comment',array('rows'=>6, 'cols'=>50, 'class'=>'span5','maxlength'=>300)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Update',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<div>
	<h4>Order History</h4>
	<div class="view">
		<table>
			<tr>
				<th>Date</th>
				<th>State</th>
				<th>Comment</th>
			</tr>	
	<?php 
		$orderHistories = $order->orderHistories;
		foreach($orderHistories as $orderHistory) {
			echo "<tr>";
			echo "	<td>{$orderHistory->date_add}</td>";
			echo "	<td>{$orderHistory->orderState->name}</td>";
			echo "	<td>{$orderHistory->comment}</td>";
			echo "</tr>";			
		}
	?>
	</table>
	</div>
</div>