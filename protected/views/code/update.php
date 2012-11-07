<?php
$this->breadcrumbs=array(
	'Codes'=>array('index'),
	$model->name=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Code','url'=>array('index')),
	array('label'=>'Create Code','url'=>array('create')),
	array('label'=>'View Code','url'=>array('view','id'=>$model->code)),
	array('label'=>'Manage Code','url'=>array('admin')),
);
?>

<h1>Update Code <?php echo $model->code; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>