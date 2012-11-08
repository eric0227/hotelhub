<?php 
	// echo User::getCurrentGroup();
	
	
	if(User::getCurrentGroup() == User::ADMIN) {
		include Yii::app()->basePath .'/views/layouts/admin/column1.php';
	}
	
	if(User::getCurrentGroup() == User::SUPPLIER) {
		include Yii::app()->basePath .'/views/layouts/supplier/column1.php';
	}
?>