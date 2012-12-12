<?php
$this->breadcrumbs=array(
	'Special Products'=>array('index'),
	$model->id_product=>array('view','id'=>$model->id_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecialProduct','url'=>array('index')),
	array('label'=>'Create SpecialProduct','url'=>array('create')),
	array('label'=>'View SpecialProduct','url'=>array('view','id'=>$model->id_product)),
	array('label'=>'Manage SpecialProduct','url'=>array('admin')),
);
?>

<h1>Update SpecialProduct <?php echo $model->id_product; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>