<?php
$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->id_cms_category=>array('view','id'=>$model->id_cms_category),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsCategory','url'=>array('index')),
	array('label'=>'Create CmsCategory','url'=>array('create')),
	array('label'=>'View CmsCategory','url'=>array('view','id'=>$model->id_cms_category)),
	array('label'=>'Manage CmsCategory','url'=>array('admin')),
);
?>

<h1>Update CmsCategory <?php echo $model->id_cms_category; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'parentItems'=>$parentItems)); ?>