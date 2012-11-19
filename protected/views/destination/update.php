<?php
$this->breadcrumbs=array(
	'Destinations'=>array('index'),
	$model->name=>array('view','id'=>$model->id_destination),
	'Update',
);

$this->menu=array(
	array('label'=>'List Destination','url'=>array('index')),
	array('label'=>'Create Destination','url'=>array('create')),
	array('label'=>'View Destination','url'=>array('view','id'=>$model->id_destination)),
	array('label'=>'Manage Destination','url'=>array('admin')),
);
?>

<h1>Update Destination <?php echo $model->id_destination; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>