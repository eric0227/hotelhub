<?php
/* @var $this BeddingController */
/* @var $model Bedding */

$this->breadcrumbs=array(
	'Beddings'=>array('index'),
	$model->id_bedding=>array('view','id'=>$model->id_bedding),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bedding', 'url'=>array('index')),
	array('label'=>'Create Bedding', 'url'=>array('create')),
	array('label'=>'View Bedding', 'url'=>array('view', 'id'=>$model->id_bedding)),
	array('label'=>'Manage Bedding', 'url'=>array('admin')),
);
?>

<h1>Update Bedding <?php echo $model->id_bedding; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>