<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->name=>array('view','id'=>$model->id_service),
	'Update',
);

$this->menu=array(
	array('label'=>'List Service','url'=>array('index')),
	array('label'=>'Create Service','url'=>array('create')),
	array('label'=>'View Service','url'=>array('view','id'=>$model->id_service)),
	array('label'=>'Manage Service','url'=>array('admin')),
);
?>

<h1>Update Service <?php echo $model->id_service; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>