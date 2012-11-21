<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class StatSearchForm extends CFormModel
{
	public $from_date;
	public $to_date;
	public $room_type;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('from_date, to_date', 'length', 'max'=>10),
			array('room_type', 'length', 'max'=>20),
			array('from_date, to_date', 'checkSearchDate', 'on'=>'guestSearch'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'from_date'=>'From Date',
			'to_date'=>'To Date',
			'room_type'=>'RoomType',
		);
	}
	
	public function checkSearchDate($attribute,$params) {
		return true;
	}
	
	public static function getRoomType($id_supplier) {
		$command = Yii::app()->db->createCommand()->selectDistinct('room_name');
		$command->from('gc_room');
		if(isset($id_supplier)) {
			$command->where('id_supplier = '.$id_supplier);
		}
		$rowData = $command->queryAll();
		
		$_items = array();
		foreach($rowData as $row) {
			$_items[$row['room_name']] = $row['room_name'];
		}
		return $_items;
	}
}
