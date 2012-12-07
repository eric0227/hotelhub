<?php
$this->breadcrumbs=array(
	'Product Dates'=>array('index'),
	$model->id_product_date=>array('view','id'=>$model->id_product_date),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductDate','url'=>array('index', 'id_product'=>$model->id_product)),
	array('label'=>'Create ProductDate','url'=>array('create')),
	array('label'=>'View ProductDate','url'=>array('view', 'id_product'=>$model->id_product,'id'=>$model->id_product_date)),
	array('label'=>'Manage ProductDate','url'=>array('admin', 'id_product'=>$model->id_product)),
);
?>

<h1>Update ProductDate <?php echo $model->id_product_date; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>