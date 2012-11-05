<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
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

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_order',
		'id_lang',
		'id_user',
		'id_cart',
		'id_currency',
		'id_address_delivery',
		/*
		'id_address_invoice',
		'secure_key',
		'payment',
		'conversion_rate',
		'gift',
		'gift_message',
		'total_products',
		'total_discounts',
		'total_paid',
		'total_paid_real',
		'invoice_number',
		'delivery_number',
		'invoice_date',
		'delivery_date',
		'date_add',
		'date_upd',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
