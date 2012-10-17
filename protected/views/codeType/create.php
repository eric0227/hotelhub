<?php
/* @var $this CodeTypeController */
/* @var $model CodeType */

$this->breadcrumbs=array(
	'Code Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodeType', 'url'=>array('index')),
	array('label'=>'Manage CodeType', 'url'=>array('admin')),
);
?>

<h1>Create CodeType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>