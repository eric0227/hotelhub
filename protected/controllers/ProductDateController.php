<?php

class ProductDateController extends Controller
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
				'actions'=>array('index','view','prodectDateOptions'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','active','inactive', 'bulksave'),
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
		$model=new ProductDate;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductDate']))
		{
			$model->attributes=$_POST['ProductDate'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_product_date));
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

		if(isset($_POST['ProductDate']))
		{
			$model->attributes=$_POST['ProductDate'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_product_date));
		}
		
		$this->render('update',array(
			'model'=>$model,
			'specialList'=>$specialList
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductDate');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductDate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductDate']))
			$model->attributes=$_GET['ProductDate'];

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
		$model=ProductDate::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-date-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionProdectDateOptions() {
		if(isset($_REQUEST['CartProduct']['id_product'])) {		
			$models = ProductDate::model()->findAll(
				'id_product = :id_product', 
				array(':id_product' => $_REQUEST['CartProduct']['id_product'])
			);
		} else {
			$models = ProductDate::model()->findAll();
		}
		
		$data = CHtml::listData($models, 'id_product_date', 'id_product_date');
		//print_r($stateList);
		
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option', array('value'=>$value), CHtml::encode($name), true);
		}
		Yii::app()->end();		
		//return $data;
	}
	
	public function actionActive()
	{
		if(isset($_POST['id_product_date']))
		{
			foreach ($_POST['id_product_date'] as $id) {
				$model = $this->loadModel($id);
				$model->active = "1";
				$model->save();
			}
		}
		//Yii::app()->end();
	}

	public function actionInactive()
	{
		if(isset($_POST['id_product_date']))
		{
			foreach ($_POST['id_product_date'] as $id) {
				$model = $this->loadModel($id);
				$model->active = "0";
				$model->save();
			}
		}
		//Yii::app()->end();
	}


	public function actionBulkSave()
	{
		if(isset($_POST['bulk_save']) && isset($_POST['id_product']))
		{
			$id_product = $_POST['id_product'];
			foreach ($_POST['bulk_save'] as $bulk) {
				if($bulk['id_product_date'] != "") {
					//echo "Exist<br>";
					$model = $this->loadModel($bulk['id_product_date']);
					$model->price = str_replace(",", "", $bulk['price']);
					$model->agent_price = str_replace(",", "", $bulk['agent_price']);
					$model->quantity = str_replace(",", "", $bulk['quantity']);
					$model->active = isset($bulk['is_active']) ? $bulk['is_active'] : 0;
					$model->save();
				} else {
					if($bulk['price'] != "") {
						//echo "Not Exist<br>";
						$model = new ProductDate;
						$model->id_product = $id_product;
						$model->price = str_replace(",", "", $bulk['price']);
						$model->agent_price = str_replace(",", "", $bulk['agent_price']);
						$model->quantity = str_replace(",", "", $bulk['quantity']);
						$model->active = isset($bulk['is_active']) ? $bulk['is_active'] : 0;
						$model->on_date = $bulk['on_date'];
						$model->save();
					}
				}
			}
			
			$this->redirect(array('supplier/roomdates_editor','id'=>$id_product));
		}
		Yii::app()->end();
	}
}
