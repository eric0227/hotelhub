
<?php
$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);
$translate=Yii::app()->translate;

$productMenu = array();

if(Yii::app()->user->isGuest == false) {
	if($service == Service::HOTEL) {
		//$productMenu[] = array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product'));
		$productMenu[] = array('label'=>'Product Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		$productMenu[] = array('label'=>'Room', 'url'=>array('/room/index', 'tag'=>'room'));
		$productMenu[] = array('label'=>'Bedding', 'url'=>array('/bedding/index', 'tag'=>'bedding'));
		$productMenu[] = array('label'=>'Room Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
	} else if($service == Service::CAR) {
		$productMenu[] = array('label'=>'Car', 'url'=>array('/car/index', 'tag'=>'car'));
		//$productMenu[] = array('label'=>'Car Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		//$productMenu[] = array('label'=>'Car Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
	} else {
		$productMenu[] = array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product'));
		$productMenu[] = array('label'=>'Product Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		$productMenu[] = array('label'=>'Product Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php /* echo CHtml::encode(Yii::app()->name); */ ?>
			Holidoy Admin
		</div>
		<div>
			<div style="float:left;">
			<?php 
				Yii::app()->clientScript->registerScript(
			       'myHideEffect',
			       '$("#service").on("change", function() {
			       		$("#service-form").submit();
					});
					$("#lang").on("change", function() {
			       		$("#lang-form").submit();
					});
					',
					CClientScript::POS_READY
				);
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/service/change','post', array('id'=>'service-form'));
				echo CHtml::dropDownList('service', $service, Service::items(), array('id'=>'service'));
				echo CHtml::submitButton("Service", array('class'=>'btn'));
				echo CHtml::endForm();
			?>
			</div>
			
			<div style="float:left; padding-left: 20px;">
			<?php
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/lang/change','post', array('id'=>'lang-form'));
				echo CHtml::dropDownList('lang', $lang, Lang::items(), array('id'=>'lang'));
				echo CHtml::submitButton("Lang", array('class'=>'btn'));
				echo CHtml::endForm();
			?>
			</div>
			<div style="clear:both;"></div>
		</div>
				
	</div><!-- header -->
	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbMenu',array(
			'type' => 'tabs',
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/adm/index')),
				array('label'=>'Product', 'url'=>'', 
					'items'=>$productMenu,
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Images', 'url'=>'',
					'items'=>array(
						array('label'=>'Image Type', 'url'=>array('/imageType/index', 'tag'=>'imageType')),
						array('label'=>'Supplier Images', 'url'=>array('/imageSupplier/index', 'type'=>ImageC::SUPPLIER_IMAGE)),
						array('label'=>'Product Images', 'url'=>array('/imageProduct/index', 'type'=>ImageC::PRODUCT_IMAGE)),
						
// 						array('label'=>'Supplier Images', 'url'=>array('/supplierImage/index', 'tag'=>'supplierImage')),
// 						array('label'=>'Product Images', 'url'=>array('/productImage/index', 'tag'=>'productImage')),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Orders', 'url'=>'',
					'items'=>array(
						array('label'=>'Order', 'url'=>array('/order/index', 'tag'=>'order')),
						array('label'=>'OrderBooking', 'url'=>array('/orderBooking/index', 'tag'=>'orderBooking')),
						array('label'=>'OrderItem', 'url'=>array('/orderItem/index', 'tag'=>'orderItem')),
						array('label'=>'OrderHistory', 'url'=>array('/orderHistory/index', 'tag'=>'orderHistory')),
						array('label'=>'OrderState', 'url'=>array('/orderState/index', 'tag'=>'orderState'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Cart', 'url'=>'',
					'items'=>array(
						array('label'=>'Cart', 'url'=>array('/cart/index', 'tag'=>'cart')),
						array('label'=>'CartBooking', 'url'=>array('/cartBooking/index', 'tag'=>'cartBooking')),
						array('label'=>'CartProduct', 'url'=>array('/cartProduct/index', 'tag'=>'cartProduct'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
/*				
				array('label'=>'Supplier', 'url'=>'',
					'items'=>array(
						array('label'=>'Supplier', 'url'=>array('/supplier/admin', 'tag'=>'supplier'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
*/				
				array('label'=>'Member', 'url'=>'',
					'items'=>array(
						array('label'=>'Group', 'url'=>array('/group/index', 'tag'=>'group')),
						array('label'=>'User', 'url'=>array('/user/index', 'tag'=>'user')),
						array('label'=>'Supplier', 'url'=>array('/supplier/admin', 'tag'=>'supplier')),
						array('label'=>'Special Supplier', 'url'=>array('/specialSupplier/admin', 'tag'=>'specialSupplier')),
						//array('label'=>'Address', 'url'=>array('/address/index', 'tag'=>'address'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Service', 'url'=>'',
					'items'=>array(
						array('label'=>'Service', 'url'=>array('/service/index', 'tag'=>'service'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'CMS', 'url'=>'',
					'items'=>array(
						array('label'=>'CMS Category', 'url'=>array('/cmsCategory/index', 'tag'=>'cms-category')),
						array('label'=>'CMS', 'url'=>array('/cms/index', 'tag'=>'cms')),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Configuration', 'url'=>'',
					'items'=>array(
						array('label'=>'Configuration', 'url'=>array('/configuration/index', 'tag'=>'configuration')),
						array('label'=>'Lang', 'url'=>array('/lang/index', 'tag'=>'lang')),
						array('label'=>'Currency', 'url'=>array('/currency/index', 'tag'=>'Currency')),
						array('label'=>'CodeType', 'url'=>array('/codeType/index', 'tag'=>'codeType')),
						array('label'=>'Code', 'url'=>array('/code/index', 'tag'=>'code')),
						array('label'=>'Special', 'url'=>array('/special/index', 'tag'=>'special')),
						array('label'=>'AttributeGroup', 'url'=>array('/attributeGroup/index', 'tag'=>'attributeGroup')),
						array('label'=>'Attribute', 'url'=>array('/attribute/index', 'tag'=>'attribute')),
						array('label'=>'AttributeItem', 'url'=>array('/attributeItem/index', 'tag'=>'attributeItem')),
						array('label'=>'Edit Translate', 'url'=>array('/translate/edit/admin', 'tag'=>'translateEdit')),
						array('label'=>'Missing Translate', 'url'=>array('/translate/edit/missing', 'tag'=>'translateMission')),
						array('label'=>'Location', 'url'=>'',
							'items'=>array(
								array('label'=>'Zone', 'url'=>array('zone/index'), 'tag'=>'Zone'),
								array('label'=>'Country', 'url'=>array('country/index'), 'tag'=>'Country'),
								array('label'=>'State', 'url'=>array('state/index'), 'tag'=>'State'),
								array('label'=>'Destination', 'url'=>array('destination/index'), 'tag'=>'Destination'),
							),
						),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Login', 'url'=>array('/adm/login'), 'visible'=>Yii::app()->user->isGuest),
				// array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/adm/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		
	<?php if(!Yii::app()->user->isGuest) { ?>
		<div class="logout">
			<a href="<?php echo Yii::app()->request->baseUrl?>/sup/logout">Logout (<?php echo Yii::app()->user->name ?>)</a>
		</div>
	<?php } ?>
	
		<div style="clear:both"></div>
		
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Holidoy.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
