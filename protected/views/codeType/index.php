<?php
/* @var $this CodeTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Code Types',
);

$this->menu=array(
	array('label'=>'Create CodeType', 'url'=>array('create')),
	array('label'=>'Manage CodeType', 'url'=>array('admin')),
);
?>

<h1>Code Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
