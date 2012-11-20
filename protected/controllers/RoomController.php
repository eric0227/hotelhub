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
				'actions'=>array('create','update','beddingConfig', 'enableConfig'),
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
			if($model->save()) {
				$this->saveBedding($model);
				
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

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save()) {
				$this->saveBedding($model);
				return;
				$this->redirect(array('view','id'=>$model->id_product));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	private function saveBedding($model) {
		$beddingList = $_POST['Bedding'];
		
		if(!isset($beddingList)) {
			return;
		}

		$this->deleteBedding($model);
		
		foreach($beddingList as $index => $bedding) {						 
			if(!isset($bedding['chk']) || $bedding['chk'] != 1) {
				continue;
			}
			Yii::trace(print_r($bedding, true));
					
			if(isset($bedding['id_bedding'])) {
				$beddigModel = Bedding::model()->findByPk($bedding['id_bedding']);
			} else {
				$beddigModel = new Bedding;
			}
			$beddigModel->id_room = $model->id_product;
			$beddigModel->bed_index = $index;
			$beddigModel->bed_num = $bedding['bed_num'];
			$beddigModel->single_num = $bedding['single_num'];
			$beddigModel->double_num = $bedding['double_num'];
			$beddigModel->beddig_desc = $bedding['beddig_desc'];
			$beddigModel->cots_available = $bedding['cots_available'];
			$beddigModel->save();

			if(isset($bedding['default'])) {
				$model->id_bedding_default = $bedding['default'];
				$model->save();
			}
		}
	}
	
	private function deleteBedding($model) {
		$beddingList = $_POST['Bedding'];
		$ids = array();
		foreach($beddingList as $index => $bedding) {
			if(!isset($bedding['chk']) || $bedding['chk'] != 1) {
				continue;
			}
			$ids[] = $index;
		}
		
		Bedding::model()->deleteAll('id_room = :id_room and bed_index not in (:bed_indexs)'
			, array(':id_room'=>$model->id_product, ':bed_indexs'=> implode(',', $ids)));
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
	
	private $beddingList = array();
	public function actionBeddingConfig() {
		$id_product = $_POST['Room']['id_product'];
		$tot_room_cap = $_POST['Room']['guests_tot_room_cap'];
		
		for($roomCnt = 1; $roomCnt <= $tot_room_cap; $roomCnt++) {
			$this->makeBedding($id_product, $roomCnt);
		}
		
		$id_bedding_default = null;
		if(isset($id_product)) {
			$room = $this->loadModel($id_product);
			$id_bedding_default = $room->id_bedding_default;
		}
		
		$bed_index = 0;
		foreach($this->beddingList as $beddingModel) {
			
			echo "<tr>";
			echo "<td>";
			if(isset($beddingModel->id_bedding)) {
				echo CHtml::hiddenField('Bedding['.$bed_index.'][id_bedding]', $beddingModel->id_bedding);
			}
			echo CHtml::hiddenField('Bedding['.$bed_index.'][bed_num]', $beddingModel->bed_num);
			echo CHtml::hiddenField('Bedding['.$bed_index.'][single_num]', $beddingModel->single_num);
			echo CHtml::hiddenField('Bedding['.$bed_index.'][double_num]', $beddingModel->double_num);
			echo " ".$beddingModel->getBedImg()."</td>";
			echo "<td>".CHtml::checkBox('Bedding['.$bed_index.'][chk]', isset($beddingModel->id_bedding), array('id' => 'Bedding_'.$bed_index.'_index'))."</td>";
			echo "<td>".CHtml::radioButton('Bedding['.$bed_index.'][default]', $id_bedding_default == $beddingModel->id_bedding, array('id' => 'Bedding_'.$bed_index.'_default'))."</td>";
			echo "<td>".$beddingModel->getBedInfo()."</td>";
			echo "<td>".CHtml::textField('Bedding['.$bed_index.'][additional_cost]', isset($beddingModel->default)? $beddingModel->default : '', array('class' => 'width100', 'maxlength'=>2))."</td>";
			echo "<td>".CHtml::dropDownList('Bedding['.$bed_index.'][cots_available]', isset($beddingModel->cots_available)? $beddingModel->cots_available : '', array(0,1,2,3,4,5,6), array('class'=>'width50'))."</td>";
			echo "</tr>";
			$bed_index++;
		}
		
		Yii::app()->end();
	}
	
	private function makeBedding($id_product, $roomCnt) {
		for($s = $roomCnt; $s >= 0; $s--) {
			$beddingModel = Bedding::model()->findByAttributes(array('id_room' => $id_product, 'bed_num' => $roomCnt, 'single_num' => $s));
			if(!isset($beddingModel)) {
	 			$beddingModel = new Bedding;		
	 			$beddingModel->bed_num = $roomCnt;
	 			$beddingModel->single_num = $s;
	 			$beddingModel->double_num = $roomCnt - $s;
			}
			$this->beddingList[] = $beddingModel;
		}
	}
/*
	public function actionCheckboxlist()
	{
		$preSelectedItems = array();

		if(isset($_POST['checkboxlistsubmit']))
		{
			if(isset($_POST['myCheckBoxList']))
			{
				$message = "You selected: ";
				$loopCount = 0;
				$preSelectedItems = array();
				foreach($_POST['myCheckBoxList'] as $selectedItem)
				{
					$message .= strval($selectedItem);
					if(++$loopCount < count($_POST['myCheckBoxList']))
					$message .=  " & ";
					$preSelectedItems[] = $selectedItem;
				}
			}
			else
			$message = "Nothing Selected.";

			Yii::app()->user->setFlash('selectedValues',$message);
		}

		$items = array('item1'=>'Item One','item2'=>'Item Two','item3'=>'Item Three');
		$this->render('checkboxlist', array('select'=>$preSelectedItems, 'data'=>$items));
	}
*/
	public function actionEnableConfig() {
		echo "1111111111111111123123123123123123123123123";
		echo "<script>alert('123123123123');</script>";
		return;
	}
}
