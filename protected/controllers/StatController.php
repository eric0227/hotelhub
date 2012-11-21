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
		
		$where = array('and');
		if(!empty($model->from_date)) {
			$model->from_date = $model->from_date . ' 00:00:00';
			$where[] = "date_add >= '{$model->from_date}'";
		}
		if(!empty($model->to_date)) {
			$model->to_date = $model->to_date . ' 23:59:59';
			$where[] = "date_add <= '{$model->to_date}'";
		}
		if(!empty($model->room_type)) {
			$where[] = "room_type = '{$model->room_type}'";
		}
		//var_dump($model->attributes);
		
		$sql = 'SELECT o.id_order, o.total_price, u.lastname, u.firstname, r.room_name
				FROM gc_order o, gc_cart c, gc_cart_product cp, gc_product_date pd, gc_user u, gc_room r, gc_product p, gc_supplier s
				WHERE o.id_cart = c.id_cart
				AND c.id_cart = cp.id_cart
				AND cp.id_product_date = pd.id_product_date
				AND pd.id_product = r.id_product
				AND pd.id_product = p.id_product
				AND o.id_user = u.id_user
				AND p.id_supplier = s.id_supplier';
		
		$command = Yii::app()->db->createCommand($sql);
		
		//var_dump($command);
		//echo $command->getWhere();
		
		$rowData = $command->queryAll();
		var_dump($rowData);
		
		$dataProvider=new CArrayDataProvider($rowData);

		$this->render('guest',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

}
