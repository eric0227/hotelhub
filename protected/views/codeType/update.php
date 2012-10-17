<?php
/* @var $this CodeTypeController */
/* @var $model CodeType */

$this->breadcrumbs=array(
	'Code Types'=>array('index'),
	$model->name=>array('view','id'=>$model->type),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeType', 'url'=>array('index')),
	array('label'=>'Create CodeType', 'url'=>array('create')),
	array('label'=>'View CodeType', 'url'=>array('view', 'id'=>$model->type)),
	array('label'=>'Manage CodeType', 'url'=>array('admin')),
);
?>

<h1>Update CodeType <?php echo $model->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>