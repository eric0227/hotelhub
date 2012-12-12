<?php
$this->breadcrumbs=array(
	'Special Suppliers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecialSupplier','url'=>array('index')),
	array('label'=>'Manage SpecialSupplier','url'=>array('admin')),
);
?>

<h1>Create SpecialSupplier</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>