<?php
$this->breadcrumbs=array(
	'Product'=>'/product/index', 'Images',
);

$this->menu=array(
	array('label'=>'Create Image','url'=>array('create'.'?id_product='.$_REQUEST['id_product'])),
	array('label'=>'Manage Image','url'=>array('admin'.'?id_product='.$_REQUEST['id_product'])),
);
?>

<h1>Images</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
