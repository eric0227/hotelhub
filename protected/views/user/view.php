<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user,
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Update User','url'=>array('update','id'=>$model->id_user)),
	array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Update Address','url'=>array('address','id'=>$model->id_user)),
	array('label'=>'Change Password','url'=>array('password','id'=>$model->id_user)),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id_user; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		array(
			'label'=>'Group',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($model->group->name), '../group/' . $model->id_group),			
		),
		array(
			'label'=>'Lang',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($model->lang->name), '../lang/' . $model->id_lang),			
		),
		'lastname',
		'firstname',
		'email',
		'is_guest',
		'note',
		'birthday',
		'active',
		'deleted',
	),
)); ?>
