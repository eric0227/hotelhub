<?php

/**
 * This is the model class for table "gc_supplier".
 *
 * The followings are the available columns in table 'gc_supplier':
 * @property string $id_supplier
 * @property string $manager_name
 * @property string $manager_email
 * @property string $sales_name
 * @property string $sales_email
 * @property string $reservations_name
 * @property string $reservations_email
 * @property string $reservations_phone
 * @property string $reservations_fx
 * @property string $accounts_name
 * @property string $accounts_email
 * @property string $accounts_phone
 * @property string $accounts_fx
 * @property string $supplier_abn
 * @property string $member_chain_group
 * @property array  $selectedAttributeItemIds
 * @property integer $room_count
 * @property string $website
 * @property string $check_in_time
 * @property string $check_out_time
 * @property array  $items
 *
 * The followings are the available model relations:
 * @property Hotel[] $hotels
 * @property HotelImage[] $hotelImages
 * @property User $idSupplier
 * @property Attribute[] $gcAttributes
 */
class Supplier extends CActiveRecord
{
	// Added By Chris.
	private $currentLangModel = null;
	private $short_promotional_blurb = null;
	private $property_details = null;
	private $business_facilities = null;
	private $checkin_instructions = null;
	private $car_parking = null;
	private $getting_there = null;
	private $things_to_do = null;
	// Added End.
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Supplier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gc_supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_supplier', 'required'),
			array('room_count', 'numerical', 'integerOnly'=>true),
			array('id_supplier', 'length', 'max'=>10),
			array('manager_name, sales_name, reservations_name, reservations_phone, reservations_fx, accounts_name, accounts_phone, accounts_fx, supplier_abn, member_chain_group', 'length', 'max'=>64),
			array('manager_email, sales_email, reservations_email, accounts_email, website', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_supplier, manager_name, manager_email, sales_name, sales_email, reservations_name, reservations_email, reservations_phone, reservations_fx, accounts_name, accounts_email, accounts_phone, accounts_fx, supplier_abn, member_chain_group, room_count, website, check_in_time, check_out_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hotels' => array(self::HAS_MANY, 'Hotel', 'id_supplier'),
			'supplierImages' => array(self::HAS_MANY, 'SupplierImage', 'id_supplier'),
			'user' => array(self::BELONGS_TO, 'User', 'id_supplier'),
			'attributeValues' => array(self::HAS_MANY, 'SupplierAttributeValue', 'id_supplier'),
		);
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_supplier' => 'Id Supplier',
			'manager_name' => 'Manager Name',
			'manager_email' => 'Manager Email',
			'sales_name' => 'Sales Name',
			'sales_email' => 'Sales Email',
			'reservations_name' => 'Reservations Name',
			'reservations_email' => 'Reservations Email',
			'reservations_phone' => 'Reservations Phone',
			'reservations_fx' => 'Reservations Fx',
			'accounts_name' => 'Accounts Name',
			'accounts_email' => 'Accounts Email',
			'accounts_phone' => 'Accounts Phone',
			'accounts_fx' => 'Accounts Fx',
			'supplier_abn' => 'Supplier Abn',
			'member_chain_group' => 'Member Chain Group',
			'room_count' => 'Room Count',
			'website' => 'Website',
			'check_in_time' => 'Check In Time',
			'check_out_time' => 'Check Out Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('manager_name',$this->manager_name,true);
		$criteria->compare('manager_email',$this->manager_email,true);
		$criteria->compare('sales_name',$this->sales_name,true);
		$criteria->compare('sales_email',$this->sales_email,true);
		$criteria->compare('reservations_name',$this->reservations_name,true);
		$criteria->compare('reservations_email',$this->reservations_email,true);
		$criteria->compare('reservations_phone',$this->reservations_phone,true);
		$criteria->compare('reservations_fx',$this->reservations_fx,true);
		$criteria->compare('accounts_name',$this->accounts_name,true);
		$criteria->compare('accounts_email',$this->accounts_email,true);
		$criteria->compare('accounts_phone',$this->accounts_phone,true);
		$criteria->compare('accounts_fx',$this->accounts_fx,true);
		$criteria->compare('supplier_abn',$this->supplier_abn,true);
		$criteria->compare('member_chain_group',$this->member_chain_group,true);
		$criteria->compare('room_count',$this->room_count);
		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAllSttributes() {
		$result = array(); 
		
		$attributeList = Attribute::model()->findAll(
			"id_attribute_group = :id_attribute_group", 
			array('id_attribute_group' => AttributeGroup::SUPPLIER)
		);
		
		foreach($attributeList as $attribute) {
			$result[] = array(
				'attribute'=>$attribute,
				'attributeItem'=>AttributeItem::model()->findAll(
						'id_attribute = :id_attribute', 
						array('id_attribute'=>$attribute->id_attribute)
				),
				'selectedAttributeItemIds'=>$this->getSelectedAttributeItemIds($attribute->id_attribute)
			);
		}
		
		return $result;
	}
	
	public function getSelectedAttributeItemIds($id_attribute = null) {
		$result = array();
		
		foreach($this->attributeValues as $attributeValue) {
			if($id_attribute == null || $id_attribute == $attributeValue->id_attribute) {
				$result = array_merge($result, $attributeValue->getValues());
			}
		}
		return $result;
	}
	
	// Added By Chris.
	protected function afterFind() {
		$langModel = SupplierLang::model()->findByAttributes(array('id_supplier'=>$this->id_supplier, 'id_lang'=>Lang::getCurrentLang()));
		
		$this->short_promotional_blurb = $langModel->short_promotional_blurb;
		$this->property_details = $langModel->property_details;
		$this->business_facilities = $langModel->business_facilities;
		$this->checkin_instructions = $langModel->checkin_instructions;
		$this->car_parking = $langModel->car_parking;
		$this->getting_there = $langModel->getting_there;
		$this->things_to_do = $langModel->things_to_do;
	}
	
	public function getShort_Promotional_Blurb() {
		return $this->short_promotional_blurb;
	}

	public function getProperty_Details() {
		return $this->property_details;
	}

	public function getBusiness_Facilities() {
		return $this->business_facilities;
	}

	public function getCheckin_Instructions() {
		return $this->checkin_instructions;
	}

	public function getCar_Parking() {
		return $this->car_parking;
	}

	public function getGetting_There() {
		return $this->getting_there;
	}

	public function getThings_To_Do() {
		return $this->things_to_do;
	}

	private function getCurrentLangField($name) {
		if($this->currentLangModel == null) {
			$this->currentLangModel = SupplierLang::model()->findByAttributes(array('id_supplier'=>$this->id_supplier, 'id_lang'=>Lang::getCurrentLang()));
/*
			if($this->currentLangModel == null) {
				$this->currentLangModel = SupplierLang::model()->findByAttributes(array('id_supplier'=>$this->id_supplier, 'id_lang'=>Lang::getDefaultLang()));
			}
*/		}
		
		return $this->currentLangModel->{$name};
	}

	public function loadMultiLang() {
		$mutltiLangModels = SupplierLang::model()->findAllByAttributes(array('id_supplier'=>$this->id_supplier));

		$short_promotional_blurb = array();
		$property_details = array();
		$business_facilities = array();
		$checkin_instructions = array();
		$car_parking = array();
		$getting_there = array();
		$things_to_do = array();

		foreach($mutltiLangModels as $mutltiLangModel) {
			$short_promotional_blurb[$mutltiLangModel->id_lang] = $mutltiLangModel->short_promotional_blurb;
			$property_details[$mutltiLangModel->id_lang] = $mutltiLangModel->property_details;
			$business_facilities[$mutltiLangModel->id_lang] = $mutltiLangModel->business_facilities;
			$checkin_instructions[$mutltiLangModel->id_lang] = $mutltiLangModel->checkin_instructions;
			$car_parking[$mutltiLangModel->id_lang] = $mutltiLangModel->car_parking;
			$getting_there[$mutltiLangModel->id_lang] = $mutltiLangModel->getting_there;
			$things_to_do[$mutltiLangModel->id_lang] = $mutltiLangModel->things_to_do;
		}
		
		$this->short_promotional_blurb = $short_promotional_blurb;
		$this->property_details = $property_details;
		$this->business_facilities = $business_facilities;
		$this->checkin_instructions = $checkin_instructions;
		$this->car_parking = $car_parking;
		$this->getting_there = $getting_there;
		$this->things_to_do = $things_to_do;
	}
	// Added End.
	

	public function beforeSave() {
		
		
		//print_r($this->attributes);
		print_r($_POST);
		
		return;
		
		//print_r($_POST['Supplier']['selectedAttributeItemIds']);
		//return false;
		
		$command = Yii::app()->db->createCommand();
		$command->delete('gc_supplier_attribute_value', 'id_supplier=:id_supplier', array(':id_supplier' => $this->id_supplier));
		
		$attributeList = Attribute::model()->findAll(
			"id_attribute_group = :id_attribute_group", 
			array('id_attribute_group' => AttributeGroup::SUPPLIER)
		);
		
		$attributeValue = array();
		
		foreach($attributeList as $attribute) {
			if(!isset($attributeValue[$attribute->id_attribute])) {
				$attributeValue[$attribute->id_attribute] = array();
			}
			$attributeValue[$attribute->id_attribute] = $this->getSelectedAttributeItemIdsFromAttribute($attribute->id_attribute);
		}
		
		//print_r($attributeValue);
		
		foreach($attributeValue as $id_attribute => $ids) {
			if(count($ids) == 0) {
				continue;
			}
			$attributeValue=new SupplierAttributeValue();
			$attributeValue->id_supplier = $this->id_supplier;
			$attributeValue->id_attribute = $id_attribute;
			//echo implode(';', $ids);
			$attributeValue->value = implode(';', $ids);
			$attributeValue->save();
		}
		
		//print_r($attributeValue);
		
		return parent::beforeSave();
	}
	
	private $attributeItems = null;
	public function getSelectedAttributeItemIdsFromAttribute($id_attribute) {
		$result = array();
		
		if($this->attributeItems == null) {
			$this->attributeItems = AttributeItem::model()->findAll();
		}
		
		foreach($this->attributeItems as $item) {
			if($item->id_attribute == $id_attribute) {
				if($this->containAttributeItem($item->id_attribute_item)) {
					$result[] = $item->id_attribute_item;
				}
			}
		}
		
		return $result;		
	}
	
	public function containAttributeItem($id_attribute_item) {
		if(empty($_POST['selectedAttributeItemIds'])) {
			return false;
		}
		
		$ids = $_POST['selectedAttributeItemIds'];
		
		foreach($ids as $id) {
			if($id == $id_attribute_item) {
				return true;
			}
		}
		return false;
	}

	
	public static function items() {
		$_items = array();
	
		$models = Supplier::model()->findAll();
	
		foreach($models as $model) {
			$_items[$model->id_supplier] = $model->sales_name;			
		}
		return $_items;
	}
}

