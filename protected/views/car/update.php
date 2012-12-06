<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->id_product=>array('view','id'=>$model->id_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car','url'=>array('index')),
	array('label'=>'Create Car','url'=>array('create')),
	array('label'=>'View Car','url'=>array('view','id'=>$model->id_product)),
	array('label'=>'Manage Car','url'=>array('admin')),
);
?>

<h1>Update Car <?php echo $model->id_product; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>