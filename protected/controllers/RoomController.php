<?php

class RoomController extends Controller
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
				'actions'=>array('create','update','beddingConfig'),
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
		$model=new Room;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_product));
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

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_product));
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Room');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Room('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];

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
		$model=Room::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
/*	
	public function actionBeddingConfig() {
		$tot_room_cap = $_POST['Room']['guests_tot_room_cap'];
		$totalRow = 1;
		
		for($i = 2; $i <= $tot_room_cap + 1; $i++) {
			$totalRow = $i + $totalRow;
		}
		
		for($ii = 1; $ii < $totalRow; $ii++) {
			echo "<tr>";
			echo "<td>".$ii."</td>";
			echo "<td>".$ii."</td>";
			echo "<td>".$ii."</td>";
			echo "<td>".$ii."</td>";
			echo "<td>".$ii."</td>";
			echo "<td>".$ii."</td>";
			echo "</tr>";
		}
	}
*/	

	public function actionBeddingConfig() {
		$tot_room_cap = $_POST['Room']['guests_tot_room_cap'];
		
		for($roomCnt = 1; $roomCnt <= $tot_room_cap; $roomCnt++) {
			$this->appendBedding($roomCnt);
		}
	}
	
	private $guestNum = 1;
	private $bedTypeCnt = 2;
	
	private $beddingList = array();
	
	private function appendBedding($roomCnt) {
		for($index = 1; $roomCnt + $this->bedTypeCnt >= $index; $index++) {
			
			$beddingModel = new Bedding();
			$beddingModel->guest_num($this->guestNum);
			$beddingModel->bed_num($roomCnt);
			
			$beddingList[$gestNum][] = $beddingModel;
			
			$this->guestNum++;
			
			echo $beddingModel->$guest_num . '-' . $beddingModel->$bed_num;
			echo '<br>';
		}
	}
	
	public function makeBeddingImages($whichRow, $totalRow, $tot_room_cap) {
		$strBedHtml = "";
		$strBed_S = "S";
		$strBed_D = "D";
		
		//$strBedHtml .= "<img src=\"".$strBed_S."\" title=\".$strBed_S.\" alt=\".$strBed_S.\" />";
		$result = $whichRow % 3 + $whichRow / $tot_room_cap;
		
		return $result;
	}
	
	
}
