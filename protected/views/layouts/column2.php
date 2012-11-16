<?php
	if(User::getCurrentGroup() == User::ADMIN) {
		include Yii::app()->basePath .'/views/layouts/admin/column2.php';
	} else if(User::getCurrentGroup() == User::SUPPLIER) {
		include Yii::app()->basePath .'/views/layouts/supplier/column2.php';
	} else {
		include Yii::app()->basePath .'/views/layouts/front/column2.php';
	}
?>