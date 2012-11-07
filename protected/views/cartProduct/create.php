<?php
$this->breadcrumbs=array(
	'Cart Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CartProduct','url'=>array('index')),
	array('label'=>'Manage CartProduct','url'=>array('admin')),
);
?>

<h1>Create CartProduct</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>