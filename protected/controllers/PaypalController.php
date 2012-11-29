<?php

class PaypalController extends Controller
{
	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		$id_supplier = $_GET['id'];
		if(!isset($id_supplier)) {
			$id_supplier = $_POST['Supplier']['id_supplier'];
		}
			
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'orderform', 'process', 'success', 'cancelled'),
					'users' => "*",
				),
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionProcess() {
		$this->render('process');
	}
	
	public function actionOrderform() {
		$this->render('orderform');
	}
	
	public function actionSuccess() {
		$this->render('success');
	}	
	
	public function actionCancelled() {
		$this->render('cancelled');
	}
	
	public function actionPayment() {
		$this->render('payment');
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}