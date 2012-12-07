<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->id_image=>array('view','id'=>$model->id_image),
	'Update',
);

$this->menu=array(
	array('label'=>'List Image','url'=>array('index','id_product'=>$model->productImage->id_product)),
	array('label'=>'Create Image','url'=>array('create','id_product'=>$model->productImage->id_product)),
	array('label'=>'View Image','url'=>array('view','id_product'=>$model->productImage->id_product,'id'=>$model->id_image)),
	array('label'=>'Manage Image','url'=>array('admin','id_product'=>$model->productImage->id_product )),
);
?>

<h1>Update Image <?php echo $model->id_image; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>