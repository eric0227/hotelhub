<?php
/* @var $this ProductDateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Dates',
);

$this->menu=array(
	array('label'=>'Create ProductDate', 'url'=>array('create')),
	array('label'=>'Manage ProductDate', 'url'=>array('admin')),
);
?>

<h1>Product Dates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
