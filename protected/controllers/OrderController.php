<?php

class OrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'orderItem'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'orderHistory'),
				'expression' => "Yii::app()->user->getLevel() >= 5",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression' => "Yii::app()->user->getLevel() >= 5",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$data = array();
		
		$model=new Order;		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_REQUEST['yt0']) && $_REQUEST['yt0'] == 'Process') {
			$id_cart = $_POST['Order']['id_cart'];
			
			$model->id_lang=Lang::getCurrentLang();
				
			// get Cart
			$cart = Cart::model()->findByPk($id_cart);
			$model->id_cart = $id_cart;
			$model->id_user = $cart->id_user;
			$model->id_currency = $cart->id_currency;
			$model->id_address_delivery = $cart->id_address_delivery;
			$model->id_address_invoice = $cart->id_address_invoice;
			
			$model->procOrder();
		} else if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_order));
		}

		$data['model'] = $model;

		$this->render('create', $data);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$data = array();
		$model=$this->loadModel($id);
		$data['model'] = $model;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_REQUEST['yt0']) && $_REQUEST['yt0'] == 'Process') {
			$id_cart = $_POST['Order']['id_cart'];
			
			$model->id_lang=Lang::getCurrentLang();
				
			// get Cart
			$cart = Cart::model()->findByPk($id_cart);
			$model->id_cart = $id_cart;
			$model->id_user = $cart->id_user;
			$model->id_currency = $cart->id_currency;
			$model->id_address_delivery = $cart->id_address_delivery;
			$model->id_address_invoice = $cart->id_address_invoice;
			
			$model->procOrder();
		} else if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_order));
		}

		$this->render('update', $data);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Order');
		if(Supplier::currentSupplierId() != "") {
			$dataProvider->criteria->condition = 'id_order in (select id_order from gc_order_item where id_supplier = '.Supplier::currentSupplierId().')';
		} else if(Yii::app()->user->isAdmin()) {
			//$dataProvider->criteria->join = 'INNER JOIN gc_order_item a ON a.id_order = t.id_order';
		} else {
			$dataProvider->criteria->condition = 'id_order in (select id_order from gc_order_item where id_supplier = null)';
		}
		
		$dataProvider->criteria->order = 'id_order DESC';
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionOrderHistory($id)
	{
		$order=Order::model()->findByPk($id);
		$orderState = $order->orderState;
				
		$orderHistory = OrderHistory::model()->findByAttributes(array('id_order'=>$id, 'id_order_state'=>$order->id_order_state));
				
		if(isset($_POST['OrderHistory']))
		{
			$id_order_state = $_POST['OrderHistory']['id_order_state'];
			if($id_order_state != $order->id_order_state) {
				$orderHistory = new OrderHistory;
				$orderHistory->id_order = $id;
			}
			
			$orderHistory->attributes=$_POST['OrderHistory'];
			$orderHistory->save();
			
			$order->id_order_state = $orderHistory->id_order_state;
			$order->save();

		} else {
			$orderHistory = OrderHistory::model()->findByAttributes(array('id_order'=>$id, 'id_order_state'=>$order->id_order_state));
		}
		
		if(!isset($orderHistory)) {
			$orderHistory = new OrderHistory;
			$orderHistory->id_order = $id;
		}

		$this->render('orderHistory',array(
				'order'=>$order,
				'model'=>$orderHistory,
		));
	}
	
	public function actionOrderItem($id) {
		$model = OrderItem::model()->findByPk($id);
		if(!isset($model)) {
			$model = new OrderItem;
		}
		
		$this->render('orderItem', array(
			'model'=>$model
		));
	}
}
