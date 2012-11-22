<?php

class TestController extends Controller
{
	
	//public $layout='//layouts/supplier/column1';
	
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		
		echo Yii::t("test","Message");
		echo Yii::t("test","You fdsafds");

		$translate=Yii::app()->translate;
		echo $translate->dropdown();
		
		if($translate->hasMessages()){
			//generates a to the page where you translate the missing translations found in this page
			echo $translate->translateLink('Message');
			//or a dialog
			echo $translate->translateDialogLink('Message','Translate page title');
		}
		
		echo $translate->editLink('Edit translations page');
		echo $translate->missingLink('Missing translations page');
		
		//Yii::app()->dateFormatter->
		
		echo time();

		
		$this->render('test');
	}
}

?>

