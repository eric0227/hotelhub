<?php
/* @var $this SpecialController */
/* @var $model Special */

$this->breadcrumbs=array(
	'Specials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Special', 'url'=>array('index')),
	array('label'=>'Manage Special', 'url'=>array('admin')),
);
?>

<h1>Create Special</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>