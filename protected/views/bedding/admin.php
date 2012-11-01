<?php
/* @var $this BeddingController */
/* @var $model Bedding */

$this->breadcrumbs=array(
	'Beddings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Bedding', 'url'=>array('index')),
	array('label'=>'Create Bedding', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bedding-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Beddings</h1>

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
	'id'=>'bedding-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_bedding',
		'id_room',
		'gest_num',
		'single_num',
		'double_num',
		'beddig_desc',
		/*
		'additional_cost',
		'cots_available',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
