<?php
$this->breadcrumbs=array(
	'Carts',
);

$this->menu=array(
	array('label'=>'Create Cart','url'=>array('create')),
	array('label'=>'Manage Cart','url'=>array('admin')),
);
?>

<h1>Carts</h1>

PayPal Test
<?php 
/*
$buttonManager = Yii::app()->getModule('payPal')->buttonManager;

$button = $buttonManager->createButton("Test", array('BUTTONTYPE'=>'BUYNOW'));
echo $button->webSiteCode;

$button = $buttonManager->updateButton("Test", array('L_BUTTONVAR0'=>'amount=123.00'));
echo $button->webSiteCode;

$button = $buttonManager->getButtonDetails("Test");
var_dump($button);
echo $button->WEBSITECODE;
*/

//var_dump($button);
echo phpinfo();
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
