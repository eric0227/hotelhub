<?php
$this->breadcrumbs=array(
	'Image Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImageType','url'=>array('index')),
	array('label'=>'Manage ImageType','url'=>array('admin')),
);
?>

<h1>Create ImageType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>