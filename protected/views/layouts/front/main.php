<?php
$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);
$id = Yii::app()->user->id;

$current = "";
if(Yii::app()->request->pathinfo == '') $current = 'current';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta charset="utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flick/jquery-ui-1.9.1.custom.min.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css" />
	<!-- load javascript files -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.9.1.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/hotel/hotel.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.js"></script>
	<![endif]-->
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
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/user" class="btn">Doy Member</a>
				<select class="language">
					<option value="Australia">Australia</option>
					<option value="Korean">Korean</option>			
				</select>
				<div class="sns">
					<h4>Follow Us On</h4>
					<a href="http://facebook.com/" class="sns_icon facebook" title="Facebook"></a>
					<a href="http://twitter.com/" class="sns_icon twitter" title="Twitter"></a><br/>
					<a href="http://plus.google.com/" class="sns_icon googleplus" title="Google Plus"></a>
					<a href="http://youtube.com/" class="sns_icon youtube" title="Youtube"></a>
				</div>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/sup/login" class="partner_login btn btn-warning">Partner Login</a>
			</div>
		</div>
		<nav>
			<ul id="navigation">
				<li class="<?php echo $current ?>"><a href="<?php echo Yii::app()->request->baseUrl; ?>" class="menu1"><span>Accommodation</span></a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/construction" class="menu2"><span>Car Rental<br/>Services</span></a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/construction" class="menu3"><span>Things To do<br/>Attraction</span></a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/construction" class="menu4"><span>Day Tour</span></a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/construction" class="menu5"><span>Hot Deal</span></a></li>
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
