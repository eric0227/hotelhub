<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car','url'=>array('index')),
);
?>

<h1>Create Car</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'product'=>$product)); ?>