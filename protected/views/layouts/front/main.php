
<?php
$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);
$id = Yii::app()->user->id;
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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php /* echo CHtml::encode(Yii::app()->name); */ ?>
			Holidoy Front
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
				array('label'=>'Home', 'url'=>array('/index')),
				array('label'=>'Hotel', 'url'=>array('/frontHotel'), 'tag'=>'product'),
				array('label'=>'My Page', 'url'=>'',
					'items'=>array(
						array('label'=>'User', 'url'=>array('/user/'.$id, 'tag'=>'user')),
						array('label'=>'Cart', 'url'=>array('/cart/index', 'tag'=>'cart')),
						array('label'=>'Orders', 'url'=>array('/order/index', 'tag'=>'order')),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Login', 'url'=>array('/index/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/index/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	
	<div>
		<div id="center">
			<?php echo $content; ?>
			<div class="clear"></div>
		</div >
		<div id="righter">
			cart..
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Holidoy.<br/>
		All Rights Reserved.<br/>
		Powered by <a href="http://www.gnaemarketing.com.au">Gna eMarketing </a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
