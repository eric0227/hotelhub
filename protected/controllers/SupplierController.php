<?php

class SupplierController extends Controller
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
		$id_supplier = $_GET['id'];
		if(!isset($id_supplier)) {
			$id_supplier = $_POST['Supplier']['id_supplier'];
		}
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'expression' => "Yii::app()->user->getLevel() >= 5",
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','update','dates_editor', 'updateAddress'),
				'expression' => "Yii::app()->user->getLevel() >= 10 || Yii::app()->user->id == $id_supplier",
				//'expression' => 'Yii::app()->user->id == $params["Supplier"]->id_supplier',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','delete'),
				'expression' => "Yii::app()->user->getLevel() >= 10",
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
		$model=new Supplier;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Supplier']))
		{
			if(isset($_POST['yt0'])) {
				$model->attributes=$_POST['Supplier'];
				if($model->save()) {
					$this->setSupplierLang($model->id_supplier);
					$this->redirect(array('view','id'=>$model->id_supplier));
				}
			} else {
				$id_supplier = $_POST['Supplier']['id_supplier'];
				$user = User::model()->findByPk($id_supplier);
				
				$model->id_supplier = $id_supplier;
				$model->manager_name = $user->lastname . ' ' . $user->firstname;
				$model->manager_email = $user->email;
				
				$model->sales_name = $user->lastname . ' ' . $user->firstname;
				$model->sales_email = $user->email;				
				
				$model->reservations_name = $user->lastname . ' ' . $user->firstname;
				$model->reservations_email = $user->email;
				
				$model->accounts_name = $user->lastname . ' ' . $user->firstname;
				$model->accounts_email = $user->email;
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
		if(Yii::app()->user->isAdmin()) {
			$this->layout='//layouts/column2';
		}
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Supplier']))
		{
			/*print_r($_POST);
			return;*/
			$model->attributes = $_POST['Supplier'];
			
			if($model->save()) {
				$this->setSupplierLang($model->id_supplier);
				$this->redirect(array('view','id'=>$model->id_supplier));
			}
		}
		$model->loadMultiLang();
		
		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateAddress($id)
	{
		$user = User::model()->findByPk($id);
		$defaultAddress = $user->getDefaultAddress();
		if(!isset($defaultAddress)) {
			$defaultAddress = new Address;
		}
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Address']))
		{
			$defaultAddress->attributes = $_POST['Address'];
				
			if($defaultAddress->save()) {
				// success message..
				
				$user->id_address_default = $defaultAddress->id_address;
				$user->save();
			}
		}
	
		$this->render('address_form',array(
				'model'=>$defaultAddress,
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
		$layout='//layouts/supplier/column_fullwidth';

		$dataProvider=new CActiveDataProvider('Supplier');
		$dataProvider->criteria->condition = 'id_service = '.Service::getCurrentService();
		
		$supplier = $this->loadModel(Yii::app()->user->id);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'supplier'=>$supplier
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Supplier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supplier'])) {
			$model->attributes=$_GET['Supplier'];
		}
		
		$model->id_service = Service::getCurrentService();

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
		$model=Supplier::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='supplier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	// Added By Chris.
	private function setSupplierLang($id) {

		$title = $_POST['Supplier']['title'];
		$short_promotional_blurb = $_POST['Supplier']['short_promotional_blurb'];
		$property_details = $_POST['Supplier']['property_details'];
		$business_facilities = $_POST['Supplier']['business_facilities'];
		$checkin_instructions = $_POST['Supplier']['checkin_instructions'];
		$car_parking = $_POST['Supplier']['car_parking'];
		$getting_there = $_POST['Supplier']['getting_there'];
		$things_to_do = $_POST['Supplier']['things_to_do'];

		SupplierLang::model()->deleteAllByAttributes(array('id_supplier'=>$id));
		foreach(Lang::items() as $lang => $langName) {

			if(empty($title[$lang])) {
				$title[$lang] = $title[Lang::getDefaultLang()];
			}
			
			if(empty($short_promotional_blurb[$lang])) {
				$short_promotional_blurb[$lang] = $short_promotional_blurb[Lang::getDefaultLang()];
			}

			if(empty($property_details[$lang])) {
				$property_details[$lang] = $property_details[Lang::getDefaultLang()];
			}

			if(empty($business_facilities[$lang])) {
				$business_facilities[$lang] = $business_facilities[Lang::getDefaultLang()];
			}

			if(empty($checkin_instructions[$lang])) {
				$checkin_instructions[$lang] = $checkin_instructions[Lang::getDefaultLang()];
			}

			if(empty($car_parking[$lang])) {
				$car_parking[$lang] = $car_parking[Lang::getDefaultLang()];
			}

			if(empty($getting_there[$lang])) {
				$getting_there[$lang] = $getting_there[Lang::getDefaultLang()];
			}

			if(empty($things_to_do[$lang])) {
				$things_to_do[$lang] = $things_to_do[Lang::getDefaultLang()];
			}

			$model = new SupplierLang();
			$model->id_supplier = $id;
			$model->id_lang = $lang;

			$model->title = $title[$lang];
			$model->short_promotional_blurb = $short_promotional_blurb[$lang];
			$model->property_details = $property_details[$lang];
			$model->business_facilities = $business_facilities[$lang];
			$model->checkin_instructions = $checkin_instructions[$lang];
			$model->car_parking = $car_parking[$lang];
			$model->getting_there = $getting_there[$lang];
			$model->things_to_do = $things_to_do[$lang];

			$model->save();
		}
	}

	public function actionDates_editor($id)
	{
		$productdates = ProductDate::model()->findAllByAttributes(array("id_product" => $id), array('order'=>'on_date'));
		
		$this->render('dates_editor',array(
			'productdates'=>$productdates
		));
	}


	// Added End.
}
