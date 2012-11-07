<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */

$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->id_cms_category,
);

$this->menu=array(
	array('label'=>'List CmsCategory', 'url'=>array('index')),
	array('label'=>'Create CmsCategory', 'url'=>array('create')),
	array('label'=>'Update CmsCategory', 'url'=>array('update', 'id'=>$model->id_cms_category)),
	array('label'=>'Delete CmsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cms_category),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsCategory', 'url'=>array('admin')),
);
?>

<h1>View CmsCategory #<?php echo $model->id_cms_category; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cms_category',
		'id_parent',
		'level_depth',
		'active',
		'date_add',
		'date_upd',
		'position',
	),
)); ?>
