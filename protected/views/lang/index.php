<?php
$this->breadcrumbs=array(
	'Langs',
);

$this->menu=array(
	array('label'=>'Create Lang','url'=>array('create')),
	array('label'=>'Manage Lang','url'=>array('admin')),
);
?>

<h1>Langs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
