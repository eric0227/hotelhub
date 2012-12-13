<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	array('label'=>'Create Order','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_order',
		array('name'=>'id_user', 'value'=>'$data->user->email'),
		array('name'=>'id_order_state', 'value'=>'$data->orderState->name'),
		'invoice_number',
		'date_add',
		'total_price',
		/*
		'id_address_invoice',
		'secure_key',
		'payment',
		'conversion_rate',
		'gift',
		'gift_message',
		'total_price',
		'total_agent_price',
		'total_discount',
		'total_paid',
		'invoice_number',
		'delivery_number',
		'invoice_date',
		'delivery_date',
		'date_add',
		'date_upd',
		'on_agent',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {update}',
		),
	),
)); ?>
