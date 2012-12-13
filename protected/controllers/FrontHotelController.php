<?php

class FrontHotelController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/front/hotel';

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
		);
	}
	
	/**
	 * Displays selected room details
	 */
	public function actionRoom($id){
		$room = Room::model()->findByPk($id);
		if($room == null){ throw new CHttpException('404'); }
		
		$attributes = $room->getAllSttributes();
		$images = imageC::model()->getSelectedImages($room->id_product);

		$this->render('room', array(
			'room' => $room,
			'attributes' => $attributes,
			'images' => $images
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$this->render('view');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
}
