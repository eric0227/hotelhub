<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Car','url'=>array('index')),
	array('label'=>'Create Car','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('car-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cars</h1>

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
	'id'=>'car-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_product',
		array('name'=>'product.car_name', 'value'=>'$data->product->name'),
		array('name'=>'classCode.class', 'value'=>'$data->classCode->name'),
		array('name'=>'carGroupCode.group', 'value'=>'$data->carGroupCode->name'),
		'trans_type',
		'people_maxnum',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
