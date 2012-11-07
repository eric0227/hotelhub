<?php
$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	$model->id_hotel,
);

$this->menu=array(
	array('label'=>'List Hotel','url'=>array('index')),
	array('label'=>'Create Hotel','url'=>array('create')),
	array('label'=>'Update Hotel','url'=>array('update','id'=>$model->id_hotel)),
	array('label'=>'Delete Hotel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_hotel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hotel','url'=>array('admin')),
);
?>

<h1>View Hotel #<?php echo $model->id_hotel; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_hotel',
		'id_supplier',
	),
)); ?>
