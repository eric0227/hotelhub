<?php
$this->breadcrumbs=array(
	'Product Dates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductDate','url'=>array('index', 'id_product'=>$_REQUEST['id_product'])),
	array('label'=>'Manage ProductDate','url'=>array('admin', 'id_product'=>$_REQUEST['id_product'])),
);
?>

<h1>Create ProductDate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>