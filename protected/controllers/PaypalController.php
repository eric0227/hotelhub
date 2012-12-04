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
		/*
		$model = new Order;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['id_cart'])) {
			$id_cart = $_POST['id_cart'];

			$model->id_lang = Lang::getCurrentLang();
		
			// get Cart
			$cart = Cart::model()->findByPk($id_cart);
			$model->id_cart = $id_cart;
			$model->id_user = $cart->id_user;
			$model->id_currency = $cart->id_currency;
			$model->id_address_delivery = $cart->id_address_delivery;
			$model->id_address_invoice = $cart->id_address_invoice;
				
			$model->procOrder();
			if($model->save()) {
				$_POST[custom_field] = $model->id_order;
				$this->render('process');
			} else {
				die();
			}
		}
		*/
		$this->render('process');
	}
	
	public function actionOrderform() {
		$this->render('orderform');
	}
	
	public function actionSuccess() {
		$model = new Order;
		
		if(isset($_POST['custom'])) {
			$id_cart = $_POST['custom'];
		
			$model->id_lang = Lang::getCurrentLang();
		
			// get Cart
			$cart = Cart::model()->findByPk($id_cart);
			$model->id_cart = $id_cart;
			$model->id_user = $cart->id_user;
			$model->id_currency = $cart->id_currency;
			$model->id_address_delivery = $cart->id_address_delivery;
			$model->id_address_invoice = $cart->id_address_invoice;
		
			$model->procOrder();
			if($model->save()) {
				$order = Order::model()->findByPk($model->id_order);
				$model->id_user = $order->id_user;
				$model->id_order = $order->id_order;
				$model->id_order_state = "11"; //Awaiting PayPal payment.
				$model->date_add = $_POST['payment_date'];
					
				if($model->save()) {
					$this->render('success');
				}
			} else {
				die();
			}
		}
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