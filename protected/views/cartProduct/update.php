<?php
/* @var $this CartProductController */
/* @var $model CartProduct */

$this->breadcrumbs=array(
	'Cart Products'=>array('index'),
	$model->id_cart_product=>array('view','id'=>$model->id_cart_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List CartProduct', 'url'=>array('index')),
	array('label'=>'Create CartProduct', 'url'=>array('create')),
	array('label'=>'View CartProduct', 'url'=>array('view', 'id'=>$model->id_cart_product)),
	array('label'=>'Manage CartProduct', 'url'=>array('admin')),
);
?>

<h1>Update CartProduct <?php echo $model->id_cart_product; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>