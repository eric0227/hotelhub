<?php

class IndexController extends FrontController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(

		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

}