
<?php 
	$session=new CHttpSession;
	$session->open();
	
	if(isset($session['service'])) {
		$service = $session['service'];
	} else {
		$service = 1;
	}
	
	if(isset($session['lang'])) {
		$lang = $session['lang'];
	} else {
		$lang = 1;
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
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php echo CHtml::encode(Yii::app()->name); ?>
		</div>
		<div>
			<div style="float:left;">
			<?php 
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/service/change','post');
				echo CHtml::dropDownList('service', $service, Service::items());
				echo CHtml::submitButton("Service");
				echo CHtml::endForm();
			?>
			</div>
			
			<div style="float:left; padding-left: 20px;">
			<?php 
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/lang/change','post');
				echo CHtml::dropDownList('lang', $lang, Lang::items());
				echo CHtml::submitButton("Lang");
				echo CHtml::endForm();
			?>
			</div>
			<div style="clear:both;"></div>
		</div>
				
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array(
					'label'=>'Manage Model',
					'url'=>'',

					'items'=>array(
						array('label'=>'Configuration', 'url'=>array('/configuration/index', 'tag'=>'configuration')),
						array('label'=>'Lang', 'url'=>array('/lang/index', 'tag'=>'lang')),
						array('label'=>'CodeType', 'url'=>array('/codeType/index', 'tag'=>'codeType')),
						array('label'=>'Code', 'url'=>array('/code/index', 'tag'=>'code')),
						array('label'=>'AttributeGroup', 'url'=>array('/attributeGroup/index', 'tag'=>'attributeGroup')),
						array('label'=>'Attribute', 'url'=>array('/attribute/index', 'tag'=>'attribute')),
						array('label'=>'AttributeItem', 'url'=>array('/attributeItem/index', 'tag'=>'attributeItem')),						
						array('label'=>'Group', 'url'=>array('/group/index', 'tag'=>'group')),
						array('label'=>'User', 'url'=>array('/user/index', 'tag'=>'user')),
						array('label'=>'Address', 'url'=>array('/address/index', 'tag'=>'address')),						
						array('label'=>'Service', 'url'=>array('/service/index', 'tag'=>'service')),						
						array('label'=>'Supplier', 'url'=>array('/supplier/index', 'tag'=>'supplier')),						
						array('label'=>'Hotel', 'url'=>array('/hotel/index', 'tag'=>'hotel')),						
						array('label'=>'Category', 'url'=>array('/category/index', 'tag'=>'category')),						
						array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product')),						
						array('label'=>'Room', 'url'=>array('/room/index', 'tag'=>'room')),	
						array('label'=>'Bedding', 'url'=>array('/bedding/index', 'tag'=>'bedding')),
						array('label'=>'Special', 'url'=>array('/special/index', 'tag'=>'special')),
						array('label'=>'ProductDate', 'url'=>array('/productDate/index', 'tag'=>'productDate')),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
