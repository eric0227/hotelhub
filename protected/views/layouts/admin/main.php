
<?php
$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);
$translate=Yii::app()->translate;
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
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/service/change','post');
				echo CHtml::dropDownList('service', $service, Service::items());
				echo CHtml::submitButton("Service", array('class'=>'btn'));
				echo CHtml::endForm();
			?>
			</div>
			
			<div style="float:left; padding-left: 20px;">
			<?php 
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/lang/change','post');
				echo CHtml::dropDownList('lang', $lang, Lang::items());
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
					'items'=>array(
						array('label'=>'Hotel', 'url'=>array('/hotel/index', 'tag'=>'hotel')),						
						array('label'=>'Category', 'url'=>array('/category/index', 'tag'=>'category')),						
						array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product')),						
						array('label'=>'Room', 'url'=>array('/room/index', 'tag'=>'room')),	
						array('label'=>'Bedding', 'url'=>array('/bedding/index', 'tag'=>'bedding')),
						array('label'=>'Special', 'url'=>array('/special/index', 'tag'=>'special')),
						array('label'=>'ProductDate', 'url'=>array('/productDate/index', 'tag'=>'productDate'))
					),
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
						array('label'=>'Orders', 'url'=>array('/order/index', 'tag'=>'order')),
						array('label'=>'OrderHistory', 'url'=>array('/orderHistory/index', 'tag'=>'orderHistory')),
						array('label'=>'OrderState', 'url'=>array('/orderState/index', 'tag'=>'orderState'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Cart', 'url'=>'',
					'items'=>array(
						array('label'=>'Cart', 'url'=>array('/cart/index', 'tag'=>'cart')),
						array('label'=>'CartProduct', 'url'=>array('/cartProduct/index', 'tag'=>'cartProduct'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Supplier', 'url'=>'',
					'items'=>array(
						array('label'=>'Supplier', 'url'=>array('/supplier/index', 'tag'=>'supplier'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Member', 'url'=>'',
					'items'=>array(
						array('label'=>'Group', 'url'=>array('/group/index', 'tag'=>'group')),
						array('label'=>'User', 'url'=>array('/user/index', 'tag'=>'user')),
						array('label'=>'Destination', 'url'=>array('/destination/index', 'tag'=>'destination')),
						array('label'=>'Address', 'url'=>array('/address/index', 'tag'=>'address'))
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
						array('label'=>'CodeType', 'url'=>array('/codeType/index', 'tag'=>'codeType')),
						array('label'=>'Code', 'url'=>array('/code/index', 'tag'=>'code')),
						array('label'=>'AttributeGroup', 'url'=>array('/attributeGroup/index', 'tag'=>'attributeGroup')),
						array('label'=>'Attribute', 'url'=>array('/attribute/index', 'tag'=>'attribute')),
						array('label'=>'AttributeItem', 'url'=>array('/attributeItem/index', 'tag'=>'attributeItem')),
						array('label'=>'Edit Translate', 'url'=>array('/translate/edit/admin', 'tag'=>'translateEdit')),
						array('label'=>'Missing Translate', 'url'=>array('/translate/edit/missing', 'tag'=>'translateMission')),
						
						
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Login', 'url'=>array('/adm/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/adm/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
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
		Powered by <a href="http://www.gnaemarketing.com.au">Gna eMarketing </a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
