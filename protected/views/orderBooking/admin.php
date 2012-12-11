<?php
$this->breadcrumbs=array(
	'Order Bookings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OrderBooking','url'=>array('index')),
	array('label'=>'Create OrderBooking','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-booking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Order Bookings</h1>

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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'order-booking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_order_booking',
		'id_order',
		'id_service',
		'id_supplier',
		'id_product',
		'id_bedding',
		/*
		'on_refunded',
		'on_return',
		'total_price',
		'agent_total_price',
		'bookin_date',
		'bookout_date',
		'checkin_date',
		'checkout_date',
		'booking_name',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
