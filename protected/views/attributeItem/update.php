<?php
$this->breadcrumbs=array(
	'Attribute Items'=>array('index'),
	$model->id_attribute_item=>array('view','id'=>$model->id_attribute_item),
	'Update',
);

$this->menu=array(
	array('label'=>'List AttributeItem','url'=>array('index')),
	array('label'=>'Create AttributeItem','url'=>array('create')),
	array('label'=>'View AttributeItem','url'=>array('view','id'=>$model->id_attribute_item)),
	array('label'=>'Manage AttributeItem','url'=>array('admin')),
);
?>

<h1>Update AttributeItem <?php echo $model->id_attribute_item; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>