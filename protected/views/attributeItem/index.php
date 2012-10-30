<?php
/* @var $this AttributeItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attribute Items',
);

$this->menu=array(
	array('label'=>'Create AttributeItem', 'url'=>array('create')),
	array('label'=>'Manage AttributeItem', 'url'=>array('admin')),
);
?>

<h1>Attribute Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
