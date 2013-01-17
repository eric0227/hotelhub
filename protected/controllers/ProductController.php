<?php

class ProductController extends Controller
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
		$id_product = $_GET['id'];
		if(!isset($id_product)) {
			$id_product = $_POST['Product']['id_product'];
		}
		
		if(isset($id_product)) {
			$id_supplier = Product::model()->findByPk($id_product)->id_supplier;
		}
		
		
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete' ),
				'expression' => "Yii::app()->user->getLevel() >= 10 || Yii::app()->user->id == $id_supplier",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','address'),
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
		$model=new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save()) {
				$model->saveProductLang();

				$this->redirect(array('view','id'=>$model->id_product));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save()) {
				$model->saveProductLang();
				
				$this->redirect(array('view','id'=>$model->id_product));
			}
		} else {
			$model->loadMultiLang();
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		ProductLang::model()->deleteAllByAttributes(array('id_product'=>$this->id_product));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
		return;
		
		$dataProvider=new CActiveDataProvider('Product');
		$dataProvider->criteria->condition = 'id_service = '. Service::getCurrentService();
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

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
		$model=Product::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAddress($id) {
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$product=$this->loadModel($id);
	
		$model = $this->getAddress($id);
	
		if(isset($_POST['Address']) && isset($_POST['yt0']))
		{
			$model->attributes=$_POST['Address'];
			if($model->save()) {
	
				//if($model->isNewRecord) {
				$this->setAddressId($product, $model);
				//}
	
				Yii::app()->user->setFlash('success', "Data saved!");
	
				$this->render('address_form',array(
						'model'=>$model,
						'id'=>$product->id_product
				));
				return;
			}
		}
	
		$this->render('address_form',array(
				'model'=>$model,
				'id'=>$product->id_product
		));
	
	}
	
	private function getAddress($id) {
		$product=$this->loadModel($id);
	
		$address_code = Address::DEFAULT_CODE;	
		$model = $product->address;
	
		if(!isset($model)) {
			$model = new Address;
			$model->address_code = $address_code;
		}
	
		return $model;
	}
	
	private function setAddressId($product, $address) {
		$product->id_address = $address->id_address;
		$product->save();
	}
}
