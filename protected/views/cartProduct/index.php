<?php
/* @var $this CartProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cart Products',
);

$this->menu=array(
	array('label'=>'Create CartProduct', 'url'=>array('create')),
	array('label'=>'Manage CartProduct', 'url'=>array('admin')),
);
?>

<h1>Cart Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
