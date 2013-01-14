<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$product->id_product=>array('view','id'=>$product->id_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List Product','url'=>array('index')),
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'View Product','url'=>array('view','id'=>$product->id_product)),
	array('label'=>'Images', 'url'=>array('/imageProduct/index','id_product'=>$product->id_product)),
	array('label'=>'Product Date', 'url'=>array('/productDate/index', 'id_product'=>$product->id_product))
);
?>

<h1>Update Product <?php echo $model->id_product; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model,'product'=>$product)); ?>