<?php
$this->breadcrumbs=array(
	'Special Suppliers'=>array('index'),
	$model->id_supplier=>array('view','id'=>$model->id_supplier),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecialSupplier','url'=>array('index')),
	array('label'=>'Create SpecialSupplier','url'=>array('create')),
	array('label'=>'View SpecialSupplier','url'=>array('view','id'=>$model->id_supplier)),
	array('label'=>'Manage SpecialSupplier','url'=>array('admin')),
);
?>

<h1>Update SpecialSupplier <?php echo $model->id_supplier; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>