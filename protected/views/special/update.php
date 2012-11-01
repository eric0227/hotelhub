<?php
/* @var $this SpecialController */
/* @var $model Special */

$this->breadcrumbs=array(
	'Specials'=>array('index'),
	$model->name=>array('view','id'=>$model->id_special),
	'Update',
);

$this->menu=array(
	array('label'=>'List Special', 'url'=>array('index')),
	array('label'=>'Create Special', 'url'=>array('create')),
	array('label'=>'View Special', 'url'=>array('view', 'id'=>$model->id_special)),
	array('label'=>'Manage Special', 'url'=>array('admin')),
);
?>

<h1>Update Special <?php echo $model->id_special; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>