<?php
$this->breadcrumbs=array(
	'Special Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecialProduct','url'=>array('index')),
	array('label'=>'Manage SpecialProduct','url'=>array('admin')),
);
?>

<h1>Create SpecialProduct</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>