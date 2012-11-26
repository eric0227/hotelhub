<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name=>array('view','id'=>$model->id_currency),
	'Update',
);

$this->menu=array(
	array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Create Currency','url'=>array('create')),
	array('label'=>'View Currency','url'=>array('view','id'=>$model->id_currency)),
	array('label'=>'Manage Currency','url'=>array('admin')),
);
?>

<h1>Update Currency <?php echo $model->id_currency; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>