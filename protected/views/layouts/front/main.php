<?php
$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);
$id = Yii::app()->user->id;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta charset="utf-8" />
	<meta name="language" content="en" />
	<!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flick/jquery-ui-1.9.1.custom.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js_plugins/fancybox/jquery.fancybox-1.3.4.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css" />
	<!-- load javascript files -->
	<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-1.9.1.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl ?>/js_plugins/fancybox/jquery.easing-1.3.pack.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl ?>/js_plugins/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl ?>/js/hotel/hotel.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.js"></script>
	<![endif]-->
	<script type="text/javascript">
		$(function(){
			var current = '<?php echo Service::getCurrentService() ?>';
			$('#navigation li[data-sid='+current+']').addClass('current');
		});
	</script>
</head>
<body>
<div id="wrapper">
	<header id="site_header">
		<div class="separator">
			<div id="logo">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/logo.jpg" alt="Holidoy" />
				</a>
			</div>
			<div id="header_controls">
			<?php if(Yii::app()->user->isGuest) { ?>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login" class="btn">Doy Member</a>
			<?php } else { ?>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout" class="btn">Log out</a>
			<?php }?>	
				
			<div id="lang-block">
			<script>
				$(function() {
					$("#lang").on("change", function() {
			       		$("#lang-form").submit();
					})
				});
			</script>
			<?php
				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/lang/change','post', array('id'=>'lang-form'));
				echo CHtml::dropDownList('lang', $lang, Lang::items(), array('id'=>'lang'));
				echo CHtml::endForm();
			?>
			</div>
				
				<div class="sns">
					<h4>Follow Us On</h4>
					<a href="http://facebook.com/" class="sns_icon facebook" title="Facebook"></a>
					<a href="http://twitter.com/" class="sns_icon twitter" title="Twitter"></a><br/>
					<a href="http://plus.google.com/" class="sns_icon googleplus" title="Google Plus"></a>
					<a href="http://youtube.com/" class="sns_icon youtube" title="Youtube"></a>
				</div>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/sup/" class="partner_login btn btn-warning">Partner Login</a>
			</div>
		</div>
		<nav>
			<ul id="navigation">
				<li data-name="fronthotel" data-sid="1"><a href="<?php echo Yii::app()->request->baseUrl; ?>/frontHotel" class="menu1"><span>Accommodation</span></a></li>
				<li data-name="carrental" data-sid="2"><a href="<?php echo Yii::app()->request->baseUrl; ?>/frontCarRental" class="menu2"><span>Car Rental<br/>Services</span></a></li>
				<li data-name="attraction" data-sid="3"><a href="<?php echo Yii::app()->request->baseUrl; ?>/frontAttraction" class="menu3"><span>Things To do<br/>Attraction</span></a></li>
				<li data-name="daytour" data-sid="4"><a href="<?php echo Yii::app()->request->baseUrl; ?>/frontDayTour" class="menu4"><span>Day Tour</span></a></li>
				<li data-name="hotdeal" data-sid="5"><a href="<?php echo Yii::app()->request->baseUrl; ?>/frontDoyDeal" class="menu5"><span>Hot Deal</span></a></li>
			</ul>
		</nav>
	</header>
	<?php echo $content; ?>
</div>
<footer id="site_footer">
	Copyright &copy; <?php echo date('Y'); ?> by Holidoy. All Rights Reserved.<br/>
	Powered by <a href="http://www.gnaemarketing.com.au">Gna eMarketing </a>
</footer>
</body>
</html>
