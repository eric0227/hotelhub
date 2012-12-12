<?php

class StatController extends Controller
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
	}
	
	public function actionGuestList() {
		
		$model = new StatSearchForm('guestSearch');
		$model->attributes = $_POST['StatSearchForm'];
		
		$where = array();
		if(!empty($model->from_date)) {
			$model->from_date = $model->from_date . ' 00:00:00';
			$where[] = "o.date_add >= '{$model->from_date}'";
		}
		if(!empty($model->to_date)) {
			$model->to_date = $model->to_date . ' 23:59:59';
			$where[] = "o.date_add <= '{$model->to_date}'";
		}
		if(!empty($model->room_name)) {
			$where[] = "r.room_name = '{$model->room_name}'";
		}
		//var_dump($model->attributes);
		
		$sql = "select o.id_order, o.total_price, concat(u.lastname, ' ', u.firstname) username, oi.product_name, min(oi.on_date) checkin , max(oi.on_date) checkout, r.room_name
				FROM gc_order o, gc_order_item oi, gc_user u, gc_supplier s, gc_product p, gc_room r
				WHERE o.id_order = oi.id_order
				AND o.id_user = u.id_user
				AND p.id_supplier = s.id_supplier
				AND p.id_product = oi.id_product
				AND p.id_product = r.id_product";
		if(count($where) > 0) {
			$sql = $sql . ' AND ' . implode(' AND ', $where);
		}
		
		$command = Yii::app()->db->createCommand($sql);
		
		//var_dump($command);
		//echo $command->getWhere();
		
		$rowData = $command->queryAll();
		//var_dump($rowData);
		
		$dataProvider=new CArrayDataProvider($rowData);

		$this->render('guest',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

}
