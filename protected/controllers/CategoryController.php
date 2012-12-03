<?php

class CategoryController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'expression' => "Yii::app()->user->getLevel() >= 10",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$data = array();
		$model=new Category;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			
			$parent = $this->loadModel($model->attributes['id_parent']);
			
			//if($model->save()) {
			if($model->appendTo($parent)) {
				$this->setConfigurationLang($model->id_category);
				
				$this->redirect(array('view','id'=>$model->id_category));
			}
		}
		
		$data['parentItems'] = Category::items();
		
// 		$langModels = CategoryLang::getLangModels();
// 		$data['langModels'] = $langModels;
		
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
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
					
			//if($model->save()) {
			if($model->saveNode(false)) {
				$this->setConfigurationLang($model->id_category);
				
				$this->redirect(array('view','id'=>$model->id_category));
			}	
		} else {
			$model->loadMultiLang();
						
			$_items = array();
			$parentList = $model->getUnDescendants();
			foreach($parentList as $model) {
				$_items[$model->id_category] = $model->id_category;
			}
			
			$data['parentItems'] = $_items;			
		}
		
		$data['model'] = $model;	

		//print_r($_items);
		
		$this->render('update', $data);
	}
	
	private function setConfigurationLang($id) {
	
		$description = $_POST['Category']['description'];
		$name = $_POST['Category']['name'];
	
		CategoryLang::model()->deleteAllByAttributes(array('id_category'=>$id));
		foreach(Lang::items() as $lang => $langName) {
	
			if(empty($description[$lang])) {
				$description[$lang] = $description[Lang::getDefaultLang()];
			}
			if(empty($name[$lang])) {
				$name[$lang] = $name[Lang::getDefaultLang()];
			}
	
			$model=new CategoryLang;
			$model->id_category = $id;
			$model->id_lang = $lang;
			$model->description = $description[$lang];
			$model->name = $name[$lang];
			$model->save();
			
			//print_r($model);
			//return;
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$this->loadModel($id)->deleteNode();
		CategoryLang::model()->deleteAllByAttributes(array('id_category'=>$this->id_category));

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
		
		$model=new Category('search');		
		$model->unsetAttributes();  // clear any default values		
		
		$dataProvider=new CActiveDataProvider('Category');
		$dataProvider = $model->search();
		$this->render('index', array(
					'dataProvider'=>$dataProvider,
					'model' => $model
		));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
				
		//print_r($model->roots());
		//print_r(Category::getDescendants());

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
		$model=Category::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
