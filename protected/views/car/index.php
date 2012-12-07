<?php
$this->breadcrumbs=array(
	'Cars',
);

$this->menu=array(
	array('label'=>'Create Car','url'=>array('create')),
);
?>

<h1>Cars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
