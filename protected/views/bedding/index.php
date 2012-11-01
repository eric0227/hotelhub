<?php
/* @var $this BeddingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Beddings',
);

$this->menu=array(
	array('label'=>'Create Bedding', 'url'=>array('create')),
	array('label'=>'Manage Bedding', 'url'=>array('admin')),
);
?>

<h1>Beddings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
