<?php
$this->breadcrumbs=array(
	'Image Types'=>array('index'),
	'Resize',
);

$this->menu=array(
	array('label'=>'List ImageType','url'=>array('index')),
	array('label'=>'Create ImageType','url'=>array('create')),
	array('label'=>'Resize Images','url'=>array('resize')),
);

?>

<h1>Resize Images</h1>

<?php 
	echo CHtml::beginForm('resize', 'POST');

		echo '<div>';
		echo CHtml::dropDownList('type', '', array(ImageC::SUPPLIER_IMAGE=>'Supplier', ImageC::PRODUCT_IMAGE=>'Product'));
		echo '</div>';
		
		echo '<div>';
		echo CHtml::dropDownList('id_image_type', '', ImageType::items());
		echo '</div>';
		
		echo '<div>';
		echo CHtml::submitButton('Process'); 
		echo '</div>';
		
	echo CHtml::endForm();
?>


