<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Image','url'=>array('index'.'?id_product='.$_REQUEST['id_product'] )),
	array('label'=>'Manage Image','url'=>array('admin'.'?id_product='.$_REQUEST['id_product'])),
);
?>

<h1>Create Image</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>