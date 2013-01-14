
<?php

$service = Yii::app()->session->get('service',1);
$lang = Yii::app()->session->get('lang', 1);


$productMenu = array();

if(Yii::app()->user->isGuest == false && Yii::app()->user->id_group == User::SUPPLIER) {
	if(Yii::app()->user->getSupplier()->id_service == Service::HOTEL) {
		//$productMenu[] = array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product'));
		//$productMenu[] = array('label'=>'Product Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		$productMenu[] = array('label'=>'Room', 'url'=>array('/room/index', 'tag'=>'room'));
		//$productMenu[] = array('label'=>'Bedding', 'url'=>array('/bedding/index', 'tag'=>'bedding'));
		//$productMenu[] = array('label'=>'Room Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
	} else if(Yii::app()->user->getSupplier()->id_service == Service::CAR) {
		//$productMenu[] = array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product'));
		//$productMenu[] = array('label'=>'Product Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		$productMenu[] = array('label'=>'Car', 'url'=>array('/car/index', 'tag'=>'car'));
		//$productMenu[] = array('label'=>'Car Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
	} else {
		$productMenu[] = array('label'=>'Product', 'url'=>array('/product/index', 'tag'=>'product'));
		//$productMenu[] = array('label'=>'Product Image', 'url'=>array('/imageProduct/index', 'tag'=>'imageProduct'));
		//$productMenu[] = array('label'=>'Product Date', 'url'=>array('/productDate/index', 'tag'=>'productDate'));
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


	<!-- Load TinyMCE -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/tiny_mce/jquery.tinymce.js"></script>
	<script type="text/javascript">
		$().ready(function() {
			$('textarea.tinymce').tinymce({
				// Location of TinyMCE script
				script_url : '<?php echo Yii::app()->request->baseUrl; ?>/tiny_mce/tiny_mce.js',
	
				 mode : "none",
		         theme : "advanced",  
				 plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,jbimages",
	
					 
				// theme options
		        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,|,sub,sup,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,blockquote,pagebreak",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,
	
				// Example content CSS (should be your site CSS)
				content_css : "<?php echo Yii::app()->request->baseUrl; ?>/tiny_mce/themes/simple/skins/default/content.css",
	
				// Replace values for the template plugin
				template_replace_values : {
					username : "Some User",
					staffid : "991234"
				}
			});
		});
	</script>


</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php /* echo CHtml::encode(Yii::app()->name); */ ?>
			Holidoy Supplier
		</div>
		<div>
			<div style="float:left;">
			<?php 
// 				echo CHtml::beginForm( Yii::app()->request->baseUrl .'/service/change','post');
// 				echo CHtml::dropDownList('service', $service, Service::items());
// 				echo CHtml::submitButton("Service", array('class'=>'btn'));
// 				echo CHtml::endForm();
			?>
			</div>
			
			<div style="float:left; padding-left: 20px;">
			<?php 
				Yii::app()->clientScript->registerScript(
			       'myHideEffect',
			       '$("#lang").on("change", function() {
			       		$("#lang-form").submit();
					})',
					CClientScript::POS_READY
				);
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
				array('label'=>'Home', 'url'=>array('/sup/index')),
				
				array('label'=>'Supplier', 'url'=>'',
					'items'=>array(
						//array('label'=>'Supplier', 'url'=>array('/supplier/index', 'tag'=>'supplier')),
						array('label'=>'Supplier Update', 'url'=>array('/supplier/update/'. Yii::app()->user->id)),
						array('label'=>'Supplier Address', 'url'=>array('/supplier/updateAddress/'. Yii::app()->user->id)),
						array('label'=>'Supplier Images', 'url'=>array('/imageSupplier/index')),
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				
				array('label'=>'Product', 'url'=>'', 
					'items'=>$productMenu,
					'visible'=>!Yii::app()->user->isGuest
				),
				array('label'=>'Orders', 'url'=>'',
					'items'=>array(
						array('label'=>'Orders', 'url'=>array('/order/index', 'tag'=>'order')),
						//array('label'=>'OrderItem', 'url'=>array('/orderItem/index', 'tag'=>'orderItem')),
						//array('label'=>'OrderHistory', 'url'=>array('/orderHistory/index', 'tag'=>'orderHistory')),
						//array('label'=>'OrderState', 'url'=>array('/orderState/index', 'tag'=>'orderState'))
					),
					'visible'=>!Yii::app()->user->isGuest
				),
				
				array('label'=>'Guest List', 'url'=>array('/stat/guestList'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/sup/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/sup/logout'), 'visible'=>!Yii::app()->user->isGuest)
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
