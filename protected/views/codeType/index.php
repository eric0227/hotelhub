<?php
$this->breadcrumbs=array(
	'Code Types',
);

$this->menu=array(
	array('label'=>'Create CodeType','url'=>array('create')),
	array('label'=>'Manage CodeType','url'=>array('admin')),
);
?>

<h1>Code Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
