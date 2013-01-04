<?php

class FrontCarRentalController extends Controller
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$car = Car::model()->findByPk($id);
		
		if($car == null){
			throw new CHttpException('404');
		}
		
		$attributes = $car->getAllAttributes();
		//$images = ImageC::model()->getSelectedImages($room->id_product);
	
		$this->render('view', array(
					'car' => $car,
					'attributes' => $attributes,
					'carImages' => $car->product->productImages,
					'coverImage' => $car->product->getCoverImage(),
					'supplierImages' => $car->supplier->supplierImages,
		));
	}
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		Yii::app()->session->add('service', Service::CAR);
		
		// special car..
		$spProvider=new CActiveDataProvider('SpecialSupplier');
		$spProvider->criteria->condition = 'id_service = '.Service::CAR;
		$spProvider->criteria->order = 'position ASC';
		
		$specialModels = $spProvider->getData();
		
		$this->render('index'
		, array('specialModels'=>$specialModels)
		);
	}
	
	public function actionSuppliers()
	{
		$this->render('suppliers');
	}
	
	public function actionOrder()
	{
		$this->render('order');
	}
	public function actionProducts(){
		$this->render('products');
	}
}
