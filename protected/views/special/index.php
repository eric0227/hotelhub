<?php
/* @var $this SpecialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Specials',
);

$this->menu=array(
	array('label'=>'Create Special', 'url'=>array('create')),
	array('label'=>'Manage Special', 'url'=>array('admin')),
);
?>

<h1>Specials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
