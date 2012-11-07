<?php
/* @var $this CmsCategoryController */
/* @var $model CmsCategory */

$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsCategory', 'url'=>array('index')),
	array('label'=>'Manage CmsCategory', 'url'=>array('admin')),
);
?>

<h1>Create CmsCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>