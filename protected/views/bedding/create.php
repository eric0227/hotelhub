<?php
$this->breadcrumbs=array(
	'Beddings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bedding','url'=>array('index')),
	array('label'=>'Manage Bedding','url'=>array('admin')),
);
?>

<h1>Create Bedding</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>