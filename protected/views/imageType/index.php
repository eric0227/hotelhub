<?php
$this->breadcrumbs=array(
	'Image Types',
);

$this->menu=array(
	array('label'=>'Create ImageType','url'=>array('create')),
	array('label'=>'Manage ImageType','url'=>array('admin')),
	array('label'=>'Resize Images','url'=>array('resize')),
);
?>

<h1>Image Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
