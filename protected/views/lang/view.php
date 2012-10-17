<?php
/* @var $this LangController */
/* @var $model Lang */

$this->breadcrumbs=array(
	'Langs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Lang', 'url'=>array('index')),
	array('label'=>'Create Lang', 'url'=>array('create')),
	array('label'=>'Update Lang', 'url'=>array('update', 'id'=>$model->id_lang)),
	array('label'=>'Delete Lang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_lang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lang', 'url'=>array('admin')),
);
?>

<h1>View Lang #<?php echo $model->id_lang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_lang',
		'name',
		'active',
		'iso_code',
		'language_code',
		'date_format_lite',
		'date_format_full',
		'is_rtl',
	),
)); ?>
