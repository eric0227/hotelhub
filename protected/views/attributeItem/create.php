<?php
$this->breadcrumbs=array(
	'Attribute Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AttributeItem','url'=>array('index')),
	array('label'=>'Manage AttributeItem','url'=>array('admin')),
);
?>

<h1>Create AttributeItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>