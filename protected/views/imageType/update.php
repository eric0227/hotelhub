<?php
/* @var $this ImageTypeController */
/* @var $model ImageType */

$this->breadcrumbs=array(
	'Image Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id_image_type),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImageType', 'url'=>array('index')),
	array('label'=>'Create ImageType', 'url'=>array('create')),
	array('label'=>'View ImageType', 'url'=>array('view', 'id'=>$model->id_image_type)),
	array('label'=>'Manage ImageType', 'url'=>array('admin')),
);
?>

<h1>Update ImageType <?php echo $model->id_image_type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>