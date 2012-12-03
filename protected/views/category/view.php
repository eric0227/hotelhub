<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id_category,
);

$this->menu=array(
	array('label'=>'List Category','url'=>array('index')),
	array('label'=>'Create Category','url'=>array('create')),
	array('label'=>'Update Category','url'=>array('update','id'=>$model->id_category)),
	array('label'=>'Delete Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_category),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Category','url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id_category; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_category',
		array('name'=>'id_parent', 'value'=>$model->parent->name),
		array('name'=>'id_service', 'value'=>$model->service->name),
		'name',
		'level_depth',
		'nleft',
		'nright',
		'active',
		'date_add',
		'date_upd',
		'position',
	),
)); ?>
