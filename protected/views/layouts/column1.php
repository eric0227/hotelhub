<?php
	if(User::getCurrentGroup() == User::ADMIN) {
		include Yii::app()->basePath .'/views/layouts/admin/column1.php';
	} else if(User::getCurrentGroup() == User::SUPPLIER) {
		include Yii::app()->basePath .'/views/layouts/supplier/column1.php';
	} else {
		include Yii::app()->basePath .'/views/layouts/front/column1.php';
	}
?>