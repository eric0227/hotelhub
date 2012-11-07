<?php
$this->breadcrumbs=array(
	'Langs'=>array('index'),
	$model->name=>array('view','id'=>$model->id_lang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lang','url'=>array('index')),
	array('label'=>'Create Lang','url'=>array('create')),
	array('label'=>'View Lang','url'=>array('view','id'=>$model->id_lang)),
	array('label'=>'Manage Lang','url'=>array('admin')),
);
?>

<h1>Update Lang <?php echo $model->id_lang; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>