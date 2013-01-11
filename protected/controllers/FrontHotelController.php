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
	public function actionProducts(){
		$this->render('products');
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$room = Room::model()->findByPk($id);
		
		if($room == null){
			throw new CHttpException('404');
		}
		
		$attributes = $room->getAllAttributes();
		//$images = ImageC::model()->getSelectedImages($room->id_product);
		
		$this->render('view', array(
					'room' => $room,
					'attributes' => $attributes,
					'roomImages' => $room->product->productImages,
					'coverImage' => $room->supplier->getCoverImage(),
					'supplierImages' => $room->supplier->supplierImages,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		Yii::app()->session->add('service', Service::HOTEL);
		
		// special Supplier..
		$spProvider=new CActiveDataProvider('SpecialSupplier');
		$spProvider->criteria->condition = 'id_service = '.Service::HOTEL;
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

/*	
	{
		name : $name,
		adults_num : $adults_num,
		children_num : $children_num,
		adults_extra : $adults_extra,
		children_extra : $children_extra,
		bedding : {
			id_bedding : $id_bedding,
			bed_index : $bed_index,
			bed_num : $bed_num,
			single_num: $single_num,
			double_num : $double_num,
			additional_cost: $additional_cost
		},
		extra_price : $extra_price,
		product_date : [{
			id_product_date: $id_product_date,
			on_date : 'yyyy-MM-dd',
			price : $price,
			agent_price: $agent_price,
			extra_price : $extra_price,
		}, ... ],
		total_price : $total_price,
		total_agent_price : $total_agent_price,
	}
*/	
	public function actionBookInfoDisplay() {
		$option_data = Room::makeOptionData();
		//var_dump($option_data);
		
		$total_price = 0;
		$total_agent_price = 0;
		
		foreach($option_data as $id_product => $product) {
			$total_price += $product['total_price'];
			$total_agent_price += $product['total_agent_price'];
			
			foreach($product['product_date'] as $product_date) {
				echo "<tr>";
				echo "<td>".$product['name']."</td>";
				echo "<td>".substr($product_date['on_date'], 0, 10)."</td>";
				echo "<td>".number_format($product_date['price'],2)."</td>";
				echo "<td>".number_format($product_date['extra_price'],2)."</td>";
				echo "<td>".($product_date['price'] + $product_date['extra_price'])."</td>";
				echo "<td>".($product['adults_num'] + $product['children_num'])."</td>";
				echo "</tr>";
			}
		}
		echo "<tr >";
		echo "<td colspan='4' style='font-size:18px; text-align:right; font-weight:bold'>Total :</td>";
		echo "<td style='font-size:18px; font-weight:bold'>".$total_price."</td>";
		echo "</tr>";
		
		Yii::app()->end();
	}
	
	
}
