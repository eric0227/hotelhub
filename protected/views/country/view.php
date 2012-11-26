<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
	array('label'=>'Create Country','url'=>array('create')),
	array('label'=>'Update Country','url'=>array('update','id'=>$model->id_country)),
	array('label'=>'Delete Country','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_country),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Country','url'=>array('admin')),
);
?>

<h1>View Country #<?php echo $model->id_country; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_country',
		'id_zone',
		'id_currency',
		'iso_code',
		'name',
		'call_prefix',
		'active',
		'contains_states',
		'need_identification_number',
		'need_zip_code',
		'zip_code_format',
		'display_tax_label',
	),
)); ?>
