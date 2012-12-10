<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->id_product=>array('view','id'=>$model->id_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List Room','url'=>array('index')),
	array('label'=>'Create Room','url'=>array('create')),
	array('label'=>'View Room','url'=>array('view','id'=>$model->id_product)),
	array('label'=>'Manage Room','url'=>array('admin')),
	array('label'=>'Room Images', 'url'=>array('/imageProduct/index','id_product'=>$model->id_product)),
	array('label'=>'Room Date', 'url'=>array('/productDate/index', 'id_product'=>$model->id_product))	
);
?>

<h1>Update Room <?php echo $model->id_product; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'product'=>$product)); ?>