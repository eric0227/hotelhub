<?php
/* @var $this ConfigurationController */
/* @var $model Configuration */

$this->breadcrumbs=array(
	'Configurations'=>array('index'),
	$model->name=>array('view','id'=>$model->id_configuration),
	'Update',
);

$this->menu=array(
	array('label'=>'List Configuration', 'url'=>array('index')),
	array('label'=>'Create Configuration', 'url'=>array('create')),
	array('label'=>'View Configuration', 'url'=>array('view', 'id'=>$model->id_configuration)),
	array('label'=>'Manage Configuration', 'url'=>array('admin')),
);
?>

<h1>Update Configuration <?php echo $model->id_configuration; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>